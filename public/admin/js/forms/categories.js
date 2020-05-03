$(document).ready(function() {
	// $('#categories-card').
});


/*
 * prevent the enter key from submitting the form
 */
$(document).ready(function() {
	$(window).keydown(function(event){
	    if(event.keyCode == 13) {
	    	alert('enter pressed');
	      	event.preventDefault();
	      	return false;
	    }
	});
});