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
});
