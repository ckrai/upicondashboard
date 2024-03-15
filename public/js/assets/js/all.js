var swiper = new Swiper(".mySwiper", {
autoplay: {
delay: 5000,
},

pagination: {
el: ".swiper-pagination",
},
navigation: {
nextEl: ".swiper-button-next",
prevEl: ".swiper-button-prev",
},
autoplay: {
delay: 10000,
disableOnInteraction: false,
},

});


var swiper = new Swiper(".our-services", {
autoplay: {
delay: 5000,
},						
slidesPerView: 1,
spaceBetween: 0,
pagination: {
el: ".swiper-pagination",
clickable: true,
},
breakpoints: {
"360": {
slidesPerView: 1,
spaceBetween: 0,
},
"480": {
slidesPerView: 1,
spaceBetween: 0,
},
"991": {
slidesPerView: 2,
spaceBetween: 15,
},
"1366": {
slidesPerView: 3,
spaceBetween: 20,
},
"1600": {
slidesPerView: 3,
spaceBetween: 70,
},

},
});



var swiper = new Swiper(".our-company-news", {
autoplay: {
delay: 5000,
},						
slidesPerView: 1,
spaceBetween: 0,
pagination: {
el: ".swiper-pagination",
clickable: true,
},
breakpoints: {
"360": {
slidesPerView: 1,
spaceBetween: 0,
},
"480": {
slidesPerView: 1,
spaceBetween: 15,
},

"767": {
slidesPerView: 2,
spaceBetween: 15,
},

"1280": {
slidesPerView: 3,
spaceBetween: 30,
},
},
});





var swiper = new Swiper('.testimonial-swiper', {
autoplay: {
delay: 5000,
},						
  navigation: {
	nextEl: '.swiper-button-next',
	prevEl: '.swiper-button-prev',
  },
  
  pagination: {
el: ".swiper-pagination",
clickable: true,
},
  
});


///

const glightbox = GLightbox({
selector: '.glightbox'
});


///

$(document).ready(function () {
$("#sidebar").mCustomScrollbar({
theme: "minimal"
});

$('#dismiss, .overlay').on('click', function () {
$('#sidebar').removeClass('active');
$('.overlay').removeClass('active');
});

$('#sidebarCollapse').on('click', function () {
$('#sidebar').addClass('active');
$('.overlay').addClass('active');
$('.collapse.in').toggleClass('in');
$('a[aria-expanded=true]').attr('aria-expanded', 'false');
});
});

///

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }
  
  
  
  

var swiper = new Swiper(".mobile-sceen", {
autoplay: {
delay:3000,
},						
slidesPerView: 1,
spaceBetween: 0,
breakpoints: {
"360": {
slidesPerView: 1,
spaceBetween: 0,
},
"480": {
slidesPerView: 1,
spaceBetween: 0,
},

"767": {
slidesPerView: 1,
spaceBetween: 0,
},

"1280": {
slidesPerView: 1,
spaceBetween: 0,
},
},
});