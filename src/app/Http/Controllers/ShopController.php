<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Http\Requests\ReservationRegisterRequest;
use Carbon\Carbon;

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
        $currentTime = Carbon::now();
        $reservationTime = Carbon::parse($request->date.' '.$request->time);
        
        if ($reservationTime->lt($currentTime)) {
            return back()->with('message', '現在よりも前の日時では予約できません');
        }

        $reservation = Reservation::create([
            'restaurant_id' => $request->restaurant_id,
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
            'user_id' => $request->user_id,
            'revoke_flag' => '1',
        ]);
        return back()->with('message', '予約しました');
    }

    public function addFavorite(Request $request, $restaurant_id)
    {
        $query = Favorite::query();
        $query->where('restaurant_id', "{$restaurant_id}")->where('user_id', auth()->id());
        $favorites = $query->first();
        
        if (is_null($favorites)) {
            $favorite = Favorite::create([
                'user_id' => auth()->id(),
                'restaurant_id' => $restaurant_id,
                'revoke_flag' => '1',
            ]);
        } else {
            if ($favorites->revoke_flag == 0) {
                Favorite::find($favorites->id)->update(['revoke_flag' => 1]);
            }
            return back(); 
        }
        return back();
    }

    public function deleteFavorite(Request $request, $restaurant_id)
    {
        $query = Favorite::query();
        $query->where('restaurant_id', "{$restaurant_id}")->where('user_id', auth()->id());
        $favorites = $query->first();
        
        if (is_null($favorites)) {
            return back();
        } else {
            Favorite::find($favorites->id)->update(['revoke_flag' => 0]);
        }

        return back();
    }
}
