<?php

use App\Http\Controllers\Adminpanel\BankGuaranteeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Adminpanel\UserController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Adminpanel\SeafarerController;
use App\Http\Controllers\Adminpanel\VesselListController;
use App\Http\Controllers\Adminpanel\LogActivityController;
use App\Http\Controllers\Adminpanel\OnboardListController;
use App\Http\Controllers\Adminpanel\RequestFormController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Adminpanel\ClientManagmentController;
use App\Http\Controllers\Adminpanel\OnboardCheckListController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Adminpanel\Masterdata\CountryController;
use App\Http\Controllers\Adminpanel\Masterdata\PostionController;
use App\Http\Controllers\Adminpanel\Masterdata\LocationController;
use App\Http\Controllers\Adminpanel\ClientHistoricalDataController;
use App\Http\Controllers\Adminpanel\InvoiceController;
use App\Http\Controllers\Adminpanel\Masterdata\PostionChangeStatus;
use App\Http\Controllers\Adminpanel\Masterdata\DocumentTypeController;
use App\Http\Controllers\Adminpanel\Masterdata\PostionGetAjaxPosition;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Adminpanel\Masterdata\ExperienceLevelController;
// use App\Http\Controllers\Adminpanel\Masterdata\QualificationController;
use App\Http\Controllers\Adminpanel\Masterdata\VesselTypeController;
use App\Http\Controllers\Adminpanel\ReportController;
use App\Http\Controllers\Adminpanel\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Adminpanel\TopBannerController;
use App\Http\Controllers\Adminpanel\Home\MainSliderController;
use App\Http\Controllers\Adminpanel\Home\AboutUsController;
use App\Http\Controllers\Adminpanel\Home\SummaryController;
use App\Http\Controllers\Adminpanel\Home\StayHomeController;
use App\Http\Controllers\Adminpanel\Home\FoodHomeController;
use App\Http\Controllers\Adminpanel\Home\RoomHomeController;
use App\Http\Controllers\Adminpanel\ContactUs\ContactUsController;
use App\Http\Controllers\Adminpanel\ContactUs\InquiryController;
use App\Http\Controllers\Adminpanel\Gallery\GalleryCategoryController;
use App\Http\Controllers\Adminpanel\Experience\ExperienceController;
use App\Http\Controllers\Adminpanel\Experience\ExperienceContentController;
use App\Http\Controllers\Adminpanel\Gallery\AllCategoryController;
use App\Http\Controllers\Adminpanel\Gallery\ImageController;
use App\Http\Controllers\Adminpanel\Rooms\RoomsImageController;
use App\Http\Controllers\Adminpanel\Gallery\VideoController;
use App\Http\Controllers\Adminpanel\Stay\StayContentController;
use App\Http\Controllers\Adminpanel\Stay\FeaturesController;
use App\Http\Controllers\Adminpanel\Stay\PromotionController;
use App\Http\Controllers\Adminpanel\Rooms\RoomsController;
use App\Http\Controllers\Adminpanel\MetaTagController;
use App\Models\AllCategory;

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::put('update-role', [RoleController::class, 'update'])->name('update-role');
    Route::resource('users', UserController::class);
    Route::get('users-list', [UserController::class, 'list'])->name('users-list');
    Route::put('save-user', [UserController::class, 'update'])->name('save-user');
    Route::get('changestatus-user/{id}', [UserController::class, 'activation'])->name('changestatus-user');
    Route::get('blockuser/{id}', [UserController::class, 'block'])->name('blockuser');
    Route::post('checkEmailAvailability', [UserController::class, 'checkEmailAvailability'])->name('checkEmailAvailability');
    Route::post('checkNICAvailability', [UserController::class, 'checkNICAvailability'])->name('checkNICAvailability');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('log-activity-list', [LogActivityController::class, 'list'])->name('log-activity-list');

    Route::get('main-slider', [MainSliderController::class, 'index'])->name('main-slider');
    Route::post('new-main-slider', [MainSliderController::class, 'store'])->name('new-main-slider');
    Route::get('main-slider-list', [MainSliderController::class, 'list'])->name('main-slider-list');
    Route::get('/edit-main-slider/{id}', [MainSliderController::class, 'edit'])->name('edit-main-slider');
    Route::put('save-main-slider', [MainSliderController::class, 'update'])->name('save-main-slider');
    Route::get('changestatus-main-slider/{id}', [MainSliderController::class, 'activation'])->name('changestatus-main-slider');
    Route::get('blockmainslider/{id}', [MainSliderController::class, 'block'])->name('blockmainslider');

    Route::get('about-us-edit', [AboutUsController::class, 'index'])->name('about-us-edit');
    Route::put('save-about-us', [AboutUsController::class, 'update'])->name('save-about-us');

    Route::get('contact-us-edit', [ContactUsController::class, 'index'])->name('contact-us-edit');
    Route::put('save-contact-us', [ContactUsController::class, 'update'])->name('save-contact-us');

    Route::get('inquiry-list', [InquiryController::class, 'index'])->name('inquiry-list');
    Route::get('inquiry-view/{id}', [InquiryController::class, 'view'])->name('inquiry-view');

    Route::get('gallery-detail', [GalleryCategoryController::class, 'index'])->name('gallery-detail');
    Route::post('new-gallery', [GalleryCategoryController::class, 'store'])->name('new-gallery');
    Route::get('gallery-list', [GalleryCategoryController::class, 'list'])->name('gallery-list');
    Route::get('/edit-gallery/{id}', [GalleryCategoryController::class, 'edit'])->name('edit-gallery');
    Route::put('save-gallery', [GalleryCategoryController::class, 'update'])->name('save-gallery');
    Route::get('changestatus-gallery/{id}', [GalleryCategoryController::class, 'activation'])->name('changestatus-gallery');
    Route::get('blockgallery/{id}', [GalleryCategoryController::class, 'block'])->name('blockgallery');
    Route::get('update-checkbox-status/{id}', [AllCategoryController::class, 'updateCheckboxStatus'])->name('update-checkbox-status');


    Route::get('all-category', [AllCategoryController::class, 'index'])->name('all-category');
    Route::post('new-all-category', [AllCategoryController::class, 'store'])->name('new-all-category');
    Route::get('all-category-list', [AllCategoryController::class, 'list'])->name('all-category-list');
    Route::get('/edit-all-category/{id}', [AllCategoryController::class, 'edit'])->name('edit-all-category');
    Route::put('save-all-category', [AllCategoryController::class, 'update'])->name('save-all-category');
    Route::get('changestatus-all-category/{id}', [AllCategoryController::class, 'activation'])->name('changestatus-all-category');
    Route::get('blockcategory/{id}', [AllCategoryController::class, 'block'])->name('blockcategory');

    Route::get('images', [ImageController::class, 'index'])->name('images');
    Route::post('new-images', [ImageController::class, 'store'])->name('new-images');
    Route::get('images-list', [ImageController::class, 'list'])->name('images-list');
    Route::put('save-images', [ImageController::class, 'update'])->name('save-images');
    Route::get('blockimages/{id}', [ImageController::class, 'block'])->name('blockimages');

    Route::get('video', [VideoController::class, 'index'])->name('video');
    Route::post('new-video', [VideoController::class, 'store'])->name('new-video');
    Route::get('video-list', [VideoController::class, 'list'])->name('video-list');
    Route::get('/edit-video/{id}', [VideoController::class, 'edit'])->name('edit-video');
    Route::put('save-video', [VideoController::class, 'update'])->name('save-video');
    Route::get('blockvideo/{id}', [VideoController::class, 'block'])->name('blockvideo');

    Route::get('experience', [ExperienceController::class, 'index'])->name('experience');
    Route::post('new-experience', [ExperienceController::class, 'store'])->name('new-experience');
    Route::get('experience-list', [ExperienceController::class, 'list'])->name('experience-list');
    Route::get('/edit-experience/{id}', [ExperienceController::class, 'edit'])->name('edit-experience');
    Route::put('save-experience', [ExperienceController::class, 'update'])->name('save-experience');
    Route::get('changestatus-experience/{id}', [ExperienceController::class, 'activation'])->name('changestatus-experience');
    Route::get('blockexperience/{id}', [ExperienceController::class, 'block'])->name('blockexperience');

    Route::get('room-feature', [FeaturesController::class, 'index'])->name('room-feature');
    Route::post('new-room-feature', [FeaturesController::class, 'store'])->name('new-room-feature');
    Route::get('room-feature-list', [FeaturesController::class, 'list'])->name('room-feature-list');
    Route::get('/edit-room-feature/{id}', [FeaturesController::class, 'edit'])->name('edit-room-feature');
    Route::put('save-room-feature', [FeaturesController::class, 'update'])->name('save-room-feature');
    Route::get('changestatus-room-feature/{id}', [FeaturesController::class, 'activation'])->name('changestatus-room-feature');
    Route::get('blockfeature/{id}', [FeaturesController::class, 'block'])->name('blockfeature');

    Route::get('promotion', [PromotionController::class, 'index'])->name('promotion');
    Route::post('new-promotion', [PromotionController::class, 'store'])->name('new-promotion');
    Route::get('promotion-list', [PromotionController::class, 'list'])->name('promotion-list');
    Route::get('/edit-promotion/{id}', [PromotionController::class, 'edit'])->name('edit-promotion');
    Route::put('save-promotion', [PromotionController::class, 'update'])->name('save-promotion');
    Route::get('changestatus-promotion/{id}', [PromotionController::class, 'activation'])->name('changestatus-promotion');
    Route::get('blockpromotion/{id}', [PromotionController::class, 'block'])->name('blockpromotion');

    Route::get('summary-edit', [SummaryController::class, 'index'])->name('summary-edit');
    Route::put('save-summary', [SummaryController::class, 'update'])->name('save-summary');

    Route::get('stay-home-edit', [StayHomeController::class, 'index'])->name('stay-home-edit');
    Route::put('save-stay-home', [StayHomeController::class, 'update'])->name('save-stay-home');

    Route::get('food-home-edit', [FoodHomeController::class, 'index'])->name('food-home-edit');
    Route::put('save-food-home', [FoodHomeController::class, 'update'])->name('save-food-home');

    Route::get('room-home-edit', [RoomHomeController::class, 'index'])->name('room-home-edit');
    Route::put('save-room-home', [RoomHomeController::class, 'update'])->name('save-room-home');

    Route::get('experience-content-edit', [ExperienceContentController::class, 'index'])->name('experience-content-edit');
    Route::put('save-experience-content', [ExperienceContentController::class, 'update'])->name('save-experience-content');

    Route::get('room-content-edit', [StayContentController::class, 'index'])->name('room-content-edit');
    Route::put('save-room-content', [StayContentController::class, 'update'])->name('save-room-content');

    Route::get('room', [RoomsController::class, 'index'])->name('room');
    Route::post('new-room', [RoomsController::class, 'store'])->name('new-room');
    Route::get('room-list', [RoomsController::class, 'list'])->name('room-list');
    Route::get('/edit-room/{id}', [RoomsController::class, 'edit'])->name('edit-room');
    Route::put('save-room', [RoomsController::class, 'update'])->name('save-room');
    Route::get('changestatus-room/{id}', [RoomsController::class, 'activation'])->name('changestatus-room');
    Route::get('blockroom/{id}', [RoomsController::class, 'block'])->name('blockroom');

    Route::get('room-images', [RoomsImageController::class, 'index'])->name('room-images');
    Route::post('new-room-images', [RoomsImageController::class, 'store'])->name('new-room-images');
    Route::get('room-images-list', [RoomsImageController::class, 'list'])->name('room-images-list');
    Route::put('save-room-images', [RoomsImageController::class, 'update'])->name('save-room-images');
    Route::get('blockroomimages/{id}', [RoomsImageController::class, 'block'])->name('blockroomimages');

    Route::get('top-banner-list', [TopBannerController::class, 'list'])->name('top-banner-list');
    Route::get('/edit-top-banner/{id}', [TopBannerController::class, 'edit'])->name('edit-top-banner');
    Route::put('save-top-banner', [TopBannerController::class, 'update'])->name('save-top-banner');

    Route::get('meta-tag-list', [MetaTagController::class, 'list'])->name('meta-tag-list');
    Route::get('edit-meta-tag/{id}', [MetaTagController::class, 'edit'])->name('edit-meta-tag');
    Route::put('save-meta-tag', [MetaTagController::class, 'update'])->name('save-meta-tag');

    // //vessel type in master data
    // // Route::get('qualification', [QualificationController::class, 'index'])->name('qualification');
    // Route::get('qualification/change-status/{id}', [QualificationController::class, 'changeStatus'])->name('qualification-change-status');
    // Route::get('qualification-list', [QualificationController::class, 'list'])->name('qualification-list');
    // Route::get('create-qualification', [QualificationController::class, 'create'])->name('create-qualification');
    // Route::post('store-qualification', [QualificationController::class, 'store'])->name('store-qualification');
    // Route::get('edit-qualification/{id}', [QualificationController::class, 'edit'])->name('edit-qualification');
    // Route::post('update-qualification', [QualificationController::class, 'update'])->name('update-qualification');
    // Route::delete('delete-qualification/{id}', [QualificationController::class, 'destroy'])->name('delete-qualification');


});
