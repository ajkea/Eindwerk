@extends('layouts.app')
@section('content')
  <h2>Canvas tes</h2>

  <canvas id="soccerfield" onclick="moveCircle(['40','30','20','10'],[10,20,30,40])">
  </canvas> 

  <script>
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");
    
    canvas.height = 400;
    canvas.width = 400;

    //VARS FOR MOVEMENT
    var x = 100;
    var y = 50;

    ctx.beginPath();
    ctx.arc(x, y, 5, 0, 2 * Math.PI);
    ctx.fillStyle = "#000000";
    ctx.fill();

    function moveCircle(x,y) {
      canvas.width = canvas.width
      ctx.arc(x[0],x[1], 5, 0, 2 * Math.PI);
      ctx.arc(y[1],x[0], 5, 0, 2 * Math.PI);
      ctx.fillStyle = "#000000";
      ctx.fill();
    }


    // CLEAR CANVAS
    // canvas.width = canvas.width
  </script>

  <style>
    canvas {
      background: url("https://upload.wikimedia.org/wikipedia/commons/8/82/Soccer_Field_Transparant.svg");
      background-size:contain;
      background-repeat: no-repeat;
    }
  </style>

@endsection