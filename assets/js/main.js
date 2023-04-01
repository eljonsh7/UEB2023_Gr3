function verifyPassword() {
  const password1 = document.getElementById("password-field").value;
  const password2 = document.getElementById("password-field2").value;
  const signUpButton = document.getElementById("sign-up");
  const errorMessage = document.getElementById("isItSame");
  const allMessage = document.getElementById("all");

  const passwordRegex = /^(?=.*\d)(?=.*[A-Z]).{8,}$/;
  const isPasswordValid =
    password1 === password2 && passwordRegex.test(password1);

  if (!passwordRegex.test(password1)) {
    allMessage.style.display = "flex";
    allMessage.style.color = "red";
  } else {
    allMessage.style.display = "none";
  }

  if (password2.length != 0) {
    if (password1 !== password2) {
      errorMessage.style.display = "flex";
      errorMessage.style.color = "red";
    } else {
      errorMessage.style.display = "none";
    }
  }

  signUpButton.disabled = !isPasswordValid;
}

(function ($) {
  "use strict";

  /*----------------------------
    Responsive menu Active
    ------------------------------ */
  $(".mainmenu ul#primary-menu").slicknav({
    allowParentLinks: true,
    prependTo: ".responsive-menu",
  });

  /*----------------------------
    START - Scroll to Top
    ------------------------------ */
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 600) {
      $(".scrollToTop").fadeIn();
    } else {
      $(".scrollToTop").fadeOut();
    }
  });
  $(".scrollToTop").on("click", function () {
    $("html, body").animate({ scrollTop: 0 }, 2000);
    return false;
  });
  $(".menu-area ul > li > .theme-btn").on("click", function () {
    $(".buy-ticket").show();
    return false;
  });
  $(".buy-ticket .buy-ticket-area > a").on("click", function () {
    $(".buy-ticket").hide();
    return false;
  });
  $(".login-popup").on("click", function () {
    $(".login-area").show();
    return false;
  });
  $(".login-box > a").on("click", function () {
    $(".login-area").hide();
    return false;
  });
  $(".signup-popup").on("click", function () {
    $(".signup-area").show();
    return false;
  });
  $(".login-box > a").on("click", function () {
    $(".login-area").hide();
    return false;
  });

  /*----------------------------
    START - Slider activation
    ------------------------------ */
  var heroSlider = $(".hero-area-slider");
  heroSlider.owlCarousel({
    loop: true,
    dots: true,
    autoplay: false,
    autoplayTimeout: 4000,
    nav: false,
    items: 1,
    responsive: {
      992: {
        dots: false,
      },
    },
  });
  heroSlider.on("changed.owl.carousel", function (property) {
    var current = property.item.index;
    var prevRating = $(property.target)
      .find(".owl-item")
      .eq(current)
      .prev()
      .find(".hero-area-slide")
      .html();
    var nextRating = $(property.target)
      .find(".owl-item")
      .eq(current)
      .next()
      .find(".hero-area-slide")
      .html();
    $(".thumb-prev .hero-area-slide").html(prevRating);
    $(".thumb-next .hero-area-slide").html(nextRating);
  });
  $(".thumb-next").on("click", function () {
    heroSlider.trigger("next.owl.carousel", [300]);
    return false;
  });
  $(".thumb-prev").on("click", function () {
    heroSlider.trigger("prev.owl.carousel", [300]);
    return false;
  });
  var newsSlider = $(".news-slider");
  newsSlider.owlCarousel({
    loop: true,
    dots: true,
    autoplay: false,
    autoplayTimeout: 4000,
    nav: false,
    items: 1,
    responsive: {
      992: {
        dots: false,
      },
    },
  });
  newsSlider.on("changed.owl.carousel", function (property) {
    var current = property.item.index;
    var prevRating = $(property.target)
      .find(".owl-item")
      .eq(current)
      .prev()
      .find(".single-news")
      .html();
    var nextRating = $(property.target)
      .find(".owl-item")
      .eq(current)
      .next()
      .find(".single-news")
      .html();
    $(".news-prev .single-news").html(prevRating);
    $(".news-next .single-news").html(nextRating);
  });
  $(".news-next").on("click", function () {
    newsSlider.trigger("next.owl.carousel", [300]);
    return false;
  });
  $(".news-prev").on("click", function () {
    newsSlider.trigger("prev.owl.carousel", [300]);
    return false;
  });
  var videoSlider = $(".video-slider");
  videoSlider.owlCarousel({
    loop: true,
    dots: true,
    autoplay: false,
    autoplayTimeout: 4000,
    nav: false,
    responsive: {
      0: {
        items: 1,
        margin: 0,
      },
      576: {
        items: 2,
        margin: 30,
      },
      768: {
        items: 3,
        margin: 30,
      },
      992: {
        items: 4,
        margin: 30,
      },
    },
  });

  /*----------------------------
	START - videos popup
	------------------------------ */
  $(".popup-youtube").magnificPopup({ type: "iframe" });
  //iframe scripts
  $.extend(true, $.magnificPopup.defaults, {
    iframe: {
      patterns: {
        //youtube videos
        youtube: {
          index: "youtube.com/",
          id: "v=",
          src: "https://www.youtube.com/embed/%id%?autoplay=1",
        },
      },
    },
  });

  /*----------------------------
    START - Isotope
    ------------------------------ */
  jQuery(".portfolio-item").isotope();
  $(".portfolio-menu li").on("click", function () {
    $(".portfolio-menu li").removeClass("active");
    $(this).addClass("active");
    var selector = $(this).attr("data-filter");
    $(".portfolio-item").isotope({
      filter: selector,
    });
  });

  /*----------------------------
    START - Preloader
    ------------------------------ */
  jQuery(window).load(function () {
    jQuery("#preloader").fadeOut(500);
  });
})(jQuery);
