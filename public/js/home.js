$(document).ready(function () {
    /*
    $(document).on('click','.quick-view',function () {
        var data = $(this).data('detail')
        setBackPage();
        $("#content").html(view_detail(data));
        createBreadCrumb(data.name);
    });
    */
    function setBackPage() {
        localStorage.setItem('back_page',$("#content").html());
    }

    function breadCrumb() {
        var breads = JSON.parse(localStorage.getItem('breadcrumb'));
        var html_breads = "";
        $.each(breads, function (index,item) {
            var class_bread =index == (breads.length -1) ? 'active' : '';
            class_bread = index==0 ? 'back_breadcrumb' : class_bread;
            html_breads+="<li class='"+class_bread+"'>";
            if (!(index==(breads.length-1))){
                html_breads+="<a href='#'>"+item+"</a>";
            }else {
                html_breads+=item;
            }
            html_breads+="</li>";
        });
        $(".breadcrumb-tree").html(html_breads);
    }
    function createBreadCrumb(current){
        var breadcrumb=[];
        breadcrumb.push('<i class="fa fa-chevron-left"></i> REGRESAR');
        breadcrumb.push(current);
        localStorage.setItem('breadcrumb',JSON.stringify(breadcrumb));
        breadCrumb();
    }
    function view_detail(data){
        var html = $("#tpl-detail-product").html();
        $.each(data, function (index,value) {
            html = html.replace('[[_'+index+'_]]',value)
                        .replace('[[_'+index+'_]]',value)
        });
        return html;
    }
    /*
    $("#btn-user-account").click(function (e) {
        e.preventDefault();
        setBackPage();
        var current= $(this).text().toLocaleUpperCase();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type:'get',
            success: function (view) {
                $("#content").html(view);
                createBreadCrumb(current);

            }
        });

        return false;
    });
    */

    $(document).on('click','.back_breadcrumb',function () {
        $("#content").html(localStorage.getItem('back_page'));
    });
    /*
    $('.header-logo').click(function (e) {
        e.preventDefault();
        var btn = $(this);
        $.ajax({
            url: btn.data('url'),
            type:'get',
            success: function (view) {
                $("#content").html(view)
            }
        });
    });
    */
});
