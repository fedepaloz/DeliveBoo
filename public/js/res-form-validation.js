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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/res-form-validation.js":
/*!*********************************************!*\
  !*** ./resources/js/res-form-validation.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var formField = document.getElementById("restaurant-form");
var nameField = document.getElementById("name");
var nameFeedbackField = document.getElementById("name-feedback");
var vatField = document.getElementById("vat_number");
var vatFeedbackField = document.getElementById("vat-feedback");
var phoneField = document.getElementById("phone");
var phoneFeedbackField = document.getElementById("phone-feedback");
var addressField = document.getElementById("address");
var addressFeedbackField = document.getElementById("address-feedback");
var openingField = document.getElementById("opening_time");
var openingFeedbackField = document.getElementById("opening-feedback");
var closureField = document.getElementById("closure_time");
var closureFeedbackField = document.getElementById("closure-feedback");
var minField = document.getElementById("min_order");
var minFeedbackField = document.getElementById("min-feedback");
var dcostField = document.getElementById("delivery_cost");
var dcostFeedbackField = document.getElementById("dcost-feedback");
formField.addEventListener("submit", function (event) {
  event.preventDefault();
  var isNameValid = false;
  var isVatValid = false;
  var isPhoneValid = false;
  var isAddressValid = false;
  var isOpeningValid = false;
  var isClosureValid = false;
  var isMinValid = false;
  var isDcostValid = false;
  if (nameField.value) {
    isNameValid = true;
    nameField.classList.remove("is-invalid");
  } else {
    nameField.classList.add("is-invalid");
  }
  if (vatField.value) {
    isVatValid = true;
    vatField.classList.remove("is-invalid");
  } else {
    vatField.classList.add("is-invalid");
  }
  if (phoneField.value) {
    isPhoneValid = true;
    phoneField.classList.remove("is-invalid");
  } else {
    phoneField.classList.add("is-invalid");
  }
  if (addressField.value) {
    isAddressValid = true;
    addressField.classList.remove("is-invalid");
  } else {
    addressField.classList.add("is-invalid");
  }
  if (openingField.value) {
    isOpeningValid = true;
    openingField.classList.remove("is-invalid");
  } else {
    openingField.classList.add("is-invalid");
  }
  if (closureField.value) {
    isClosureValid = true;
    closureField.classList.remove("is-invalid");
  } else {
    closureField.classList.add("is-invalid");
  }
  if (minField.value) {
    isMinValid = true;
    minField.classList.remove("is-invalid");
  } else {
    minField.classList.add("is-invalid");
  }
  if (dcostField.value) {
    isDcostValid = true;
    dcostField.classList.remove("is-invalid");
  } else {
    dcostField.classList.add("is-invalid");
  }
  if (isNameValid && isVatValid && isPhoneValid && isAddressValid && isOpeningValid && isClosureValid && isMinValid && isDcostValid) formField.submit();
});

/***/ }),

/***/ 1:
/*!***************************************************!*\
  !*** multi ./resources/js/res-form-validation.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laravel\proj68-team2-deliveboo\resources\js\res-form-validation.js */"./resources/js/res-form-validation.js");


/***/ })

/******/ });