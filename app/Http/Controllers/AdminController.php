<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Order;
use App\Models\Developers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        ], [
            'category_name.required' => 'Please input category name',
            'category_name.unique' => 'Category is already existing',
            'category_name.max' => 'Category name must be less than 255 characters'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);

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
        $validated = $request->validate([
            'name' => 'required|unique:games|max:100',
            'description' => 'required|max:300',
            'category' => 'required',
            'quantity' => 'required|numeric|gt:0',
            'price' => 'required|numeric|gt:0',
            'image' => 'required|mimes:jpeg,png,jpg'
        ], [
            'name.required' => 'Please input game name',
            'name.unique' => 'Game is already existing',
            'name.max' => 'Game name must be less than 100 characters',
            'description.required' => 'Please input game description',
            'description.max' => 'Game description must be less than 300 characters',
            'category.required' => 'Please choose category',
            'quantity.required' => 'Please input game quantity',
            'quantity.numeric' => 'Quantity invalid',
            'quantity.gt' => 'Quantity must not be 0',
            'price.required' => 'Please input game price',
            'price.numeric' => 'Price invalid',
            'price.gt' => 'Price must not be 0',
            'image.required' => 'Please input game image',
            'image.mimes' => 'File not supported'
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $originalFileName = $uploadedFile->getClientOriginalName();

            $filename = Str::uuid() . '_' . $originalFileName;

            $imagePathLocal = $uploadedFile->storeAs('game', $originalFileName, 'public');
            $image = $originalFileName;
        }

        Game::insert([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $image,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('message', 'Game Added Successfully');
    }

    public function show_game()
    {
        $games = Game::orderBy('name', 'ASC')->paginate('5');
        return view('admin.show_game', compact('games'));
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
            $validated = $request->validate([
                'name' => 'required|max:100',
                'description' => 'required|max:300',
                'category' => 'required',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric|gt:0',
                'image' => 'mimes:jpeg,png,jpg'
            ], [
                'name.required' => 'Please input game name',
                'name.unique' => 'Game is already existing',
                'name.max' => 'Game name must be less than 100 characters',
                'description.required' => 'Please input game description',
                'description.max' => 'Game description must be less than 300 characters',
                'category.required' => 'Please choose category',
                'quantity.required' => 'Please input game quantity',
                'quantity.numeric' => 'Quantity invalid',
                'quantity.gt' => 'Quantity must not be 0',
                'price.required' => 'Please input game price',
                'price.numeric' => 'Price invalid',
                'price.gt' => 'Price must not be 0',
                'image.mimes' => 'File not supported'
            ]);

            $game = Game::find($id);

            if ($request->hasFile('image')) {
                $this->deleteandUploadFile($request->file('image'), $game->image);
                $game->image = $request->file('image')->getClientOriginalName();
            }

            $game->update([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'quantity' => $request->quantity,
                'price' => $request->price
            ]);

            return redirect()->back()->with('message', 'Game Edited Successfully');
        } else {
            return redirect('login');
        }
    }

    private function deleteAndUploadFile($uploadedFile, $existingFilePath) {
        Storage::disk('public')->delete('game/' . $existingFilePath);

        $originalFileName = $uploadedFile->getClientOriginalName();
        $uploadedFile->storeAs('game', $originalFileName, 'public');
    }

    public function delete_game($id)
    {
        $data = Game::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Game Deleted Successfully');
    }

    public function order()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate('10');
        return view('admin.order', compact('orders'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "delivered";
        $order->payment_status = "paid";

        $gameID = $order->game_id;
        $orderQuantity = $order->quantity;
        Game::where('id', $gameID)->decrement('quantity', $orderQuantity);

        $order->save();
        // dd($gameID);
        return redirect()->back();
    }

    public function searchdata(Request $request)
    {
        $searchText = $request->search;
        $orders = Order::where('name', 'LIKE', "%$searchText%")->orWhere('game_name', 'LIKE', "%$searchText%")->orWhere('created_at', 'LIKE', "%$searchText%")->orderBy('created_at', 'DESC')->get();

        return view('admin.ordersearch', compact('orders'));
    }

    public function index() {
        $developers = Developers::all();

        return view('home.about_us', compact('developers'));
    }

    public function view_developer()
    {
        if (Auth::id()) {
            $data = Developers::all();
            return view('admin.developer', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function add_developer(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:games|max:100',
            'description' => 'required|max:150',
            'designation' => 'required|max:100',
            'image' => 'required|mimes:jpeg,png,jpg'
        ], [
            'name.required' => 'Please input developer name',
            'name.unique' => 'Developer is already existing',
            'name.max' => 'Developer name must be less than 100 characters',
            'description.required' => 'Please input developer description',
            'description.max' => 'Developer description must be less than 150 characters',
            'image.required' => 'Please input developer image',
            'image.mimes' => 'File not supported'
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $originalFileName = $uploadedFile->getClientOriginalName();

            $filename = Str::uuid() . '_' . $originalFileName;

            $imagePathLocal = $uploadedFile->storeAs('developer', $originalFileName, 'public');
            $image = $originalFileName;
        }

        Developers::insert([
            'name' => $request->name,
            'description' => $request->description,
            'designation' => $request->designation,
            'image' => $image,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('message', 'Developer Added Successfully');
    }

    public function delete_developer($id)
    {
        $data = Developers::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Developer Deleted Successfully');
    }
}
