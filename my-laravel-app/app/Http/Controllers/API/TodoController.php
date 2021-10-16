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
        $id = $_POST["todo_id"];
        $error = "不正なため更新できませんでした";
        if(empty($id)){
            return $error;
        }
        $todo = Todo::where('id', $id)->first();
        if($todo["status"] == 1){
            $todo->status = 0;
        }else{
            $todo->status = 1;
        }
        $todo->save();
        return response()->json(['items' => $id]);
    }

}
