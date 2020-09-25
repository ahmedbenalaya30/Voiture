<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Part;

class PartsController extends Controller
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
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $parts=Part::all();
        return view('parts.index', compact('parts'));
}
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $part = new Part([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'number' => $request->get('number'),
        ]);
        $part->save();
        return redirect('/part')->with('success', 'Part saved!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create()
    {
        return view('parts.create');

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function plus( $id)
    {
        $part = Part::find($id);
            $part->number = $part->number + 1;
            $part->save();
            return redirect('/part')->with('success', 'Part saved!');
        }
        /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moins( $id)
    {
        $part = Part::find($id);
        if ( $part->number >0)
        {
            $part->number = $part->number - 1;
            $part->save();
        }
        return redirect('/part')->with('success', 'Part saved!');
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $part= Part::find($id);
        
        return view('parts.edit', compact('part'));
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
        
        $part = Part::find($id);

        $part->name= $request->get('name');
        $part->description= $request->get('description');
        $part->number = $request->get('number');
        $part->save();
          return redirect('/part')->with('success', 'Part updated!');
}
/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = Part::find($id);
        $part->delete();
        return redirect('/part')->with('success', 'Part deleted!');
    }
}
