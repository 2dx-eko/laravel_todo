<!DOCTYPE HTML>
<html>
<head>
    <title>一覧画面</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
    <h1>一覧画面</h1>
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
<style>
    .show_name {
    position: absolute;
    top: 0;
    right: 0;
}

form {
    display: inline-block;
}
a.list {
    margin-right: 7px;
}

input[type="checkbox"] {
}
</style>