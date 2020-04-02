@php
$url_img = 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTPGUQ8T9FBmGrMxWa3WbFx5a7JWezwtoSP7LpKI9p8zG30Kb4r';
@endphp
<style>
    .float{
        position:fixed;
        width:70px;
        height:70px;
        bottom:40px;
        right:40px;

        background-color:transparent;
        color: transparent;
        /*color:#FFF;*/
        border-radius:50px;
        text-align:center;
        font-size:30px;
        box-shadow: 2px 2px 3px #999;
        z-index:100;
        cursor: pointer;
        background-image: url("{{$url_img}}");
        background-size: 70px;"
    }
    .card {
        position:fixed;
        width:400px;
        height:500px;
        background-color: white;
        bottom:30px;
        right: 20px;
        box-shadow: 0px 0px 12px 0px #999;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        /*color:#FFF;*/
        text-align:center;
        font-size:30px;
        z-index:100;
        display: flex;
        flex-direction: column;
    }
    .chat-list {
        padding: 0;
        font-size: 13px;
        height: 20px;
        margin-top: 10px;
    }

    .chat-list li {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .chat-list .chat-img {
        float: left;
        width: 48px;
    }

    .chat-list .chat-img img {
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        width: 100%;
    }

    .chat-list .chat-message {
        width: 100%;
        overflow-wrap: break-word;
        background: #f1f0f0;
        display: inline-block;
        padding: 10px 20px 0px 20px;
        position: relative;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
    }
    .chat-list .chat-message h5 {
        margin: 0 0 5px 0;
        font-weight: 600;
        line-height: 100%;

    }
    .chat-list .chat-message p {
        line-height: 18px;
        margin: 0;
        padding: 0;
        text-align: justify;
    }

    .chat-list .chat-body {
        margin-left: 20px;
        float: left;
        width: 70%;
        display: flex;
        flex-direction: column;
    }

    .chat-list .out .chat-img {
        float: right;
    }

    .chat-list .out .chat-body {
        float: right;
        margin-right: 20px;
        display: flex;
    }
    .in , out{
        justify-content: center;
    }
    .chat-list .in .chat-message {
        border-radius: 10px;
        border-bottom-left-radius: 0px;
    }
    .chat-list .out .chat-message {
        background: #ebf4d9;
        border-radius: 10px;
        border-bottom-right-radius: 0px;
    }

    .card .card-header:first-child {
        -webkit-border-radius: 0.3rem 0.3rem 0 0;
        -moz-border-radius: 0.3rem 0.3rem 0 0;
        border-radius: 0.3rem 0.3rem 0 0;
    }
    .card, .card-header{
        border-top-right-radius: 10px !important;
        border-top-left-radius: 10px !important;
    }
    .card .card-header {
        background: #17202b;
        font-size: 2rem;
        padding-left: 20px;
        padding-right: 20px;
        position: relative;
        font-weight: bold;
        color: #ffffff;
        display: flex;
        align-items: center;
        align-content: space-between;
        justify-content: space-between;
        height: 15%;
    }
    .card-tools{
        cursor: pointer;
    }
    .card-body{
        padding-left: 20px;
        padding-right: 20px;
        height: 70%;
        display: flex;
        flex-direction: column;
        overflow-y: auto;
    }

    .card-footer{
        display: flex;
        height: 15%;
        padding-top: 10px;
        padding-right: 20px;
        padding-left: 20px;
    }
    .card-footer input{
        border-radius: 15px;
        border-width: 2px;
        font-size: 13px;
    }
    .card-expanded{
            display: none !important;
    }
    .content{
        margin-top:40px;
    }

    .card-header .chat-img img{
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
    .card-header .chat-img{
        display: flex;

    }
    .card-header .chat-img h3{
        color: white;
    }
    .chat-user-info{
        text-align: left;
        display: flex;
        flex-direction: column;
        margin-left: 10px;
        font-size: 13px;
    }
    .card-option{
        height: 160px;
        width: 100%;
        display: flex;
        padding: 0px;
    }
    .card-option button{
        border-radius: 50%;
        width: 20px;
        height: 20px;

    }
    .card-option-item{
        width: 100%;
        height: 100%;
        display: flex;
        margin-right: 10px;
        margin-left: 10px;
        flex-direction: column;
        /*box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);*/
        box-shadow: 0 2px 2px 1px rgba(0, 0, 0, 0.21);
        border: 1px solid #f2f2f2;
        border-radius: 10px;
    }
    .card-option-item-header{
        height: 50%;
        width: 100%;
        background-color: #bcc69e;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        font-weight: bold;
    }
    .card-option-item-header i{
        font-size: 43px;
    }
    .card-option-item-content{
        display: flex;
        height: 30%;
        width: 100%;
        padding: 10px;
        font-weight: bold;
        justify-content: space-around;
    }
    .card-option-item-footer {
        height: 20%;
        width: 100%;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        display: flex;
    }
    .card-option-item-footer button{
        width: 100%;
        border-radius: 0px;
        height: 100%;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        color: #aeae37;
        font-weight: bold;
    }
    .card-option-conent{
        display: flex;
        overflow: auto;
        overflow-x: hidden;
        padding-bottom: 8px;
    }
    .card-option-move-left,
    .card-option-move-right,
    .card-option-move-right:hover,
    .card-option-move-left:hover{
        background-color: white;
        border-style: solid;
        border-color: #aeae37;
        border-width: 1px;
        color: #aeae37;
        height: 20px;
        height: 35px;
        border-radius: 50px;
    }
    .card-body .out{
        display: flex;
        justify-content: flex-end;
    }
    .chat-message-info{
        font-size: 10px;
        display: flex;
        text-align: right;
        justify-content: flex-end;
        color: rgba(0, 0, 0, .45);;
    }


</style>
<!---
https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTPGUQ8T9FBmGrMxWa3WbFx5a7JWezwtoSP7LpKI9p8zG30Kb4r
https://images-na.ssl-images-amazon.com/images/I/41BKzQf2GmL.png'
--->
<script id="template-out" type="text/template">
    <li class="out">
        <div class="chat-body">
            <div class="chat-message">
                <p>_content_</p>
                <div class="chat-message-info">
                    @include('layouts.messenger.check',['time'=>'_time_'])
                </div>
            </div>
        </div>
    </li>
</script>
<script id="template-in" type="text/template">
    <li class="in">
        <div class="chat-img">
            <img alt="Avtar" src="{{$url_img}}">
        </div>
        <div class="chat-body">
            <div class="chat-message">
                <p>_content_</p>
                <div class="chat-message-info">
                    _time_
                </div>
            </div>
        </div>
    </li>
</script>
<div>
    <div class="float btn-expand"></div>
    <div class="card card-expanded">
        <div class="card-header">
            <div class="chat-img">
                <img alt="Avtar" src="{{$url_img}}">
                <div class="chat-user-info">
                    <h3>{{config('app.bot')}}</h3>
                    <div style="padding: 0px"><i class="fa fa-circle" aria-hidden="true"></i> en línea</div>
                </div>
            </div>
            <div class="card-tools">
                <i class="btn-expand fa fa-chevron-down" aria-hidden="true"></i>
            </div>
        </div>
        <div class="card-body">
            <ul class="chat-list">
                <li class="in">
                    <div class="chat-img">
                        <img alt="Avtar" src="{{$url_img}}">
                    </div>
                    <div class="chat-body">
                        <div class="chat-message">
                            <p>!Hola! Soy {{config('app.bot')}}, estoy para ayudarte 😊</p>
                            <div class="chat-message-info">{{now()->format('h:m a')}}</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <input placeholder="Escribe un mensaje..." class="input input-send">
        </div>
    </div>

</div>

<script>

    $(document).ready(function () {
        var valMessage = 'hola';
        var sendMessage = new Audio("{{URL::asset('/public/notification/button-confirmation.wav')}}");
        var newMessage = new Audio("{{URL::asset('/public/notification/button-notification.wav')}}");
        var defaultCardOption = "{{route('bot.default-card')}}";
        function scrollTop(){
            $('.card-body').animate({scrollTop : ($('.in').length*$('.in').height())+ ($('.out').length*$('.out').height())+($('.in').height()+$('.out').height())*10});
        }
        function loadDefaultCard(card){
            if($('.card-option-conent').length && !card) return;
            $.get(defaultCardOption+'?card='+card,function (view) {
                $('.chat-list').append(view);
                scrollTop();
            });
        }
        var writing = function (){
            $('.chat-user-info').find('div').html('<i class="fa fa-circle" aria-hidden="true"></i> escribiendo...');
            $.ajax({
                type: 'post',
                url : "{{route('bot.request')}}",
                data: {requestText : valMessage},
                success: function (response) {
                    console.log('evalundo: ', response.loadSuggest,response.loadSuggest!=false,response.loadSuggest ? true : false);
                    if(response.loadSuggest!=false){
                        console.log('adentro');
                        loadDefaultCard(response.loadSuggest);
                    }
                    var recivedMessage = $("#template-in")
                                            .html()
                                            .replace('_content_',response.responseText)
                                            .replace('_time_',formatedTime);
                    $('.chat-list').append(recivedMessage);
                    newMessage.play();

                }, complete(){
                    stopWriting();
                    scrollTop();
                }
            });
        }
        var formatedTime= function () {
            return (new Date()).toLocaleString('en-US',{hour: 'numeric',minute:'numeric',hour12: true});
        }
        function stopWriting(){
            $('.chat-user-info').find('div').html('<i class="fa fa-circle" aria-hidden="true"></i> en línea');

        }
        $('.input-send').keyup(function (e) {
            if(e.keyCode === 13 && $(this).val()){
                if(sendMessage.duration > 0 && !sendMessage.paused){
                    sendMessage.pause();
                }
                sendMessage.play();
                valMessage =$(this).val();
                var message = $("#template-out")
                                .html()
                                .replace('_content_',valMessage).replace('_time_',formatedTime);
                $('.chat-list').append(message);
                $(this).val('');
                scrollTop();
                setTimeout(writing,1000);
            }
        });


        $('.btn-expand').click(function () {

            if($('.card').hasClass('card-expanded')){
                $(".card").removeClass('card-expanded');
                scrollTop();
                loadDefaultCard(false);
                return true;
            }
            $('.card').addClass('card-expanded');
        });
        $(document).on('click',".card-option-move-left",function (e) {
            e.preventDefault();
            if($(this).next().scrollLeft()<=0){
                return true
            }
            $(this).next().animate({scrollLeft: '-=220px'});
        });
        $(document).on('click',".card-option-move-right",function (e) {
            e.preventDefault();
            if($(this).prev().scrollLeft()+220 >= $(this).prev().children().children().length * $(this).prev().children().width()){
                return true;
            }
            $(this).prev().animate({scrollLeft: '+=220px'});
        });
    });

</script>
