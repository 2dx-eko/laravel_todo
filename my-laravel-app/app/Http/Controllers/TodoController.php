<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TodoController extends Controller
{
    public function view(){
        $todos = todo::all();

        return view("view.index",$todos);
    }
}
