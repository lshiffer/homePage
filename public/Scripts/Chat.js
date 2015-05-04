
function Chat() {
	this.clearChat();

	this.chatTemplate = Handlebars.compile($('#chatTemplate').html());

	this.buttonsInit();
}

Chat.prototype.appendMessage = function(message) {
	html = this.chatTemplate(message);
	$("#chatBox").prepend(html);
	this.chatMessageButtonInit();
}

Chat.prototype.chatMessageButtonInit = function() {
	// Clicking a User Name in chat. 
	$('.chatName').click(function() {
					profile.open(this.getAttribute("value"));
				});
}

Chat.prototype.buttonsInit = function () {
	this.chatMessageButtonInit();

	// Clicking the Send button for Chat form. 
	$('#chatBoxForm').submit(function() { 
					var options = { 
				        //target:        '#output2',   // target element(s) to be updated with server response 
				        //beforeSubmit:  showRequest,  // pre-submit callback 
				        //success:       showResponse  // post-submit callback 
				 
				        // other available options: 
				        url:       "sendChatMessage"         // override for form's 'action' attribute 
				        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
				        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
				        //clearForm: true        // clear all form fields after successful submit 
				        //resetForm: true        // reset the form after successful submit 
				 
				        // $.ajax options can be used here too, for example: 
				        //timeout:   3000 
				    }; 

			        // inside event callbacks 'this' is the DOM element so we first 
			        // wrap it in a jQuery object and then invoke ajaxSubmit 
			       	 $(this).ajaxSubmit(options); 

			       	 $('#chatBoxField').val("");
	 
			        // !!! Important !!! 
			        // always return false to prevent standard browser submit and page navigation 
			        return false; 
    			}); 
}

Chat.prototype.clearChat = function() {
	$('#chatBoxField').val("");
}