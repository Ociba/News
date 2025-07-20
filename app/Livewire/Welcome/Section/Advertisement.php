<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Services\AdvertService;
use Livewire\Attributes\On;

class Advertisement extends Component
{
    public $adverts = [];
    public $currentIndex = 0;
    public $interval = 3000; // 3 seconds in milliseconds

    public function mount()
    {
        $this->adverts = AdvertService::getCurrentlyActiveAdverts()->toArray();
    }

    public function rotate()
    {
        // Only rotate if we have adverts
        if (!empty($this->adverts)) {
            $this->currentIndex = ($this->currentIndex + 1) % count($this->adverts);
        }
    }

    #[On('slider-start')] 
    public function startSlider()
    {
        // Only start slider if we have adverts
        if (!empty($this->adverts)) {
            $this->dispatch('startSliderJS', interval: $this->interval);
        }
    }

    public function render()
    {
        return view('livewire.welcome.section.advertisement', [
            'hasAdverts' => !empty($this->adverts)
        ]);
    }
}