<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\User;
use App\Car;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


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
    public function planning()
    {
        $bookings=Booking::all();
        foreach($bookings as $booking)
        {
            $booking->drop_off_date=Carbon::parse($booking->drop_off_date)->addDays(1)->format('Y-m-d');
            //$booking->drop_off_date=$booking->drop_off_date->format('y-m-d');

        }
        return view('planning', compact('bookings'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchCar(Request $request)
    {
      if ($request->get('pick_up_date') < $request->get('drop_off_date') )
      {
    $cars = DB::table('bookings')
    ->select('cars.*')
    ->join('cars', 'cars.id', '=', 'bookings.car_id')
    ->whereBetween('bookings.pick_up_date', [$request->get('pick_up_date'),$request->get('drop_off_date')] )
    ->orwhereBetween('bookings.drop_off_date', [$request->get('pick_up_date'),$request->get('drop_off_date')] )
    ->get()->toArray();
   
    //$availables = Car::whereNotIn('carNumber', $cars)->get();
    $list=DB::table('cars')
    ->select('cars.*')->get();
    $availables=array();
    foreach($list as $car)
    {
        if (!in_array($car,$cars))
        {
            $availables[]=$car;
        }
    }
    $pick_up_date=$request->get('pick_up_date');
    $drop_off_date=$request->get('drop_off_date');

        return view('bookings.availableCars',compact('availables','pick_up_date','drop_off_date'));   }
        else  return back()->withInput();
   // ->whereNotBetween('$request->get("drop_off_date")', ['bookings.pick_up_date','bookings.drop_off_date'] )
       // $search = $request->get('search');
      // $date=strtotime("2020-09-10");
      /* $cars = DB::table('bookings')
       ->select('category','carNumber')
       ->join('cars', 'cars.id', '=', 'bookings.car_id')
       ->whereBetween('bookings.pick_up_date', [$request->get('pick_up_date'),$request->get('drop_off_date')] )
       ->orwhereBetween('bookings.drop_off_date', [$request->get('pick_up_date'),$request->get('drop_off_date')] )
       ->get();
              return view('bookings.availableCars',compact('cars'));   
    */
         
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
    //    if ($request->get('pick_up_date') < $request->get('drop_off_date'))
       // {
        $car=new Car;
        $car= Car::find($request->get('car_id'));
        $user=new User;
        $user=User::find($request->get('user_id'));

        $booking = new Booking([
            'pick_up_date' => $request->get('pick_up_date'),
            'drop_off_date' => $request->get('drop_off_date'),
            'status' => $request->get('status'),
        ]);
        // champs isPaid
        if (isset($_POST['isPaid']))
            $booking->is_paid=true;

        $booking->user()->associate($user);
        $booking->car()->associate($car);
        $booking->save();
        //the price
        $date1=strtotime($request->get('pick_up_date'));
        $date2=strtotime($request->get('drop_off_date'));
        $nb=$date2-$date1;
        $nbDay=$nb/86400+1;
        $price=$nbDay* $car->pricePerDay;
        //data for the mail
$data=array('name'=> $user->name,'pick_up_date' => $request->get('pick_up_date'),
'drop_off_date' => $request->get('drop_off_date'),'car'=>$car,'price'=>$price
        );
   
            Mail::to($user->email)->send(new SendMail(array('name'=> $user->name,'pick_up_date' => $request->get('pick_up_date'),
            'drop_off_date' => $request->get('drop_off_date'),'car'=>$car,'price'=>$price
                    )));
                   
        return redirect('/booking')->with('success', 'booking saved!');
    
        //else 
        //return back()->withErrors(['Verify the date']);


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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function facture($id)
{
    $booking = Booking::find($id);
    $idcar=$booking->car['id'];
    $iduser=$booking->user['id'];
    $user=User::find($iduser);
    $car=Car::find($idcar);
    $date1=strtotime($booking->pick_up_date);
    $date2=strtotime($booking->drop_off_date);
    $nb=$date2-$date1;
    $nbDay=$nb/86400+1;
    $price=$nbDay* $car->pricePerDay;
    return view('bookings.facture', compact('booking','car','price','user'));

}

 /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paid( $id)
    {
        $booking = Booking::find($id);
            $booking->is_paid = true;
            $booking->status="Confirmed";
            $booking->save();
            return redirect('/booking')->with('success', 'Booking saved!');
        }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paidBookings()
    {
        $bookings=Booking::where('is_paid',1)->get();
        return view('bookings.paidBooking', compact('bookings'));
    }
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpaidBookings()
    {
        $bookings=Booking::where('is_paid',0)->get();
        return view('bookings.paidBooking', compact('bookings'));
    }
     
}
