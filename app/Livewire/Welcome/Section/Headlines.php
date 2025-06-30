<?php

namespace App\Livewire\Welcome\Section;

use App\Models\News;
use Livewire\Component;

class Headlines extends Component
{
    public function render()
    {
        return view('livewire.welcome.section.headlines',[
            'headlines'=>News::getCategory('headlines')
        ]);
    }
}
