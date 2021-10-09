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
        $id = $_GET["todo_id"];
        $item = Todo::where('id', $id)->first();
        if($item["status"] == 1){
            $item->status = 0;
        }else{
            $item->status = 1;
        }
        $item->save();
        return response()->json(['items' => $id]);
    }

}
