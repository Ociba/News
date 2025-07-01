<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Models\News;

class FeaturedNews extends Component
{
    public function render()
    {
        return view('livewire.welcome.section.featured-news',[
            'featured_news'=>News::getSectionCategory('feautured')
        ]);
    }
}
