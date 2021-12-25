<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\todo;
use App\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TodoController extends Controller
{

    ///一覧画面表示
    public function index(Request $request){
        //検索取得用
        $search_value = "";
        $search_status = "";
        if (isset($_GET["search_value"])) {
            $search_value = $_GET['search_value'];
        }   
        if(isset($_GET["status"])){
            $search_status = $_GET['status'];
        }
            
        $query = Todo::query();
        
        if($search_value) {//タイトルパラメータがあれば
            $query->where('title', 'like', '%'.$search_value.'%');
        }
        if($search_status){//ステータスパラメータがあれば
            $query->where('status',$search_status);
        }

        //sortボタンが押されたら作動
        if($request->has('sort_button')){
            
            $sortkey = $_GET['sort_key']; //title順、作成日順
            $sort = $_GET['sort'];//昇順降順
            
            if($sortkey == 'title' && $sort == 'ascending'){
                $query->orderBy($sortkey,'asc');
            }else if($sortkey == 'title' && $sort == 'descending'){
                $query->orderBy($sortkey,'desc');
            }else if($sortkey == 'created_at' && $sort == 'ascending'){
                $query->orderBy($sortkey,'asc');
            }else if($sortkey == 'created_at' && $sort == 'descending'){
                $query->orderBy($sortkey,'desc');
            }
        }

        
        $todos = $query->get();

        //ページャー用
        $pager = $query->paginate(TODO::PAGENATION);

        //ログイン名取得、登録したリスト取得
        $id = Auth::id();
        
        $user_name = $this->getUserName($id);
        return view('todo.index',compact("id","user_name","todos","pager","users"));
    }

    public function getUserName($user_id){
        $user = User::where('id',$user_id)->get();
        return $user;
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
        $todo = Todo::find($id);
        $check = Todo::isExistById($id); //IDがDBに存在するかチェック(boolean)
        $user_id = $todo["user_id"];
        $user_name = $this->getUserName($user_id);
        if(!$check) abort(404);
        return view('todo.detail',compact("id","todo","user_name"));
    }
    
    //編集ページ
    public function edit($id){
        $todo = Todo::find($id);
        $check = Todo::isExistById($id); //IDがDBに存在するかチェック(boolean)
        $user_id = $todo["user_id"];
        $user_name = $this->getUserName($user_id);
        if(!$check){abort(404);}        
        return view('todo.edit', compact("todo","user_name"));
    }
    
    //編集ページ送信された時実行
    public function update(Request $request){
        $id = $request->id;
        $check = Todo::isExistById($id); //IDがDBに存在するかチェック(boolean)
        if(!$check){abort(404);}
        $get_id = Todo::find($id);
        if(!$get_id['user_id']){ //$idを元に紐づいていないidだったら404
            abort(404);
        }
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
            $post = Todo::find((int)$request->id);
            $post->fill(['title' => $request->title,'detail' => $request->detail])->save();
            DB::commit();
            return redirect('/todo');
        }catch(Exeption $e){
            DB::rollBack();
            return redirect('/todo/new');
        }
    }

    

}
