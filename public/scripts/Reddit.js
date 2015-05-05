
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
	$('.redditOption').click(function(event) { 
		selected = event.target.attributes.value.value;
		if (!reddit.isCurrent(selected)) {
			reddit.setSubReddit(selected);
			reddit.update();
	    	$('#redditTitle').html($('#redditSelect option:selected').val());
	    }
	});
}

Reddit.prototype.openStory = function() {
	
}