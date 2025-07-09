<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Models\Advert;

class Advertisement extends Component
{
    public $adverts;
    public $currentIndex = 0;
    public $interval = 3000; // 3 seconds in milliseconds

    public function mount()
    {
        $this->adverts = Advert::get(); // Or however you get your adverts
    }

    public function rotate()
    {
        $this->currentIndex = ($this->currentIndex + 1) % count($this->adverts);
    }

    #[On('slider-start')] 
    public function startSlider()
    {
        $this->dispatch('startSliderJS', interval: $this->interval);
    }

    public function render()
    {
        return view('livewire.welcome.section.advertisement');
    }
}
