//var gameStart = new Date().getTime();
			var start = new Date().getTime();
			
			//var counter = 0;
			
			function getRandomColor(){
				var letters = '0123456789ABCDEF'.split('');
				var color = '#';
				for (i=0;i<6;i++){
					color += letters[Math.floor(Math.random()*16)];
				}
				return color;
			}
			
			function shapeGenerator(){
				
				if (Math.random() > 0.5){
					document.getElementById("shape").style.borderRadius = "50%";
				}else{
					document.getElementById("shape").style.borderRadius = "0%";
				}
				
				document.getElementById("shape").style.top = (Math.random()*400) + "px";
				document.getElementById("shape").style.left = (Math.random()*400) + "px";
				document.getElementById("shape").style.width = ((Math.random()*400) + 50) + "px";
				document.getElementById("shape").style.height = ((Math.random()*400) + 50) + "px";
				document.getElementById("shape").style.backgroundColor = getRandomColor();
				document.getElementById("shape").style.display = "block";
				start = new Date().getTime();
				
			}
			
			function createShape() {
				setTimeout(shapeGenerator, Math.random()*2000);
			}
			
			createShape();
			
			document.getElementById("shape").onclick = function() {
				var end = new Date().getTime();
				//returns miliseconds, deviding my 1000 to get real seconds.
				var timeTaken = (end - start)/1000;
				//counter++;
				//alert(timeTaken);
				document.getElementById("shape").style.display = "none";
				
				document.getElementById("timer").innerHTML = timeTaken + "s";
				
				createShape();
			}