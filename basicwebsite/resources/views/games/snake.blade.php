@extends('game')

@section('titleGame')
  <h1><center>SNAKE</center></h1>
@endsection

@section('viewGame')
  <h1 id='clockTime'></h1>
  <p id='demo'></p>
@endsection

@section('setGame')
  <style media="screen">
    #myCanvas {
      border: 1px solid #d3d3d3;
      background-color: #f1f1f1;
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
  </style>

  <script type="text/javascript">
    window.onload = function WindowLoad(event) {
        startGame();
    }

    document.onkeydown = function(event){
      var key_press = String.fromCharCode(event.keyCode);
      changeDirection(key_press);
    }

    var myGamePiece;
    width_canvas = 800;
    height_canvas = 400;
    snake_size = [30,30];
    newpage = true;
    start_game = true;

    function startGame() {
      if(newpage === true){
        angle = 0;
      }
        myGamePiece = new component(width_canvas, height_canvas, snake_size[0], snake_size[1], "red", angle);
        myGameArea.start();
    }

    var myGameArea = {
        canvas : document.createElement("canvas"),
        start : function() {
            //atur panjang lebar
            this.canvas.width = width_canvas;
            this.canvas.height = height_canvas;
            //membuat atribut
            this.canvas.setAttribute("id", "myCanvas");
            this.context = this.canvas.getContext("2d");
            document.body.insertBefore(this.canvas, document.body.childNodes[0]);
            this.interval = setInterval(updateGameArea, 50);
        },
        stop : function() {
            clearInterval(this.interval);
        },
        clear : function() {
            this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
        }
    }

    function component(x, y, width, height, color, angle, type) {
        this.type = type;
        this.width = width;
        this.height = height;
        this.speed = 1;
        this.angle = angle;
        this.x = x;
        this.y = y;
        key = 0;
        start_point = [-300,-400];
        this.update = function() {
            ctx = myGameArea.context;
            ctx.save();
            console.log(this.y);
            console.log(this.x);
            console.log("translate");
            ctx.translate(this.x, this.y);
            ctx.fillStyle = color;
            //console.log(this.width)
            //menentukan posisi looping
            if((this.y+start_point[1] === y*key || this.x+start_point[0] === x*key) && key === 0){
                this.y = y;
                this.x = x;
                start_game = false;
                console.log(this.y);
            } else if((this.y === y*2*key || this.x === x*2*key) && key === 1){
                this.y = y;
                this.x = x;
                start_game = false;
            }

            //menentukan lokasi ular
            if(start_game === true){
              ctx.fillRect(start_point[0],start_point[1], this.width, this.height);
            } else {
              ctx.fillRect(start_point[0],-1*this.y, this.width, this.height);
              console.log(start_game);
              console.log("NGengeng");
            }
              ctx.restore();

        }
        this.newPos = function() {
          //menentukan arah sudut
            this.x += this.speed * Math.sin(this.angle* Math.PI / 180);
            this.y -= this.speed * Math.cos(this.angle* Math.PI / 180);
            //console.log(Math.cos(this.angle));
        }
    }

    function changeDirection(key){
      this.key = key;
      if(this.key === "A"){
        //kiri
        document.getElementById("demo").innerHTML = "kiri";
      } else if(this.key === "S"){
        //turun
      } else if(this.key === "W"){
        //naik
      } else if(this.key === "D"){
        //kana
      }
    }

    function updateGameArea() {
        myGameArea.clear();
        myGamePiece.newPos();
        myGamePiece.update();
    }
  </script>
@endsection
