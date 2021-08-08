<!DOCTYPE HTML>
<html>
<head>
    <title>一覧画面</title>
</head>
<body>
    <h1>一覧画面</h1>
    <ul>
        
        <li>ログインしているユーザーID：{{ $todos }}</li>
        <div>
            <a href="/todo/new">新規ページ作成画面</a>
        </div>
        <div>
        <br><br>
        登録した詳細はこちら
        @foreach ($title_list as $title_lists)
            <li>
                <a href="/todo/detail/?id={{ $title_lists['id'] }}">
                {{ $title_lists["title"] }}
                </a>
            </li>
        @endforeach
        </div>

    </ul>
</body>
</html>
