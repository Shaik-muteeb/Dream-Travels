const botResponses = {
    "hello": "Hi there! How can I help you?",
    "book a bus": "Sure! Please provide your travel details.",
    "thank you": "You're welcome! Have a great day!",
    "default": "I'm not sure how to help with that. Please ask something else."
};

function sendMessage() {
    const userInput = document.getElementById('userInput').value;
    if (userInput.trim() === "") return;

    const userMessage = document.createElement('div');
    userMessage.className = 'chat-message user';
    userMessage.innerText = userInput;
    document.getElementById('chatBox').appendChild(userMessage);

    document.getElementById('userInput').value = '';

    setTimeout(() => {
        const botMessage = document.createElement('div');
        botMessage.className = 'chat-message bot';
        botMessage.innerText = getBotResponse(userInput.toLowerCase());
        document.getElementById('chatBox').appendChild(botMessage);
        document.getElementById('chatBox').scrollTop = document.getElementById('chatBox').scrollHeight;
    }, 500);
}

function getBotResponse(input) {
    return botResponses[input] || botResponses["default"];
}