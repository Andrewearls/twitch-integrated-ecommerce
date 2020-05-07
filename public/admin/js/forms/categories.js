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
	makeTogglable();
}

function toggleButton(button) {
	var form = $("#new-article-form");

	if (button.hasClass('active')) {
		//remove category from form
	} else {
		//add category to form
		$('<input>').attr({
		    type: 'hidden',
		    name: 'article-categories[]',
		    value: button.html(),
		}).appendTo(form);
	}
	button.toggleClass('active');
	
}

function makeTogglable() {
	$('#categories-card button').each(function () {
		$(this).click(function () {
			toggleButton($(this))
		});
	});

}

$(document).ready(function() {
	makeTogglable();
});
