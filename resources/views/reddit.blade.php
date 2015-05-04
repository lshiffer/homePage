	@foreach($redditData as $data)
		<div class="redditTitle" value="{{ $data->data->permalink }}"> 
			<a href="{{ $data->data->url }}" target="_blank"> {{ $data->data->title }} </a>
		</div> <br/>
	@endforeach