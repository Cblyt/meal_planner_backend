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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/css-loader/index.js):\nModuleBuildError: Module build failed: Error: ENOENT: no such file or directory, open 'C:\\Final Year Project\\meal_planner_app\\node_modules\\css-loader\\lib\\css-base.js'\n    at C:\\Final Year Project\\meal_planner_app\\node_modules\\webpack\\lib\\NormalModule.js:316:20\n    at C:\\Final Year Project\\meal_planner_app\\node_modules\\loader-runner\\lib\\LoaderRunner.js:367:11\n    at C:\\Final Year Project\\meal_planner_app\\node_modules\\loader-runner\\lib\\LoaderRunner.js:203:19\n    at C:\\Final Year Project\\meal_planner_app\\node_modules\\enhanced-resolve\\lib\\CachedInputFileSystem.js:85:15\n    at processTicksAndRejections (internal/process/task_queues.js:79:11)");

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nError: C:\\Final Year Project\\meal_planner_app\\resources\\js\\app.js: Cannot find module '@babel/generator'\nRequire stack:\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\@babel\\core\\lib\\transformation\\file\\generate.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\@babel\\core\\lib\\transformation\\index.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\@babel\\core\\lib\\transform.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\@babel\\core\\lib\\index.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\laravel-mix\\src\\FileCollection.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\laravel-mix\\src\\tasks\\ConcatenateFilesTask.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\laravel-mix\\src\\components\\Combine.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\laravel-mix\\src\\components\\ComponentFactory.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\laravel-mix\\setup\\webpack.config.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\webpack-cli\\bin\\utils\\convert-argv.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\webpack-cli\\bin\\cli.js\n- C:\\Final Year Project\\meal_planner_app\\node_modules\\webpack\\bin\\webpack.js\n    at Function.Module._resolveFilename (internal/modules/cjs/loader.js:965:15)\n    at Function.Module._load (internal/modules/cjs/loader.js:841:27)\n    at Module.require (internal/modules/cjs/loader.js:1025:19)\n    at require (C:\\Final Year Project\\meal_planner_app\\node_modules\\v8-compile-cache\\v8-compile-cache.js:159:20)\n    at _generator (C:\\Final Year Project\\meal_planner_app\\node_modules\\@babel\\core\\lib\\transformation\\file\\generate.js:19:39)\n    at generateCode (C:\\Final Year Project\\meal_planner_app\\node_modules\\@babel\\core\\lib\\transformation\\file\\generate.js:57:18)\n    at run (C:\\Final Year Project\\meal_planner_app\\node_modules\\@babel\\core\\lib\\transformation\\index.js:55:33)\n    at run.next (<anonymous>)\n    at Function.transform (C:\\Final Year Project\\meal_planner_app\\node_modules\\@babel\\core\\lib\\transform.js:27:41)\n    at transform.next (<anonymous>)\n    at step (C:\\Final Year Project\\meal_planner_app\\node_modules\\gensync\\index.js:261:32)\n    at C:\\Final Year Project\\meal_planner_app\\node_modules\\gensync\\index.js:273:13\n    at async.call.result.err.err (C:\\Final Year Project\\meal_planner_app\\node_modules\\gensync\\index.js:223:11)");

/***/ }),

/***/ 0:
/*!***********************************************************!*\
  !*** multi ./resources/js/app.js ./resources/css/app.css ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Final Year Project\meal_planner_app\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\Final Year Project\meal_planner_app\resources\css\app.css */"./resources/css/app.css");


/***/ })

/******/ });