<?php

// use App\Http\Livewire\CMS\Configuration\ActivityComponent;
// use App\Http\Livewire\CMS\Configuration\ConfigurationComponent;
// use App\Http\Livewire\CMS\Configuration\PermissionComponent;
// use App\Http\Livewire\CMS\Configuration\RoleComponent;
// use App\Http\Livewire\CMS\Configuration\SettingComponent;
// use App\Http\Livewire\CMS\Configuration\UserComponent;
// use App\Http\Livewire\CMS\Blog\BlogComponent;
// use App\Http\Livewire\CMS\Blog\BlogCategoryComponent;
// use App\Http\Livewire\CMS\Event\EventComponent;
// use App\Http\Livewire\CMS\Event\EventCategoryComponent;
// use App\Http\Livewire\CMS\AdmissionCalendarComponent;
// use App\Http\Livewire\CMS\BannerComponent;
// use App\Http\Livewire\CMS\FaqComponent;
// use App\Http\Livewire\CMS\GalleryComponent;
// use App\Http\Livewire\CMS\NetworkComponent;
// use App\Http\Livewire\CMS\OfferComponent;
// use App\Http\Livewire\CMS\ProcedureComponent;
// use App\Http\Livewire\CMS\SliderTestimony;
// use App\Http\Livewire\CMS\TestimonyComponent;
// use App\Http\Livewire\CMS\TuitionFeeComponent;
// use App\Http\Livewire\CMS\ValueComponent;
use Illuminate\Support\Facades\Route;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back()->withInfo(trans('index.language_has_been_changed'));
})->name('locale');

// Route::any('login', LoginComponent::class)->name('login.index');
// Route::any('forgot-password', ForgotPasswordComponent::class)->name('forgot-password.index');

// Route::group(['middleware' => ['auth', 'role:Super User|Board Of Directors|Admin|Finance|Sales|Development|Staff']], function () {
//     Route::any('', HomeComponent::class)->name('index');

//     Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
//         Route::any('', BlogComponent::class)->name('index')->middleware('permission:Blog');
//         Route::any('category', BlogCategoryComponent::class)->name('category.index')->middleware('permission:Blog Category');
//     });

//     Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
//         Route::any('', EventComponent::class)->name('index')->middleware('permission:Event');
//         Route::any('category', EventCategoryComponent::class)->name('category.index')->middleware('permission:Event Category');
//     });

//     Route::any('admission-calendar', AdmissionCalendarComponent::class)->name('admission-calendar.index')->middleware('permission:Admission Calendar');
//     Route::any('banner', BannerComponent::class)->name('banner.index')->middleware('permission:Banner');
//     Route::any('faq', FaqComponent::class)->name('faq.index')->middleware('permission:Faq');
//     Route::any('gallery', GalleryComponent::class)->name('gallery.index')->middleware('permission:Gallery');
//     Route::any('network', NetworkComponent::class)->name('network.index')->middleware('permission:Network');
//     Route::any('offer', OfferComponent::class)->name('offer.index')->middleware('permission:Offer');
//     Route::any('procedure', ProcedureComponent::class)->name('procedure.index')->middleware('permission:Procedure');
//     Route::any('slider', SliderTestimony::class)->name('slider.index')->middleware('permission:Slider');
//     Route::any('testimony', TestimonyComponent::class)->name('testimony.index')->middleware('permission:Testimony');
//     Route::any('tuition-fee', TuitionFeeComponent::class)->name('tuition-fee.index')->middleware('permission:Tuition Fee');
//     Route::any('value', ValueComponent::class)->name('value.index')->middleware('permission:Value');

//     Route::group(['prefix' => 'configuration', 'as' => 'configuration.', 'middleware' => ['role:Super User']], function () {
//         Route::any('', ConfigurationComponent::class)->name('index')->middleware('permission:Configuration');
//         Route::any('user', UserComponent::class)->name('user.index')->middleware('permission:User');
//         Route::any('activity', ActivityComponent::class)->name('activity.index')->middleware('permission:Activity');
//         Route::any('role', RoleComponent::class)->name('role.index')->middleware('permission:Role');
//         Route::any('permission', PermissionComponent::class)->name('permission.index')->middleware('permission:permission');
//         Route::any('setting', SettingComponent::class)->name('setting.index')->middleware('permission:Setting');
//     });

//     Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
//         Route::any('', ProfileComponent::class)->name('index');
//         Route::any('activity-log', ActivityLogComponent::class)->name('activity-log');
//         Route::any('edit-profile', EditProfileComponent::class)->name('edit-profile');
//         Route::any('change-password', ChangePasswordComponent::class)->name('change-password');
//     });

//     Route::any('logout', LogoutComponent::class)->name('logout.index');
// });
