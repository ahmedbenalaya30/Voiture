<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\User;
use App\Car;


class BookingsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings=Booking::all();
        return view('bookings.index', compact('bookings'));
    }

  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $request->validate([
            'type'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'color'=>'required',
            'available_at'=>'required',
            'fuel'=>'required',
            'year'=>'required',
            'capacity'=>'required',
            'pricePerDay'=>'required',
            'img'=>'required',

        ]);*/
        if ($request->get('pick_up_date') < $request->get('drop_off_date'))
        {
        $car=new Car;
        $car= Car::find($request->get('car_id'));
        $user=new User;
        $user=User::find($request->get('user_id'));

        $booking = new Booking([
            'pick_up_date' => $request->get('pick_up_date'),
            'drop_off_date' => $request->get('drop_off_date'),
            'status' => $request->get('status'),
        ]);
        if (isset($_POST['isPaid']))
            $booking->is_paid=true;

        $booking->user()->associate($user);
        $booking->car()->associate($car);
        $booking->save();
        return redirect('/booking')->with('success', 'booking saved!');}
        else 
        return back()->withErrors(['Verify the date']);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create()
    {
        return view('bookings.create');

    }
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking= Booking::find($id);
        return view('bookings.edit', compact('booking'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $booking = Booking::find($id);
            $booking->pick_up_date = $request->get('pick_up_date');
            $booking->drop_off_date = $request->get('drop_off_date');
            $booking->status= $request->get('status');
            $booking->isPaid= $request->get('isPaid');
            $booking->save();
            return redirect('/booking')->with('success', 'booking updated!');
}
 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect('/booking')->with('success', 'booking deleted!');
    }
}
