/**
 * Default project scripts go here
*/

// Sticky Header
jQuery(document).ready(function ($) {
	var d = $('.site-header');
	d.scrollToFixed({
		zIndex: 10
	});

	$(window).scroll(function () {
		scroll = $(window).scrollTop();

		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			if (scroll >= 50) d.addClass('smheader');
			else d.removeClass('smheader');
		} 
	  	else {
			if (scroll >= 80) d.addClass('smheader');
			else d.removeClass('smheader');
		}	
	});
});

jQuery(document).ready(function ($) {
  if ( $(window).width() > 990) {
    $('ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
  }
});

// Ajax posts filter
// Ajax posts custom radio button (filter-form)
jQuery(document).ready(function ($) {
	$(".filter-form .filter-radio").change(function () {
		let filter = $("#filter-2");
		let selected = filter.find(".filter-radio:checked+label");
		let initialText = filter.find(".filter-radio:checked+label").text();
		let normalCards = $(".normal-state");
		let loadingCards = $(".loading-state");
		$.ajax({
			url: filter.attr("action"),
			data: filter.serialize(), // form data
			type: filter.attr("method"), // POST
			beforeSend: function (xhr) {
				normalCards.hide();
				loadingCards.show();
				selected.text("Loading..."); // changing the radio button label
			},
			success: function (data) {
				loadingCards.hide();
				selected.text(initialText); // changing the radio button label back
				$("#response").html(data); // insert data
			},
		});
	});
});

//Mega Menu
jQuery(document).ready(function ($) {
  const icon = document.querySelector('.menu-icon');
  const btn = document.querySelector('.menu-burger');
  let menuOpen = false;
  $(".menu-icon").click(function(e) {
		e.preventDefault();
		//$(".menu").toggleClass('open');
    $(".mega-menu").slideToggle('slow');
	  ($(".menu-icon .text").text() === "CLOSE") ? $(".menu-icon .text").text("MENU") : $(".menu-icon .text").text("CLOSE");

		if(!menuOpen) {
			icon.classList.add('open');
			menuOpen = true;
		}
		else {
      icon.classList.remove('open');
      menuOpen = false;
		}
  });
});


//Slide Toggle for menu
jQuery(document).ready(function ($) {
  $(".navbar__icon").on("click", function () {
    $(".site-header .navbar__menu").slideToggle(200);
    $(".site-header .navbar__menu").toggleClass("open");
  });
});

// Scroll to top
jQuery(document).ready(function ($) {
	$("#scroll-to-top").on("click", function () {
		$("html, body").animate({ scrollTop: 0 }, "slow", function () {});
	});
});

//ANIMATION
jQuery(document).ready(function ($) {
  var $animation_elements = $('.js-anime');
	var $window = $(window);
	
	function check_if_in_view() {
		var window_height = $window.height();
		var window_top_position = $window.scrollTop();
		var window_bottom_position = (window_top_position + window_height);
		
		$.each($animation_elements, function() {
			var $element = $(this);
			var element_height = $element.outerHeight();
			var element_top_position = $element.offset().top;
			var element_bottom_position = (element_top_position + element_height);
			
			if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
				$element.addClass('in-view');
			} 
      
      // else {
			// 	$element.removeClass('in-view');
			// }
		});
	}
	
	$window.on('scroll resize', check_if_in_view);
	$window.trigger('scroll');

});

//Flexslider JS Slider
jQuery(document).ready(function ($) {
	$('.flexslider').flexslider({
		animation: "fade",
		controlNav: true,
		animationSpeed: 1500,
		directionNav: true
	});  
});

//Slick Carousel
jQuery(document).ready(function ($) {

	$('.services-carousel').slick({
		dots: true,
		loop: false,
		arrows: true,
		infinite: false,
		autoplay: true,
		autoplaySpeed: 6000,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		prevArrow: '<div class="slick-prev"><i class="fa-solid fa-arrow-left-long"></i></div>',
    nextArrow: '<div class="slick-next"><i class="fa-solid fa-arrow-right-long"></i></div>',
		responsive: [
			{
			breakpoint: 1200,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
				dots: true
			}
			},
			{
			breakpoint: 1024,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
				dots: true
			}
			},
			{
			breakpoint: 600,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
			},
			{
			breakpoint: 480,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
			}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	  ]
	});

  $('.projects-carousel').slick({
		dots: true,
		loop: false,
		arrows: true,
		infinite: false,
		autoplay: true,
		autoplaySpeed: 6000,
		speed: 300,
		slidesToShow: 2,
		slidesToScroll: 1,
		prevArrow: '<div class="slick-prev"><i class="fa-solid fa-arrow-left-long"></i></div>',
    nextArrow: '<div class="slick-next"><i class="fa-solid fa-arrow-right-long"></i></div>',
		responsive: [
			{
			breakpoint: 1200,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				infinite: true,
				dots: true
			}
			},
			{
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				infinite: true,
				dots: true
			}
			},
			{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
			},
			{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
			}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	  ]
	});

});

