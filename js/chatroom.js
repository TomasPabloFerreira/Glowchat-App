'use strict'

/*
	EXECUTION
	*/

// Main execution
var messages_div = document.querySelector("#messages");

var messages = [];

getMessages()
.then( data => data.json() )
.then( data => {
	messages = data;
	putMessages( messages_div, messages );
});


scrollToBottom(messages_div);

/*
each 1 second call 

var added = verifyNewMessages ();
if (added) {
	// var new_messages = getMessages( new_messages_count);
	// putMessages (messagesDiv, new_messages)
}

*/

/*
Cambios a realizar para reducir la complejidad de carga de mensajes:

- Agregar campo messages_count a la tabla chat_rooms.
Ver si cambia la cantidad de mensajes para verificar si se enviaron mensajes.
Si cambia ese valor, hace un select limit (cantidad actual - cantidad inicial)
y agrega esos mensajes al final del messages_div.

- Agregar al principio del messages_div un boton que sea cargar más, y hacer el 
primer select limitando la cantidad de elementos.
*/


/*
	TESTING
	*/

// Testing data
// var message = {
// 	user_id: 7,
// 	message: "MY MESSAGE",
// 	datetime: "2019-11-16 18:48:13"
// };

// var htmlMessage = getHtmlMessage( message );

// messages_div.append(htmlMessage);

/*
	FUNCTIONS
	*/

// Get messages from ajax petition
function getMessages ( count ) {

	return fetch('get-messages.php');
}


// Verify if new messages were sents
function verifyNewMessages () {

	// if (count changed from chat_rooms )

	// return addedCount;

}


// Put Messages into messages_div
function putMessages ( messagesDiv, messages ) {

	messages.map( (message,i) => {
		messages_div.append(getHtmlMessage(message));
	});
}

function getHtmlMessage ( message ) {

	var sessionid = document.querySelector("#sessionid").value;

	var htmlMessage = getDiv();
	htmlMessage.className = "row";
	//	<div class="row">

	if ( message.user_id == sessionid) {

		generateLoggedUserMessage (htmlMessage, message, sessionid);

	} else {

		generateNotLoggedUserMessage(htmlMessage, message, sessionid);
	}

	return htmlMessage;
}

// Get html message of the logged user
function generateLoggedUserMessage (htmlMessage, message, sessionid) {

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

	image.src = "images/"+ sessionid +".jpg";

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
function generateNotLoggedUserMessage (htmlMessage, message, sessionid) {

	var col_8 = getDiv();
	col_8.className = "col-lg-8";

	var container = getDiv();
	container.className = "container darker";
	
	// image
	var image = document.createElement("IMG");

	image.src = "images/"+ sessionid +".jpg";

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

	messages_div.scrollTop = messages_div.scrollHeight;
}
