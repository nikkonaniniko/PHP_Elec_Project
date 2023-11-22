<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function view_category()
    {
        if (Auth::id()) {
            $data = Category::all();
            return view('admin.category', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function add_category(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            // 'user_id' => Auth::user()->id,
            // 'created_at' => Carbon::now()
        ]);
        // $data = new category;

        // $data->category_name = $request->category_name;

        // $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_game()
    {
        $category = Category::all();
        return view('admin.add_game', compact('category'));
    }

    public function add_game(Request $request)
    {
        $game = new game;

        $game->name = $request->name;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->quantity = $request->quantity;
        $game->category = $request->category;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('game', $imagename);
        $game->image = $imagename;

        $game->save();

        return redirect()->back()->with('message', 'Game Added Successfully');
    }

    public function show_game()
    {
        $game = Game::all();
        return view('admin.show_game', compact('game'));
    }

    public function edit_game($id)
    {
        $game = Game::find($id);
        $category = Category::all();
        return view('admin.edit_game', compact('game', 'category'));
    }

    public function edit_game_confirm(Request $request, $id)
    {
        if (Auth::id()) {
            $game = Game::find($id);

            $game->name = $request->name;
            $game->description = $request->description;
            $game->price = $request->price;
            $game->quantity = $request->quantity;
            $game->category = $request->category;

            // $oldImagePath = public_path('game/' . $game->image);
            // if (file_exists($oldImagePath)) {

            //     unlink($oldImagePath);
            // }
            $image = $request->image;
            if ($image) {
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('game', $imagename);
                $game->image = $imagename;
            }

            $game->save();

            return redirect()->back()->with('message', 'Game Edited Successfully');
        } else {
            return redirect('login');
        }
    }

    public function delete_game($id)
    {
        $data = Game::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Game Deleted Successfully');
    }

    public function order()
    {
        $order = Order::all();
        return view('admin.order', compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "delivered";
        $order->payment_status = "paid";

        $order->save();
        return redirect()->back();
    }

    public function searchdata(Request $request)
    {
        $searchText = $request->search;
        $order = Order::where('name', 'LIKE', "%$searchText%")->orWhere('game_name', 'LIKE', "%$searchText%")->get();

        return view('admin.order', compact('order'));
    }
}
