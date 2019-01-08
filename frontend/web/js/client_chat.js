if (!window.WebSocket) {
    alert('Your browser doesn\'t support Websockets ');
}
let channel = document.getElementsByName('channel')[0].value;
let webSocket = new WebSocket(`ws://task.local:8080?channel=${channel}`);
document.getElementById("chat_form")
    .addEventListener('submit', function (event) {
        let data = {
            message: this.message.value,
            user_id: this.user_id.value,
            channel: this.channel.value,
        };

        webSocket.send(JSON.stringify(data));
        event.preventDefault();
        return false;
    });
webSocket.onmessage = function (event) {
    let data = JSON.parse(event.data);
    let messageContainer = document.createElement("tr");

    let senderContainer = document.createElement("td");
    senderContainer.innerHTML = data.sender + ": ";

    let msgContainer = document.createElement("td");
    msgContainer.innerHTML = data.message;

    let timeContainer = document.createElement("td");
    timeContainer.innerHTML = data.time;

    messageContainer.appendChild(senderContainer);
    messageContainer.appendChild(msgContainer);
    messageContainer.appendChild(timeContainer);
    document.getElementById("root_chat")
        .appendChild(messageContainer);
};
