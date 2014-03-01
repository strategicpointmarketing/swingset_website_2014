 var lbl_added = 'Added'; var lbl_error = 'Error'; var redirect_to_cart = false; 
 var lbl_rated = 'Rated!'; var lbl_error = 'Error'; var lbl_cancel_vote = 'Already rated'; 
 var lbl_error = 'Error'; var txt_minicart_total_note = 'Order subtotal does not cover discounts and extra costs like shipping charges, etc. The final cost of the order will be calculated at the checkout page.'; 
/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Next-Previous products
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @version    a8caf1146a82c7e25bc23adbf5c4c2eea754bed1, v1 (xcart_4_6_0), 2013-05-24 14:56:30, np_products.js, random
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */
$('.np-products ul li a').hover(
  function() {
    what = $(this).attr('class');
    if (!npProducts[what]['loaded']) {
      npProducts[what]['loaded'] = true;
      ajax.core.loadBlock(
        $('#np-popup-'+what),
        'np_product',
        {productid: npProducts[what]['id']}
      );
    }
    $('#np-popup-'+what).stop(true, true).fadeIn(100);
  },
  function() {
    $('#np-popup-'+$(this).attr('class')).delay(100).fadeOut(100);
  }
);
$('.np-products .popup').hover(
  function() {
    $(this).stop(true, true).show();
  },
  function() {
    $(this).delay(100).fadeOut(100);
  }
);

/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Ajax add to cart widget
 * 
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @version    ec2ca39cb71eff2cf859558b4f67f561a1b9efe4, v2 (xcart_4_4_0_beta_2), 2010-05-27 13:43:06, ajax.add2cart.js, igoryan
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

// Action
ajax.actions.add2cart = function(productid, quantity, options, callback) {
  if (!productid)
    return false;

  var data = {
    mode: 'add',
    productid: productid,
    amount: quantity
  };

  if (options) {
    for (var i in options) {
      if (hasOwnProperty(options, i)) {
        data['product_options[' + i + ']'] = options[i];
      }
    }
  }

  var request = {
    type: 'POST',
    url: xcart_web_dir + '/cart.php',
    data: data
  };

  if (callback) {
    request.success = function(html, i, r) {
      return callback(true, html, i, r);
    };
    request.error = function(obj, txt, err, i) {
      return callback(false, obj, txt, err, i);
    }
  }

  return ajax.query.add(request);
}

// Widget
ajax.widgets.add2cart = function(form) {
  if (!form || typeof(form.tagName) == 'undefined' || !form.tagName || form.tagName.toUpperCase() != 'FORM')
    return false;

  if (!form.add2cartWidget) {
    new ajax.widgets.add2cart.obj(form);
  }

  return form.add2cartWidget.add2cart();
}

ajax.widgets.add2cart.obj = function(form) {

  this.savedData = {};

  this.form = $(form);

  form.add2cartWidget = this;

  this._prepareWidget();

  var s = this;
  $(ajax.messages).bind(
    'updateBuyNowBlock',
    function(e, data) {
      return s._callbackUpdateBuyNowBlock(data);
    }
  );

  $(ajax.messages).bind(
    'updateProductDetailsBlock',
    function(e, data) {
      return s._callbackUpdateBuyNowBlock(data);
    }
  );

  return true;
}

// Options
ajax.widgets.add2cart.obj.prototype.ttl = 3000;

// Property
ajax.widgets.add2cart.obj.prototype.button = false;
ajax.widgets.add2cart.obj.prototype.form = false;

ajax.widgets.add2cart.obj.prototype.state = 1;
ajax.widgets.add2cart.obj.prototype.productid = false;

ajax.widgets.add2cart.obj.prototype.savedData = {};
ajax.widgets.add2cart.obj.prototype.isClicked = false;

// Widget :: check - ready widget or not
ajax.widgets.add2cart.obj.prototype.isReady = function() {
  return this.form.length > 0 && this.productid > 0 && this.box.length > 0;
}

// Widget :: add to cart
ajax.widgets.add2cart.obj.prototype.add2cart = function() {
  if (!this.isReady())
    return false;

  if (this.isClicked || this.state == 2 || this.state == 3 || this.state == 4)
    return true;

  this.isClicked = true;

  this.changeState(2);

  var s = this;

  setTimeout(
    function() {
      s.isClicked = false;
    },
    100
  );

  return ajax.query.add(
    {
      type: 'POST',
      url: xcart_web_dir + '/cart.php',
      data: this.form.serialize(),
      success: function(a, b, c, d) {
        return s.callback(true, a, b, c, d);
      },
      error: function(a, b, c, d) {
        return s.callback(false, a, b, c, d);
      }
    }
  ) !== false;
}

// Widget :: ajax callback
ajax.widgets.add2cart.obj.prototype.callback = function(state, a, b, c, d) {
  if (!this.isReady())
    return false;

  var s = false;
  if (state && c.messages) {
    for (var i = 0; i < c.messages.length; i++) {
      if (c.messages[i].name == 'cartChanged' && c.messages[i].params.status == 1 && c.messages[i].params.changes) {
        for (var p in c.messages[i].params.changes) {
          if (hasOwnProperty(c.messages[i].params.changes, p) && c.messages[i].params.changes[p].productid == this.productid && c.messages[i].params.changes[p].changed != 0)
            s = true;
        }
      }
    }
  }

  this.changeState(s ? 3 : 4);

  return true; 
}

