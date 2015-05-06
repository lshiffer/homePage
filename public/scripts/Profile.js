
function Profile(userID) {
	this.userID = userID;
}

Profile.prototype.open = function() {
	$.get("userProfile/"+this.userID, function(result) {
					$('#profileHTML').html(result);
				});
}

Profile.prototype.open = function(id) {
	if (id==null)
		id=this.userID;
	console.log("h")
	$.get("userProfile/"+id, function(result) {
					$('#profileHTML').html(result);
				});
}