<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\todo;
use App\User;
use Illuminate\Support\Facades\DB;
use Artisan;

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
            if(!DB::table('todos')->where('id', $id)->exists()){
                return "不正なパラメータを検知したため中止します";
            }
            Todo::where('id', $id)->delete();
            DB::commit();
            return response()->json(['todo_id' => $id, 'result' => 'success']);

        }catch(PDOExeption $Exeption){
            DB::rollBack();
            echo "fail";
            echo $e->getMessage();
        }
    }

    //検索
    public function searchStatus(){
        try{
            DB::beginTransaction();
            $title = $_POST['searchvalue'];
            $status = $_POST['searchstatus'];

            if(!DB::table('todos')->where('title', $title)->where('status', $status)->exists()){
                return "検索結果が見つかりませんでした";
            }

            //値とステータスの2種類で検索するように修正
            $search = Todo::where('title', $title)->where('status', $status)->first();
            DB::commit();
            return response()->json(['title' => $title, 'status' => $status]);

        }catch(PDOExeption $Exeption){
            DB::rollBack();
            echo "fail";
            echo $e->getMessage();
        }
    }

    //CSV作成
    public function export(Request $request){
        $request->validate([
            'serch_text' => 'required',
            'status' => 'required',
        ],[
            'serch_text.required' => 'テキストを入力してください',
            'status.required' => '完了か未完了を選択してください',
        ]);
        $serch_text = $_POST["serch_text"];//name search_value
        $status = $_POST["status"]; //name status
        Artisan::call('create:todocsv', ['serch_text' => $serch_text,'status' => $status,]);
        
    }
}