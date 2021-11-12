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
    <input name="search_value" class="search_value" type="text">  
    <input class="status" type="radio" name="status" value="1" checked>完了
    <input class="status" type="radio" name="status" value="0">未完了

    <input type="submit" name="search_button" class="search_button" type="button"></input>
    <div class="search_res">
        <p>↓↓検索結果↓↓</p>
        <div class="result">
            @if(isset( $search ))
                {{$search[0]['title']}}
            @endif
        </div>
    </div>
    </form>
    <ul>
        
        <li>ログインしているユーザーID：{{ $id }}</li>
        <div>
            <a href="/todo/new">新規ページ作成画面</a>
        </div>
        <br>
        登録した詳細はこちら
        <div class="list">
            @foreach ($todo as $todos)
                <li>
                    <a class="list" href="/todo/detail/{{ $todos['id'] }}">
                    {{ $todos["title"] }}
                    </a>
                    <form method="POST">
                    @csrf
                    <input name="status" class="check" type="checkbox" data-todoid="{{ $todos['id'] }}">
                    <button name="delete" class="delete" type="button" data-todoid="{{ $todos['id'] }}">削除</button>
                    </form>
                </li>
            @endforeach
        </div>

    </ul>
    <div class="show_name">
        @foreach ($user_name as $user_names)
        ログインユーザー名：{{$user_names['name']}}
        @endforeach
    </div>
</body>
</html>
<script src="{{asset('js/status.js')}}"></script>
