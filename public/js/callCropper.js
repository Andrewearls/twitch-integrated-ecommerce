Cropper.setDefaults({
	dragMode: 'move', 
	viewMode: 2,
	center: false, 
	background: false,
	zoomable: false,
	cropBoxResizable: false
});

function findAspectRatio(picture) {
	var width = picture.width;
	var height = picture.height;

	//is the picture taller or wider?
	if (height > width) {
		//it is taller!
	} else if (width > height) {
		//it is wider!
	} else {
		//it is a square!
	}
	console.log(width + ' x ' + height);
};

function handleFileSelect(input) {
	
	//check to see if a file was uploaded
	if (input.files && input.files[0]) {

		//start the reader
	    var reader = new FileReader();

	    //Read the contents of Image File.
	    reader.readAsDataURL(input.files[0]);	    
	    reader.onload = function(e) {

	    	//get the preview destination img element
	    	var imagePreview = $('#cropper-image');
	    	var picture = imagePreview[0];

	    	//Set the Base64 string return from FileReader as source.
			imagePreview.attr('src', e.target.result);

			$('#modal-trigger').trigger('click');

			picture.onload = function () {
				
				new Cropper( picture, {
					aspectRatio: 900/300
				});

				
			}
	    	
	      	

	      	
	      	
	    }
	    
	    // reader.readAsDataURL(input.files[0]); // convert to base64 string
  	}
  	// console.log(imagePreview.nodeName);
  	
}

$('.crop-file').change(function(){
	handleFileSelect(this)
});
