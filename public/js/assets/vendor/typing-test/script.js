setTimeout(function(){
	mainText();
},2000);

setTimeout(function(){
	onComplete();
},2000);
function mainText() {
	var typed = new Typed("#typed", {
		stringsElement: "#typed-strings",
		loop: true,
		typeSpeed: 100,
		backSpeed: 100,
		startDelay: 0,
	});
}

function onComplete() {
	var typed1 = new Typed("#typed1", {
		stringsElement: "#typed-strings1",
		loop: true,
		typeSpeed: 100,
		backSpeed: 100,
		startDelay: 0,
		onComplete: function() {}
	});
}