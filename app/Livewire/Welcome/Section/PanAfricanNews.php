<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Models\News;

class PanAfricanNews extends Component
{
    public function render()
    {
        return view('livewire.welcome.section.pan-african-news',[
            'pan_african_news'=>News::getSectionCategory('panafrican')
        ]);
    }
}
