<?php

namespace App\Livewire\Welcome\Section\Footer;

use App\Services\GalleryService;
use Livewire\Component;

class Gallery extends Component
{

    public function render()
    {
        return view('livewire.welcome.section.footer.gallery',[
            'galleries' =>GalleryService::getGalleriesLimit()
        ]);
    }
}
