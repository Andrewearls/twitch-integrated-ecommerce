/*
 * prevent the enter key from submitting the forms
 */
$(document).ready(function() {
	$(window).keydown(function(event){
	    if(event.keyCode == 13) {
	      	event.preventDefault();
	      	return false;
	    }
	});
});