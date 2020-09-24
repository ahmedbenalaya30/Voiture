<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Booking;
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
        $clients=DB::table('users')->where('role','client')->count();
        $paid=Booking::where('is_paid',1)->count();
        if($bookings!=0)
        $paid=($paid/$bookings)*100;
        $cars1= DB::table('cars')->get();
        $today = Carbon::today()->format('Y-m-d');
        $notifications=array();

        foreach($cars1 as $car)
        {
            if($car->insurance>$today)
            $notifications[]="Assurance expiré".$car->insurance."pour la voiture".$car->carNumber."";

        }
            return view('home',compact('cars','bookings','clients','paid','notifications'));
    }
        
}
