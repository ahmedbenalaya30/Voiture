<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = array(
        'carNumber',
        'category',
        'brand',
        'model',
        'color',
        'insurance',
        'technicalVisit',
        'oilChange',
        'fuel',
        'year',
        'capacity',
        'pricePerDay',
        'img'
    );
    public static $rules = array(
        'carNumber'=>'required|string',
		'category'=>'required|string',
        'brand'=>'required|min:2',
        'model'=>'required|min:2',
        'color'=>'required|string',
        'insurance'=>'date|date_format:"Y-m-d"',
        'technicalVisit'=>'date|date_format:"Y-m-d"',
        'oilChange'=>'date|date_format:"Y-m-d"',
        'fuel'=>'required|string',
        'year'=>'required|integer',
        'capacity'=>'required|string',
        'pricePerDay'=>'required|numeric',
		'img'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
	);
}
