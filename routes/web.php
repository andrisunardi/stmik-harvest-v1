<?php

use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\AdmissionCalendarComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\BlogViewComponent;
use App\Http\Livewire\ContactUsComponent;
use App\Http\Livewire\EventComponent;
use App\Http\Livewire\EventViewComponent;
use App\Http\Livewire\FaqComponent;
use App\Http\Livewire\GalleryComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\InformationSystemComponent;
use App\Http\Livewire\OnlineRegistrationComponent;
use App\Http\Livewire\OurNetworkComponent;
use App\Http\Livewire\OurProfileComponent;
use App\Http\Livewire\OurValuesComponent;
use App\Http\Livewire\ProcedureComponent;
use App\Http\Livewire\ScholarshipsComponent;
use App\Http\Livewire\TuitionFeesComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back()->withInfo(trans('index.language_has_been_changed'));
})->name('locale');

Route::any('', HomeComponent::class)->name('index');
Route::any('about', AboutComponent::class)->name('about.index');
Route::any('our-profile', OurProfileComponent::class)->name('our-profile.index');
Route::any('our-values', OurValuesComponent::class)->name('our-values.index');
Route::any('our-network', OurNetworkComponent::class)->name('our-network.index');
Route::any('faq', FaqComponent::class)->name('faq.index');
Route::any('online-registration', OnlineRegistrationComponent::class)->name('online-registration.index');
Route::any('admission-calendar', AdmissionCalendarComponent::class)->name('admission-calendar.index');
Route::any('information-system', InformationSystemComponent::class)->name('information-system.index');
Route::any('tuition-fees', TuitionFeesComponent::class)->name('tuition-fees.index');
Route::any('scholarships', ScholarshipsComponent::class)->name('scholarships.index');
Route::any('procedure', ProcedureComponent::class)->name('procedure.index');
Route::any('gallery', GalleryComponent::class)->name('gallery.index');

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::any('', BlogComponent::class)->name('index');
    Route::any('{slug}', BlogViewComponent::class)->name('view');
});

Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
    Route::any('', EventComponent::class)->name('index');
    Route::any('{slug}', EventViewComponent::class)->name('view');
});

Route::any('contact-us', ContactUsComponent::class)->name('contact-us.index');
