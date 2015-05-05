
function Reddit() {
	this.subReddit = "programming";

	$('#redditTitle').html($('#redditSelect option:selected').val());

	this.buttonsInit();
}

Reddit.prototype.setSubReddit = function(subReddit) {
	this.subReddit = subReddit;
}

Reddit.prototype.update = function() {
	$.get("reddit/"+this.subReddit, function(result) {
				$('#redditHTML').html(result);
			});
}

Reddit.prototype.isCurrent = function(subReddit) {
	return subReddit == this.subReddit;
}

Reddit.prototype.buttonsInit = function() {
	$('#redditSelect').change(function(event) { 
		selected = event.target.value;
		if (!reddit.isCurrent(selected)) {
			reddit.setSubReddit(selected);
			reddit.update();
	    	$('#redditTitle').html($('#redditSelect option:selected').val());
	    }
	});

	$('#redditSelect').mouseover(function(event) {
		$('#redditHeaderDisplayInterior').css('border', '1px inset white');
	});

	$('#redditSelect').mouseout(function(event) {
		$('#redditHeaderDisplayInterior').css('border', '1px outset white');
	});
}

Reddit.prototype.openStory = function() {
	
}