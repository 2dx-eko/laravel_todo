<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\todo;


class TodoController extends Controller
{
    public function view(){
        //$todos = Todo::where()->get();
        $todos = array(
            "name" => "Tanaka",
            "age" => 30,
        );
        return view('view.index', $todos);
      
    }
}
