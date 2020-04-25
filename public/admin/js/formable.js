function formify(formableElement) {
	//make form element
	//hide formableElement
	//show new form element
};

var formableElements = document.getElementsByClassName('formable');
var results = 'list of formable elements:';
for (var i=0, len=formableElements.length|0; i<len; i=i+1|0){
	results += "\n" + formableElements[i].textContext;
};
console.log(results);
// .addeventListener('hover', function () {
// 	// formify($this);

// 	console.log('formify this element' + $this);
// });