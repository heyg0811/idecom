
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


/**
  *
  *  sidemenu effect js
  *
  **/
function hasParentClass( e, classname ) {
		if(e === document) return false;
		if( classie.has( e, classname ) ) {
			return true;
		}
		return e.parentNode && hasParentClass( e.parentNode, classname );
}

$(document).ready(function(){
	var sidemenu = document.getElementById('sidemenu');
	var container = document.getElementById('container');
	resetMenu = function() {
				classie.remove(container, 'menu-open');
			},
	bodyClickFn = function(evt) {
		if( !hasParentClass( evt.target, 'sidemenu' ) && evt.target.id != 'trigger') {
			resetMenu();
			document.removeEventListener( 'click', bodyClickFn );
		}
	}
	$('#trigger').click(function(){
		classie.add(container, 'scalein');
		classie.add(container, 'menu-open' );
		document.addEventListener( 'click', bodyClickFn );
	});
});
// --- sidemenu effect js ---