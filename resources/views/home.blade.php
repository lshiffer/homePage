@extends('app')

@section('content')
{!! HTML::script('https://cdn.socket.io/socket.io-1.3.4.js') !!}
{!! HTML::script('http://malsup.github.com/min/jquery.form.min.js') !!}

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div id="chatBox" class="panel-body">
					
				</div>

				<form name="chatBoxForm" id="chatBoxForm" action="" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="user_id" value="{{ Auth::id() }}">
					<input type="text" name="message" id="chatBoxField" required>
					<input type="submit" value="send">
				</form>
			</div>
		</div>
	</div>
</div>

<script>
		/*
			'domain'
				Change to current domain.
					'localhost' for development environment.
					'webdomain'.'TLD' for live server.

			Set listener for the event 'eventMessage'
		*/	
		domain = "localhost";
		var socket = io.connect('http://'+domain+':8890');
		socket.on('channelChat', function(data) {
			$("#chatBox").append(data);
		});

		$(document).ready(function() {

			$('#chatBoxForm').ajaxForm(function(result){
				console.log(result);
			});

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
		});

		function sendChatMessage() {
			console.log("g");
			//document.chatBoxForm.submit();
			// $.post('sendChatMessage', function(result){
			// 	console.log(result);
			// });
		}

	</script>
@endsection
