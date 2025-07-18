<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Models\Subscribe;

class NewsLetter extends Component
{
    public $email;
    public $success = false;

    protected $rules = [
        'email' => 'required|email|unique:subscribes,email',
    ];

    protected $messages = [
        'email.required' => 'The email address is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already subscribed.',
    ];

    public function subscribe()
    {
        $this->validate();

        Subscribe::create([
            'email' => $this->email,
        ]);

        $this->success = true;
        $this->reset('email');
        
        // Optional: Clear success message after 5 seconds
        $this->dispatch('notify', message: 'Thank you for subscribing!');
        $this->dispatch('alert', type: 'success', message: 'Thank you for subscribing!');
    }

    public function render()
    {
        return view('livewire.welcome.section.news-letter');
    }
}