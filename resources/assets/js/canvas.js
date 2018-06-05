window.onLoad = function (){
    var canvas = document.getElementById("soccerfield");
    canvas.width = canvas.width;

}

window.resetCanvas = function (){
    var canvas = document.getElementById("soccerfield");
    canvas.width = canvas.width;
}

window.resetSteps = function (){
    updateStep(1);
    document.getElementById('step').value = '1';
  }
  
window.updateStep = function (step){
    this.resetCanvas();
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");
    let coordinate;
    let i = 0;

    while(i < coordinates.length){
        console.log('hoeveel keer?' + i);
        if(coordinates[i].step == step){
            drawCurrentCoordinate(step, i);

            if (typeof coordinates[i-1] !== "undefined"){
                drawPreviousCoordinate(step, i);
            }

            if((coordinates[i].FKplayersInTacticID == coordinates[i-1].FKplayersInTacticID) && (typeof coordinates[i-1] !== "undefined")){
                drawLineBetweenCoordinates(step, i);
            }
        }
        i++;
    }
}

window.resetSteps = function() {
    updateStep(1);
    document.getElementById('step').value = '1';
}

window.getMousePos = function (canvas, evt){
    var rect = canvas.getBoundingClientRect();
    return{
        x: evt.clientX - rect.left,
        y: evt.clientY - rect.top
    };
}

window.drawCurrentCoordinate = function (step, i) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");
    
    ctx.beginPath();
    ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 10, 0, 2 * Math.PI);
    ctx.fillStyle = "#000000";
    ctx.fill();
    ctx.fillStyle = "#DDDDDD";
    ctx.font="12px Arial";
    ctx.fillText(coordinates[i].id,coordinates[i].xCoordinate -6, coordinates[i].yCoordinate +5);
}

window.drawPreviousCoordinate = function (step, i) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    console.log('previous functie werkt');
    ctx.beginPath();
    ctx.arc(coordinates[i-1].xCoordinate,coordinates[i-1].yCoordinate, 8, 0, 2 * Math.PI);
    ctx.fillStyle = "#666666";
    ctx.fill();
    ctx.fillStyle = "#FFFFFF";
    ctx.font="8px Arial";
    ctx.fillText(coordinates[i-1].id,coordinates[i-1].xCoordinate - 3,coordinates[i-1].yCoordinate + 3.5);
}

window.drawLineBetweenCoordinates = function (step, i) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    console.log('lijnen trekken werkt');
    ctx.beginPath();
    ctx.setLineDash([5,5]);
    ctx.moveTo(coordinates[i].xCoordinate,coordinates[i].yCoordinate);
    ctx.lineTo(coordinates[i-1].xCoordinate,coordinates[i-1].yCoordinate);
    ctx.stroke();
}

canvas.addEventListener('dblclick', function(evt){
    console.log('eventlisterner');
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinate').value = mousePos.x;
    document.getElementById('yCoordinate').value = mousePos.y;
    document.getElementById('formStep').value = document.getElementById('step').value;
    document.getElementById('formCoordinates').submit();
  });