// Widget :: check button element
ajax.widgets.add2cart.obj.prototype.checkButton = function(button) {
  if (!button)
    button = this.button;

  if (!button || typeof(button.tagName) == 'undefined')
    return false;

  var tn = button.tagName.toUpperCase();

  if (tn == 'BUTTON' && $(button).children('span.button-right').children('span.button-left').length == 1) {
    return true;

  } else if (tn == 'DIV' && $(button).children('div').length == 1) {
    return true;
  }

  return false;
}

// Widget :: changes widget status
//  1 - idle
//  2 - background request
//  3 - success message
//  4 - error message
//  5 - submit form without background request
ajax.widgets.add2cart.obj.prototype.changeState = function(s) {
  if (this.state == s)
    return true;

  var res = false;

  if (this.button.length > 0) {

    switch (this.state) {
      case 2:
        res = this.cleanWaitState(s);
        break;

      case 3:
        res = this.cleanAddedState(s);
        break;

      case 4:
        res = this.cleanErrorState(s);
        break;

      default:
        res = this.cleanIdleState(s);
    }

    if (!res)
      return false;

  } else {
    res = true;
  }

  this.state = s;
  var o = this;

  if (this.button.length > 0) {
    switch (s) {
      case 2:
        res = this.doWaitState();
        break;

      case 3:
        res = this.doAddedState();
        setTimeout(
          function() {
            return o.changeState(1);
          },
          this.ttl
        );
        break;

      case 4:
        res = this.doErrorState();
        setTimeout(
          function() {
            o.changeState(5);
            o.submitForm(true);
          },
          this.ttl
        );
        break;

      default:
        res = this.doIdleState();
    }

  }

  return res;
}

// Widget :: change state to Idle
ajax.widgets.add2cart.obj.prototype.doIdleState = function() {
  if (this.savedData) {
    switch (this.savedData.type) {
      case 'b':
        $('.button-left', this.button).html(this.savedData.html);
        break;

      case 'd':
        $('div', this.button).html(this.savedData.html);
        break;

      default:
        return false;
    }
  }

  return true;
}

// Widget :: remove Idle state
ajax.widgets.add2cart.obj.prototype.cleanIdleState = function() {
  this.savedData = {
    type: false,
    box: false,
    html: false,
    width: false,
    height: false
  };

  switch (this.button.get(0).tagName.toUpperCase()) {
    case 'BUTTON':
      this.savedData.type = 'b';
      this.savedData.box = $('.button-left', this.button);
      break;

    case 'DIV':
      this.savedData.type = 'b';
      this.savedData.box = $('div', this.button);
      break;

    default:
      return false;
  }

  this.savedData.html = this.savedData.box.html();
  this.savedData.width = this.savedData.box.width();
  this.savedData.height = this.savedData.box.height();

  return true;
}

// Widget :: change state to Wait
ajax.widgets.add2cart.obj.prototype.doWaitState = function() {
  this.button.addClass('do-add2cart-wait');

  var span = document.createElement('SPAN');
  span.className = 'progress';
  span.style.width = this.savedData.width + 'px';
  span.style.height = this.savedData.height + 'px';

  this._freezeBox();

  this.savedData.box.empty().append(span);

  return true;
}

// Widget :: remove Wait state
ajax.widgets.add2cart.obj.prototype.cleanWaitState = function() {
  this.button.removeClass('do-add2cart-wait').remove('.progress');

  this._unFreezeBox();

  return true;
}

// Widget :: change state to Added
ajax.widgets.add2cart.obj.prototype.doAddedState = function() {
  this.button.addClass('do-add2cart-success');

  this._freezeBox();

  if (this.savedData.box)
    this.savedData.box.html(lbl_added);

  return true;
}

// Widget :: remove Added state
ajax.widgets.add2cart.obj.prototype.cleanAddedState = function() {
  this.button.removeClass('do-add2cart-success');

  this._unFreezeBox();

  return true;
}

// Widget :: change state to Error
ajax.widgets.add2cart.obj.prototype.doErrorState = function() {
  this.button.addClass('do-add2cart-error');

  this._freezeBox();

  if (this.savedData.box)
    this.savedData.box.html(lbl_error);

  return true;
}

// Widget :: remove Error state
ajax.widgets.add2cart.obj.prototype.cleanErrorState = function() {
  this.button.removeClass('do-add2cart-error');

  this._unFreezeBox();

  return true;
}

// Widget :: submit form withour background request
ajax.widgets.add2cart.obj.prototype.submitForm = function(isError) {
  if (!this.isReady())
    return false;

  if (isError && !this.form.get(0).elements.namedItem('ajax_error')) {
    var inp = document.createElement('INPUT');
    inp.type = 'hidden';
    inp.name = 'ajax_error';
    inp.value = 'Y';

    this.form.append(inp);
  }

  this.form.get(0).submit();

  return true;
}

/* Private methods */

// Widget :: prepare widget
ajax.widgets.add2cart.obj.prototype._prepareWidget = function() {

  if (this.form.length == 0)
    return false;

  // Get mode: do add to cart if mode == 'add', else cancel
  var m = this.form.get(0).elements.namedItem('mode');
  if (m && m.value != 'add') {
    return false;
  }

  // Get box
  this.box = this.form.parents().filter('.details,.product-cell');

  // Get button
  this.button = $('.add-to-cart-button', this.form).eq(0);

  // Get productid
  var p = this.form.get(0).elements.namedItem('productid');
  if (p) {
    this.productid = parseInt(p.value);
    if (isNaN(this.productid) || this.productid < 1)
      this.productid = false;
  }

  return true;
}

// Widget :: updateBuyNowBlock event listener
ajax.widgets.add2cart.obj.prototype._callbackUpdateBuyNowBlock = function(data) {
  this.savedData = {};

  return true;
}

