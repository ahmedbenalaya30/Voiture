<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Car;
use App\Category;
use DB;
use Carbon\Carbon;



class CarsController extends Controller
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
        $cars=Car::all();
        $cars1= DB::table('cars')->get();
        $today = Carbon::today()->format('Y-m-d');
        $notifications=array();

        foreach($cars1 as $car)
        {
            if($car->insurance>$today)
            $notifications[]="insurance expired".$car->insurance." for ".$car->carNumber."";

        }
        return view('cars.index', compact('cars','notifications'));
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
            'carNumber' => $request->get('carNumber'),
            'category' => $request->get('category'),
            'brand' => $request->get('brand'),
            'model' => $request->get('model'),
            'color' => $request->get('color'),
            'insurance' => $request->get('insurance'),
            'technicalVisit' => $request->get('technicalVisit'),
            'oilChange' => $request->get('oilChange'),
            'fuel' => $request->get('fuel'),
            'year' => $request->get('year'),
            'capacity' => $request->get('capacity'),
            'pricePerDay' => $request->get('pricePerDay'),
        ]);
        $img = Input::file('img');
            $fileName = Str::random(30).'.'.$img->guessClientExtension();
            $img->move(public_path('images'), $fileName);
            
        $car->img=$fileName;
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
        $categorys=Category::all();
        return view('cars.create',compact('categorys'));

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
        $fileName = $request->hidden_image;
        $img = Input::file('img');
        if ($img !='')
        {
            $fileName = Str::random(30).'.'.$img->guessClientExtension();
            $img->move(public_path('images'), $fileName);
        }
        
        $car = Car::find($id);
        $car->carNumber= $request->get('carNumber');
        $car->category= $request->get('category');
            $car->brand = $request->get('brand');
            $car->model = $request->get('model');
            $car->color = $request->get('color');
            $car->insurance = $request->get('insurance');
            $car->technicalVisit = $request->get('technicalVisit');
            $car->oilChange = $request->get('oilChange');
            $car->fuel = $request->get('fuel');
            $car->year = $request->get('year');
            $car->capacity = $request->get('capacity');
            $car->pricePerDay = $request->get('pricePerDay');
            $car->img=$fileName;
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