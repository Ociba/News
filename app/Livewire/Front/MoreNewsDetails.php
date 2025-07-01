<?php

namespace App\Livewire\Front;

use App\Models\News;
use Livewire\Component;

class MoreNewsDetails extends Component
{
    public $newsId;

    public function mount($newsId){
        $this->newsId -$newsId;
    }

    public function render()
    {
        return view('livewire.front.more-news-details',[
            'more_details'=>News::getMoreNewsDetails($this->newsId),
            'trendings'=>News::getSection('trending'),
            'related_sections' =>$this->getRelatedSectionData()
        ]);
    }

    private function getRelatedSectionData(){
        $sectionId =News::whereId($this->newsId)->value('section_id');
        return News::where('section_id',$sectionId)->get();
    }
}
