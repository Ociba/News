<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Models\News;

class TrendingNews extends Component
{
    public function render()
    {
        return view('livewire.welcome.section.trending-news',[
            'trendings'=>News::getSection('trending')
        ]);
    }
}
