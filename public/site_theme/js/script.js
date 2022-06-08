
$(document).ready(function() {
	 var owl = $('.owl-slider');
$('.owl-slider').owlCarousel({
    loop:true,
    margin:0,
    dots:true,
    nav:false,
    rtl:true,
    autoplay:true,

    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
  owl.on('changed.owl.carousel', function(event) {
      var item = event.item.index - 2;     // Position of the current item
       $('.main-text-slider').removeClass('animated slideInUp');
      $('.owl-item').not('.cloned').eq(item).find('.main-text-slider').addClass('animated slideInUp')
	  ;
	 
	  $('.lnk-slide2').removeClass('animated zoomIn');
      $('.owl-item').not('.cloned').eq(item).find('.lnk-slide2').addClass('animated zoomIn');
	  
	   $('.lnk-slide1').removeClass('animated slideInUp');
       $('.owl-item').not('.cloned').eq(item).find('.lnk-slide1').addClass('animated slideInUp');

  });
});


//gap
$( ".overlay" ).click(function() {
	  $(this).removeClass('is-active');

 });

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
   })


//gap
  
if (matchMedia('only screen and (min-width:768px)').matches) {

 $(document).ready(function(){
	$(".menu  .navbar-nav > li.dropdown").hover(
		function() {
			  var w= $(this).outerWidth();
		   var l= $(this).offset().left;
		   var r=$('.menu .navbar-nav').outerWidth() - (l + w)+10; 
		$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");

				 if(!$(this).hasClass('show')) {
			$(this).addClass('show');

		  } 
	},
	   function() {
			 var w= $(this).outerWidth();
		   var l= $(this).offset().left;
		   var r=$('.menu .navbar-nav').outerWidth() - (l + w)+10; 
		$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
		 if($(this).hasClass('show')) {
		  $(this).removeClass('show');

		 } 


	}
	);
});
$(".nav-item.dropdown").hover(function(){
       $('.overlay').addClass('is-active');   
});
$( ".nav-item.dropdown" ).mouseleave(function() {
	  $('.overlay').removeClass('is-active');  
 });
}	
	if (matchMedia('only screen and (min-width: 767px)').matches) {
		$("body").delegate(".link-tab","click",function () {
			if(!$(this).hasClass('wallPaperItem')) {
				var href = $(this).attr("href");
				window.location = href;
			}
		});
		}


	if (matchMedia('only screen and (max-width: 768px)').matches) {
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
$(".set > span").on("click", function(){
	if($(this).hasClass('active')){
	  $(this).removeClass("active");
	  $(this).siblings('.content').slideUp(200);
	  $(".set > span i").removeClass("fas fa-chevron-up").addClass("fas fa-chevron-down");
	}else{
	  $(".set > span i").removeClass("fas fa-chevron-up").addClass("fas fa-chevron-down");
	$(this).find("i").removeClass("fas fa-chevron-down").addClass("fas fa-chevron-up");
	$(".set > span").removeClass("active");
	$(this).addClass("active");
	$('.content').slideUp(200);
	$(this).siblings('.content').slideDown(200);
	}
                    
  });
	}

	$(function() {
  $('.scroll-down-icon a').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
  });
});

//gap
     $('.menuTrigger').click( function () {
    	  $('.panel-menu').toggleClass('isOpen');
			
		});

		$('.openSubPanel').click( function() {
    		$(this).next('.subPanel').addClass('isOpen');	
		});

		$('.closeSubPanel').click( function() {
    		$('.subPanel').removeClass('isOpen');
		});

	 $("#panel-menu").on("click",function(e) {
			var target = $(e.target);
			if(target.attr('id') == 'menu-toggle' || target.parents('#panel-menu').length > 0 || target.parents('.panel-menu').length > 0 ) {
				console.log('id: ' + target.attr('id') + 'contains: ' + $.contains(target,$('.panel-menu')));
			} else {
				if($(".panel-menu").hasClass('isOpen'))
					$(".panel-menu").removeClass("isOpen");
				$('.subPanel').removeClass('isOpen');
			}

		});

		$('.closePanel').click( function() {
   	    $('.panel-menu').removeClass('isOpen');
			$('.subPanel').removeClass('isOpen');
			 
		});
		//gap

	


//gap
$('.owl-send').owlCarousel({
	  autoplay: true,
	  loop: false,
	  rtl:true,
	  nav:false,
	  margin:10,
	  navText: ["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
	  lazyLoad: true,
	  responsive:{
			0:{
				items:2,
				dots:true
			},
			500:{
				items:2,
				dots:true
			},
			768:{
				items:3,
				dots:true
			},
			1200:{
				items:4,
				 touchDrag: false,
                 mouseDrag: false
			}
			
		}
	});


//fixed

//gap

if (matchMedia('only screen and (min-width: 768px)').matches) {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 90) {
            $(".se-categories").addClass("fixed");
        } else {
            $(".se-categories").removeClass("fixed");
        }
    });
}
//agap
 function bootstrapTabControl(){
            var i, items = $('.latest-product .nav-link'), pane = $('.latest-product .tab-pane');
            // next
            $('.nexttab').on('click', function(){
                for(i = 0; i < items.length; i++){
                    if($(items[i]).hasClass('active') == true){
                        break;
                    }
                }
                if(i < items.length - 1){
                    // for tab
                    $(items[i]).removeClass('active');
                    $(items[i+1]).addClass('active');
                    // for pane
                    $(pane[i]).removeClass('show active');
                    $(pane[i+1]).addClass('show active');
                }

            });
            // Prev
            $('.prevtab').on('click', function(){
                for(i = 0; i < items.length; i++){
                    if($(items[i]).hasClass('active') == true){
                        break;
                    }
                }
                if(i != 0){
                    // for tab
                    $(items[i]).removeClass('active');
                    $(items[i-1]).addClass('active');
                    // for pane
                    $(pane[i]).removeClass('show active');
                    $(pane[i-1]).addClass('show active');
                }
            });
        }
        bootstrapTabControl();
