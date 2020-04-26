function handleFileSelect(input) {
	var imagePreview = $('#article-preview-image');
	if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	      	imagePreview.attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]); // convert to base64 string
  	}
  	console.log(imagePreview.nodeName);
  	new Cropper(imagePreview[0]);
}

$('.crop-file').change(function(){
	handleFileSelect(this)
});
