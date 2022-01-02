<!DOCTYPE HTML>
<html>
<head>
    <title>一覧画面</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="{{asset('style.css')}}" rel="stylesheet">

</head>
<body>
    <h1>一覧画面</h1>
    <form method="GET">
    @csrf
    <input name="search_value" type="text"> 
    <input type="radio" name="status" value="1" checked>完了
    <input type="radio" name="status" value="0">未完了
    <input type="submit" name="search_button" type="button" value="検索"></input>
    <br>
    <br>
    <input type="radio" name="sort_key" value="title" checked>title順
    <input type="radio" name="sort_key" value="created_at">作成日時順
    :
    <input type="radio" name="sort" value="ascending" checked>昇順
    <input type="radio" name="sort" value="descending">降順
    <input type="submit" name="sort_button" type="button" value="ソート"></input>
    <br>
    <br>
    <button class="csv" type="button" name="csv_button" value="CSV作成">CSV作成</button>
    <button class="csv_output" type="button" name="csv_output" value="CSV出力">CSV出力</button>
    <div>
       作成日：<span class="csv_date"></span><br>
       ファイル名：<span class="csv_name"></span>
    </div>
    </form>
    <br>
    <div class="search_res">
        <p>↓↓検索結果↓↓</p>
        <div class="result">
            @if(isset( $todos ))
                @foreach ($todos as $search)
                   ・{{$search['title']}}<br>
                @endforeach
            @endif
        </div>
    </div>
    <ul>        
        <li>ログインしているユーザーID：{{ $id }}</li>
        <div>
            <a href="/todo/new">新規ページ作成画面</a>
        </div>
        <br>
        登録した詳細はこちら
        <div class="list">
            @foreach ($todos as $detail)
                <li>
                    <a class="list" href="/todo/detail/{{ $detail['id'] }}">
                    {{ $detail["title"] }}
                    </a>
                    <form method="POST">
                    @csrf
                    <input name="status" class="check" type="checkbox" data-todoid="{{ $detail['id'] }}">
                    <button name="delete" class="delete" type="button" data-todoid="{{ $detail['id'] }}">削除</button>
                    </form>
                </li>
            @endforeach
        </div>

    </ul>

      <ul class="list-group">
        @foreach ($pager as $pagers)
          <li class="list-group-item">
            {{ $pagers->title }}
          </li>
        @endforeach
      </ul>
      {{ $pager->links() }}



    <div class="show_name">
        @foreach ($user_name as $user_names)
        ログインユーザー名：{{$user_names['name']}}
        @endforeach
    </div>
</body>
</html>
<script src="{{asset('js/status.js')}}"></script>