//gap
if (matchMedia('only screen and (max-width: 767px)').matches) {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 90) {
            $(".menu-mob").addClass("fixed");
        } else {
            $(".menu-mob").removeClass("fixed");
        }
    });
}




$(document).ready(function() {
		$("#accordian a").click(function() {
				var link = $(this);
				var closest_ul = link.closest("ul");
				var parallel_active_links = closest_ul.find(".active")
				var closest_li = link.closest("li");
				var link_status = closest_li.hasClass("active");
				var count = 0;

				closest_ul.find("ul").slideUp(function() {
						if (++count == closest_ul.find("ul").length)
								parallel_active_links.removeClass("active");
				});

				if (!link_status) {
						closest_li.children("ul").slideDown();
						closest_li.addClass("active");
				}
		})
})
//lazy
lozad('img', {
    load: function(el) {
			if(el.dataset.src != undefined && el.src != undefined){
				el.src = el.dataset.src;
        el.onload = function() {
            el.classList.add('fade')
        }
			} 
    }
}).observe()

// BS tabs hover (instead - hover write - click)
	$('.tab-menu a').hover(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})


//search-box


 $("body").on("click",function(e) {

	var target = $(e.target);

	if(target.attr('id') == 'search-ico' || target.parents('#search-ico').length > 0 || target.parents('#box-search').length > 0 ) {
		console.log('id: ' + target.attr('id') + 'contains: ' + $.contains(target,$('#search-form')));
	} else {
		if($("#box-search").hasClass('SearchOpen'))
			$("#box-search").removeClass("SearchOpen");
	}

});
  $('.search-ico').click( function () {
      $('.box-search').toggleClass('SearchOpen ');	
	});

 $('.btSearchInnerClose').click( function () {
      $('.box-search').removeClass('SearchOpen ');	
	});
//gap
var heroSlider = $('.owl-pro');
	var owlCarouselTimeout = 3500;
$('.owl-pro').owlCarousel({
	  autoplay: true,
	  loop: true,
	  rtl:true,
	   smartSpeed:1000,
	autoplayHoverPause:true,
	 
	  dots:true,
	  navText: ["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
	  lazyLoad: true,
	  responsive:{
			0:{
				items:2,
				 margin:10
			},
			500:{
				items:2,
				 margin:20
			},
			768:{
				items:3,
				 margin:60
			},
			1200:{
				items:4,
				 nav:true,
				 margin:50
			}
			
		}
	});	
heroSlider.on('mouseleave',function(){
	   heroSlider.trigger('stop.owl.autoplay');
	   heroSlider.trigger('play.owl.autoplay', [owlCarouselTimeout]);
	})
//owl-wnd
var heroSlider = $('.owl-wnd');
	var owlCarouselTimeout = 3500;
$('.owl-wnd').owlCarousel({
	  autoplay: true,
	  loop: true,
	  rtl:true,
	autoplayHoverPause:true,
	  smartSpeed:500,
	  dots:false,
	   navText: ["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
	  lazyLoad: true,
	  responsive:{
			0:{
				items:1,
				margin:10
				
			},
			500:{
				items:2
			},
			768:{
				items:2
			},
			1200:{
				items:3,
				 nav:true,
				 center: true,
				 margin:40
			}
			
		}
	});	
//fixed-menu
 if (matchMedia('only screen and (min-width: 992px)').matches) {
	 if(window.location.href === "http://bamaze.nonegar1.ir/" || window.location.href === "http://bamaze.nonegar1.ir") {
		 $(window).scroll(function() {
			 var scroll = $(window).scrollTop();

			 if (scroll >= 300) {
				 $(".header").addClass("fixed");
				 $(".logo-fixed").addClass("show-logo");
				 $("#box-search").addClass("show-top");

			 } else {
				 $(".header").removeClass("fixed");
				 $(".logo-fixed").removeClass("show-logo");
				 $("#box-search").removeClass("show-top");

			 }
		 });

	 }else{
		 $(".logo-fixed").addClass("show-logo");

		 $(window).scroll(function() {
			 var scroll = $(window).scrollTop();

			 if (scroll >= 300) {
				 $(".header").addClass("fixed");
				 $("#box-search").addClass("show-top");

			 } else {
				 $(".header").removeClass("fixed");
				 $("#box-search").removeClass("show-top");

			 }
		 });
	 }

    }

  $('#search').click( function () {
       $('.footer-bar .search').toggleClass('active ');	
	});
