<!DOCTYPE HTML>
<html>
<head>
    <title>一覧画面</title>
</head>
<body>
    <h1>一覧画面</h1>
    <ul>
        @foreach ($todos as $todo)
        <li>{{ $todo->id }}</li>
        @endforeach
    </ul>
</body>
</html>
