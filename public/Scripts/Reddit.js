
function Reddit() {
	this.subReddit = "programming";
}

Reddit.prototype.update = function() {
	$.get("/reddit/"+this.subReddit, function(result) {
				$('#redditHTML').html(result);
			});
}

Reddit.prototype.openStory = function() {
	
}