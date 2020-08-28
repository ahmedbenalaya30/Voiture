<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=Car::all();
        return view('cars.index', compact('cars'));
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

        $car = new Car([
            'type' => $request->get('type'),
            'brand' => $request->get('brand'),
            'model' => $request->get('model'),
            'color' => $request->get('color'),
            'available_at' => $request->get('available_at'),
            'fuel' => $request->get('fuel'),
            'year' => $request->get('year'),
            'capacity' => $request->get('capacity'),
            'pricePerDay' => $request->get('pricePerDay'),
            'img' => $request->get('img')
        ]);
        $car->save();
        return redirect('/car')->with('success', 'Car saved!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create()
    {
        return view('cars.create');

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
        $car= Car::find($id);
        return view('cars.edit', compact('car'));
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
        $car = Car::find($id);
        $car->type= $request->get('type');
            $car->brand = $request->get('brand');
            $car->model = $request->get('model');
            $car->color = $request->get('color');
            $car->available_at = $request->get('available_at');
            $car->fuel = $request->get('fuel');
            $car->year = $request->get('year');
            $car->capacity = $request->get('capacity');
            $car->pricePerDay = $request->get('pricePerDay');
            $car->img = $request->get('img');
            $car->save();
            return redirect('/car')->with('success', 'Car updated!');
}
 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect('/car')->with('success', 'Car deleted!');
    }
}