// Widget :: freeze button width
ajax.widgets.add2cart.obj.prototype._freezeBox = function() {
  if (this.savedData.box)
    this.savedData.box.width(this.savedData.width);

  return true;
}

// Widget :: unfreeze button width
ajax.widgets.add2cart.obj.prototype._unFreezeBox = function() {
  if (this.savedData.box)
    this.savedData.box.width('auto');

  return true;
}

/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Ajax product widget
 * 
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @version    ec2ca39cb71eff2cf859558b4f67f561a1b9efe4, v2 (xcart_4_4_0_beta_2), 2010-05-27 13:43:06, ajax.product.js, igoryan
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

// Widget :: factory
ajax.widgets.product = function(elm) {
  if (!elm)
    return false;

  if (elm.constructor == Array) {
    if (!elm[0].productWidget)
      new ajax.widgets.product.obj(elm);

  } else if (elm.tagName) {
    if (!elm.productWidget)
      new ajax.widgets.product.obj(elm);

  } else {
    return false;
  }
    
  return true;
}

// Widget :: object
ajax.widgets.product.obj = function(elm) {
  this.elm = $(elm);

  var s = this;

  this.elm.each(
    function() {
      this.productWidget = s;
    }
  );

  this._prepareElement();

  if (isNaN(this.productid) || this.productid < 1)
    this.productid = false;

  $(ajax.messages).bind(
    'cartChanged',
    function(e, data) {
      return s._add2cartListener(data);
    }
  );

  this._callbackGPI = function(state, a, b, c) {
    return s.callbackGPI(state, a, b, c);
  }
  this._callbackBNB = function(responseText, textStatus, XMLHttpRequest) {
    return s.callbackBNB(responseText, textStatus, XMLHttpRequest);
  }
  this._callbackPDB = function(responseText, textStatus, XMLHttpRequest) {
    return s.callbackPDB(responseText, textStatus, XMLHttpRequest);
  }

}

ajax.widgets.product.obj.prototype.elm = false;

ajax.widgets.product.obj.prototype.type = false;
ajax.widgets.product.obj.prototype.productid = false;

// Widget :: check object status
ajax.widgets.product.obj.prototype.isReady = function() {
  return this.type && this.productid;
}

// Widget :: update product info
ajax.widgets.product.obj.prototype.updateBuyNowBlock = function() {
  if (!this.isReady())
    return false;

  var o = this;
  var f = function() {
    return ajax.core.loadBlock(
      $('.buy-now', o.elm),
      'buy_now',
      {
        productid: o.productid,
        is_featured_product: o.is_featured_product,
        type: o.type
      },
      o._callbackBNB
    );
  }

  return this._checkBlockButton(f);
}

// Widget :: update product details block
ajax.widgets.product.obj.prototype.updateProductDetailsBlock = function() {
  if (!this.isReady())
    return false;

  data = {
    productid: this.productid
  };
  var form = $('form', this.elm).get(0);
  if (form) {
    for (var i = 0; i < form.elements.length; i++) {
      if (form.elements[i].name) {
        var m = form.elements[i].name.match(/^product_options\[(\d+)\]$/);
        if (m) {
          data['options[' + m[1] + ']'] = form.elements[i].value;
        }
      }
    }
  }

  var m = (self.location + '').match(/&wishlistid=(\d+)/);
  if (m)
    data['wishlistid'] = m[1];

  var m = (self.location + '').match(/&pconf=(\d+)/);
  if (m)
    data['pconf'] = m[1];

  var m = (self.location + '').match(/&slot=(\d+)/);
  if (m)
    data['slot'] = m[1];

  var o = this;
  var f = function() {
    ajax.core.loadBlock(
      $('.details', o.elm).eq(0),
      'product_details',
      data,
      o._callbackPDB
    );
  }

  return this._checkBlockButton(f);
}

// Widget :: ajax callback (buy now block update)
ajax.widgets.product.obj.prototype.callbackBNB = function(responseText, textStatus, XMLHttpRequest) {
  if (XMLHttpRequest.status == 200) {
    ajax.core.trigger(
      'updateBuyNowBlock',
      {
        productid: this.productid,
        element: this.elm
      }
    );

    $('div.dropout-container div.drop-out-button').not('.activated-widget').each(initDropOutButton);
  }

  return true;
}

// Widget :: ajax callback (product details block update)
ajax.widgets.product.obj.prototype.callbackPDB = function(responseText, textStatus, XMLHttpRequest) {
  if (XMLHttpRequest.status == 200) {
    ajax.core.trigger(
      'updateProductDetailsBlock',
      {
        productid: this.productid,
        element: this.elm
      }
    );

    $('div.dropout-container div.drop-out-button').not('.activated-widget').each(initDropOutButton);
  }

  return true;
}

// Widget :: prepare element
ajax.widgets.product.obj.prototype._prepareElement = function() {
  this.productid = false;
  this.type = false;
  this.is_free_product = false;
  this.is_featured_product = false;

  var form_elements = $('form', this.elm);
  if (form_elements.length > 0) {
    tmp = form_elements.get(0).elements.namedItem('productid');
    if (tmp)
      this.productid = parseInt(tmp.value);

    if (isNaN(this.productid) || this.productid < 1)
      this.productid = false;

    tmp = form_elements.get(0).elements.namedItem('is_free_product');
    if (tmp)
      this.is_free_product = parseInt(tmp.value);

    if (isNaN(this.is_free_product))
      this.is_free_product = false;

    tmp = form_elements.get(0).elements.namedItem('is_featured_product');
    if (tmp)
      this.is_featured_product = tmp.value;
  }

  if (this.elm.is('div.item')) {
    this.type = 'list';

  } else if (this.elm.filter('td').length == this.elm.length) {
    this.type = 'matrix';

  } else if (this.elm.is('.product-details')) {
    this.type = 'details';
  }

  return true;
}

