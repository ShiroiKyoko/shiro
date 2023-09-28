const apiKey = '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';

document.getElementById('send-button').addEventListener('click', () => {
    const userMessage = document.getElementById('user-message').value;
    addChatBubble('user', userMessage);
     const customCodePrompt = "Jawablah seperti remaja perempuan dengan menggunakan bahasa indonesia gaul dan non formal\n\n";
     const fullPrompt = customCodePrompt + userMessage;
     fetch('https:api.openai.com/v1/engines/davinci-codex/completions', {
         method: 'POST',
         headers: {
             'Content-Type': 'application/json',
             'Authorization': `Bearer ${apiKey}`,
         },
         body: JSON.stringify({
             prompt: fullPrompt,
         }),
     })
     .then(response => response.json())
     .then(data => {
         const aiResponse = data.choices[0].text;
         addChatBubble('ai', aiResponse);
     })
     .catch(error => console.error(error));
});

function addChatBubble(sender, message) {
    const chat = document.querySelector('.chat');
    const chatBubble = document.createElement('div');
    chatBubble.classList.add('chat-bubble', sender);
    chatBubble.innerHTML = `
        <div class="avatar">${sender === 'user' ? 'Anda' : 'Shiro AI'}</div>
        <div class="message">${message}</div>
    `;
    chat.appendChild(chatBubble);
    chat.scrollTop = chat.scrollHeight;
}
