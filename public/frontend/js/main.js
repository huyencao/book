$(document).ready(function(){
  $('.pagination ul li a').click(function(){
    $('.pagination ul li a').removeClass("active");
    $(this).addClass("active");
  });
});


var dropdowns = $(".dropdown");
dropdowns.find("dt").click(function(){
	dropdowns.find("dd ul").hide();
	$(this).next().children().toggle();
});
dropdowns.find("dd ul li a").click(function(){
	var leSpan = $(this).parents(".dropdown").find("dt a span");
	$(this).parents(".dropdown").find('dd a').each(function(){
    $(this).removeClass('selected');
  });
	leSpan.html($(this).html());
	if($(this).hasClass('default')){
    leSpan.removeClass('selected')
  }
	else{
		leSpan.addClass('selected');
		$(this).addClass('selected');
	}
	$(this).parents("ul").hide();
});
$(document).bind('click', function(e){
	if (! $(e.target).parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});


$(document).ready(function(){
	
	$('.list-pay .item-pay').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('.list-pay .item-pay').removeClass('active');
		$('.tab-content').removeClass('active');

		$(this).addClass('active');
		$("#"+tab_id).addClass('active');
	})

})

$(document).ready(function(){
	
	$('.list-bank ul li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('.list-bank ul li').removeClass('active');
		$('.list-bank .item').removeClass('active');

		$(this).addClass('active');
		$("#"+tab_id).addClass('active');
	})

})

var swiper = new Swiper('.swiper-container.slide-book', {
  slidesPerView: 4,
  spaceBetween: 30,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
	  1024: {
	    slidesPerView: 4,
	    spaceBetween: 30,
	  },
	  768: {
	    slidesPerView: 4,
	    spaceBetween: 10,
	  },
	  640: {
	    slidesPerView: 2,
	    spaceBetween: 10,
	  },
	  320: {
	    slidesPerView: 2,
	    spaceBetween: 10,
	  }
	}
});


jQuery(document).ready(function( $ ) {
  $("#menu").mmenu({
     "extensions": [
        "fx-menu-zoom"
     ],
     "counters": true
  });
});