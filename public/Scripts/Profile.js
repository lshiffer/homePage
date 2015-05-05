
function Profile(userID) {
	this.userID = userID;
	console.log(userID);
}

Profile.prototype.open = function() {
	$.get("userProfile/"+this.userID, function(result) {
					$('#profileHTML').html(result);
				});
}

Profile.prototype.open = function(id) {
	$.get("userProfile/"+id, function(result) {
					$('#profileHTML').html(result);
				});
}