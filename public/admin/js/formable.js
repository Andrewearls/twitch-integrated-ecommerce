var formElement = $("form");

function addListeners(elementList) {
	elementList.each(function(index) {
		elementList[index].addEventListener('hover', formafy(elementList[index]));
	});
};

function formafy(formableElement) {
	formableElement.hide();
	$('[name='+formableElement.attr('id')+']').show().focus();
	//make form element
	//hide formableElement
	//show new form element
};

function unformafy(unformableElement) {
	unformableElement.hide();
	var formableElement = $('#'+unformableElement.attr('name'));
	var value = $.trim(unformableElement.val());
	if (value.length > 0) {
		formableElement.html(unformableElement.val());
	};
	/*
	 *For the textarea parse the data 
	 * and replace new line with </br>
	 */
	// console.log(unformableElement[0].nodeName);
	// if (unformableElement[0].nodeName == "TEXTAREA") {
	// 	var newVal = unformableElement[0].value;
	// 	unformableElement.value = newVal.replace(new RegExp('\r?\n','g'), '<br />');
	// }
	formableElement.show();
};

function imageLoader(formableImage) {
	var fileSelector = $('[name='+formableImage.attr('id')+']');
	fileSelector.trigger('click');
}

/*
 * on document ready
 * find formable elements
 * add listener to formable elements
 * create a form if one does not exist
 * create required formafied elements
 *
 */ 
$(document).ready(function() {
	$('.formable').each(function() {
		$(this).click(function() {
			formafy($(this));
		});
	});

	$('.formafied').each(function(){
		$(this).focusout(function() {
			unformafy($(this));
		});
	});

	$('.formable-image').each(function(){
		$(this).click(function() {
			imageLoader($(this));
		});
	});
	// var formableElements = $('.formable');
	// addListeners(formableElements);
	// var results = 'list of formable elements:';
	// for (var i=0, len=formableElements.length|0; i<len; i=i+1|0){
	// 	results += "\n" + formableElements[i].id;
	// };
	// console.log(results);
});