// Counter JS
jQuery(document).ready(function ($) {
	$('.counter').counterUp({
		delay: 10,
		time: 2000
	});
});

// // Search box
// jQuery(document).ready(function ($) {
// 	// Open search box
// 	$(".navbar-nav .menu-item:last-child").click(function () {
// 		$("#mnl-mega").width("100%");
// 	});

// 	// Close search box
// 	$("#search-close").click(function () {
// 		$("#mnl-mega").width("0%");
// 	});
// });

// Accordion JS
jQuery(document).ready(function ($) {
	$("body").delegate(".intro", "click", function (e) {
		e.stopPropagation();
		var c = $(this).parents(".accordion__hld"),
			m = c.find('.content');
		$(".accordion__hld .content").not(m).slideUp(500);
		m.slideToggle(500);
    //$(".icon").removeClass('active');
		$(this).find(".icon").toggleClass('active');
		$(this).parent().siblings().find('.intro').find('.icon').removeClass('active');
	});
});


//Service Tabs
jQuery(document).ready(function ($) {
  $(".tab-links li:first-child").addClass('active');
  $(".tab-content .sec-text:first-child").show();

  $(".tab-links li").click(function(event)  {
    var index = $(this).index();

    event.preventDefault();
    $('.tab-links li').removeClass('active');
    $(this).addClass('active');

		$(".tab-content .tab-text").hide();
    $('.tab-content .tab-text').eq(index).show();
  });

  var currLinkTab = 0;
  var totalLinkTabs = $('.tab-links li').length;
  function tabLinksCycle() {
    // simulate click on current tab
    $('.tab-links li').eq(currLinkTab).click();

    // increment counter   
    currLinkTab++;

    // reset if we're at the last one
    if (currLinkTab == totalLinkTabs) {
      currLinkTab = 0;
    }
  }
  // go!
  var i = setInterval(tabLinksCycle, 4000);

  var currContTab = 0;
  var totalContTabs = $('.tab-content .tab-text').length;
  function tabContCycle() {
    // simulate click on current tab
    $('.tab-links li').eq(currContTab).click();

    // increment counter   
    currContTab++;

    // reset if we're at the last one
    if (currContTab == totalContTabs) {
      currContTab = 0;
    }
  }
  // go!
  var j = setInterval(tabContCycle, 8000);



  var fleetIndex = 0;

  $(".fleetTab-links li:first-child").addClass('active');
  $(".fleetTab-content .sec:first-child").show();
  $(".fleetTab-links li").click(function(event)  {
    fleetIndex = $(this).index();
    event.preventDefault();
    $('.fleetTab-links li').removeClass('active');
    $(this).addClass('active');

		$(".fleetTab-content .sec").hide();
    $('.fleetTab-content .sec').eq(fleetIndex).show();
  });

  $(".nextBtn").click(function(event) {
    fleetIndex = fleetIndex + 1;
    //alert(fleetIndex);
    if(fleetIndex + 1 == 4) {
      fleetIndex = 0;
    }
    event.preventDefault();
    $('.fleetTab-links li').removeClass('active');
    $('.fleetTab-links li').eq(fleetIndex).addClass('active');

    $(".fleetTab-content .sec").hide();
    $('.fleetTab-content .sec').eq(fleetIndex).show();
  });

  

});

//Fancybox for Images
jQuery(document).ready(function ($) {
  $('[data-fancybox="gallery"]').fancybox({
    loop: true,
    buttons: [
      "zoom",
      "share",
      "slideShow",
      "fullScreen",
      //"download",
      "thumbs",
      "close"
    ]
  });
});

