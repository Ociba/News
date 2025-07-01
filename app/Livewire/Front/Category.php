<?php

namespace App\Livewire\Front;

use App\Models\News;
use Livewire\Component;

class Category extends Component
{
    public $category;
    public $perPage = 4;

    public function mount($category){
        $this->category =$category;
    }

    public function render()
    {
        return view('livewire.front.category',[
            'categories' =>News::getCategory($this->category,$this->perPage)
        ]);
    }
}
