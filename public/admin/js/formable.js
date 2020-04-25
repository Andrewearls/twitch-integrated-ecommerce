function addListeners(elementList){
	elementList.each(function(index) {
		elementList[index].addEventListener('hover', formify(elementList[index]));
	});
};

function formify(formableElement) {
	console.log(formableElement.attr('id'));
	//make form element
	//hide formableElement
	//show new form element
};

/*
 * on document ready
 * find formable elements
 * add listener to formable elements
 * create a form if one does not exist
 * create required formified elements
 *
 */ 
$(document).ready(function(){
	$('.formable').each(function(){
		$(this).mouseover(function(){
			formify($(this));
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
