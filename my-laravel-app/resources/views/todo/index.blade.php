<!DOCTYPE HTML>
<html>
<head>
    <title>一覧画面</title>
</head>
<body>
    <h1>一覧画面</h1>
    <ul>
        
        <li>ログインしているユーザーID：{{ $user_id }}</li>
        <div>
            <a href="/todo/new">新規ページ作成画面</a>
        </div>
        <div>
        <br><br>
        登録した詳細はこちら
        @foreach ($todos as $todo)
            <li>
                <a href="/todo/detail/{{ $todo['id'] }}">
                {{ $todo["title"] }}
                </a>
            </li>
        @endforeach
        </div>

    </ul>
</body>
</html>