/* Private */

// Widget :: add2cart message listener
ajax.widgets.product.obj.prototype._add2cartListener = function(data) {
  if (data.status == 1 && data.changes) {
    for (var i in data.changes) {
      if (hasOwnProperty(data.changes, i) && data.changes[i].productid == this.productid && data.changes[i].changed != 0) {

        switch (this.type) {
          case 'list':
          case 'matrix':
            this.updateBuyNowBlock();
            break;

          case 'details':
            this.updateProductDetailsBlock();
            break;
        }
        break;
      }
    }
  }

  return true;
}

ajax.widgets.product.obj.prototype._checkBlockButton = function(f) {
  if ($('.do-add2cart-wait, .do-add2cart-success', this.elm).length > 0) {
    var o = this;
    return setTimeout(
      function() {
        return o._checkBlockButton(f);
      },
      1000
    );

  } else {
    return f();
  }
}

/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Ajax Products list widget
 * 
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @version    ec2ca39cb71eff2cf859558b4f67f561a1b9efe4, v2 (xcart_4_4_0_beta_2), 2010-05-27 13:43:06, ajax.products.js, igoryan
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

ajax.widgets.products = function(elm) {
  if (!elm) {
    elm = $('.products');

  } else {
    elm = $(elm);
  }

  elm.each(
    function() {
      if (!this.productsWidget)
        new ajax.widgets.products.obj(this);
    }
  );

  return true;
}

ajax.widgets.products.obj = function(elm) {
  this.elm = elm;
  this.elm$ = $(elm);

  elm.productsWidget = this;

  this.type = false;

  if (this.elm$.hasClass('products-list')) {
    this.type = 'list';

  } else if (this.elm$.hasClass('products-table')) {
    this.type = 'matrix';

  }

  this._getProducts();
}

ajax.widgets.products.obj.prototype.elm = false;
ajax.widgets.products.obj.prototype.products = [];
ajax.widgets.products.obj.prototype.type = false;

ajax.widgets.products.obj.prototype.isReady = function() {
  return this.type && this.products.length > 0 && this.checkElement();
}

ajax.widgets.products.obj.prototype.checkElement = function(elm) {
  if (!elm)
    elm = this.elm;

  return typeof(elm) != 'undefiend' && elm.tagName && $(elm).hasClass('products');
}

/* Private */

// Widget :: get products
ajax.widgets.products.obj.prototype._getProducts = function() {
  if (!ajax.widgets.product)
    return false;

  this.products = [];

  var arr = [];

  if (this.type == 'list') {

    // Plain list
    arr = this.elm$.children('.item').get();

  } else if (this.type == 'matrix') {

    // Matrix
    var vSize = -1;
    for (var i = 1; i < this.elm.rows.length && vSize < 0; i++) {
      if ($(this.elm.rows[i]).hasClass('product-name-row'))
        vSize = i;
    }

    if (vSize < 0)
      vSize = this.elm.rows.length;

    var hSize = this.elm.rows[0].cells.length;
    var size = vSize * hSize;

    for (var r = 0; r < this.elm.rows.length; r++) {
      for (var c = 0; c < this.elm.rows[r].cells.length; c++) {
        var pn = Math.floor(r / vSize) * vSize + c;
        if (!arr[pn])
          arr[pn] = [];

        arr[pn][arr[pn].length] = this.elm.rows[r].cells[c];
      }
    } 

  }

  for (var i = 0; i < arr.length; i++) {
    var p = new ajax.widgets.product(arr[i]);
    this.products[this.products.length] = p;
  }

  return this.products.length > 0;
}


// onload handler
$(ajax).bind(
  'load',
  function() {
    return ajax.widgets.products();
  }
);

/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Rating bar widget
 * 
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @version    632a5c0ee28d5999174258e45bbc9f418d9f33e4, v3 (xcart_4_4_2), 2010-11-22 10:27:34, ajax.rating.js, aim
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

ajax.widgets.rating = function(elm) {
  if (!elm) {
    elm = $('.creviews-rating-box');

  } else {
    elm = $(elm);
  }

  elm.each(
    function() {
      if (!this.ratingWidget)
        new ajax.widgets.rating.obj(this);
    }
  );

  return true;
}

ajax.widgets.rating.obj = function(elm) {
  this.elm = elm;
  this.elm$ = $(elm);

  elm.ratingWidget = this;

  var s = this;

  this._rate = function() {
    return !s.rate(this);
  }

  this._callbackUB = function(responseText, textStatus, XMLHttpRequest) {
    return s._callbackUpdateBar(responseText, textStatus, XMLHttpRequest);
  }

  this._callbackR = function(state, a, b, c, d) {
    return s._callbackRate(state, a, b, c, d);
  }

  this._prepareWidget();

  this.state = 1;
}

// Options
ajax.widgets.rating.obj.prototype.ttl = 3000;

// Property
ajax.widgets.rating.obj.prototype.elm = false;

ajax.widgets.rating.obj.prototype.productid = false;

ajax.widgets.rating.obj.prototype.state = false;
ajax.widgets.rating.obj.prototype.isRated = false;

// Widget :: check widget status
ajax.widgets.rating.obj.prototype.isReady = function() {
  return this.productid;
}

