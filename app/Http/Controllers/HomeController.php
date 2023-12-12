<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use App\Models\Cart;
use App\Models\Developers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('created_at', 'DESC')->paginate('6');
        // $game = Game::all();
        return view('home.userpage', compact('games'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            $total_games = Game::all()->count();
            $total_orders = Order::all()->count();
            $total_users = User::all()->count();
            $order = Order::all();

            $total_revenue = 0;
            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
            $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();
            $total_canceled = Order::where('delivery_status', '=', 'Canceled')->get()->count();

            $total_profit = 0;
            $total_paid = Order::where('payment_status', '=', 'paid')->get();
            foreach ($total_paid as $total_paid) {
                $total_profit = $total_profit + $total_paid->price;
            } 
            
            $today = date('Y-m-d');
            $sales_today = Order::where('payment_status', '=', 'paid')->whereDate('created_at', $today)->sum('price');

            return view('admin.home', compact('total_games', 'total_orders', 'total_users', 'total_revenue', 'total_delivered', 'total_processing', 'total_canceled', 'total_profit', 'sales_today'));
        } else {
            $games = Game::orderBy('created_at', 'DESC')->paginate('6'); 
            // $game = Game::all();
            return view('home.userpage', compact('games'));
        }
    }

    public function game_details($id)
    {
        $game = Game::find($id);
        return view('home.game_details', compact('game'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $game = Game::find($id);
            $game_exist_id = Cart::where('game_id', '=', $id)->where('user_id', '=', $userid)->get('id')->first();

            if ($game_exist_id) {
                $cart = Cart::find($game_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;
                $cart->price = $game->price * $cart->quantity;

                $cart->save();
                Alert::success('Game Added to your Cart', 'Thank You');
                return redirect()->back();
            } else {
                $cart = new cart;
                $cart->user_id = $user->id;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->game_id = $game->id;
                $cart->game_name = $game->name;
                $cart->price = $game->price * $request->quantity;
                $cart->image = $game->image;
                $cart->quantity = $request->quantity;

                $cart->save();
                Alert::success('Game Added to your Cart', 'Thank You');
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();

            return view('home.show_cart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        Alert::warning('Game Removed from your Cart');

        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id', '=', $userid)->get();

        foreach ($data as $data) {
            $order = new order;
            $order->user_id = $data->user_id;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->game_id = $data->game_id;
            $order->game_name = $data->game_name;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;

            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('message', 'We received your order. Please access your Orders page for updates.');
    }

    public function show_orders()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            $orders = Order::where('user_id', '=', $userid)->orderBy('created_at', 'DESC')->paginate('5');

            return view('home.orders', compact('orders'));
        } else {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'Canceled';

        $order->save();

        return redirect()->back();
    }

    public function search_game(Request $request)
    {
        $search_game = $request->search;
        // $game=Game::where('name', 'LIKE', '%$search_game%')->get();
        // $game = Game::where('name', 'LIKE', "%$search_game%")->orWhere('category', 'LIKE', "%$search_game%")->get();

        $games = Game::where('name', 'LIKE', "%$search_game%")->orWhere('category', 'LIKE', "%$search_game%")->paginate('6');

        return view('home.userpage', compact('games'));
    }

    public function games()
    {
        $games = Game::orderBy('name', 'ASC')->paginate('9');
        // $game = Game::all();
        return view('home.all_games', compact('games'));
    }

    public function search_games(Request $request)
    {
        $search_games = $request->search;
        // $game=Game::where('name', 'LIKE', '%$search_game%')->get();
        $games = Game::where('name', 'LIKE', "%$search_games%")->orWhere('category', 'LIKE', "%$search_games%")->paginate('6');

        return view('home.all_games', compact('games'));
    }

    public function about_us() {
        $developers = Developers::all();

        return view('home.about_us', compact('developers'));
    }

    public function contact_us() {
        return view('home.contact_us');
    }
}
