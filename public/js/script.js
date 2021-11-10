"use strict";

//Header use window.scrollY for Header
window.addEventListener('scroll', function () {
  //Here you forgot to update the value
  var scrollpos = window.scrollY;
  var header = document.getElementById("header");

  if (scrollpos > 200) {
    header.classList.add("is-active");
  } else {
    header.classList.remove("is-active");
  }

  // console.log(scrollpos);
}); //Pop-upClubs

var SwiperPop = new Swiper('.pop-upclubs_content .pop-upclubs .swiper-container', {
  slidesPerView: 3,
  spaceBetween: 30,
  slidesPerGroup: 3,
  loop: true,
  loopFillGroupWithBlank: true,
  navigation: {
    nextEl: '.swiper-button-next__pop',
    prevEl: '.swiper-button-prev__pop'
  }
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
    clickable: true
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  }
}); // slider-full-club

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
    prevEl: '.swiper-button-prev'
  },
  breakpoints: {
    992: {
      direction: 'vertical',
      spaceBetween: 31,
      slidesPerView: 3,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true
    }
  }
});
var galleryTop = new Swiper('.gallery-top', {
  spaceBetween: 10,
  slidesPerView: 1,
  thumbs: {
    swiper: galleryThumbs
  }
}); // Slider_reviews

var swiper = new Swiper('.slider_reviews .swiper-container', {
  slidesPerView: 1,
  spaceBetween: 10,
  loop: true,
  // init: false,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  },
  breakpoints: {
    1024: {
      slidesPerView: 4
    },
    768: {
      slidesPerView: 3
    },
    572: {
      slidesPerView: 2
    }
  }
}); //Аккордеон на чистом Javascript

// var panelItem = document.querySelectorAll('.support-faq__name'),
//     bodyItem = document.querySelectorAll('.support-faq__text');
// panelItem.__proto__.forEach = [].__proto__.forEach;
// var activePanel;
// panelItem.forEach(function (item, i, panelItem) {
//   console.log('до клика');
//     item.addEventListener('click', function (e) {
//     //show new thingy;
//         console.log('клик');
//     this.classList.add('panel-active');
//     this.nextElementSibling.classList.add('active'); //hide old thingy
//
//     if (activePanel) {
//         console.log('activePanel');
//       activePanel.classList.remove('panel-active');
//       activePanel.nextElementSibling.classList.remove('active');
//     } //update thingy
//
//
//     activePanel = activePanel === this ? 0 : this;
//   });
// });


var panelItem = document.querySelectorAll('.support-faq__name'),
    bodyItem = document.querySelectorAll('.support-faq__text');
panelItem.__proto__.forEach = [].__proto__.forEach;
var activePanel;
panelItem.forEach(function (item, i, panelItem) {
    item.addEventListener('click', function (e) {
        //show new thingy;
        this.classList.add('panel-active');
        console.log(this.classList);
        this.nextElementSibling.classList.add('active'); //hide old thingy

        if (activePanel) {
            activePanel.classList.remove('panel-active');
            activePanel.nextElementSibling.classList.remove('active');
        }

        activePanel = activePanel === this ? 0 : this;
    });
});

// ========================================================================================
// Scripts for Site
// ========================================================================================