// Widget :: do rate
ajax.widgets.rating.obj.prototype.rate = function(item) {
  if (!item || !this.isReady() || this.isRated)
    return false;

  this.changeState(2);

  var s = this;
  return ajax.query.add(
    {
      type: 'POST',
      data: '',
      url: $(item).attr('href'),
      success: function(a, b, c, d) {
        return s._callbackR(true, a, b, c, d);
      },
      error: function(a, b, c, d) {
        return s._callbackR(false, a, b, c, d);
      }
    }
  ) !== false;
}

// Widget :: update bar
ajax.widgets.rating.obj.prototype.updateBar = function() {
  if (!this.isReady())
    return false;

  if (this.state == 1)
    this.changeState(2);

  if (typeof(window.creviews_hover_loaded) && creviews_hover_loaded)
    creviews_hover_loaded = false;

  var data = {
    productid: this.productid
  };
  if (this.pconf)
    data.pconf = this.pconf;

  return ajax.core.loadBlock(this.elm$, 'rating_bar', data, this._callbackUB);
}

// Widget :: changes widget state
//  1 - idle
//  2 - wait
//  3 - success rated
//  4 - error
//  5 - cancel rate: already rated
ajax.widgets.rating.obj.prototype.changeState = function(state, msg) {
  if (this.state == state)
    return true;

  var res = false;

  switch (this.state) {
    case 2:
      res = this._cleanWaitState();
      break;

    case 3:
      res = this._cleanRatedState();
      break;

    case 4:
      res = this._cleanErrorState();
      break;

    case 5:
      res = this._cleanCancelState();
      break;

    default:
      res = this._cleanIdleState();
  }

  if (!res)
    return false;

  this.state = state;
  var o = this;

  switch (state) {
    case 2:
      res = this._doWaitState();
      break;

    case 3:
      res = this._doRatedState();
      break;

    case 4:
      res = this._doErrorState();
      setTimeout(
        function() {
          return o.changeState(1);
        },
        this.ttl
      );
      break;

    case 5:
      res = this._doCancelState();
      break;

    default:
      res = this._doIdleState();
  }

  return res;
}

/* Private */

// Widget :: prepare widget
ajax.widgets.rating.obj.prototype._prepareWidget = function() {

  // Check stars
  var links = $('.creviews-vote-bar a', this.elm$);
  if (links.length == 0)
    return false;

  // Detect productid
  var m = links.get(0).href.match(/productid=(\d+)/)
  if (!m)
    return false;

  this.productid = parseInt(m[1]);
  if (isNaN(this.productid) || this.productid < 1) {
    this.productid = false;
    return false;
  }

  // Detect Product Configurator properties
  m = links.get(0).href.match(/pconf=(\d+)/)
  if (m) {
    this.pconf = parseInt(m[1]);
    if (isNaN(this.pconf) || this.pconf < 1)
      this.pconf = false;
  }

  links.click(this._rate);

  return true;
}

// Widget :: callback rate action
ajax.widgets.rating.obj.prototype._callbackRate = function(state, a, b, c, d) {
  var s = 0;

  if (state && c.messages) {
    for (var i = 0; i < c.messages.length; i++) {
      if (c.messages[i].name == 'addVote' && c.messages[i].params.productid == this.productid) {
        s = parseInt(c.messages[i].params.status);
      }
    }
  }

  var o = this;
  switch (s) {
    case 1:
      this.changeState(3);
      setTimeout(
        function() {
          return o.updateBar();
        },
        this.ttl
      );
      break;

    case 2:
      this.changeState(5);
      setTimeout(
        function() {
          return o.updateBar();
        },
        this.ttl
      );
      break;

    default:
      if (!state && a.status == 0) {
        this.changeState(1);
      } else
        this.changeState(4);
  }

  return true;
}

// Widget :: callback update bar
ajax.widgets.rating.obj.prototype._callbackUpdateBar = function(responseText, textStatus, XMLHttpRequest) {
  if (XMLHttpRequest.status == 200) {
    this.savedElm = false;
    this.changeState(1);

  } else {
    this.changeState(4);
  }

  return true;
}

ajax.widgets.rating.obj.prototype._doIdleState = function() {
  if (this.savedElm) {
    var s = this;
    this.savedElm.children().each(
      function() {
        s.elm$.append(this);
      }
    );

    this.savedElm = false;
  }

  this.elm$.width('auto');

  return true;
}

ajax.widgets.rating.obj.prototype._cleanIdleState = function() {
  this.savedWidth = $('li:last', this.elm$).offset().left - $('li:first', this.elm$).offset().left + $('li:last', this.elm$).width();
  var pl = parseInt($('li:last', this.elm$).css('padding-left'));
  if (!isNaN(pl))
    this.savedWidth += pl;

  var pr = parseInt($('li:last', this.elm$).css('padding-right'));
  if (!isNaN(pr))
    this.savedWidth += pr;

  this.savedElm = this.elm$.clone();

  this.elm$.empty();

  return true;
}

ajax.widgets.rating.obj.prototype._doWaitState = function() {
  var block = document.createElement('SPAN');
  block.className = 'progress';

  this.elm$
    .width(this.savedWidth)
    .empty()
    .addClass('wait')
    .append(block);

  return true;
}

ajax.widgets.rating.obj.prototype._cleanWaitState = function() {
  if (this.elm$.children().length == 1)
    this.elm$.empty();

  this.elm$.removeClass('wait');

  return true;
}

ajax.widgets.rating.obj.prototype._doRatedState = function() {
  var block = document.createElement('SPAN');
  block.innerHTML = lbl_rated;

  this.elm$
    .width(this.savedWidth)
    .empty()
    .addClass('message')
    .addClass('rated')
    .append(block);

  return true;
}

