@extends('app')

@section('content')
	{!! HTML::style('css/chat.css') !!}
	{!! HTML::style('css/profile.css') !!}
	{!! HTML::style('css/rightPanel.css') !!}
	{!! HTML::style('css/settings.css') !!}
	{!! HTML::script('https://cdn.socket.io/socket.io-1.3.4.js') !!}
	{!! HTML::script('http://malsup.github.com/min/jquery.form.min.js') !!}
	<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.1/handlebars.js"></script>

<div id="outterContainer" class="container">
	<div id="rowContainer" class="row">

		<div id="profileContainer">
			<div id="profile">
				<div class="panel panel-default">
					<div class="panel-heading">Profile</div>

					<div id="profileHTML"></div>
					
					<script type="text/handlebars" id="profileTemplate">
						//<div class="profileName" value="@{{id}}"> @{{name}} </div> <div class="profileImage"> @{{message}} </div> <br/>
					</script>
				</div>
			</div>
		</div>

		<div id="chatContainer">
			<div class="panel panel-default">
				<div class="panel-heading">Chat</div>

				<div id="chatBox" class="panel-body">
					@foreach($messages as $message)
						<div class="chatName" value="{{ $message['relations']['user']['attributes']['id'] }}"> {{ $message['relations']['user']['attributes']['name'] }} </div> <div class="chatTime">{{ date('H:i:s', strtotime($message['attributes']['created_at'])) }} </div> <div class="chatMessage"> {{ $message['attributes']['message'] }} </div> <br/>
					@endforeach	
				</div>

				<script type="text/handlebars" id="chatTemplate">
					<div class="chatName" value="@{{id}}"> @{{name}} </div> <div class="chatMessage"> @{{message}} </div> <br/>
				</script>

				<form name="chatBoxForm" id="chatBoxForm" action="" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="user_id" value="{{ Auth::id() }}">
					<input type="text" name="message" id="chatBoxField" required>
					<input type="submit" value="send">
				</form>
			</div>
		</div>


		<div id="rightPanel">

			<div id="reddit">

			</div>

			<div id="settings">
				<div id="settingsTitle" class="panel panel-default">
					<div class="panel-heading">Settings</div>
				</div>

				<div id="settingsHTML">
					<form files="true" id="photoForm" action="uploadPhoto" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						    Select image to upload:
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input id="uploadButton" type="submit" value="Upload Image" name="submit">
					</form>

				</div>
			</div>

		</div>


	</div>
</div>

	<script>

		$(document).ready(function() {

			$('#chatBoxField').val("");

			updateReddit('programming');

			var chatTemplate = Handlebars.compile($('#chatTemplate').html());

			$('.chatName').click(function() {
					openProfile(this.getAttribute("value"));
				});

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
				console.log(JSON.parse(data));
				html = chatTemplate(JSON.parse(data))
				$("#chatBox").prepend(html);

				$('.chatName').click(function() {
					openProfile(this.getAttribute("value"));
				});

			});

			// $('#chatBoxForm').ajaxForm(function(result){
			// 	console.log(result);
			// });

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

	</script>

	<script>
		function openProfile() {
				$.get("userProfile/"+{{ Auth::user()->id }}, function(result) {
					$('#profileHTML').html(result);
				});
			}

		function openProfile(userID) {
			$.get("userProfile/"+userID, function(result) {
				$('#profileHTML').html(result);
			});
		}
	</script>


	<script type="text/javascript">
			$('#photoForm').submit(function(event) { 
				event.preventDefault();

			//	var formData = new FormData($('#photoForm'));
				//console.log(formData);

				var options = { 
			        //target:        '#output2',   // target element(s) to be updated with server response 
			        beforeSubmit:  showRequest,  // pre-submit callback 
			        success:       uploadedGood,  // post-submit callback 
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

		function uploadedGood(data) {
			console.log("H"+ data);
		}

		function openSettings() {
			$('#settings').toggle()
		}

		function showRequest(data) {
			console.log(data);
		}

	</script>

	<script>
		function updateReddit(subReddit) {
			$.get("/reddit/"+subReddit, function(result) {
				$('#reddit').html(result);
			});
		}

		function openStory(url) {
			// $.get("/reddit/getStory/"+url, function(result) {
			// 	console.log(result);
			// });
		}

	</script>


@endsection
