<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    //
    protected $fillable = array(
        'name',
        'description',
        'number'
    );
    public static $rules = array(
        'name'=>'required|string',
        'description'=>'string',
        'number'=>'required|integer',
    );
}
