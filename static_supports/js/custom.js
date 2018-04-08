jQuery(document).ready(function( $ ) {

  // Preloader
  $(window).on('load', function() {
    $('#preloader').delay(100).fadeOut('slow',function(){$(this).remove();});
  });

  // Hero rotating texts
  // $("#hero .rotating").Morphext({
  //   animation: "flipInX",
  //   separator: ",",
  //   speed: 3000
  // });
  
});