//Slick Carousel
jQuery(document).ready(function ($) {
  $('.logo-carousel').slick({
    dots: true,
    loop: true,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    prevArrow: '<div class="slick-prev"><i class="fa-solid fa-arrow-left-long"></i></div>',
    nextArrow: '<div class="slick-next"><i class="fa-solid fa-arrow-right-long"></i></div>',
    responsive: [
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  $('.hm-testimonial-carousel').slick({
    dots: false,
    loop: true,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<div class="slick-prev"><i class="fa-solid fa-arrow-left-long"></i></div>',
    nextArrow: '<div class="slick-next"><i class="fa-solid fa-arrow-right-long"></i></div>',
    responsive: [
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
  $('.impact-wrap').slick({
    dots: true,
    loop: true,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<div class="slick-prev"><i class="fa-solid fa-arrow-left-long"></i></div>',
    nextArrow: '<div class="slick-next"><i class="fa-solid fa-arrow-right-long"></i></div>',
    responsive: [
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});

//Partner Switch
jQuery(document).ready(function ($) {
	//let funding = false;

  const bkgSwitch = document.querySelector('.bkg-switch');

  $(".trigger.funding").click(function(e) {
		//e.preventDefault();
    $(this).addClass('active');
		$(".content.funding").addClass('active');
    $(".content.project").removeClass('active');
    $(".trigger.project").removeClass('active');
    bkgSwitch.style.left = '0.5%';
  });

  $(".trigger.project").click(function(e) {
		//e.preventDefault();
    $(this).addClass('active');
		$(".content.project").addClass('active');
    $(".content.funding").removeClass('active');
    $(".trigger.funding").removeClass('active');
    bkgSwitch.style.left = '50.5%';
  });

});

// Video Pop Up
jQuery(document).ready(function ($) {

  document.querySelectorAll(".playVid").forEach((d) => d.addEventListener("click", playVideos));

  function videoId(button) {
    var $videoUrl = button.attr("data-video");
    if ($videoUrl !== undefined) {
      var $videoUrl = $videoUrl.toString();
      var srcVideo;

      if ($videoUrl.indexOf("youtube") !== -1) {
        var et = $videoUrl.lastIndexOf("&");
        if (et !== -1) {
          $videoUrl = $videoUrl.substring(0, et);
        }
        var embed = $videoUrl.indexOf("embed");
        if (embed !== -1) {
          $videoUrl = "https://www.youtube.com/watch?v=" + $videoUrl.substring(embed + 6, embed + 17);
        }

        srcVideo =
          "https://www.youtube.com/embed/" +
          $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
          "?autoplay=1&mute=1&loop=1&playlist=" +
          $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
          "";
      } else if ($videoUrl.indexOf("youtu") !== -1) {
        var et = $videoUrl.lastIndexOf("&");
        if (et !== -1) {
          $videoUrl = $videoUrl.substring(0, et);
        }
        var embed = $videoUrl.indexOf("embed");
        if (embed !== -1) {
          $videoUrl = "https://youtu.be/" + $videoUrl.substring(embed + 6, embed + 17);
        }

        srcVideo =
          "https://www.youtube.com/embed/" +
          $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
          "?autoplay=1&mute=1&loop=1&playlist=" +
          $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
          "";
      } else if ($videoUrl.indexOf("vimeo") !== -1) {
        srcVideo =
          "https://player.vimeo.com/video/" +
          $videoUrl.substring($videoUrl.indexOf(".com") + 5, $videoUrl.length).replace("/", "") +
          "?autoplay=1";
      } else if ($videoUrl.indexOf("mp4") !== -1) {
        return '<video loop playsinline controls autoplay><source src="' + $videoUrl + '" type="video/mp4"></video>';
      } else if ($videoUrl.indexOf("m4v") !== -1) {
        return '<video loop playsinline controls autoplay><source src="' + $videoUrl + '" type="video/mp4"></video>';
      } else {
        alert(
          "The video assigned is not from Youtube, Vimeo or MP4, remember to enter the correct complete video link .\n - Youtube: https://www.youtube.com/watch?v=43ngkc2Ejgw\n - Vimeo: https://vimeo.com/111939668\n - MP4 https://server.com/file.mp4"
        );
        return false;
      }
      return (
        '<iframe src="' +
        srcVideo +
        '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
      );
    } else {
      alert("No video assigned.");
      return false;
    }
  }

  function playVideos(e) {
    e.preventDefault();
    var $theVideo = videoId($(this));

    var appendVideo = document.createElement("div");

    if ($theVideo) {
      appendVideo.innerHTML +=
        '<div class="active video-modal-wrapp" id="video-wrap"><span onclick="lvideoClose()" class="video-overlay"></span><div class="video-container">' +
        $theVideo +
        '</div><button onclick="lvideoClose()" class="close-video">&times;</button></div>';

      document.body.appendChild(appendVideo);
    }
  }

});

function lvideoClose() {
  const boxes = document.querySelectorAll(".video-modal-wrapp, .video-overlay");

  boxes.forEach((box) => {
    box.remove();
  });
};

// Site notice
(() => {
	const noticeBar = document.querySelector(".site-notice");
	const closeButton = document.querySelector(".site-notice__dismiss");

	// Check if the notice has been dismissed previously
	if (getCookie("noticeDismissed") === "true") {
		noticeBar.style.display = "none";
	}

	closeButton.addEventListener("click", function () {
		noticeBar.classList.toggle("closing");
		setCookie("noticeDismissed", "true", 30); // Dismiss the notice for 30 days
	});

	// Function to set a cookie
	function setCookie(cname, cvalue, exdays) {
		let d = new Date();
		d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
		let expires = "expires=" + d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	// Function to get a cookie
	function getCookie(cname) {
		let name = cname + "=";
		let decodedCookie = decodeURIComponent(document.cookie);
		let ca = decodedCookie.split(";");
		for (let i = 0; i < ca.length; i++) {
			let c = ca[i];
			while (c.charAt(0) === " ") {
				c = c.substring(1);
			}
			if (c.indexOf(name) === 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
})();
