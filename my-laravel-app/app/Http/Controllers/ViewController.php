<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function view(){
        $todos = DB::select('select * from todos');
        $data = ['id' => $todos];
        return view("view.index",$data);
    }
}
