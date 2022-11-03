/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/slider.js":
/*!********************************!*\
  !*** ./resources/js/slider.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  // invoke the carousel
  $('#myCarousel').carousel({
    interval: 6000
  });

  // scroll slides on mouse scroll 
  $('#myCarousel').bind('mousewheel DOMMouseScroll', function (e) {
    if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
      $(this).carousel('prev');
    } else {
      $(this).carousel('next');
    }
  });

  //scroll slides on swipe for touch enabled devices  
  $("#myCarousel").on("touchstart", function (event) {
    var yClick = event.originalEvent.touches[0].pageY;
    $(this).one("touchmove", function (event) {
      var yMove = event.originalEvent.touches[0].pageY;
      if (Math.floor(yClick - yMove) > 1) {
        $(".carousel").carousel('next');
      } else if (Math.floor(yClick - yMove) < -1) {
        $(".carousel").carousel('prev');
      }
    });
    $(".carousel").on("touchend", function () {
      $(this).off("touchmove");
    });
  });
});
//animated  carousel start
$(document).ready(function () {
  //to add  start animation on load for first slide 
  $(function () {
    $.fn.extend({
      animateCss: function animateCss(animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function () {
          $(this).removeClass(animationName);
        });
      }
    });
    $('.item1.active img').animateCss('slideInDown');
    $('.item1.active h2').animateCss('zoomIn');
    $('.item1.active p').animateCss('fadeIn');
  });

  //to start animation on  mousescroll , click and swipe 
  $("#myCarousel").on('slide.bs.carousel', function () {
    $.fn.extend({
      animateCss: function animateCss(animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function () {
          $(this).removeClass(animationName);
        });
      }
    });

    // add animation type  from animate.css on the element which you want to animate

    $('.item1 img').animateCss('slideInDown');
    $('.item1 h2').animateCss('zoomIn');
    $('.item1 p').animateCss('fadeIn');
    $('.item2 img').animateCss('zoomIn');
    $('.item2 h2').animateCss('swing');
    $('.item2 p').animateCss('fadeIn');
    $('.item3 img').animateCss('fadeInLeft');
    $('.item3 h2').animateCss('fadeInDown');
    $('.item3 p').animateCss('fadeIn');
  });
});

/***/ }),

/***/ 5:
/*!**************************************!*\
  !*** multi ./resources/js/slider.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laravel\proj68-team2-deliveboo\resources\js\slider.js */"./resources/js/slider.js");


/***/ })

/******/ });