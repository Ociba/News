<?php

namespace App\Livewire\Welcome\Section\Footer;

use Livewire\Component;
use App\Models\News;

class PopularNews extends Component
{
    public function render()
    {
        return view('livewire.welcome.section.footer.popular-news',[
            'populars'=>News::getSectionCategory('popular')
        ]);
    }
}
