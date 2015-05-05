
function Connection() {
	/*
		'domain'
			Change to current domain.
				'localhost' for development environment.
				'webdomain'.'TLD' for live server.

		Set listener for the event 'eventMessage'
	*/	
	this.domain = "lukeshiffer.com";
	this.socket = io.connect('http://'+this.domain+':8890');
}

Connection.prototype.connectToChat = function() {
	this.socket.on('channelChat', function(data) {
		chat.appendMessage(JSON.parse(data));
	});
}
