<!DOCTYPE HTML>
<html>
<head>
    <title>新規ページ作成画面</title>
</head>
<body>
    <h1>新規ページ作成画面</h1>
    <form action="/todo/new" method="post">
    @csrf
        <div>
            <!--バリデーション呼び出し-->
                        <!--バリデーション呼び出し-->
            
            <div>タイトル</div>
            <div>
                <input type="hidden" name="user_id" value="{{$id}}">
                <input name="title" type="text" value="">
            </div>
        </div>
        <div>
            <div>詳細</div>
        <div>
            <textarea name="detail"></textarea>
        </div>
        </div>
        <button name="new_button" type="submit">登録</button>
    </form>
</body>
</html>
