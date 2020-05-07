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
	var category = $('#new-category').val();
	submitNewCategory(category);
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

$(document).ready(function() {
	$('#categories-card button').each(function () {
		$(this).click(function () {
			toggleButton($(this))
		});
	});
});
