var speed = 3;
var background;
var imageHeight = 0;
var scrollSpeed = 8;
var obstacles;
var couloir;
var windowHeight=window.innerHeight;
var turbo=false;
var div = document.createElement("div");
var roadSize = 328;

function createDiv(html) {
  div.style.color = "red";
  div.style.fontSize = "1em";
  div.innerHTML = html;
}
function startGame() {
  myGameArea.start();
  myGamePiece = new component(25, 50, "assets/images/car.png", myGameArea.canvas.width / 2, windowHeight-200, "imageP");
}

var myGameArea = {
  canvas : document.createElement("canvas"),
  start : function() {
  	obstacles = [];
    this.canvas.width = 255;
    this.canvas.height = windowHeight-110;
    this.context = this.canvas.getContext("2d");
    document.getElementById("jeu").insertBefore(this.canvas, document.getElementById("jeu").childNodes[0]);
    this.interval = setInterval(updateGameArea, 20);
    this.frameNo = 0;
    window.addEventListener('keydown', function (e) {
      myGameArea.keys = (myGameArea.keys || []);
      myGameArea.keys[e.keyCode] = true;
    })
    window.addEventListener('keyup', function (e) {
      myGameArea.keys = (myGameArea.keys || []);
      myGameArea.keys[e.keyCode] = false;
    })

    background = new Image();
    background.src = "assets/images/road.png";
    
  },
  clear : function(){
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
  },
  stop : function() {
    clearInterval(this.interval);
  }
}

function component(width, height, color, x, y, type) {
  this.type = type;
  if(type == "imageP") {
    this.image = new Image();
    this.image.src = color;
  }
  else if(type == "imageO") {
    this.image = new Image();
    switch(Math.floor(Math.random() * Math.floor(3))) {
      case 0:
        this.image.src = "assets/images/car1.png";
        break;
      case 1:
        this.image.src = "assets/images/car2.png";
        break;
      case 2:
        this.image.src = "assets/images/bus.png";
        height*=1.5;
        break;
    }
  }
  this.width = width;
  this.height = height;
  this.speedX = 0;
  this.speedY = (Math.floor(Math.random() * Math.floor(3))) + 3;
  this.x = x;
  this.y = y;
  this.update = function() {
    ctx = myGameArea.context;
    if(type == "imageP" || type == "imageO") {
      ctx.drawImage(this.image, this.x, this.y, this.width, this.height);
    } else {
      ctx.fillStyle = color;
      ctx.fillRect(this.x, this.y, this.width, this.height);      
    }
  }
  this.newPos = function() {
    this.x += this.speedX;
    this.y += this.speedY;
    if(this.x <= 42)
      this.x = 42;
    if(this.x >= 190)
      this.x = 190;
    if(this.y <= 0)
      this.y = 0;
    if(this.y + this.height >= myGameArea.canvas.height)
      this.y = myGameArea.canvas.height - this.height;
  }
  this.crashWith = function(otherobj) {
    var tolerance=10;
    var myleft = this.x+tolerance;
    var myright = this.x + (this.width)-tolerance;
    var mytop = this.y+tolerance;
    var mybottom = this.y + (this.height)-tolerance;
    var otherleft = otherobj.x;
    var otherright = otherobj.x + (otherobj.width);
    var othertop = otherobj.y;
    var otherbottom = otherobj.y + (otherobj.height);
    var crash = true;
    if ((mybottom < othertop) ||
    (mytop > otherbottom) ||
    (myright < otherleft) ||
    (myleft > otherright)) {
      crash = false;
    }
    return crash;
  }
}

function updateGameArea() {
  
  for(i = 0; i < obstacles.length; i += 1) {
    if(myGamePiece.crashWith(obstacles[i])){
      myGameArea.stop();
      createDiv("Appuyez sur la touche ESPACE pour recommencer");
      ctx = myGameArea.context;
      ctx.font="40px verdana";
      ctx.shadowColor="black";
      ctx.shadowBlur=2;
      ctx.lineWidth=5;
      ctx.strokeText("PERDU",55,myGameArea.canvas.height / 2);
      ctx.shadowBlur=0;
      ctx.fillStyle="white";
      ctx.fillText("PERDU",55,myGameArea.canvas.height / 2);
      window.addEventListener('keydown', check, false);
      return;
    }
  }

  myGameArea.clear();

  myGamePiece.speedX = 0;
  myGamePiece.speedY = 0;
  if (myGameArea.keys && myGameArea.keys[37]) {myGamePiece.speedX = -speed; }
  if (myGameArea.keys && myGameArea.keys[39]) {myGamePiece.speedX = speed; }
  if (myGameArea.keys && myGameArea.keys[38]) {myGamePiece.speedY = -speed; }
  if (myGameArea.keys && myGameArea.keys[40]) {myGamePiece.speedY = speed; }
  if (myGameArea.keys && myGameArea.keys[67]) {window.location.replace("https://youtu.be/dQw4w9WgXcQ")};
  
  myGamePiece.newPos();

  ctx = myGameArea.context;
  for (var i=-windowHeight-roadSize; i<windowHeight; i+=roadSize) {
    ctx.drawImage(background, 0, imageHeight+i, 254, roadSize);
    if(imageHeight%roadSize==0 && imageHeight >= myGameArea.canvas.height-i*roadSize) {
      imageHeight = 0;
    }
  }
  imageHeight += scrollSpeed;
  

  couloir=Math.floor(Math.random()*4);
  myGameArea.frameNo += 1;
  if (myGameArea.frameNo/10<100) {
    document.getElementById('progress-bar').setAttribute("style",'width:'+myGameArea.frameNo/10+'%');
  } else if (!turbo) {
    turbo = true;
    createDiv("Appuyez sur C pour activer le mode turbo!");
    document.getElementById("gameHUD").appendChild(div);
  }
  
  
  if(myGameArea.frameNo == 1 ||everyinterval(Math.floor(Math.random() * Math.floor(30)) + 20)) {
    obstacles.push(new component(25, 50, "null", couloir*40 + 55, -100, "imageO"));
  }

  for(i = 0; i < obstacles.length; i++) {
    obstacles[i].y += obstacles[i].speedY;
    if(obstacles[i].y > myGameArea.canvas.height + obstacles[i].height + roadSize)
      obstacles.shift();
    else
      obstacles[i].update();
  }

  myGamePiece.update();
}

function everyinterval(n) {
  return ((myGameArea.frameNo / n) % 1 == 0);
}

function check(e) {
	if(e.keyCode == 32) {
		window.removeEventListener("keydown", check, false);
		myGameArea.clear();
		startGame();
  }
}


startGame();