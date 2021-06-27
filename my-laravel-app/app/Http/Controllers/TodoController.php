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

        return view('view.index', ['todos' => $todos]);
      
    }

    //新規ページ作成
    public function new(Request $request){
        $test = "new";
        $title = $request->input("title");
        $detail = $request->input("detail");
        var_dump($title);
        return view('view.new', ['test' => $test]);
    }

    //詳細ページ
    public function detail(){
        $test = "detail";
        return view('view.detail', ['test' => $test]);
    }
    
    //編集ページ
    public function edit(){
    $test = "edit";
    return view('view.edit', ['test' => $test]);
}
}
