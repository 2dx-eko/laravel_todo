<!DOCTYPE HTML>
<html>
<head>
    <title>詳細画面</title>
</head>
<body>
    <h1>詳細画面</h1>
    <table class="table">
    <thead>
    <tr>
        <td>タイトル</td>
        <td>詳細</td>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $todo['title'] }}</td>
            <td>{{ $todo['detail'] }}</td>
        </tr>
    </tbody>
    </table>
    <br>
    <div>
        <button>
          <a href="/todo/edit/{{ $id }}">編集</a>
        </button>
    </div>
</body>
</html>
