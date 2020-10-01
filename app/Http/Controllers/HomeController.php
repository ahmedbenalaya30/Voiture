<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Booking;
use App\Car;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars= DB::table('cars')->count();
        $bookings=DB::table('bookings')->count();
        $allclients=DB::table('users')->where('role','client')->count();
        $banned=DB::table('users')->where('role','client')->where('contentious',1)->count();
        $clients=DB::table('users')->where('role','client')->where('contentious',0)->count();
        $paid=Booking::where('is_paid',1)->count();
        if($bookings!=0)
        $paid=(number_format($paid/$bookings, 4))*100;

        $unpaid=Booking::where('is_paid',0)->count();
        $cars1= DB::table('cars')->get();
        $today = Carbon::today()->format('Y-m-d');
        $notifications=array();
        $reservations=DB::table('bookings')->where('is_paid',1)->get();
        $sommePaye=0;
        foreach($reservations as $reservation)
        {
            $car= Car::find($reservation->car_id);
            $date1=strtotime($reservation->pick_up_date);
            $date2=strtotime($reservation->drop_off_date);
            $nb=$date2-$date1;
            $nbDay=$nb/86400+1;
            $price=$nbDay* $car->pricePerDay;
            $sommePaye= $sommePaye+ $price;
        }
        $reservations=DB::table('bookings')->where('is_paid',0)->get();
        $sommeNonPaye=0;
        foreach($reservations as $reservation)
        {
            $car= Car::find($reservation->car_id);
            $date1=strtotime($reservation->pick_up_date);
            $date2=strtotime($reservation->drop_off_date);
            $nb=$date2-$date1;
            $nbDay=$nb/86400+1;
            $price=$nbDay* $car->pricePerDay;
            $sommeNonPaye= $sommeNonPaye+ $price;
        }

        foreach($cars1 as $car)
        {
            if($car->insurance>$today)
            $notifications[]="Assurance expiré".$car->insurance."pour la voiture".$car->carNumber."";

        }
            return view('home',compact('cars','bookings','allclients','clients','banned','paid','unpaid','notifications','sommePaye','sommeNonPaye'));
    }
        
}
