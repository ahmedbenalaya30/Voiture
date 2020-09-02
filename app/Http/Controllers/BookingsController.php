<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;


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
      
        $booking = new Booking([
            'user_id'=> $request->get('user_id'),
            'car_id'=> $request->get('car_id'),
            'pick_up_date' => $request->get('pick_up_date'),
            'drop_off_date' => $request->get('drop_off_date'),
            //'status' => $request->get('status'),
        ]);
        $booking->save();
        return redirect('/booking')->with('success', 'booking saved!');
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
