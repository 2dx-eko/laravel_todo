<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\todo;
use App\User;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    //チェックボックスクリックでステータス更新用メソッド
    public function updateStatus(){
        
        try{
            DB::beginTransaction();
            $id = $_POST["todo_id"];
            $error = "不正なため更新できませんでした";
            if(empty($id)){
                return $error;
            }
            $todo = Todo::where('id', $id)->first();
            if($todo === null){
                return false;
            }else if($todo->status == 1){
                $todo->status = 0;
            }else{
                $todo->status = 1;
            }
            $todo->save();
            DB::commit();
            $result = response()->json(['todo_id' => $id]);
            if($result){
                return [$result,"success"];
            }else{
                return "fail";
            }
            return response()->json(['todo_id' => $id]);
        }catch(PDOExeption $Exeption){
            DB::rollBack();
            echo $e->getMessage();
        }
    }

    //一覧削除ボタン
    public function deleteStatus(){
        try{
            DB::beginTransaction();
            $id = $_POST["todo_id"];

            Todo::where('id', $id)->delete();
            DB::commit();
            $result = response()->json(['todo_id' => $id]);
            if($result){
                return [$result,"success"];
            }else{
                return "fail";
            }

        }catch(PDOExeption $Exeption){
            DB::rollBack();
            echo $e->getMessage();
        }
    }


}
