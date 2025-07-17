<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Models\News;

class ClickBait extends Component
{
    public function render()
    {
        return view('livewire.welcome.section.click-bait',[
            'click_baits' => News::getSection('click bait'),
        ]);
    }
}
