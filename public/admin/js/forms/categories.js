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
	button.toggleClass('clicked');
	
}

$(document).ready(function() {
	$('#categories-card button').each(function () {
		$(this).click(function () {
			toggleButton($(this))
		});
	});
});
