$(function(){
    let list = $(".list");
    
    $('.check').change(function() {
        let id = $(this).data();
        let todo_id = id.todoid;
        /*$.ajax({
            url: "api/v1/todo/updateStatus/?todo_id=" + todo_id,
            type: 'POST',
        })*/
        $.ajax({
            type: 'POST',
            url: "/api/v1/todo/updateStatus/",
            data: {"todo_id" : todo_id},
            datatype: "json",
            
        })
        // Ajaxリクエストが成功した場合
        .done(function(data) {
            console.log(data);
            console.log("ajax成功");
        })
        // Ajaxリクエストが失敗した場合
        .fail(function(data) {
            alert(data);
        });

    });

    $('button.delete').click(function() {
        let id = $(this).data();
        let todo_id = id.todoid;
        $.ajax({
            type: 'POST',
            url: "/api/v1/todo/deleteStatus/",
            data: {"todo_id" : todo_id},
            datatype: "json",            
        })
        // Ajaxリクエストが成功した場合
        .done(function(data) {
            if(data.todo_id){
                alert("削除しました");
            }else{
                alert(data);
            }
            
        })
        // Ajaxリクエストが失敗した場合
        .fail(function(data) {
            alert(data);
        });

    });

    //csv作成
    $('.csv').click(function() {
        let serch_text = $('input[name="search_value"]').val();
        let status = $('input:radio[name="status"]:checked').val();
        var now = new Date();
        var y = now.getFullYear();
        var m = now.getMonth() + 1;
        var d = now.getDate();
        var w = now.getDay();
        var wd = ['日', '月', '火', '水', '木', '金', '土'];
        var h = now.getHours();
        var mi = now.getMinutes();
        var s = now.getSeconds();
        $(".csv_date").text(y + '年' + m + '月' + d + '日' + h + '時' + mi + '分' + s + '秒' + '(' + wd[w] + ')');
        $(".csv_name").text("demo.csv");

        $.ajax({
            type: 'POST',
            url: "/api/v1/todo/export/",
            data: {
                "serch_text" : serch_text,
                "status" : status,
            },
            datatype: "json",            
        })
        // Ajaxリクエストが成功した場合
        .done(function(data) {
          console.log(data);
            
        })
        // Ajaxリクエストが失敗した場合
        .fail(function(data) {
            console.log(data);
        });

    });


});