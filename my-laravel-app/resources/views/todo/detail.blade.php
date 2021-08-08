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
            @foreach ($detail_list as $detail_lists)
                <td>{{ $detail_lists['title'] }}</td>
                <td>{{ $detail_lists['detail'] }}</td>
            @endforeach
        </tr>
    </tbody>
    </table>
    <br>
    <div>
        <button>
          <a href="/todo/edit/?id={{ $id }}">編集</a>
        </button>
    </div>
</body>
</html>
