if (!window.WebSocket) {
    alert('Your browser doesn\'t support Websockets ');
}
let channel = document.getElementsByName('channel')[0].value;
console.log(channel);
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
    let data = event.data;
    let messageContaner = document.createElement("div");
    let textNode = document.createTextNode(data);
    messageContaner.appendChild(textNode);
    document.getElementById("root_chat")
        .appendChild(messageContaner);
};
