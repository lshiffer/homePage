@extends('app')

@section('content')
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div id="messages"></div>
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
			$("#messages").append("<p>"+data+"</p>");
		});
	</script>

@endsection
