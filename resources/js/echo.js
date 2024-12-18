import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    encrypted: true,
});


window.Echo.channel('message')
    .listen('ProductEvent', (e) => {
        const messageList = document.getElementById('messageList');

        if (!document.querySelector(`#message-${e.message.id}`)) {
            const li = document.createElement('li');
            li.id = `message-${e.message.id}`;
            li.classList.add('list-group-item');
            li.innerHTML = `
                <strong>${e.message.name}</strong><br>
                <img src="images/${e.message.image}" alt="Image" class="img-fluid mt-2" style="max-width: 200px;">
            `;
            messageList.appendChild(li);
        } else {
            console.log(`Duplicate message ignored: ${e.message.id}`);
        }
    });


// console.log('salom');
