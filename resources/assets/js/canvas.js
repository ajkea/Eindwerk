window.onload = function() {
    // canvas.width = canvas.width;
    var canvas = document.getElementById("soccerfield");
    updateStep(1);
    var playerinput = document.getElementById("playerIDForm");

    playerinput.addEventListener("change", function() {
        addCoordinates(canvas);
    });

    canvas.addEventListener('contextmenu', function(evt){
        removeCoordinates(canvas,evt);
    });

    canvas.addEventListener('mousedown', function(evt){
        getCoordinatesEdit(canvas, evt);
    });

    canvas.addEventListener('mouseup', function(evt){
        setCoordinatesEdit(canvas, evt);
    });
}

window.resetCanvas = function() {
    var canvas = document.getElementById("soccerfield");
    canvas.width = canvas.width;
}

window.resetSteps = function() {
    updateStep(1);
    document.getElementById('step').value = '1';
}

window.runSteps = function(max){
    let i = 1;
    let counter = max;
    let interval = setInterval(function(){
      updateStep(i);
      i++;
      document.getElementById('step').value = i;
      if(i == counter){
        clearInterval(interval);
        return updateStep(i);
      }
    },400);
}

window.updateStep = function() {
    var step = document.getElementById('step').value;
    this.resetCanvas();
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");
    let coordinate;

    ctx.fillStyle = "#DDDDDD";
    ctx.font="24px Arial";
    ctx.fillText('Versleep de spelers', 70, 50);

    var coordinatesFiltered = coordinates.filter( element => element.step == step);
    var coordinatesFilteredLower = coordinates.filter( element => element.step < step);

    for(let i=0; i < coordinatesFiltered.length; i++){
        drawCurrentCoordinate(i, coordinatesFiltered);
    }

    var flags = [], lastStep = [], l = coordinatesFilteredLower.length, i;
    coordinatesFilteredLower.reverse();
    for( i=0; i<l; i++) {
        if( flags[coordinatesFilteredLower[i].shirtNumber]) continue;
        flags[coordinatesFilteredLower[i].shirtNumber] = true;
        lastStep.push(coordinatesFilteredLower[i]);
    }
    
    lastStep.forEach(function(element) {
        drawPreviousCoordinate(element);
    })
}

window.resetSteps = function() {
    updateStep(1);
    document.getElementById('step').value = '1';
}

window.getMousePos = (canvas, evt) => {
    var rect = canvas.getBoundingClientRect();
    return{
        x: evt.clientX - rect.left,
        y: evt.clientY - rect.top
    }
}

window.drawCurrentCoordinate = function(i, coordinates) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");
    
    if(coordinates[i].shirtNumber == 100) {
        ctx.beginPath();
        ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 14, 0, 2 * Math.PI);
        ctx.fillStyle = "#FFFFFF";
        ctx.fill();
        ctx.beginPath();
        ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 14, 0, 2 * Math.PI);
        ctx.stroke();
    }
    else if(coordinates[i].shirtNumber == 101) {
        ctx.beginPath();
        ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 14, 0, 2 * Math.PI);
        ctx.fillStyle = "red";
        ctx.fill();
        ctx.beginPath();
        ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 14, 0, 2 * Math.PI);
        ctx.stroke();
    }
    else {
        ctx.beginPath();
        ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 20, 0, 2 * Math.PI);
        ctx.fillStyle = "#000000";
        ctx.fill();
        ctx.fillStyle = "#DDDDDD";
        ctx.font="24px Arial";
        ctx.fillText(coordinates[i].shirtNumber, coordinates[i].xCoordinate, coordinates[i].yCoordinate +10);
        ctx.fillText(coordinates[i].firstName, coordinates[i].xCoordinate, coordinates[i].yCoordinate +40);
        ctx.textAlign="center"; 
    }
}

window.drawPreviousCoordinate = function(coordinates) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    if(coordinates.shirtNumber == 100){
        ctx.beginPath();
        ctx.arc(coordinates.xCoordinate, coordinates.yCoordinate, 10, 0, 2 * Math.PI);
        ctx.fillStyle = "#BBBBBB";
        ctx.fill();
        ctx.beginPath();
        ctx.arc(coordinates.xCoordinate, coordinates.yCoordinate, 10, 0, 2 * Math.PI);
        ctx.stroke();
    }
    else{
        ctx.beginPath();
        ctx.arc(coordinates.xCoordinate,coordinates.yCoordinate, 16, 0, 2 * Math.PI);
        ctx.fillStyle = "#666666";
        ctx.fill();
        ctx.fillStyle = "#FFFFFF";
        ctx.font="15px Arial";
        ctx.fillText(coordinates.shirtNumber, coordinates.xCoordinate, coordinates.yCoordinate + 6);
        ctx.fillText(coordinates.firstName, coordinates.xCoordinate, coordinates.yCoordinate +30);
        ctx.textAlign="center"; 
    }
}

window.drawLineBetweenCoordinates = function (i) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    ctx.beginPath();
    ctx.setLineDash([5,5]);
    ctx.moveTo(coordinates[i].xCoordinate,coordinates[i].yCoordinate);
    ctx.lineTo(coordinates[i+1].xCoordinate,coordinates[i+1].yCoordinate);
    ctx.stroke();
}

function addCoordinates(canvas){
    document.getElementById('xCoordinateAdd').value = 50;
    document.getElementById('yCoordinateAdd').value = 50;
    document.getElementById('formStepAdd').value = document.getElementById('step').value;
    
    document.getElementById('addCoordinates').submit();
}

function removeCoordinates(canvas, evt){
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinateDelete').value = mousePos.x;
    document.getElementById('yCoordinateDelete').value = mousePos.y;
    document.getElementById('formStepDelete').value = document.getElementById('step').value;
    document.getElementById('removeCoordinates').submit();
}

function editCoordinates(canvas, evt){
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinateDelete').value = mousePos.x;
    document.getElementById('yCoordinateDelete').value = mousePos.y;
    document.getElementById('formStepDelete').value = document.getElementById('step').value;
    document.getElementById('removeCoordinates').submit();
}

function getCoordinatesEdit(canvas, evt){
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinateEditStart').value = mousePos.x;
    document.getElementById('yCoordinateEditStart').value = mousePos.y;
}

function setCoordinatesEdit(canvas, evt){
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinateEditEnd').value = mousePos.x;
    document.getElementById('yCoordinateEditEnd').value = mousePos.y;
    document.getElementById('formStepEdit').value = document.getElementById('step').value;

    document.getElementById('editCoordinates').submit();
}