$("#alert").fadeTo(5000, 100).fadeToggle('slow' ,function(){
    element.classList.remove('animate__animated', 'animate__bounceInRight');
    element.classList.add('animate__animated', 'animate__bounceOutLeft');
});

setTimeout(function(){
  $('.loader-bg').fadeToggle();
}, 1500);

$("#toggler_close").click(function(){
  $("._mobile").addClass("intro");
});

$('.owl-carousel').owlCarousel({
    margin:30,
    nav:true,
    navText:['<button type="button" class="btn btn-secondary slider-left-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16"><path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/></svg></button>','<button type="button" class="btn btn-secondary slider-right-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16"><path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/></svg></button>'],
    dots:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:1,
        },
        768:{
          items:3,
        },
        1000:{
            items:3,
        }
    }
})