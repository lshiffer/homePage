@extends('app')

@section('content')
	{!! HTML::style('css/chat.css') !!}
	{!! HTML::style('css/profile.css') !!}
	{!! HTML::style('css/rightPanel.css') !!}
	{!! HTML::style('css/settings.css') !!}
	{!! HTML::script('https://cdn.socket.io/socket.io-1.3.4.js') !!}
	{!! HTML::script('scripts/Chat.js') !!}
	{!! HTML::script('scripts/Connection.js') !!}
	{!! HTML::script('scripts/Reddit.js') !!}
	{!! HTML::script('scripts/Profile.js') !!}
	{!! HTML::script('scripts/Settings.js') !!}
	{!! HTML::script('http://malsup.github.com/min/jquery.form.min.js') !!}
	{!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.1/handlebars.js') !!}

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
						<div class="chatName" value="{{ $message['relations']['user']['attributes']['id'] }}"> 
							{{ $message['relations']['user']['attributes']['name'] }} 
						</div> 
						<div class="chatTime">
							{{ date('H:i:s', strtotime($message['attributes']['created_at'])) }} 
						</div> 
						<div class="chatMessage"> 
							{{ $message['attributes']['message'] }} 
						</div> 
						<br/>
					@endforeach	
				</div>

				<script type="text/handlebars" id="chatTemplate">
					<div class="chatName" value="@{{id}}"> @{{name}} </div> <div class="chatTime"> @{{time}} </div> <div class="chatMessage"> @{{message}} </div> <br/>
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
				<div id="redditHeader" class="panel panel-default">
					<div id="redditTitle" class="panel-heading"> </div>
						<select id="redditSelect">
							@foreach($categories as $category)
								<option class="redditOption" value="{{$category}}"> {{ $category }} </option>
							@endforeach
						</select>
				</div>

				<div id="redditHTML">

				</div>

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
			chat = new Chat();

			connection = new Connection();
			connection.connectToChat();

			reddit = new Reddit();
			reddit.update();

			profile = new Profile({{ Auth::user()->id }});
			
			settings = new Settings();
		});
	</script>




@endsection
