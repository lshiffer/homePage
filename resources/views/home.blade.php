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

				<form id="chatBoxForm" action="sendChatMessage" method="POST">
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
				$('#chatBoxField').val("");
				console.log(result);
			});
		});

		function sendChatMessage() {
			console.log("g");
			// $.post('sendChatMessage', function(result){
			// 	console.log(result);
			// });
		}

	</script>
@endsection
