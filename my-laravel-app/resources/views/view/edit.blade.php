<!DOCTYPE HTML>
<html>
<head>
    <title>編集画面</title>
</head>
<body>
    <div>編集画面</div>
    <form action="/todo/edit" method="post">
        <div>
            <div>
                <input name="title" type="text" value="firsttitle">
            </div>
            <div>
                <input name="id" type="hidden" value="41">
            </div>
        </div>
        <div>
            <div>詳細</div>
            <div>
                <textarea name="detail">                                                                        </textarea>
            </div>
        </div>
        <button type="submit" name="register">登録</button>    
    </form>

</body>
</html>
