
<div class="panel-heading">{{ $profileData[0]['user']['name'] }} </div>

<div class="container" id="container">
		<div id="profileImage"> 
			{!! HTML::image($profileData[0]['profileImagePath'], $profileData[0]['name'], array( 'width' => 120, 'height' => 105 )) !!}
		</div>
		<div id="profileDescription"> 
			{!! $profileData[0]['description'] !!} 
		</div>
</div>