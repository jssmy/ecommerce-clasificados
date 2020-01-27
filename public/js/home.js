$(document).ready(function () {
    $(".quick-view").click(function () {
        var btn=$(this);
        $.ajax({
            url: btn.data('url'),
            type:'get',
            success: function (view) {
                $("#content").html(view);
            }
        });
    });
    $("#btn-user-account").click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type:'get',
            success: function (view) {
                $("#content").html(view);
            }
        });
        return false;
    });
});
