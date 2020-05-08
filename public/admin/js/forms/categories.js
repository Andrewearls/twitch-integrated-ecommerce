function submitNewCategory(category) {
	var message = JSON.stringify(category);
	var url = $('#category-button').attr('href');
	// alert("url " + url + " message " + message);
	sendMessage(message, url );
}

/*
 * allow the enter key to submit new categories
 */
function handlePressedEnter() {
	var category = $.trim($('#new-category').val());
	if (category !== '') {
		submitNewCategory(category);
	}	
	$('#new-category').val('');
}

/*
 * On successful creation of new category
 * data should be a new button
 * clear the new category box
 * add the new button to the
 * current list of categories
 */
function handleSuccess(data) {	
	$('#category-container').append(data);
	makeTogglable($('#category-container button').last());
}

function toggleButton(button) {
	// var form = $("#new-article-form");

	// if (button.hasClass('active')) {
	// 	//remove category from form
	// } else {
	// 	//add category to form
	// 	$('<input>').attr({
	// 	    type: 'hidden',
	// 	    name
	// 	}).appendTo(form);
	// }
	button.toggleClass('active');	
}

function makeTogglable(button) {
	button.click(function () {
		toggleButton(button)
	});
}

function collectCategories() {
	var categories = $('#category-container button.active');
	var form = $('new-article-form');

	categories.each(function () {
		$('<input>').attr({
			type: 'hidden',
			name: 'article-categories[]',
		    value: $(this).html(),
		}).append(form);
	});
}

$(document).ready(function() {
	$('#categories-card button').each(function () {
		makeTogglable($(this));
	});

	$('#submitButton').submit( function() {
		collectCategories();
	});
	
});
