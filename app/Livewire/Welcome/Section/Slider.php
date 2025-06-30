<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Models\News;

class Slider extends Component
{
    public function render()
    {
        return view('livewire.welcome.section.slider',[
            'slider_news'=>News::getCategory('slider')
        ]);
    }
}
