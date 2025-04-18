// Add these at the beginning of the file
const menuToggle = document.querySelector('.menu-toggle');
const chatListContainer = document.querySelector('.chat-list-container');

// Add menu toggle functionality
menuToggle.addEventListener('click', () => {
    chatListContainer.classList.toggle('active');
    menuToggle.classList.toggle('active');
});

// Close menu when clicking outside
document.addEventListener('click', (e) => {
    if (!chatListContainer.contains(e.target) && 
        !menuToggle.contains(e.target) && 
        chatListContainer.classList.contains('active')) {
        chatListContainer.classList.remove('active');
        menuToggle.classList.remove('active');
    }
});

// Chat data
const chatData = {
    currentUser: {
        id: 1,
        name: 'Kyle Fisher',
        avatar: 'avatar1.jpg'
    },
    contacts: [
        {
            id: 2,
            name: 'Darlene Black',
            avatar: 'avatar2.jpg',
            lastMessage: 'Hey, how is your project?',
            isOnline: true,
            lastSeen: '2 minutes ago'
        },
        {
            id: 3,
            name: 'Theresa Steward',
            avatar: 'avatar3.jpg',
            lastMessage: 'Hi, Limey. I have a work for you...',
            isOnline: true,
            lastSeen: 'online'
        },
        {
            id: 4,
            name: 'Brandon Wilson',
            avatar: 'avatar4.jpg',
            lastMessage: 'I am Russian and I am learning E...',
            isOnline: false,
            lastSeen: '5 hours ago'
        },
        {
            id: 5,
            name: 'Kyle Fisher',
            avatar: 'avatar5.jpg',
            lastMessage: 'So, it\'s up to you!',
            isOnline: true,
            lastSeen: 'online'
        },
        {
            id: 6,
            name: 'Audrey Alexander',
            avatar: 'avatar6.jpg',
            lastMessage: 'When you got it?',
            isOnline: true,
            lastSeen: '3 minutes ago'
        }
    ],
    messages: [
        {
            id: 1,
            senderId: 1,
            receiverId: 2,
            content: 'Hi, Kyle. How are you doing? Did you get that job yesterday?',
            timestamp: '4:20 PM',
            status: 'sent'
        },
        {
            id: 2,
            senderId: 2,
            receiverId: 1,
            content: 'Nope, they kicked me out of the office!',
            timestamp: '4:23 PM',
            status: 'received'
        },
        {
            id: 3,
            senderId: 1,
            receiverId: 2,
            content: 'Wow! I can invite you in my new project. We need a product designer right now!',
            timestamp: '4:30 PM',
            status: 'sent'
        },
        {
            id: 4,
            senderId: 2,
            receiverId: 1,
            content: 'It\'ll be great! I need this job, but...',
            timestamp: '4:23 PM',
            status: 'received'
        }
    ]
};

// DOM Elements
const chatList = document.querySelector('.chat-list');
const chatBody = document.querySelector('.chat-body');
const chatInput = document.querySelector('.chat-input');
const sendButton = document.querySelector('.send-button');
const attachButton = document.querySelector('.attach-button');

// Render chat list
function renderChatList() {
    chatList.innerHTML = chatData.contacts.map(contact => `
        <div class="chat-list-item ${contact.id === 2 ? 'active' : ''}" data-id="${contact.id}">
            <img src="${contact.avatar}" alt="${contact.name}" class="avatar">
            <div class="chat-list-item-info">
                <div class="chat-list-item-name">${contact.name}</div>
                <div class="chat-list-item-message">
                    ${contact.isOnline ? '<span class="online-status"></span>' : ''}
                    ${contact.lastMessage}
                </div>
            </div>
        </div>
    `).join('');
}

// Render messages
function renderMessages() {
    const messages = chatData.messages;
    chatBody.innerHTML = `
        <div class="chat-date-divider">YESTERDAY, 23 AUG</div>
        ${messages.map(message => `
            <div class="message ${message.senderId === chatData.currentUser.id ? 'sent' : 'received'}">
                <div class="message-content">${message.content}</div>
                <div class="message-time">
                    ${message.status === 'sent' ? '<span class="double-check">✓✓</span>' : ''}
                    ${message.timestamp}
                </div>
            </div>
        `).join('')}
    `;
    // Scroll to bottom
    chatBody.scrollTop = chatBody.scrollHeight;
}

// Send message
function sendMessage(content) {
    if (!content.trim()) return;

    const newMessage = {
        id: chatData.messages.length + 1,
        senderId: chatData.currentUser.id,
        receiverId: 2, // Current active chat
        content: content,
        timestamp: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
        status: 'sent'
    };

    chatData.messages.push(newMessage);
    renderMessages();
    chatInput.value = '';
}

// Event Listeners
sendButton.addEventListener('click', () => {
    sendMessage(chatInput.value);
});

chatInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        sendMessage(chatInput.value);
    }
});

chatList.addEventListener('click', (e) => {
    const chatItem = e.target.closest('.chat-list-item');
    if (chatItem) {
        document.querySelectorAll('.chat-list-item').forEach(item => {
            item.classList.remove('active');
        });
        chatItem.classList.add('active');
    }
});

// Initialize chat
renderChatList();
renderMessages(); 