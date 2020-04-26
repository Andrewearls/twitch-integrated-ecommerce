function handleFileSelect(input) {
	var imagePreview = $('.modal > img');
	if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	      	imagePreview.attr('src', e.target.result);
	      	new Cropper(imagePreview[0]);
	      	$('#modal-trigger').trigger('click');
	    }
	    
	    reader.readAsDataURL(input.files[0]); // convert to base64 string
  	}
  	// console.log(imagePreview.nodeName);
  	
}

$('.crop-file').change(function(){
	handleFileSelect(this)
});
