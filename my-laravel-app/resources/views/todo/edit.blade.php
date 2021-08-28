<!DOCTYPE HTML>
<html>
<head>
    <title>編集画面</title>
</head>
<body>
    <div>編集画面</div>
    <form method="post">
    @csrf
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div>
            <div>
                title<br>
                <input name="title" type="text" value="{{old('title')}}">
            </div>
        </div>
        <div>
            <div>詳細</div>
            <div>
                <textarea name="detail">{{old('detail')}}</textarea>
            </div>
        </div>
        <div>
            <input name="id" type="hidden" value="{{$todo['id']}}">
        </div>
        <button type="submit">登録内容を更新</button>    
    </form>

</body>
</html>
