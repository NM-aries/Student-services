window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
  });
}, 4000);

setTimeout(function(){
  $('.loader-bg').fadeToggle();
}, 1500);

$("#toggler_close").click(function(){
  $("._mobile").addClass("intro");
});