<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Todo extends Model
{   
    const PAGENATION = 5;
    public $timestamps = false;
    protected $fillable = ['user_id','title', 'detail'];

    //404用
    public static function isExistById($id){
        $check = Todo::where('id', $id)->exists();
        return $check;
    }

}
