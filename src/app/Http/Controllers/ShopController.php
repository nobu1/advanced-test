<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class ShopController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();

        return view('index', compact('restaurants'));
    }

    public function detail($id)
    {
        $restaurant = Restaurant::find($id);
        return view('detail', compact('restaurant'));
    }
}
