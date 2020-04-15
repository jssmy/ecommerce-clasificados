(function($) {
	"use strict"

	// Mobile Nav toggle
	$('.menu-toggle > a').on('click', function (e) {
		e.preventDefault();
		$('#responsive-nav').toggleClass('active');
	})

	// Fix cart dropdown from closing
	$('.cart-dropdown').on('click', function (e) {
		e.stopPropagation();
	});

	/////////////////////////////////////////

	// Products Slick
	$('.products-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			infinite: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
			responsive: [{
	        breakpoint: 991,
	        settings: {
	          slidesToShow: 2,
	          slidesToScroll: 1,
	        }
	      },
	      {
	        breakpoint: 480,
	        settings: {
	          slidesToShow: 1,
	          slidesToScroll: 1,
	        }
	      },
	    ]
		});
	});

	// Products Widget Slick
	$('.products-widget-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			infinite: true,
			autoplay: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
		});
	});

	/////////////////////////////////////////

	// Product Main img Slick


	// Product img zoom
	var zoomMainProduct = document.getElementById('product-main-img');
	if (zoomMainProduct) {
		$('#product-main-img .product-preview').zoom();
	}

	/////////////////////////////////////////

	// Input number
	$('.input-number').each(function() {
		var $this = $(this),
		$input = $this.find('input[type="number"]'),
		up = $this.find('.qty-up'),
		down = $this.find('.qty-down');

		down.on('click', function () {
			var value = parseInt($input.val()) - 1;
			value = value < 1 ? 1 : value;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value)
		})

		up.on('click', function () {
			var value = parseInt($input.val()) + 1;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value)
		})
	});

	//var priceInputMax = document.getElementById('price-max'),
	//		priceInputMin = document.getElementById('price-min');
	$("#price-max").change(function(){
		updatePriceSlider($(this).parent() , this.value)
	});

	$("#price-min").change(function(){
		updatePriceSlider($(this).parent() , this.value)
	});

	function updatePriceSlider(elem , value) {
		if ( elem.hasClass('price-min') ) {
			console.log('min')
			priceSlider.noUiSlider.set([value, null]);
		} else if ( elem.hasClass('price-max')) {
			console.log('max')
			priceSlider.noUiSlider.set([null, value]);
		}
	}

	// Price Slider
	var priceSlider = document.getElementById('price-slider');
	if (priceSlider) {
		noUiSlider.create(priceSlider, {
			start: [1, 999],
			connect: true,
			step: 1,
			range: {
				'min': 1,
				'max': 999
			}
		});

		priceSlider.noUiSlider.on('update', function( values, handle ) {
			var value = values[handle];
			handle ? priceInputMax.value = value : priceInputMin.value = value
		});
	}

})(jQuery);

$(document).ready(function () {
    $(".add-to-cart-btn").click(function () {
        var url = $(this).data('url');
        var btn = $(this);
        $.ajax({
            url : url,
            method: 'put',
            data: { quantity : 1 },
            success: function (view) {
                $(".cart-list-item").html(view);
            }, beforeSend: function () {
                btn.html('<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i> AGREGANDO');
            }, complete: function () {
                btn.html('<i class="fa fa-shopping-cart"></i> AGREGAR');
            }, error: function (e) {
                console.log(e);
                if(e.status == 401){
                    $("#btn-login-account").click();
                }
            }
        });
    });
    window.updateCart = function () {
        $.get(url_updat_lista_cart, function (view) {
            $(".cart-list-item").html(view);
        });
    }

    window.deleteCart=function(btn){
        var url = $(btn).data('url');
        $.ajax({
            url : url,
            method: 'put',
            success: function (view) {
                $(".cart-list-item").html(view);
            }
        });
    }
    $(document).on('click','.delete',function () {
        window.deleteCart($(this));
    });

    $('.delete').click(function () {
        window.deleteCart($(this));
    });

	$(document).on('click','.update-cart-quantity',function(){
	 var btn  = $(this);
	 var input=  null;
	 if($(this).hasClass('btn-remove-product')){
		 input = $(this).next();
	 }else{
		 input = $(this).prev();
	 }

	var quatity = parseInt(input.text());
	 var url = $(this).data('url');
	 var action = $(this).data('action');
 	$.ajax({
		url : url,
		type: 'put',
		data: {action : action},
		success: function(){
			if(action=='remove'){
				quatity--;
			}else {
				quatity++;
			}
			if(quatity<=0){
				btn.parent().html('<i class="fa fa-remove"></i>REMOVIDO');

			}
			input.text(quatity);
			window.updateCart();
		}, beforeSend: function(){
			$('.update-cart-quantity').attr('disabled',true);
		}, complete: function(){
			$('.update-cart-quantity').removeAttr('disabled');
		}
	});

 	})

	$(document).on('click','.btn-next-step',function(){

		var content = $(this).parent().prev();
		var currentSection = content.find('.active');
		var nextSection = currentSection.next();

        /* validar inputs */
		var form  = $(this).parent().prev().find('.order-form');
		if(form){
            form.validate({
                errorPlacement: function () {}
            });
            if(!form.valid()) {
                return true;
            }
        }

		/*mostrar next*/
        $('.btn-prev-step').removeClass('hide');
		if(nextSection.length){
			currentSection.removeClass('active');
			currentSection.addClass('hide');
			nextSection.removeClass('hide');
			nextSection.addClass('active');
			return true;
		}
		/* confirmar compra */

        if(form){
            $.ajax({
                url: url_generate_order,
                type: 'post',
                data: form.serializeArray(),
                beforeSend: function () {
                    $('.btn-next-step').html('<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i> Procesando...');
                    $('.btn-next-step').attr('disabled',true);
                    $('.btn-prev-step').attr('disabled',true);
                },error: function () {
                    $('.btn-next-step').html('Cotinuar compra');
                    $('.btn-next-step').removeAttr('disabled',true)
                    $('.btn-prev-step').removeAttr('disabled')
                }, success: function (order) {
                    $('.btn-next-step').remove();
                    $('.btn-prev-step').remove();
                    $('.order-code').html(order.code);
                    $('.order-code').parent().removeClass('hide');

                }
            });
        }


	});

	$(document).on('click','.btn-prev-step', function(){
		var content = $(this).parent().prev();
		var currentSection = content.find('.active');
		var prevSection = currentSection.prev();


		if(prevSection.length){
			currentSection.removeClass('active');
			currentSection.addClass('hide');
			prevSection.removeClass('hide');
			prevSection.addClass('active');

		}
	});

	 function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        }
    }

	$(document).on('click','.btn-localization', function(){
	    console.log('---- GEOLICALIZACION ----');
		getLocation();
        getCurrentLocation($(this));
	});

    function showPosition(position) {
        localStorage.setItem('geo',JSON.stringify({ latitude: position.coords.latitude, longitude:  position.coords.longitude }));
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                console.error("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                cosole.error("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                console.error("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                console.error("An unknown error occurred.");
                break;
        }
    }

    $(document).on('keyup','[name=direction]',function () {
        $('.order-address').html($(this).val());
    });

    getLocation();

});
