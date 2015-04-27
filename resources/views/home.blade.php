@extends('app')

@section('content')
{!! HTML::script('//code.jquery.com/jquery-1.11.2.min.js') !!}
{!! HTML::script('//code.jquery.com/jquery-migrate-1.2.1.min.js') !!}
{!! HTML::script('https://cdn.socket.io/socket.io-1.3.4.js') !!}

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div id="chatBox" class="panel-body">
					You are logged in!
				</div>
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
			$("#chatBox").append("<p>"+data+"</p>");
		});
	</script>
@endsection
