
<div id="redditTitle" class="panel panel-default">
	<div class="panel-heading">{{ $redditData[0]->data->subreddit }}</div>
</div>

<div id="redditHTML">
	@foreach($redditData as $data)
		<div class="redditTitle" value="{{ $data->data->permalink }}"> 
			<a href="{{ $data->data->url }}" target="_blank"> {{ $data->data->title }} </a>
		</div> <br/>
	@endforeach
</div>