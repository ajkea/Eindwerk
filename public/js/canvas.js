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
/******/ 	return __webpack_require__(__webpack_require__.s = 18);
/******/ })
/************************************************************************/
/******/ ({

/***/ 18:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(19);


/***/ }),

/***/ 19:
/***/ (function(module, exports) {

window.onload = function () {
    // canvas.width = canvas.width;
    var canvas = document.getElementById("soccerfield");
    updateStep(1);
    var playerinput = document.getElementById("playerIDForm");

    playerinput.addEventListener("change", function () {
        addCoordinates(canvas);
    });

    canvas.addEventListener('contextmenu', function (evt) {
        removeCoordinates(canvas, evt);
    });

    canvas.addEventListener('mousedown', function (evt) {
        getCoordinatesEdit(canvas, evt);
    });

    canvas.addEventListener('mouseup', function (evt) {
        setCoordinatesEdit(canvas, evt);
    });
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

    ctx.fillStyle = "#DDDDDD";
    ctx.font = "24px Arial";
    ctx.fillText('Versleep de spelers', 70, 50);

    var coordinatesFiltered = coordinates.filter(function (element) {
        return element.step == step;
    });
    var coordinatesFilteredLower = coordinates.filter(function (element) {
        return element.step < step;
    });

    var flags = [],
        lastStep = [],
        l = coordinatesFilteredLower.length,
        i;
    coordinatesFilteredLower.reverse();
    for (i = 0; i < l; i++) {
        if (flags[coordinatesFilteredLower[i].FKplayersInTacticID]) continue;
        flags[coordinatesFilteredLower[i].FKplayersInTacticID] = true;
        lastStep.push(coordinatesFilteredLower[i]);
    }

    lastStep.forEach(function (element) {
        drawLineBetweenCoordinates(element, coordinatesFiltered);
        drawPreviousCoordinate(element);
    });

    for (var _i = 0; _i < coordinatesFiltered.length; _i++) {
        drawCurrentCoordinate(_i, coordinatesFiltered);
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

window.drawCurrentCoordinate = function (i, coordinates) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    if (coordinates[i].shirtNumber == 100) {
        ctx.beginPath();
        ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 14, 0, 2 * Math.PI);
        ctx.fillStyle = "#FFFFFF";
        ctx.fill();
        ctx.beginPath();
        ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 14, 0, 2 * Math.PI);
        ctx.stroke();
    } else if (coordinates[i].shirtNumber == 101) {
        ctx.beginPath();
        ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 12, 0, 2 * Math.PI);
        ctx.fillStyle = "#FF0000";
        ctx.fill();
        ctx.beginPath();
        ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 12, 0, 2 * Math.PI);
        ctx.stroke();
    } else {
        ctx.beginPath();
        ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 20, 0, 2 * Math.PI);
        ctx.fillStyle = "#000000";
        ctx.fill();
        ctx.fillStyle = "#FFFFFF";
        ctx.font = "24px Arial";
        ctx.fillText(coordinates[i].shirtNumber, coordinates[i].xCoordinate, coordinates[i].yCoordinate + 10);
        ctx.fillText(coordinates[i].firstName, coordinates[i].xCoordinate, coordinates[i].yCoordinate + 40);
    }
    ctx.textAlign = "center";
};

window.drawPreviousCoordinate = function (coordinates) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    if (coordinates.shirtNumber == 100) {
        ctx.beginPath();
        ctx.arc(coordinates.xCoordinate, coordinates.yCoordinate, 10, 0, 2 * Math.PI);
        ctx.fillStyle = "#BBBBBB";
        ctx.fill();
        ctx.beginPath();
        ctx.arc(coordinates.xCoordinate, coordinates.yCoordinate, 10, 0, 2 * Math.PI);
        ctx.stroke();
    } else if (coordinates.shirtNumber == 101) {
        ctx.beginPath();
        ctx.arc(coordinates.xCoordinate, coordinates.yCoordinate, 8, 0, 2 * Math.PI);
        ctx.fillStyle = "#BB0000";
        ctx.fill();
        ctx.beginPath();
        ctx.arc(coordinates.xCoordinate, coordinates.yCoordinate, 8, 0, 2 * Math.PI);
        ctx.stroke();
    } else {
        ctx.beginPath();
        ctx.arc(coordinates.xCoordinate, coordinates.yCoordinate, 16, 0, 2 * Math.PI);
        ctx.fillStyle = "#666666";
        ctx.fill();
        ctx.fillStyle = "#FFFFFF";
        ctx.font = "15px Arial";
        ctx.fillText(coordinates.shirtNumber, coordinates.xCoordinate, coordinates.yCoordinate + 6);
        ctx.fillText(coordinates.firstName, coordinates.xCoordinate, coordinates.yCoordinate + 30);
    }
    ctx.textAlign = "center";
};

window.drawLineBetweenCoordinates = function (coordinatesLow, coordinatesCurrent) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    for (i = 0; i < coordinatesCurrent.length; i++) {
        if (coordinatesLow.FKplayersInTacticID == coordinatesCurrent[i].FKplayersInTacticID) {
            ctx.beginPath();
            ctx.setLineDash([5, 5]);
            ctx.moveTo(coordinatesLow.xCoordinate, coordinatesLow.yCoordinate);
            ctx.lineTo(coordinatesCurrent[i].xCoordinate, coordinatesCurrent[i].yCoordinate);
            ctx.stroke();
        }
    }

    // ctx.beginPath();
    // ctx.setLineDash([5,5]);
    // ctx.moveTo(coordinatesLow[i].xCoordinate,coordinatesLow[i].yCoordinate);
    // ctx.lineTo(coordinatesCurrent[i].xCoordinate,coordinatesCurrent[i].yCoordinate);
    // ctx.stroke();
};

function addCoordinates(canvas) {
    document.getElementById('xCoordinateAdd').value = 50;
    document.getElementById('yCoordinateAdd').value = 50;
    document.getElementById('formStepAdd').value = document.getElementById('step').value;

    document.getElementById('addCoordinates').submit();
}

function removeCoordinates(canvas, evt) {
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinateDelete').value = mousePos.x;
    document.getElementById('yCoordinateDelete').value = mousePos.y;
    document.getElementById('formStepDelete').value = document.getElementById('step').value;
    document.getElementById('removeCoordinates').submit();
}

function editCoordinates(canvas, evt) {
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinateDelete').value = mousePos.x;
    document.getElementById('yCoordinateDelete').value = mousePos.y;
    document.getElementById('formStepDelete').value = document.getElementById('step').value;
    document.getElementById('removeCoordinates').submit();
}

function getCoordinatesEdit(canvas, evt) {
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinateEditStart').value = mousePos.x;
    document.getElementById('yCoordinateEditStart').value = mousePos.y;
}

function setCoordinatesEdit(canvas, evt) {
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinateEditEnd').value = mousePos.x;
    document.getElementById('yCoordinateEditEnd').value = mousePos.y;
    document.getElementById('formStepEdit').value = document.getElementById('step').value;

    document.getElementById('editCoordinates').submit();
}

/***/ })

/******/ });