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