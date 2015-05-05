
function Settings() {
	this.buttonsInit();
}

Settings.prototype.open = function() {
	$('#settings').toggle()
}

Settings.prototype.uploadedGood = function(data) {
	console.log("H"+ data);
}

Settings.prototype.showRequest = function(data) {
	console.log(data);
}

Settings.prototype.buttonsInit = function() {
	$('#photoForm').submit(function(event) { 
				event.preventDefault();

				var options = { 
			        //target:        '#output2',   // target element(s) to be updated with server response 
			        beforeSubmit:  settings.showRequest,  // pre-submit callback 
			        success:       settings.uploadedGood,  // post-submit callback 
			 		//contentType: false,
			 		//processData: false,
			 		//iframe: true,
			 		//data: 'uploadButton',
			        // other available options: 
			    //    url:       "uploadPhoto",         // override for form's 'action' attribute 
			    //    type:      'POST',        // 'get' or 'post', override for form's 'method' attribute 
			       // dataType:  'multipart/form-data'        // 'xml', 'script', or 'json' (expected server response type) 
			        //clearForm: true        // clear all form fields after successful submit 
			        //resetForm: true        // reset the form after successful submit 
			 
			        // $.ajax options can be used here too, for example: 
			        timeout:   3000 
			    }; 

		        // inside event callbacks 'this' is the DOM element so we first 
		        // wrap it in a jQuery object and then invoke ajaxSubmit 
		       	 $(this).ajaxSubmit(options); 

		        // !!! Important !!! 
		        // always return false to prevent standard browser submit and page navigation 
		        return false; 
    		}); 
}