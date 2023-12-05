<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\ServicesByCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\Admin\AdminServicesByCategroyComponent;
use App\Http\Livewire\Admin\AdminAddServiceComponent;
use App\Http\Livewire\Admin\AdminEditServiceComponent;
use App\Http\Livewire\ServiceDetailsComponent;

use App\Http\Livewire\Admin\AdminSliderComponent;
use App\Http\Livewire\Admin\AdminAddSlideComponent;
use App\Http\Livewire\Admin\AdminEditSlideComponent;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\ChangeLocationComponent;
use App\Http\Livewire\Sprovider\SproviderProfileComponent;
use App\Http\Livewire\Sprovider\EditSproviderProfileComponent;

use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class)->name('home');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.services_categories');
Route::get('/{category_slug}/services',ServicesByCategoryComponent::class)->name('home.services_by_category');
Route::get('service/{service_slug}',ServiceDetailsComponent::class)->name('home.service_details');
Route::get('/autocomplete',[SearchController::class,'autocomplete'])->name('autocomplete');
Route::get('/search',[SearchController::class,'searchService'])->name('searchService');
Route::get('/change-location',ChangeLocationComponent::class)->name('home.change_location');
Route::get('/contact',ContactComponent::class)->name('home.contact');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// for Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
 Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard'); 
 Route::get('/admin/service-categories',AdminServiceCategoryComponent::class)->name('admin.service_categories');
 Route::get('/admin/service-categories/add',AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
 Route::get('/admin/service-category/edit/{category_id}',AdminEditServiceCategoryComponent::class)->name('admin.edit_service_category');
 Route::get('/admin/all-services',AdminServicesComponent::class)->name('admin.all_services');
 Route::get('/admin/{category_slug}/services',AdminServicesByCategroyComponent::class)->name('admin.services_by_category'); 

Route::get('/admin/services/add',AdminAddServiceComponent::class)->name('admin.add_service'); 
Route::get('/admin/service/edit/{service_slug}',AdminEditServiceComponent::class)->name('admin.edit_service');

Route::get('/admin/slider',AdminSliderComponent::class)->name('admin.slider');
Route::get('/admin/slide/add',AdminAddSlideComponent::class)->name('admin.add_slide');
Route::get('/admin/slide/edit/{slide_id}',AdminEditSlideComponent::class)->name('admin.edit_slide');
Route::get('/admin/contact',AdminContactComponent::class)->name('admin.contacts');


});

// for Sprovider
Route::middleware(['auth:sanctum', 'verified','authsprovider'])->group(function(){
    Route::get('/sprovider/dashboard',SproviderDashboardComponent::class)->name('sprovider.dashboard');
    Route::get('/sprovider/profile',SproviderProfileComponent::class)->name('sprovider.profile');
    Route::get('/sprovider/profile/edit',EditSproviderProfileComponent::class)->name('sprovider.edit_profile');
});


// for Customer

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
});