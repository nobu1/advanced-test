<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use App\Models\Area;
use App\Models\Genre;
use App\Http\Requests\ShopRegisterRequest;
use App\Http\Requests\ReservationRegisterRequest;

class AdminController extends Controller
{
    // My page functions
    public function index()
    {
        return view('admin.index');
    }


    // Restaurant functions
    public function indexRestaurant()
    {
        $restaurants = Restaurant::all();

        return view('admin.restaurant_index', compact('restaurants'));
    }

    public function showRestaurant(Restaurant $restaurant)
    {
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
        $area = Area::create([
            'area' => $request->area  
        ]);

        $genre = Genre::create([
            'genre' => $request->genre
        ]);
        
        $restaurant = Restaurant::create([
            'shop' => $request->shop,
            'summary' => $request->summary,
            'img_url' => $request->img_url,
            'area_id' => $area->id,
            'genre_id' => $genre->id    
        ]);

        return back()->with('message', '飲食店情報を保存しました');
    }


    // Reservation functions
    public function indexReservation()
    {
        $reservations = Reservation::where('user_id', auth()->id())->
                            where('revoke_flag', '!=', 1)->get();

        return view('admin.reservation_index', compact('reservations'));
    }

    public function showReservation(Reservation $reservation)
    {
        return view('admin.reservation_edit', compact('reservation'));
    }

    public function changeReservation(ReservationRegisterRequest $request)
    {
        $reservationID = $request->input('reservationID');

        if ($request->has('reserveRevoke')) {         
            Reservation::find($reservationID)->update(['revoke_flag' => 1]);

            return redirect()->route('reservation.index')->with('message', '予約を取り消しました');
        } else {
            $reservation = $request->all();
            Reservation::find($reservationID)->update($reservation);

            return redirect()->route('reservation.index')->with('message', '予約を変更しました');
        }

    }
}