ajax.widgets.rating.obj.prototype._cleanRatedState = function() {
  if (this.elm$.children().length == 1)
    this.elm$.empty();

  this.elm$
    .removeClass('message')
    .removeClass('rated');

  return true;
}

ajax.widgets.rating.obj.prototype._doErrorState = function() {
  var block = document.createElement('SPAN');
  block.innerHTML = lbl_error;

  this.elm$
    .width(this.savedWidth)
    .empty()
    .addClass('message')
    .addClass('error')
    .append(block);

  return true;
}

ajax.widgets.rating.obj.prototype._cleanErrorState = function() {
  if (this.elm$.children().length == 1)
    this.elm$.empty();

  this.elm$
    .removeClass('message')
    .removeClass('error');

  return true;
}

ajax.widgets.rating.obj.prototype._doCancelState = function() {
  var block = document.createElement('SPAN');
  block.innerHTML = lbl_cancel_vote;

  this.elm$
    .width(this.savedWidth)
    .empty()
    .addClass('message')
    .addClass('cancel')
    .append(block);

  return true;
}

ajax.widgets.rating.obj.prototype._cleanCancelState = function() {
  if (this.elm$.children().length == 1)
    this.elm$.empty();

  this.elm$
    .removeClass('message')
    .removeClass('cancel');

  return true;
}

// onload handler
$(ajax).bind(
  'load',
  function() {
    return ajax.widgets.rating();
  }
);

/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Voting widget
 * 
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @version    cdba81f1d9d660646ce1fc230950c836b5cf4447, v2 (xcart_4_4_0_beta_2), 2010-05-27 14:09:39, vote_bar.js, igoryan
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

var creviews_hover_loaded;
if ($.browser.msie && !creviews_hover_loaded && parseInt($.browser.version) < 7) {
  creviews_hover_loaded = true;

  $(document).ready(
    function() {
      $('.creviews-rating-box .allow-add-rate li a').hover(
        function() {
          if (!this._parents)
            this._parents = $(this).parents('li').children('a');

          this._parents.addClass('over');
        },
        function() {
          if (!this._parents)
            this._parents = $(this).parents('li').children('a');

          this._parents.removeClass('over');
        }
      );

      return true;
    }
  );
}

/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Ajax minicart widget
 * 
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @version    fe720f4d1d01a758e6a3d7809500de32bdcfff61, v3 (xcart_4_6_1), 2013-07-18 10:58:33, ajax.minicart.js, random
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

// Facntory
ajax.widgets.minicart = function(elm) {
  if (!elm) {
    elm = $('.menu-minicart');

  } else {
    elm = $(elm);
  }

  elm.each(
    function() {
      if (!this.minicartWidget)
        new ajax.widgets.minicart.obj(this);
    }
  );

  return true;
}

// Class
ajax.widgets.minicart.obj = function(elm) {
  this.elm = $(elm);

  elm.minicartWidget = this;

  var s = this;

  $(ajax.messages).bind(
    'cartChanged',
    function(e, data) {
      return s._add2cartListener(data);
    }
  );

  this._minicartReposition = function(e) {
    return s.minicartReposition(e);
  }

  this._callbackMB = function(e) {
    s.click2Minicart = true;
    return s.minicartVisible ? s.hideMinicart() : s.showMinicart();
  }

  this._callbackUM = function(responseText, textStatus, XMLHttpRequest) {
    return s._callbackUpdateMinicart(responseText, textStatus, XMLHttpRequest);
  }

  this._deleteItem = function(e) {
    return !s.deleteItem(this, e);
  }

  this._updateCart = function(e) {
    return !s.updateCart(this, e);
  }

  this._clearCart = function() {
    return !s.clearCart();
  }

  this._showCheckoutPopup = function(e) {
    return s.checkoutPopupVisible ? !s.hideCheckoutPopup(this, e) : !s.showCheckoutPopup(this, e);
  }

  if (this.elm.hasClass('ajax-minicart')) {
    this._constructMinicartButton();
  }

  $('body').click(
    function() {
      if (!s.click2Minicart)
        s.hideMinicart();

      s.click2Minicart = false;
    }
  );

}

// Options
ajax.widgets.minicart.obj.prototype.errorTTL = 3000;
ajax.widgets.minicart.obj.prototype.minicartBorder = 0;

// Properties
ajax.widgets.minicart.obj.prototype.elm = false;
ajax.widgets.minicart.obj.prototype.minicart = false;
ajax.widgets.minicart.obj.prototype.minicartButton = false;

ajax.widgets.minicart.obj.prototype.minicartState = false;
ajax.widgets.minicart.obj.prototype.minicartVisible = false;
ajax.widgets.minicart.obj.prototype.minicartChanged = false;
ajax.widgets.minicart.obj.prototype.checkoutPopupVisible = false;

// Widget :: check widget status
ajax.widgets.minicart.obj.prototype.isReady = function() {
  return this.minicart.length > 0 && this.checkElement();
}

// Widget :: check element
ajax.widgets.minicart.obj.prototype.checkElement = function(elm) {
  if (!elm)
    elm = this.elm;

  return elm && elm.hasClass('menu-minicart');
}

// Widget :: update cart total block
ajax.widgets.minicart.obj.prototype.updateTotal = function() {
  return this.checkElement() && ajax.core.loadBlock($('div.minicart, span.minicart', this.elm), 'minicart_total');
}

// Widget :: update cart/checkout links block
ajax.widgets.minicart.obj.prototype.updateCartLinks = function() {
  return this.checkElement() && ajax.core.loadBlock($('div.cart-checkout-links', this.elm), 'minicart_links');
}

