// DOM Elements
const tabButtons = document.querySelectorAll('.tab');
const acceptButtons = document.querySelectorAll('.btn-primary');
const declineButtons = document.querySelectorAll('.btn-secondary');
const searchInput = document.querySelector('.search-bar input');
const sidebarItems = document.querySelectorAll('.sidebar-item');
const navItems = document.querySelectorAll('.nav-item');

// Add mobile menu functionality
const menuToggle = document.querySelector('.menu-toggle');
const sidebar = document.querySelector('.sidebar');

menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    menuToggle.classList.toggle('active');
});

// Close sidebar when clicking outside
document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && 
        !menuToggle.contains(e.target) && 
        sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
        menuToggle.classList.remove('active');
    }
});

// Handle tab switching
tabButtons.forEach(tab => {
    tab.addEventListener('click', () => {
        tabButtons.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        // Here you can add logic to show different content based on the active tab
    });
});

// Handle connection actions
acceptButtons.forEach(button => {
    button.addEventListener('click', (e) => {
        const card = e.target.closest('.connection-card');
        const name = card.querySelector('.connection-name').textContent;
        
        // Add animation
        card.style.transition = 'opacity 0.3s ease-out';
        card.style.opacity = '0';
        
        setTimeout(() => {
            // Remove the card
            card.remove();
            
            // Update connection count
            updateConnectionCount();
            
            // Show notification
            showNotification(`You are now connected with ${name}`);
        }, 300);
    });
});

declineButtons.forEach(button => {
    button.addEventListener('click', (e) => {
        const card = e.target.closest('.connection-card');
        
        // Add animation
        card.style.transition = 'opacity 0.3s ease-out';
        card.style.opacity = '0';
        
        setTimeout(() => {
            // Remove the card
            card.remove();
            
            // Update connection count
            updateConnectionCount();
        }, 300);
    });
});

// Search functionality
searchInput.addEventListener('input', (e) => {
    const searchTerm = e.target.value.toLowerCase();
    const connections = document.querySelectorAll('.connection-card, .recent-connection');
    
    connections.forEach(connection => {
        const name = connection.querySelector('.connection-name').textContent.toLowerCase();
        const title = connection.querySelector('.connection-title').textContent.toLowerCase();
        
        if (name.includes(searchTerm) || title.includes(searchTerm)) {
            connection.style.display = '';
        } else {
            connection.style.display = 'none';
        }
    });
});

// Sidebar item selection
sidebarItems.forEach(item => {
    item.addEventListener('click', () => {
        sidebarItems.forEach(i => i.classList.remove('active'));
        item.classList.add('active');
    });
});

// Navigation item selection
navItems.forEach(item => {
    item.addEventListener('click', (e) => {
        // Don't prevent default if it's the chat link
        if (!item.querySelector('span').textContent.includes('CHAT')) {
            e.preventDefault();
        }
        
        navItems.forEach(i => i.classList.remove('active'));
        item.classList.add('active');
    });
});

// Update connection count
function updateConnectionCount() {
    const connectionCards = document.querySelectorAll('.connection-card');
    const connectionCountSpan = document.querySelector('.connection-highlight');
    if (connectionCountSpan) {
        connectionCountSpan.textContent = `${connectionCards.length} NEW CONNECTIONS`;
    }
}

// Show notification
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #b20c79;
        color: white;
        padding: 15px 25px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    `;
    notification.textContent = message;
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(() => {
        notification.style.opacity = '1';
    }, 100);
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}

// Profile stats counter animation
function animateStats() {
    const statsElement = document.querySelector('.profile-stats');
    const currentViews = parseInt(statsElement.textContent);
    let count = 0;
    
    const interval = setInterval(() => {
        count += 1;
        statsElement.textContent = `${count} views today ${count >= 367 ? '+32' : ''}`;
        
        if (count >= 367) {
            clearInterval(interval);
        }
    }, 10);
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    // Animate stats on page load
    animateStats();
    
    // Add hover effects to connection cards
    const cards = document.querySelectorAll('.connection-card, .recent-connection');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-2px)';
            card.style.transition = 'transform 0.2s ease-in-out';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });
}); 