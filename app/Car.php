<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = array(
        'type',
        'brand',
        'model',
        'color',
        'available_at',
        'fuel',
        'year',
        'capacity',
        'pricePerDay',
        'img'
    );
    public static $rules = array(
		'type'=>'required|string',
        'brand'=>'required|min:2',
        'model'=>'required|min:2',
        'color'=>'required|string',
        'available_at'=>'date',
        'fuel'=>'required|string',
        'year'=>'required|integer',
        'capacity'=>'required|string',
        'pricePerDay'=>'required|numeric',
		'img'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
	);
}
