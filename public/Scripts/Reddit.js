
function Reddit() {
	this.subReddit = "programming";
}

Reddit.prototype.update = function() {
	$.get("/reddit/"+this.subReddit, function(result) {
				$('#reddit').html(result);
			});
}

Reddit.prototype.openStory = function() {
	
}