// Widget :: update minicart block
ajax.widgets.minicart.obj.prototype.updateMinicart = function() {
  if (!this.isReady())
    return false;

  this._markMinicartBoxAsLoaded();

  return ajax.core.loadBlock(this.minicart, 'minicart', {}, this._callbackUM);
}

// Widget :: show minicart
ajax.widgets.minicart.obj.prototype.showMinicart = function() {
  this._constructMinicartBox();

  if (this.minicartVisible)
    return false;

  this.minicartButton.addClass('minicart-button-show');

  if (this.minicartState == 1 || this.minicartChanged) {
    this._markMinicartBoxAsLoaded();
    this.updateMinicart();
  }

  if (this._iframe) {
    this._iframe.show();
  }

  this.minicart.show();

  this.minicartVisible = true;

  this.minicartReposition();

  return true;
}

// Widget :: hide minicart
ajax.widgets.minicart.obj.prototype.hideMinicart = function() {
  if (!this.minicart || !this.minicartVisible)
    return false;

  this.minicartButton.removeClass('minicart-button-show');

  if (this.checkoutPopupVisible)
    this.hideCheckoutPopup();

  this.minicart.hide();

  if (this._iframe) {
    this._iframe.hide();
  }

  this.minicartVisible = false;

  return true;
}

// Widget :: minicart reposition
ajax.widgets.minicart.obj.prototype.minicartReposition = function() {
  if (!this.isReady() || !this.minicartVisible)
    return false;

  if (this.elm.parents().filter('#left-bar').length > 0 ||  this.elm.hasClass('left-dir-minicart')) {
    var l = $('.ajax-minicart-icon', this.elm).position().left;
    var ml = $('.ajax-minicart-icon', this.elm).css('margin-left');
    if (ml) {
      ml = parseInt(ml);
      if (isNaN(ml))
        ml = 0;
    }
    l += ml;

    this.minicart.css('left', l - this.minicartBorder);

  } else if (this.elm.parents().filter('#right-bar').length > 0 || this.elm.hasClass('right-dir-minicart')) {
    var rb = $('.ajax-minicart-icon', this.elm).width() + $('.ajax-minicart-icon', this.elm).position().left;
    var ml = $('.ajax-minicart-icon', this.elm).css('margin-left');
    if (ml) {
      ml = parseInt(ml);
      if (isNaN(ml))
        ml = 0;
    }
    rb += ml;

    var pw = $('.ajax-minicart-icon', this.elm).parents().eq(0).width();

    this.minicart.css('right', pw - rb - this.minicartBorder);
  }

  this._iframeReposition();

  return true;
}

// Widget :: delete cart item
ajax.widgets.minicart.obj.prototype.deleteItem = function(item, e) {
  if (!this.isReady() || !item || !item.href)
    return false;

  this._markMinicartBoxAsLoaded();

  return ajax.query.add({ url: item.href }) !== false;
}

// Widget :: update cart
ajax.widgets.minicart.obj.prototype.updateCart = function(item, e) {
  if (!this.isReady() || !item || !item.form)
    return false;

  this._markMinicartBoxAsLoaded();

  return ajax.query.add(
    {
      type: 'POST',
      url: xcart_web_dir + '/cart.php',
      data: $(item.form).serialize()
    }
  ) !== false;
}

// Widget :: clear cart
ajax.widgets.minicart.obj.prototype.clearCart = function() {
  if (!this.isReady())
    return false;

  this._markMinicartBoxAsLoaded();

  return ajax.query.add({ url: xcart_web_dir + '/cart.php?mode=clear_cart' }) !== false;
}

// Widget :: show checkout popup
ajax.widgets.minicart.obj.prototype.showCheckoutPopup = function(item, e) {
  var p = $('.checkout-popup-link .buttons-box', this.minicart);
  if (this.checkoutPopupVisible || p.length == 0)
    return false;

  $('.checkout-popup-link', this.minicart).children('a').addClass('show');

  if (this._iframe_checkout)
    this._iframe_checkout.show();

  p.show();

  this.checkoutPopupVisible = true;

  return true;
}

// Widget :: hide checkout popup
ajax.widgets.minicart.obj.prototype.hideCheckoutPopup = function(item, e) {
  var p = $('.checkout-popup-link .buttons-box', this.minicart);
  if (!this.checkoutPopupVisible || p.length == 0)
    return false;

  $('.checkout-popup-link', this.minicart).children('a').removeClass('show');
  p.hide();

  if (this._iframe_checkout)
    this._iframe_checkout.hide();

  this.checkoutPopupVisible = false;

  return true;
}


/* Private */

// Widget :: add2cart message listener
ajax.widgets.minicart.obj.prototype._add2cartListener = function(data) {
  if (data.status == 1) {
    this._constructMinicartButton();
    this.updateTotal();
    this.updateCartLinks();

    if (data.isEmpty) {

      // Cart is empty
      this._cartIsEmpty();

    } else if (this.minicart && this.minicartVisible) {

      // Update minicart
      this._constructMinicartBox();
      this.updateMinicart();

    } else {

      // Save cart changed status
      this.minicartChanged = true;
    }
  }

  return true;
}

// Widget :: empty is cart
ajax.widgets.minicart.obj.prototype._cartIsEmpty = function() {
  this.hideMinicart();
  this._destructMinicartButton();

  $('.ajax-minicart-icon', this.elm).eq(0)
    .removeClass('full').addClass('empty')
    .parents('.full').removeClass('full').addClass('empty');

  ajax.core.trigger('cartCleaned');

  return true;
}

