// BY KAREN GRIGORYAN
// core version + navigation, pagination modules:
import Swiper from 'swiper/bundle';

const swiper = new Swiper('.swiper-container', {
  loop: true,
  paginationClickable: true,
  parallax: true,
  speed: 800,
  effect: "fade",
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true,
  },
  autoplay: {
    delay: 10000,
    disableOnInteraction: false,
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  pagination: {
    el: '.swiper-pagination',
  }
});


import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles
// ..
AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 400, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});


$(document).ready(function () {
  // AOS.refresh();
  /******************************
      BOTTOM SCROLL TOP BUTTON
   ******************************/

  // declare variable
  var scrollTop = $(".scrollTop");

  $(window).scroll(function () {
    // declare variable
    var topPos = $(this).scrollTop();

    // if user scrolls down - show scroll to top button
    if (topPos > 300) {
      $(scrollTop).css("opacity", "9");

    } else {
      $(scrollTop).css("opacity", "0");
    }

  }); // scroll END

  //Click event to scroll to top
  $(scrollTop).click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;

  }); // click() scroll top EMD

  $('.title-f').click(function () {
    if ($('.bar-l').hasClass('show')) {
      $('.bar-l').removeClass('show');
      $('.bar-r').removeClass('width');
    } else {
      $('.bar-l').addClass('show');
      $('.bar-r').addClass('width');
    }
  });

}); // ready() END

//button dropdown
$(document).ready(function(){
  var element = ('.button, .dropdown a.link');
  $(".button").click(function() {
    $(".dropdown a").removeClass("clicked");
    $(".dropdown a").children("span").removeClass("clicked");
    $(".arrow").toggleClass("open");
    $(".dropdown").toggleClass("open");
    event.stopPropagation();
  });
  
  $(".dropdown a").click(function() {
    $(".dropdown a").removeClass("clicked");
    $(".dropdown a").children("span").removeClass("clicked");
    $(this).toggleClass("clicked");  $(this).children("span").toggleClass("clicked");
  });
});