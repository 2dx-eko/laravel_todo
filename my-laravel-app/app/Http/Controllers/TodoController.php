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
        $this->validate($request, [
            'title' => ['required'],
            'detail' => ['required']
        ],[
            'title.required' => ':attributeは必須です。',
            'detail.required' => ':attributeは必須です。',
        ],[
            'title' => 'タイトル',
            'detail' => '詳細',
        ]);
        $this->validate($request, $rules);
        try{
            $id = Auth::id();
            $todo = new Todo;
            $todo->user_id = $request->user_id;
            $todo->title = $request->title;
            $todo->detail = $request->detail;
            $todo->save();
            return redirect('/todo');
        }catch(Exeption $e){
            return redirect('/todo/new');
        }
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
