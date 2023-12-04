<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;

class HomeComponent extends Component
{
    public function render()
    {
        $scategories=ServiceCategory::inRandomOrder()->take(18)->get();
        $fserverices=Service::where('featured',1)->inRandomOrder()->take(8)->get();
        $fscecategories = ServiceCategory::where('featured',1)->inRandomOrder()->take(8)->get();
        
        return view('livewire.home-component',['scategories'=>$scategories,'fserverices'=>$fserverices,'fscecategories'=>$fscecategories])->layout('layouts.base');
    }
}
