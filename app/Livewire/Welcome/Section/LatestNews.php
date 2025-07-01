<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Models\News;

class LatestNews extends Component
{
    public function render()
    {
        return view('livewire.welcome.section.latest-news',[
            'latests'=>News::getSection('latest')
        ]);
    }
}
