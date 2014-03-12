/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Implements the sticky layer with some action buttons.
 * Helpful in order not to scroll the whole page to hit some form button
 * 
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage ____sub_package____
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @copyright  Copyright (c) 2001-2014 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    58ab7bdc89b3d4cd894ef7d853bcc6f0c4dcca6b, v6 (xcart_4_6_2), 2014-02-03 17:25:33, sticky.js, aim
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

$(function() {

  var sContainer = $('#sticky_content');

  if (sContainer.length <= 0) {
    return;
  }

  // Create layer
  var stickyHTML    = sContainer.html();
  var sticky        = $(document.createElement('div'))
    .attr('id', 'sticky')
    .css('display', 'none')
    .addClass('sticky-inactive');
  
  var stickyForm    = sContainer.parents('form');
  
  var stickyBg      = $(document.createElement('div')).addClass('bg ui-corner-all');
  var stickyContent = $(document.createElement('div')).addClass('content');

  stickyContent.html(sContainer.html());
  sticky.append(stickyBg).append(stickyContent).insertAfter(sContainer);
  
  sticky.width(sContainer.width() + 20);

  $('input:text, input:password, textarea', stickyForm).bind('keydown', function() {
    enableSticky()
  });

  $('input:radio, input:checkbox, select', stickyForm).bind('change', function() {
    enableSticky()
  });

  function enableSticky() {

    $('#sticky').removeClass('sticky-inactive');
    if ($(window).scrollTop() < sContainer.position().top - $(window).height()) {
      $('#sticky').fadeIn('slow');
    }
  }

  $(window).scroll(function(){

    if (sticky.length <= 0 || sticky.hasClass('sticky-inactive')) {
      return false;
    }

    if (
      $(window).scrollTop() > sContainer.position().top - $(window).height()
      && sticky.not(':hidden')
    ) {
      sticky.fadeOut('slow');
    } else {
      if (sticky.is(':hidden')) {
        sticky.fadeIn('slow');
      }
      
    }
  });

});
