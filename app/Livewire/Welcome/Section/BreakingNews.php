<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Models\News;

class BreakingNews extends Component
{
    public function render()
    {
        return view('livewire.welcome.section.breaking-news',[
            'breakings'=>News::getSection('breaking')
        ]);
    }
}
