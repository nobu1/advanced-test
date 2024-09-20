<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Requests\ShopRegisterRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function indexRestaurant()
    {
        $restaurants = Restaurant::all();

        return view('admin.restaurant_index', compact('restaurants'));
    }

    public function showRestaurant(Restaurant $restaurant)
    {
        // $restaurant = Restaurant::find($id);
        return view('admin.restaurant_show', compact('restaurant'));
    }

    public function editRestaurant(Restaurant $restaurant)
    {
        return view('admin.restaurant_edit', compact('restaurant'));
    }

    public function updateRestaurant(ShopRegisterRequest $request)
    {
        $restaurant = $request->all();
        Restaurant::find($request->id)->update($restaurant);

        return back()->with('message', '更新しました');
    }

    public function destroyRestaurant(Request $request, Restaurant $restaurant)
    {
        $restaurant->delete();
        $request->session()->flash('message', '削除しました');
        return redirect()->route('restaurant.index');
    }

    public function createRestaurant()
    {
        return view('admin.restaurant_create');
    }

    public function storeRestaurant(ShopRegisterRequest $request)
    {
        $restaurant = Restaurant::create([
            'shop' => $request->shop,
            'area' => $request->area,
            'genre' => $request->genre,
            'summary' => $request->summary,
            'img_url' => $request->img_url
        ]);

        return back()->with('message', '飲食店情報を保存しました');
    }
}
