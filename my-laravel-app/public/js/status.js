$(function(){
    let list = $(".list");
    
    $('input[name="status"]').change(function() {
        let id = $(this).data();
        let todo_id = id.todoid;
        $.ajax({
            url: "api/v1/todo/updateStatus/?todo_id=" + todo_id,
            type: 'POST',
        })
        // Ajaxリクエストが成功した場合
        .done(function(data) {
            console.log(data);
            console.log("ajax成功");
        })
        // Ajaxリクエストが失敗した場合
        .fail(function(data) {
            alert("ajax失敗・・・");
        });

    });
});