<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Booking;

class UsersController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('notConnected');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users=User::where('contentious',0)->where('role','client')->get();
        return view('users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
       // $search = $request->get('search');
        $bookings = Booking::where('user_id', $request->id)->get();
        return view('userBookings', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('addUser');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'cin' => $request->get('cin'),
        'password' => "Client",
        'adress' => $request->get('adress'),
          'city' => $request->get('city'),
          'phone' => $request->get('phone'),
            ]);
            $user->save();
            return redirect('/user')->with('success', 'user updated!');
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
        $user= User::find($id);
        return view('editUsers', compact('user'));
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
        $user = User::find($id);
        $user->name= $request->get('name');
            $user->email = $request->get('email');
            $user->cin = $request->get('cin');
            $user->adress = $request->get('adress');
            $user->city = $request->get('city');
            $user->phone = $request->get('phone');
            $user->save();
            if($user->role=="employee")
            return redirect('/employee')->with('success', 'user updated!');
          else {
           if($user->contentious==false)
            return redirect('/user')->with('success', 'user updated!');
            else 
            return redirect('/userBanned')->with('success', 'user updated!');}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'user deleted!');
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block( $id)
    {
        $user = User::find($id);
            $user->contentious = true;
            $user->save();
            return redirect('/user')->with('success', 'User saved!');
        }
        /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disblock( $id)
    {
        $user = User::find($id);
            $user->contentious = false;
            $user->save();
            return redirect('/userBanned')->with('success', 'User saved!');
        }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBanned()
    {
         $users=User::where('contentious',1)->get();
        return view('userBanned', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Employee()
    {
         $users=User::where('role','employee')->get();
        return view('employee', compact('users'));
    }
}
