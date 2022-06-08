
             
	$('#showmenu').click(function() {
		$('.menu-item').show();
		$('#showmenu').hide();
		$('.close-box').show();


	});
	$('.close-box').click(function() {
		$('.menu-item').hide();
		$('#showmenu').show();
		$('.close-box').hide();

	});
                    

						
 var viewportWidth = $(window).width();
if( viewportWidth > 767 ){
	$("#zoom_01").elevateZoom({
		 zoomType: "inner",
		 cursor: "crosshair"
		});
} 
 

    $(function(){
	  var owl = $('.thumb-product3');
	  owl.owlCarousel({
		  rtl:true,
		  margin:10,
		  loop:false,
		  nav:false,
		  dots:false,
		autoplay:false,
		items:4,
		touchDrag: false,
		 mouseDrag: false,
		navText:['<i class="fa fa-angle-left fa-2x fa-fw" aria-hidden="true"></i>','<i class="fa fa-angle-right fa-2x fa-fw" aria-hidden="true"></i>']
		 
	  });
	}); 
			

	                     					
	$(function() {
	  
	  var $modal = $('#myModal3');

	  var fotoramaOptions = {
		nav: 'thumbs',
		width: '100%',
		maxheight: '80%',
		//transition: 'crossfade',
		keyboard: true,
		allowfullscreen: true
	  }

	  $('[data-reveal]').on('click', revealModal)

	  $('.close-reveal-modal').on('click', function() {
		$modal.foundation('reveal', 'close');  
	  })

	  function revealModal() {
		$modal.foundation('reveal', 'open');
	  }

	  $modal.bind('opened', function() {
		$('#fotorama').fotorama(fotoramaOptions);
	  })
	});
	
				
$(document).ready(function() {
    var pw = $('.fotorama__nav--thumbs').innerWidth();
    var cw = $('.fotorama__nav__shaft').innerWidth();
    var offset = pw -cw;
    var negOffset = (-1 * offset) / 2;
    var totalOffset = negOffset + 'px';
    if (pw > cw) {
      $('.fotorama__nav__shaft').css('transform', 'translate3d(' + totalOffset + ', 0, 0)');
    }
    $('.fotorama__nav__frame--thumb, .fotorama__arr, .fotorama__stage__frame, .fotorama__img, .fotorama__stage__shaft').click(function() {
      if (pw > cw) {
        $('.fotorama__nav__shaft').css('transform', 'translate3d(' + totalOffset + ', 0, 0)');
      }
    });
  });
		  

  $("body").delegate(".thumbnails .thumbnail", "click", function (event) {
        event.preventDefault();
        var selected = $(this);

        new_html = '<a onclick="return false;" class="thumbnail first_thumbnail" href="' + selected.attr('href') + '" title="">';
        new_html += '<img id="zoom_01" src="' + selected.attr('href') + '" title=" alt="" data-zoom-image="' + selected.attr('big_image') + '"/>';
        new_html += '</a>';

        $(".first_thumbnail").parent().html(new_html);
        $(".zoomContainer").remove();



        var viewportWidth = $(window).width();
        if( viewportWidth > 767 ){
            $('#zoom_01').elevateZoom({
                scrollZoom: true,
                zoomWindowPosition: 10
            });
        } else if( viewportWidth < 768 ) {
            $('#zoom_01').elevateZoom({
                zoomType: "inner",
                cursor: "crosshair"
            });
        }


    });


	var heroSlider = $('.owl-related');
	  var owlCarouselTimeout = 1000;
	   heroSlider.on('initialize.owl.carousel initialized.owl.carousel ' +
		'initialize.owl.carousel initialize.owl.carousel ' +
		'resize.owl.carousel resized.owl.carousel ' +
		'refresh.owl.carousel refreshed.owl.carousel ' +
		'update.owl.carousel updated.owl.carousel ' +
		'drag.owl.carousel dragged.owl.carousel ' +
		'translate.owl.carousel translated.owl.carousel ' +
		'to.owl.carousel changed.owl.carousel',
		function(e) {
		  $('.' + e.type)
			.removeClass('secondary')
			.addClass('success');
		  window.setTimeout(function() {
			$('.' + e.type)
			  .removeClass('success')
			  .addClass('secondary');
		  }, 500);
		});	
	$('.owl-related').owlCarousel({
	  loop: false,
	  autoplayHoverPause: true,
	  smartSpeed:450,
	  rtl:true,
	  margin:20,
	  navText: ["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
	  lazyLoad: true,
	  responsive:{
			0:{
				items:1,
				dots:false,
				nav:true
			},
			500:{
				items:2,
				dots:true,
				nav:false
			},
			768:{
				items:3,
				dots:true,
				nav:false
			
			},
			1200:{
				items:4,
				dots:true,
				nav:false

			}
			
		}
	});
		 heroSlider.on('mouseleave',function(){
		heroSlider.trigger('stop.owl.autoplay'); 
		heroSlider.trigger('play.owl.autoplay', [owlCarouselTimeout]);
	  })



	var heroSlider = $('.owl-sugest');
	  var owlCarouselTimeout = 1000;
	   heroSlider.on('initialize.owl.carousel initialized.owl.carousel ' +
		'initialize.owl.carousel initialize.owl.carousel ' +
		'resize.owl.carousel resized.owl.carousel ' +
		'refresh.owl.carousel refreshed.owl.carousel ' +
		'update.owl.carousel updated.owl.carousel ' +
		'drag.owl.carousel dragged.owl.carousel ' +
		'translate.owl.carousel translated.owl.carousel ' +
		'to.owl.carousel changed.owl.carousel',
		function(e) {
		  $('.' + e.type)
			.removeClass('secondary')
			.addClass('success');
		  window.setTimeout(function() {
			$('.' + e.type)
			  .removeClass('success')
			  .addClass('secondary');
		  }, 500);
		});	
	$('.owl-sugest').owlCarousel({
	  loop: false,
	  autoplayHoverPause: true,
	  smartSpeed:450,
	  rtl:true,
	  margin:20,
	  navText: ["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
	  lazyLoad: true,
	  responsive:{
			0:{
				items:1,
				dots:false,
				nav:true
			},
			500:{
				items:2,
				dots:true,
				nav:false
			},
			768:{
				items:3,
				dots:true,
				nav:false
			
			},
			1200:{
				items:5,
				dots:true,
				nav:false

			}
			
		}
	});
		 heroSlider.on('mouseleave',function(){
		heroSlider.trigger('stop.owl.autoplay'); 
		heroSlider.trigger('play.owl.autoplay', [owlCarouselTimeout]);
	  })

   