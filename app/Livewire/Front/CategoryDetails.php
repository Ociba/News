<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\News;
use App\Models\Comment;

class CategoryDetails extends Component
{
    public $newsId;
    public $name;
    public $email;
    public $message;

  
    public function mount($newsId){
        $this->newsId = $newsId;
    }

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email',
        'message' => 'required|min:5|max:500',
    ];

    // Customize validation error messages
    protected $messages = [
        'name.required' => 'Name is required',
        'email.required' => 'Email is required',
        'message.required' => 'Message is required',
    ];

    public function submitComment()
    {
        // Validate inputs
        $this->validate();

        Comment::create([
            'news_id' => $this->newsId,
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
        // Reset form fields
        $this->reset(['name', 'email', 'message']);
        
        // Show success message
        session()->flash('success', 'Comment submitted successfully!');
    }
    
    public function render()
    {
        return view('livewire.front.category-details',[
            'details' => News::getCategoryNewsDetails($this->newsId),
            'trendings'=>News::getSection('trending')
        ]);
    }
}
