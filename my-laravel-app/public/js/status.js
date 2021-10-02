$(function(){
    let list = $(".list");
    
    $('input[name="status"]').change(function() {
        let get_id = $(this).parent().prev().attr("href");//hrefを取得
        let split_id = get_id.split('/todo/detail/');//切り分ける
        let user_id = split_id[1];//IDのみを取得
        console.log(user_id);
        $.ajax({
            url: "api/v1/todo/updateStatus/?user_id=" + user_id,
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