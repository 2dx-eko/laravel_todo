<!DOCTYPE HTML>
<html>
<head>
    <title>一覧画面</title>
</head>
<body>
    <h1>一覧画面</h1>
    <ul>
        
        <li>ログインしているユーザーID：{{ $id }}</li>
        <div>
            <a href="/todo/new">新規ページ作成画面</a>
        </div>
        <div>
        <br><br>
        登録した詳細はこちら
        @foreach ($todo as $todos)
            <li>
                <a href="/todo/detail/{{ $todos['id'] }}">
                {{ $todos["title"] }}
                </a>
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
<style>
    .show_name {
    position: absolute;
    top: 0;
    right: 0;
}
</style>