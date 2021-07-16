<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\todo;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function index(){
        //$todos = Todo::all();
        // 現在認証されているユーザーのID取得
        $todos = Auth::id();

        return view('todo.index', ['todos' => $todos]);
      
    }

    //新規ページ作成
    /*public function new(Request $request){
        $test = "new";
        $title = $request->input("title");
        $detail = $request->input("detail");
        var_dump($title);
        return view('todo.new', ['test' => $test]);
    }*/
    //新規ページ作成
    public function new(){
        $id = Auth::id(); 
        return view('todo.new', ['id' => $id]);
    }    
    
    //DB登録
    public function store(Request $request){
        $id = Auth::id();
        $store = new Todo;
        $store->user_id = $request->user_id;
        $store->title = $request->title;
        $store->detail = $request->detail;
        $store->save();
        return redirect('/todo');
    }
    
    //詳細ページ
    public function detail(){
        $test = "detail";
        return view('todo.detail', ['test' => $test]);
    }
    
    //編集ページ
    public function edit(){
    $test = "edit";
    return view('todo.edit', ['test' => $test]);
}
}
