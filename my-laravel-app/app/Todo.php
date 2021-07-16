<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Todo extends Model
{
    /*public static function where(){
        $test = "test";
        return $test;
    }*/
    protected $fillable = ['user_id','title', 'detail'];
}
