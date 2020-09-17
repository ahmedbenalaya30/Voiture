<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = array(
        'name',
        'description'
    );
    public static $rules = array(
        'name'=>'required|string',
        'description'=>'string'
    );
}
