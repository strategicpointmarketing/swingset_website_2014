$(document).ready(function() {
    
    function windowScroll() {

       var itemToClick = $(".js-scroll-btn");

       if ( itemToClick.length ) {

           itemToClick.on('click', function(e) {

               var itemClickedVal = $(this).attr('data-scroll'),
                   scrollDestination = $(".js-scroll-dest[data-scroll='" + itemClickedVal + "']"),
                   itemOffset = scrollDestination.offset();

                console.log("this thing" + itemClickedVal + "was clicked");

               $('html, document').animate({
                   scrollTop: itemOffset.top - 20
               }, 350);

               e.preventDefault();

           });

       }

    }

    function simpleSlider() {
        $(window).load(function() {
          var slider = $(".flex-js");

          if ( slider.length ) {
            
            slider.flexslider();

          }
          
        });
    }

    windowScroll();
    simpleSlider();

});