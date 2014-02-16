$.fn.productTabs = function() {

  return this.each(function() {
    var el = $(this),
        tabs = el.find('.tab-heading'),
        content = el.find('.tab-content'),
        container = $('<div class="tabs-container"></div>').insertAfter(el);

    tabs.on('click', function() {
      var tab = $(this);

      tabs.not(tab).removeClass('active');
      tab.addClass('active');

      container.html( tab.next().html() );
    });

    tabs.filter(':first').trigger('click');
  });

};

$('.tabs').productTabs();


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