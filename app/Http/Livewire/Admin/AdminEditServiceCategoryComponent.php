<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Livewire\WithFileUploads;


class AdminEditServiceCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $image;
    public $category_id;
    public $newimage;
    public $featured;
    
    public function mount($category_id)
    {
        $scategory=ServiceCategory::find($category_id);
        $this->category_id=$scategory->id;
        $this->name=$scategory->name;
        $this->slug=$scategory->slug;
        $this->featured=$scategory->featured;
        $this->image=$scategory->image;
    }

    public function generateSlug()
    {
        $this->slug=Str::slug($this->name,'-');
    }
    use WithFileUploads;
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validateOnly([
            'newimage'=>'required|mimes:jpeg,png',
            ]);
        }
    }

    public function updateServiceCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
            'newimage'=>'required|mimes:jpeg,png',
            ]);
        }
        $scategory=ServiceCategory::find($this->category_id);
        $scategory->name=$this->name;
        $scategory->slug=$this->slug;
        $scategory->featured=$this->featured;
        if($this->newimage)
        {
            $newImage=Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage=storeAs('categories', $imageName); 
            $scategory->newimage= $newImage;  
        }
        $scategory->save();
        session()->flash('message','Category has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-service-category-component')->layout('layouts.base');
    }
}
