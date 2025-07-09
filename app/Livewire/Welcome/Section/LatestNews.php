<?php

namespace App\Livewire\Welcome\Section;

use Livewire\Component;
use App\Models\News;
use App\Services\PhotoSaleService;

class LatestNews extends Component
{

    public function render()
    {
        return view('livewire.welcome.section.latest-news', [
            'latests' => News::getSection('latest'),
            'photos_on_sales' => PhotoSaleService::getPhotosOnSale(),
        ]);
    }
}
