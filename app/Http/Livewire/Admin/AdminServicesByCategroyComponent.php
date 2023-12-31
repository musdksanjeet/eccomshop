<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;
use Livewire\WithPagination;

class AdminServicesByCategroyComponent extends Component
{
    use WithPagination;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug=$category_slug;
    }

     public function deleteService($service_id)
    {
        $service=Service::find($service_id);
         if($service->thumnail)
        {
            unlink('images/services/thubnails'. '/' . $service->thumbnail);
        }
        if($service->image)
        {
            unlink('images/services'. '/' . $service->image);
        }
        $service->delete();
        session()->flash('message','Service has been deleted successfully!');
    }
    
    public function render()
    {
        $category=ServiceCategory::where('slug',$this->category_slug)->first();
        $services=Service::where('service_category_id',$category->id)->paginate(10);
        return view('livewire.admin.admin-services-by-categroy-component',['category'=>$category,'services'=>$services])->layout('layouts.base');
    }
}
