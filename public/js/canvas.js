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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 15);
/******/ })
/************************************************************************/
/******/ ({

/***/ 15:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(16);


/***/ }),

/***/ 16:
/***/ (function(module, exports) {

window.onload = function () {
    // canvas.width = canvas.width;
    var canvas = document.getElementById("soccerfield");
    updateStep(1);

    canvas.addEventListener('dblclick', function (evt) {
        addCoordinates(canvas, evt);
    });

    canvas.addEventListener('contextmenu', function (evt) {
        removeCoordinates(canvas, evt);
    });

    function test() {
        console.log('met shift 2');
    };

    window.addEventListener('drag', function (evt) {
        console.log('start');
    });

    canvas.addEventListener('dragstart', function (evt) {
        var canvas = document.getElementById("soccerfield");

        var mousePos = getMousePos(canvas, evt);
        console.log(mousePos);
    });
};
window.test = function () {
    console.log('test');
};

window.resetCanvas = function () {
    var canvas = document.getElementById("soccerfield");
    canvas.width = canvas.width;
};

window.resetSteps = function () {
    updateStep(1);
    document.getElementById('step').value = '1';
};

window.runSteps = function (max) {
    var i = 1;
    var counter = max;
    var interval = setInterval(function () {
        updateStep(i);
        i++;
        document.getElementById('step').value = i;
        if (i == counter) {
            clearInterval(interval);
            return updateStep(i);
        }
    }, 400);
};

window.updateStep = function () {
    var step = document.getElementById('step').value;
    this.resetCanvas();
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");
    var coordinate = void 0;
    var i = 0;

    while (i < coordinates.length) {

        if (coordinates[i].step === coordinates[i - 1]) {
            drawCurrentCoordinate(i);
        } else if (coordinates[i].step == step) {
            drawCurrentCoordinate(i);
        } else if (coordinates[i].step == step - 1) {

            if (coordinates[i + 1].step == step) {
                drawLineBetweenCoordinates(i);
            }
            drawPreviousCoordinate(i);
        }
        i++;
    }
};

window.resetSteps = function () {
    updateStep(1);
    document.getElementById('step').value = '1';
};

window.getMousePos = function (canvas, evt) {
    var rect = canvas.getBoundingClientRect();
    return {
        x: evt.clientX - rect.left,
        y: evt.clientY - rect.top
    };
};

window.drawCurrentCoordinate = function (i) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    ctx.beginPath();
    ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 14, 0, 2 * Math.PI);
    ctx.fillStyle = "#000000";
    ctx.fill();
    ctx.fillStyle = "#DDDDDD";
    ctx.font = "16px Arial";
    ctx.fillText(coordinates[i].FKplayersInTacticID, coordinates[i].xCoordinate - 6, coordinates[i].yCoordinate + 5);
};

window.drawPreviousCoordinate = function (i) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    ctx.beginPath();
    ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 10, 0, 2 * Math.PI);
    ctx.fillStyle = "#666666";
    ctx.fill();
    ctx.fillStyle = "#FFFFFF";
    ctx.font = "12px Arial";
    ctx.fillText(coordinates[i].FKplayersInTacticID, coordinates[i].xCoordinate - 5, coordinates[i].yCoordinate + 5);
};

window.drawLineBetweenCoordinates = function (i) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    ctx.beginPath();
    ctx.setLineDash([5, 5]);
    ctx.moveTo(coordinates[i].xCoordinate, coordinates[i].yCoordinate);
    ctx.lineTo(coordinates[i + 1].xCoordinate, coordinates[i + 1].yCoordinate);
    ctx.stroke();
};

function addCoordinates(canvas, evt) {
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinate').value = mousePos.x;
    document.getElementById('yCoordinate').value = mousePos.y;
    document.getElementById('formStep').value = document.getElementById('step').value;
    document.getElementById('addCoordinates').submit();
};

function removeCoordinates(canvas, evt) {
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinateDelete').value = mousePos.x;
    document.getElementById('yCoordinateDelete').value = mousePos.y;
    document.getElementById('formStepDelete').value = document.getElementById('step').value;
    document.getElementById('removeCoordinates').submit();
}

/***/ })

/******/ });