// Widget :: construct minicart box
ajax.widgets.minicart.obj.prototype._constructMinicartBox = function() {
  if (this.minicart)
    return false;

  var p = $('.ajax-minicart-icon', this.elm).get(0).parentNode;

  this.minicart = $(p.appendChild(document.createElement('DIV')));
  this.minicart.addClass('minicart-box');

  $(window).resize(this._minicartReposition);

  var s = this;
  this.minicart.click(
    function(e) {
      if (!s.click2CheckoutPopup)
        s.hideCheckoutPopup();

      s.click2CheckoutPopup = false;
      s.click2Minicart = true;
      s.showMinicart();
      return true;
    }
  );

  this.minicartState = 1;
  this.minicartVisible = false;

  return true;
}

// Widget :: mark minicart box as loaded
ajax.widgets.minicart.obj.prototype._markMinicartBoxAsLoaded = function() {
  if (this.minicart.hasClass('wait'))
    return false;

  var block = document.createElement('DIV');
  block.className = 'progress';

  this.minicart.empty().addClass('wait').append(block);

  this._iframeReposition();

  return true;
}

// Widget :: unmark minicart box as loaded
ajax.widgets.minicart.obj.prototype._unmarkMinicartBoxAsLoaded = function() {
  this.minicart.removeClass('wait').children('.progress').remove();

  this._iframeReposition();

  return true;
}

// Widget :: prepare minicart box
ajax.widgets.minicart.obj.prototype._prepareMinicart = function() {
  var s = this;

  $('.delete', this.minicart).click(this._deleteItem);

  $('.update-cart', this.minicart).click(this._updateCart);

  if ($('.clear-cart a', this.minicart).length > 0) {
    $('.clear-cart', this.minicart).click(
      function() {
        return false;
      }
    );
    $('.clear-cart a', this.minicart).click(this._clearCart);

  } else {
    $('.clear-cart', this.minicart).click(this._clearCart);
  }

  if ($('.checkout-popup-link .buttons-box', this.minicart).length > 0) {
    $('.checkout-popup-link a.link', this.minicart).click(this._showCheckoutPopup);
    $('.checkout-popup-link .buttons-box', this.minicart).click(
      function() {
        s.click2CheckoutPopup = true;
      }
    );
  }

  return true;
}

// Widget :: display error message
ajax.widgets.minicart.obj.prototype._displayMinicartError = function() {
  this.minicart.empty().html(lbl_error).addClass('error');

  return true;
}

// Widget :: construct minicart button
ajax.widgets.minicart.obj.prototype._constructMinicartButton = function() {
  if (this.minicartButton)
    return false;

  this.minicartButton = $('.ajax-minicart-icon', this.elm);
  if (this.minicartButton.length == 0)
    return false;

  this.elm.addClass('ajax-minicart');

  this.minicartButton
    .addClass('minicart-button')
    .click(this._callbackMB);

  return true;  
}

// Widget :: destruct minicart button
ajax.widgets.minicart.obj.prototype._destructMinicartButton = function() {
  if (!this.minicartButton)
    return false;

  this.elm.removeClass('ajax-minicart full-mini-cart');

  this.minicartButton
    .removeClass('minicart-button')
    .unbind('click', this._callbackMB);

  this.minicartButton = false;

  return true;
}

// Widget :: update minicart listener
ajax.widgets.minicart.obj.prototype._callbackUpdateMinicart = function(responseText, textStatus, XMLHttpRequest) {
  this._unmarkMinicartBoxAsLoaded();

  if (this.minicartState == 1) {

    // Minicart exists as empty box
    if (XMLHttpRequest.status == 200) {
      this.minicartState = 2;

    } else {
      this._displayMinicartError();
      var s = this;
      setTimeout(
        function() {
          s.hideMinicart();
          s._destructMinicartButton();
        },
        this.errorTTL
      );
    }
  }

  if (XMLHttpRequest.status == 200) {

    // Display new content
    this.minicartChanged = false;
    this._prepareMinicart();

  } else if (XMLHttpRequest.getResponseHeader('X-Request-Error-Code') == 1) {

    // Cart is empty
    this._cartIsEmpty();

  } else {

    // Error
    this._displayMinicartError();
    var s = this;
    setTimeout(
      function() {
        s.hideMinicart();
        s._destructMinicartButton();
      },
      this.errorTTL
    );
  }

  return true;
}

// Widget :: iframe reposition
ajax.widgets.minicart.obj.prototype._iframeReposition = function() {
  if (!this._iframe)
    return false;

  var pos = this.minicart.position();
  this._iframe
    .css({ top: pos.top + 'px', left: pos.left + 'px' })
    .width(this.minicart.width())
    .height(this.minicart.height());

  var box = $('.checkout-popup-link .buttons-box', this.minicart);
  if (box.length > 0) {
    pos = box.position();
    this._iframe_checkout
      .css({ top: pos.top + 'px', left: pos.left + 'px' })
      .width(box.width())
      .height(box.height());
  }

  return true;
}

// onload handler
$(ajax).bind(
  'load',
  function() {
    return ajax.widgets.minicart();
  }
);

/* vim: set ts=2 sw=2 sts=2 et: */
/**
 * Functions for the Flyout menus module
 * 
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage JS Library
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com> 
 * @version    2933c35a1cfb05fcc636843c0b93197c1809402a, v5 (xcart_4_6_2), 2013-11-07 18:53:27, func.js, aim
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

function switchSubcatLayer(obj) {
  $(obj.parentNode).toggleClass('closed');
  return false;
}

$(document).ready(
  function() {
    if (typeof(window.catexp) != 'undefined' && catexp > 0) {
      $('.fancycat-icons-c #cat-layer-' + catexp).parents('li.closed').removeClass('closed');
    }
  }
);

