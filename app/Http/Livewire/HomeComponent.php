<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Slider;

class HomeComponent extends Component
{
    public function render()
    {
        $scategories=ServiceCategory::inRandomOrder()->take(18)->get();
        $fserverices=Service::where('featured',1)->inRandomOrder()->take(8)->get();
        $fscecategories = ServiceCategory::where('featured',1)->inRandomOrder()->take(8)->get();
        $sid=ServiceCategory::whereIn('slug',['ac','tv','refrigerator','geyser','water-purifier'])->get()->pluck('id');
        $aservices = Service::whereIn('service_category_id',$sid)->inRandomOrder()->take(8)->get();
        $sliders = Slider::where('status',1)->get();
       
        return view('livewire.home-component',['scategories'=>$scategories,'fserverices'=>$fserverices,'fscecategories'=>$fscecategories,'aservices'=>$aservices,'sliders'=>$sliders])->layout('layouts.base');
    }
}
