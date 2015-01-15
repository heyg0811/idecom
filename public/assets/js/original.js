
/**
  *  Osaka Works information original.js
  **/


/*
 * classie - class helper
 *
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

function classReg( className ) {
  return new RegExp("(^|¥¥s+)" + className + "(¥¥s+|$)");
}
var hasClass, addClass, removeClass;
if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}
function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}
var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};
// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}// --- classie - class helper ---


//----------  author  ----------
$(window).load(function () {
  author_height();
});
function author_height() {
  Height = ($('#user-box').height()/2)-61;
  $('div#timeline-box').css('height',Height+'px');
  return ;
}

//----------  timeline  scrollbar  ----------
//$('#timeline-box').slimScroll({
//});
//----------  timeline  scrollbar end  ----------

//----------  slider  ----------
$("[data-slider]")
.each(function() {
    var input = $(this);
    $("<span>")
    .addClass("output")
    .insertAfter($(this));
})
.bind("slider:ready slider:changed", function( event, data) {
    $(this)
    .nextAll(".output:first")
    .html(data.value.toFixed(0));  // 数値表示の小数点以下数
}); 
//----------  slider end  ----------
//----------  author  ----------