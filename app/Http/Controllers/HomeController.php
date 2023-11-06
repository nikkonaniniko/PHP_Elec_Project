<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // $game = Game::paginate(3); for pagination kodigo
        $game = Game::all();
        return view('home.userpage', compact('game'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            $total_games=Game::all()->count();
            $total_orders=Order::all()->count();
            $total_users=User::all()->count();
            $order=Order::all();
            
            $total_revenue=0;
            foreach($order as $order) {
                $total_revenue=$total_revenue + $order->price;
            }

            $total_delivered=Order::where('delivery_status', '=', 'delivered')->get()->count();
            $total_processing=Order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.home', compact('total_games', 'total_orders', 'total_users', 'total_revenue', 'total_delivered', 'total_processing'));
        } else {
            // $game = Game::paginate(3); for pagination kodigo
            $game = Game::all();
            return view('home.userpage', compact('game'));
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
            $game = Game::find($id);

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
            return redirect()->back();
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

    public function remove_cart($id) {
        $cart=Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function cash_order() {
        $user=Auth::user();
        $userid=$user->id;
        
        $data=Cart::where('user_id', '=', $userid)->get();
        
        foreach($data as $data) {
            $order=new order;
            $order->user_id=$data->user_id;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->game_id=$data->game_id;
            $order->game_name=$data->game_name;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            
            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        }    

        return redirect()->back()->with('message', 'We received your order. we will connect with you soon.');
    }
}
