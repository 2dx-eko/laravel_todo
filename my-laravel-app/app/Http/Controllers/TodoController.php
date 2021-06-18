<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\todo;


class TodoController extends Controller
{
    public function view(){
        $todos = Todo::all();
        return view('view.index', ['todos' => $todos]);
      
    }
}
