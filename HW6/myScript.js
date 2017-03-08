var answer = 0;
var tries = 0;

function calculateAge() {
	console.log("Converting ages.");
    var inputs = document.getElementsByTagName("input");
    inputs[1].value = inputs[0].value * 7;
}

function changeColor() {
	console.log("Changing color.");
	document.getElementById("body").style.background = getRandomColor();   
}

function getRandomColor(){
	var letters="0123456789abcdef";
	var color="#";
	for (var i=0; i<6; i++){
		color += letters.charAt(Math.floor(Math.random()*letters.length));
	}
	return color;
}

function takeAGuess() {
	var guess = document.getElementById("guess").value;
	if(guess == "") {
		console.log("Empty guess");
		return;
	}
	tries++;
	console.log("Make a guess: " + guess + ", answer is " + answer + ", tries " + tries);

	var li = document.createElement('li');
	li.innerHTML = guess;


	hint = "";
	if(guess > answer) {
		hint = "too high";
	} else if(guess < answer) {
		hint = "too low";
	} else {
		hint = "you got it right in " + tries + " tries";
		li.style.color = "red";
		document.getElementById("makeGuess").disabled = true;
	}

	document.getElementById("hint").innerHTML = hint;
	document.getElementById("pastGuess").appendChild(li); 

}

window.onload = function generateAnswer() {
	console.log("Generate answer");
	answer = Math.floor((Math.random() * 10) + 1);
}