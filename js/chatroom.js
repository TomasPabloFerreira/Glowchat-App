'use strict'

/*
	DATA
	*/

// Chat messages
var chatMessagesData = {
	totalMessages: null,
	loadedMessages: null,
	messages: null,
};

// Elements
var chatElements = {
	messages_div: null,
	chatRoomId: null,
	sessionid: null,
	sendMessageForm: null,
	message: null
};

/*
	EXECUTION
	*/

// Main execution

loadElements ();
var messages = [];

getMessages( 30 )
.then( () => {
	putMessages();
});

// MESSAGE SENDER
chatElements.sendMessageForm.addEventListener( "submit", (e) => {

	// PREVENT SUBMIT
	e.preventDefault();

	// APPEND FORM DATA
	var data = new FormData();
	data.append('message', chatElements.message.value);
	data.append('user_id', chatElements.sessionid);
	data.append('chat_room_id', chatElements.chatRoomId);

	// INIT AJAX
	var xhr = new XMLHttpRequest();
	xhr.open('POST', "sendmessage.php", true)

	// WHEN THE PROCESS IS COMPLETE
	xhr.onload = function(){
		console.log("Mensaje enviado");
	};

	// SEND
	xhr.send(data);

	// RESTORE INPUT VALUE
	chatElements.message.value = "";

});

getMessagesCount()
.then( () => {
	
	chatMessagesData.loadedMessages = parseInt(chatMessagesData.totalMessages);

	keepChatUpdated ();
});

/*

- Agregar al principio del messages_div un boton que sea cargar más.

*/

/*
	FUNCTIONS
	*/

// Get messages from ajax petition
function getMessages ( count ) {

	return fetch("get-messages.php?chatRoomId='" + chatElements.chatRoomId + "'&messagesCount=" + count )
	.then( data => data.json() )
	.then( data => chatMessagesData.messages = data);
}

// Get messages count
function getMessagesCount () {
	return fetch("get-messages-count.php?chatRoomId='" + chatElements.chatRoomId + "'")
	.then( data => data.json())
	.then( data => {
		chatMessagesData.totalMessages = data[0].messages_count;
	});
}

function loadElements () {

	chatElements.messages_div = document.querySelector("#messages");
	chatElements.sendMessageForm = document.querySelector("#sendMessageForm");
	chatElements.message = document.querySelector("#message");
	chatElements.chatRoomId = document.querySelector("#chat_room_id").value;
	chatElements.sessionid = document.querySelector("#sessionid").value;
}

// Verify each 1 second if there are new messages, if does then put new messages
function keepChatUpdated () {

	for (let i=1; i<50000; i++) {
		setTimeout( function timer(){

			getMessagesCount()
			.then( () => {

				var added = verifyNewMessages ();
				chatMessagesData.loadedMessages += added;

				if (added) {
					getMessages( added )
					.then( () => {
						putMessages ();
					});
				}
			});
		}, i*500 );
	}
}

// Verify if new messages were sents
function verifyNewMessages () {

	if ( chatMessagesData.totalMessages != chatMessagesData.loadedMessages ) {
		return (chatMessagesData.totalMessages - chatMessagesData.loadedMessages);
	} else {
		return 0;
	}
}

// Put Messages into messages_div
function putMessages () {

	chatMessagesData.messages.map( (message,i) => {
		chatElements.messages_div.append(getHtmlMessage(message));
	});
	
	scrollToBottom();
}

function getHtmlMessage ( message ) {

	var htmlMessage = getDiv();
	htmlMessage.className = "row";
	//	<div class="row">

	if ( message.user_id == chatElements.sessionid) {

		generateLoggedUserMessage (htmlMessage, message );

	} else {

		generateNotLoggedUserMessage(htmlMessage, message );
	}

	return htmlMessage;
}

// Get html message of the logged user
function generateLoggedUserMessage ( htmlMessage, message ) {

	// col
	var col_4 = getDiv();
	col_4.className = "col-lg-4";
	htmlMessage.append(col_4);

	// col
	var col_8 = getDiv();
	col_8.className = "col-lg-8";

	// container
	var container = getDiv();
	container.className = "container darker";

	// image
	var image = document.createElement("IMG");

	image.src = "images/"+ chatElements.sessionid +".jpg";

	image.onerror = function(){
		image.src = "images/perfil default.png";
	}
	image.alt = "Avatar";
	image.className = "right";

	// p
	var p = getP();
	p.className = "text-right";
	p.append(message.message);

	// span datatime
	var span = getSpan();
	span.append(message.datetime);
	span.className = "time-left";

	container.append(image);
	container.append(p);
	container.append(span);

	col_8.append(container);
	htmlMessage.append(col_8);

/*
	<div class="col-lg-4"></div>
	<div class="col-lg-8">
		<div class="container darker">
			<p class="text-right">message</p>
		</div>
	</div>
	*/
}

// Get html message of the not logged user
function generateNotLoggedUserMessage ( htmlMessage, message ) {

	var col_8 = getDiv();
	col_8.className = "col-lg-8";

	var container = getDiv();
	container.className = "container darker";
	
	// image
	var image = document.createElement("IMG");

	image.src = "images/"+ chatElements.sessionid +".jpg";

	image.onerror = function(){
		image.src = "images/perfil default.png";
	}
	image.alt = "Avatar";

	// p
	var p = getP();
	p.className = "text-left";
	p.append(message.message);

	// span datatime
	var span = getSpan();
	span.append(message.datetime);
	span.className = "time-right";

	container.append(image);
	container.append(p);
	container.append(span);

	col_8.append(container);
	htmlMessage.append(col_8);

	var col_4 = getDiv();
	col_4.className = "col-lg-4";
	htmlMessage.append(col_4);

/*
	<div class="col-lg-8">
		<div class="container darker">
			<p class="text-left">message</p>
		</div>
	</div>
	<div class="col-lg-4"></div>
	*/
}

function getDiv() {
	return document.createElement("div");
}

function getP() {
	return document.createElement("p");
}

function getSpan() {
	return document.createElement("span");
}

// Auto scroll to bottom
function scrollToBottom (messages_div) {

	chatElements.messages_div.scrollTop = chatElements.messages_div.scrollHeight;
}
