<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\todo;
use App\User;

class TodoController extends Controller
{
    //チェックボックスクリックでステータス更新用メソッド
    public function updateStatus(){
        $id = 0;
        $item = Todo::where('id', 1)->first();
        $item->status = 0;

        $item->save();
    }

}
