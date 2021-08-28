<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\todo;

use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    ///一覧画面表示
    public function index(){
        $user_id = Auth::id();
        $todos = todo::where('user_id',$user_id)->get();
        return view('todo.index',compact("user_id","todos"));
    }



    //新規ページ作成
    public function new(){
        $id = Auth::id(); 
        return view('todo.new', ['id' => $id]);
    }    
    
    //DB登録
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
          ],
          [
            'title.required' => 'titleは必須項目です',
            'detail.required' => '詳細は必須項目です' 
          ]);
   
        try{
            $id = Auth::id();
            $todo = new Todo;
            $todo->user_id = $id;
            $todo->title = $request->title;
            $todo->detail = $request->detail;
            $todo->save();
            return redirect('/todo');
        }catch(Exeption $e){
            return redirect('/todo/new');
        }
    }
    
    //詳細ページ
    public function detail($id){
        $id = (int)$id;
        $todo = todo::find($id);
        return view('todo.detail',compact("id","todo"));
    }
    
    //編集ページ
    public function edit($id){
        $todo = todo::find($id);
        return view('todo.edit', ['todo' => $todo]);
    }
    
    //編集ページ送信された時実行
    public function update(Request $request){
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
          ],
          [
            'title.required' => 'titleは必須項目です',
            'detail.required' => '詳細は必須項目です' 
          ]);
   
        try{
            DB::beginTransaction();
            $post = todo::find((int)$request->id);
            $post->fill(['title' => $request->title,'detail' => $request->detail])->save();
            DB::commit();
            return redirect('/todo');
        }catch(Exeption $e){
            DB::rollBack();
            return redirect('/todo/new');
        }
    }
}
