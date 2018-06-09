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
    console.log('iets');
    document.getElementById('step').value = '1';
  }
  
window.iets = function (step){
    console.log(step);
    updateStep(step);
}
window.updateStep = function (){
    var step = document.getElementById('step').value;
    this.resetCanvas();
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");
    let coordinate;
    let i = 0;

    while(i < coordinates.length){
        console.log(coordinates[i].id + coordinates[i].step);

        if(coordinates[i].step == step){
            drawCurrentCoordinate(i);
        }

        if(coordinates[i].step == (step -1)){
            drawPreviousCoordinate(i);
            
            if(coordinates[i+1].step == step){
                drawLineBetweenCoordinates(i);
                console.log('draw previous step:' + coordinates[i].step);
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

window.drawCurrentCoordinate = function (i) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");
    
    ctx.beginPath();
    ctx.arc(coordinates[i].xCoordinate, coordinates[i].yCoordinate, 10, 0, 2 * Math.PI);
    ctx.fillStyle = "#000000";
    ctx.fill();
    ctx.fillStyle = "#DDDDDD";
    ctx.font="12px Arial";
    ctx.fillText(coordinates[i].FKplayersInTacticID, coordinates[i].xCoordinate -6, coordinates[i].yCoordinate +5);
}

window.drawPreviousCoordinate = function (i) {
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");

    ctx.beginPath();
    ctx.arc(coordinates[i].xCoordinate,coordinates[i].yCoordinate, 8, 0, 2 * Math.PI);
    ctx.fillStyle = "#666666";
    ctx.fill();
    ctx.fillStyle = "#FFFFFF";
    ctx.font="10px Arial";
    ctx.fillText(coordinates[i].FKplayersInTacticID, coordinates[i].xCoordinate - 3, coordinates[i].yCoordinate + 3.5);
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

canvas.addEventListener('dblclick', function(evt){
    console.log('eventlisterner');
    var mousePos = getMousePos(canvas, evt);
    document.getElementById('xCoordinate').value = mousePos.x;
    document.getElementById('yCoordinate').value = mousePos.y;
    document.getElementById('formStep').value = document.getElementById('step').value;
    document.getElementById('formCoordinates').submit();
  });