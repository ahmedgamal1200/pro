<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $messages;
    public $newMessage;

    public $CompanyId;

    public function mount($id)
    {
        $this->CompanyId = $id;
        $this->messages = Message::with('user')
            ->latest()
            ->take(20)
            ->get()
            ->reverse()
            ->toArray();
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'user_id' => Auth::id(),
            'content' => $this->newMessage,
        ]);

        $this->messages = array_merge($this->messages, [$message]);
        $this->newMessage = '';
    }
    public function render()
    {
        return view('livewire.chat')->layout('layouts.app');
    }
}
