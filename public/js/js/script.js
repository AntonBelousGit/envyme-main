// ========================================================================================
// Preloader
// ========================================================================================
// $(window).on('load', function () {
//     var $preloader = $('.preloader-pages'),
//         $spinner = $preloader.find('.preloader-pages__dynamic-element');
//     $spinner.fadeOut();
//     $preloader.delay(350).fadeOut('slow');
// });


    //Header use window.scrollY for Header
    window.addEventListener('scroll', function(){
    //Here you forgot to update the value
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");

        if(scrollpos > 200){
           header.classList.add("is-active");
        }
        else {
           header.classList.remove("is-active");
        }
        // console.log(scrollpos);
    });

//  main-slider
    var swiper = new Swiper('.slider .swiper-container', {
      spaceBetween: 0,
      centeredSlides: true,
      // autoplay: {
      //   delay: 4000,
      //   disableOnInteraction: false,
      // },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

// slider-full-club
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      direction: 'horizontal',
      spaceBetween: 20,
      slidesPerView: 3,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      centerSlidesBounds: true,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        992: {
          direction: 'vertical',
          spaceBetween: 31,
          slidesPerView: 3,
          freeMode: true,
          watchSlidesVisibility: true,
          watchSlidesProgress: true,
        },
      }
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      slidesPerView: 1,
      thumbs: {
        swiper: galleryThumbs,
      },
    });


// Slider_reviews
    var swiper = new Swiper('.slider_reviews .swiper-container', {
      slidesPerView: 1,
      spaceBetween: 10,
      loop: true,
      // init: false,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        1024: {
          slidesPerView: 4,
        },
        768: {
          slidesPerView: 3,
        },
        572: {
          slidesPerView: 2,
        },
      }
    });

  //Pop-upClubs
    var popSwiper = new Swiper('.pop-upclubs .swiper-container', {
      slidesPerView: 1,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next__pop',
        prevEl: '.swiper-button-prev__pop',
      },
      breakpoints: {
        1024: {
          slidesPerView: 4,
          spaceBetween: 0,
        },
        768: {
          slidesPerView: 3,
        },
        572: {
          slidesPerView: 2,
        },
      }
    });




// ========================================================================================
// Scripts for Site
// ========================================================================================
$( document ).ready(function(){



});
