<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat Application</title>
        <link rel="stylesheet" href="{{ asset('front/chat/chat.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>

    <body>
    <div>
        <!-- Menu Toggle Button -->
        <button class="menu-toggle">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Chat List Container -->
            <div class="chats-header">
                <h2>CHATS</h2>
            </div>
            <div class="start-new-chat">
                <button>START NEW CHAT With {{ \App\Models\Apply::find($CompanyId)->name }} Company</button>
            </div>

        <style>
            .start-new-chat {
                position: absolute;
                bottom: 0;
                left: 0;
                margin: 80px;
            }


        </style>

        <!-- Chat Container -->
        <div class="chat-container">
            <div class="chat-header">
                <div class="chat-header-left">
                    <div class="chat-header-title">
                        <span class="user-name">{{ \App\Models\Apply::find($CompanyId)->name }} Company </span>
                        <span class="last-online">LAST ONLINE: 4 HOURS AGO</span>
                    </div>
                </div>
                <div class="shared-media">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5
                                     16 5.91 13.09 3 9.5 3S3 5.91 3 9.5
                                     5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6
                                     0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5
                                     14 7.01 14 9.5 11.99 14 9.5 14z" />
                    </svg>
                    SHARED MEDIA (12)
                </div>
            </div>

            <div class="chat-body" wire:poll.3s>
                @foreach ($messages as $message)
                    <div class="message">
                        <strong>{{ $message['user']['name'] }}:</strong> {{ $message['content'] }}
                    </div>
                @endforeach
            </div>

            <div class="chat-footer">
                <div class="chat-input-container">
                    <div class="attach-button">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path d="M16.5 6v11.5c0 2.21-1.79 4-4
                                         4s-4-1.79-4-4V5c0-1.38
                                         1.12-2.5 2.5-2.5s2.5
                                         1.12 2.5 2.5v10.5c0
                                         .55-.45 1-1 1s-1-.45-1-1V6H10v9.5c0
                                         1.38 1.12 2.5 2.5 2.5s2.5-1.12
                                         2.5-2.5V5c0-2.21-1.79-4-4-4S7
                                         2.79 7 5v12.5c0 3.04 2.46 5.5
                                         5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z"/>
                        </svg>
                    </div>
                    <input type="text" class="chat-input" placeholder="Write your message..."
                           wire:model="newMessage" wire:keydown.enter="sendMessage">
                    <button class="send-button" wire:click="sendMessage">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path d="M2.01 21L23 12 2.01 3 2
                                         10l15 2-15 2z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('front/chat/chat.js') }}"></script>
{{--    @livewireScripts--}}
    </body>

    </html>
</div>
