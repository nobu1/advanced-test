<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use App\Http\Requests\ReservationRegisterRequest;

class ShopController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();

        return view('index', compact('restaurants'));
    }

    public function search(Request $request)
    {
        // Get inputs data in the index page
        $area = $request->input('area');
        $genre = $request->input('genre');
        $keyword = $request->input('keyword');
        
        // Make query
        $query = Restaurant::query();
        if (!empty($area)) {
            $query->where('area', "{$area}");
        }

        if (!empty($genre)) {
            $query->where('genre', "{$genre}");
        }      

        if (!empty($keyword)) {
            $query->where('shop', 'LIKE', "%{$keyword}%")->
                    orwhere('summary', 'LIKE', "%{$keyword}%");
        }
        
        $restaurants = $query->get();
        return view('index', compact('restaurants'));   
    }

    public function detail($id)
    {
        $restaurant = Restaurant::find($id);
        return view('detail', compact('restaurant'));
    }

    public function reserve(ReservationRegisterRequest $request)
    {
        $reservation = Reservation::create([
            'restaurant_id' => $request->restaurant_id,
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
            'user_id' => $request->user_id,
        ]);
        return back()->with('message', '予約しました');
    }
}
