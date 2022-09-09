<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index']);
Route::get('/home', [App\Http\Controllers\LandingPageController::class, 'index']);
Route::get('/university_news', [App\Http\Controllers\LandingPageController::class, 'news']);
Route::get('/university_news/{slug}', [\App\Http\Controllers\LandingPageController::class, 'show_news']);
Route::put('/news_ViewCount/{id}', [\App\Http\Controllers\LandingPageController::class, 'nVisitCount']);


Route::get('/university_announcements', [App\Http\Controllers\LandingPageController::class, 'announcements']);
Route::get('/university_announcements/{slug}', [\App\Http\Controllers\LandingPageController::class, 'show_announcement']);
Route::put('/announcenment_ViewCount/{id}', [\App\Http\Controllers\LandingPageController::class, 'aVisitCount']);


Route::get('/university_services', [App\Http\Controllers\LandingPageController::class, 'services']);


Route::get('/university_events' ,[App\Http\Controllers\LandingPageController::class, 'events']);
Route::get('/university_events/{title}' ,[App\Http\Controllers\LandingPageController::class, 'show_events']);
Route::get('search', [\App\Http\Controllers\SearchController::class , 'search']);
Route::post('subscribe', [\App\Http\Controllers\SubscribeController::class, 'subscribe']);



Route::prefix('admin')->middleware(['auth', 'isAdmin', 'cors'])->group(function () {
    Route::get('/dashboard',    [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('/previous',    [App\Http\Controllers\Admin\DashboardController::class, 'previous']);
    Route::get('/logs', [App\Http\Controllers\Admin\LogsController::class, 'index']);

    // Announcement Route
    Route::prefix('announcement')->group(function () {
        Route::get('/',     [App\Http\Controllers\Admin\AnnouncementController::class, 'index']);
        Route::get('create',     [App\Http\Controllers\Admin\AnnouncementController::class, 'create']);
        Route::post('store',     [App\Http\Controllers\Admin\AnnouncementController::class, 'store']);
        Route::get('view/{announcement_id}', [App\Http\Controllers\Admin\AnnouncementController::class, 'show']);
        Route::get('edit/{announcement_id}', [App\Http\Controllers\Admin\AnnouncementController::class, 'edit']);
        Route::put('update/{announcement_id}', [App\Http\Controllers\Admin\AnnouncementController::class, 'update']);
        Route::get('remove/{announcement_id}', [App\Http\Controllers\Admin\AnnouncementController::class, 'delete']);
        Route::get('checkslug', [App\Http\Controllers\Admin\AnnouncementController::class, 'checkslug']);
    });

    
    // NEWS AND UPDATES
    Route::prefix('news')->group(function () {
        Route::get('/',     [App\Http\Controllers\Admin\NewsController::class, 'index']);
        Route::get('create',     [App\Http\Controllers\Admin\NewsController::class, 'create']);
        Route::post('store',     [App\Http\Controllers\Admin\NewsController::class, 'store']);
        Route::get('view/{news_id}', [App\Http\Controllers\Admin\NewsController::class, 'show']);
        Route::get('edit/{news_id}', [App\Http\Controllers\Admin\NewsController::class, 'edit']);
        Route::put('update/{news_id}', [App\Http\Controllers\Admin\NewsController::class, 'update']);
        Route::get('remove/{news_id}', [App\Http\Controllers\Admin\NewsController::class, 'destroy']);
        Route::get('checkslug', [App\Http\Controllers\Admin\NewsController::class, 'checkslug']);
    });


    ////BANNER 
    Route::prefix('banner')->group(function () {
        Route::get('/',     [App\Http\Controllers\Admin\BannerController::class, 'index']);
        Route::get('add',     [App\Http\Controllers\Admin\BannerController::class, 'create']);
        Route::post('store',     [App\Http\Controllers\Admin\BannerController::class, 'store']);

        Route::get('view/{banner_id}', [App\Http\Controllers\Admin\BannerController::class, 'show']);
        Route::get('edit/{banner_id}', [App\Http\Controllers\Admin\BannerController::class, 'edit']);
        Route::put('update/{banner_id}', [App\Http\Controllers\Admin\BannerController::class, 'update']);
        Route::get('remove/{banner_id}', [App\Http\Controllers\Admin\BannerController::class, 'destroy']);
    });




    // SERVICES
    Route::prefix('services')->group(function (){
        Route::get('/',     [App\Http\Controllers\Admin\ServicesController::class, 'index']);
        Route::get('create',     [App\Http\Controllers\Admin\ServicesController::class, 'create']);
        Route::post('store',     [App\Http\Controllers\Admin\ServicesController::class, 'store']);
        Route::get('view/{news_id}', [App\Http\Controllers\Admin\ServicesController::class, 'show']);
        Route::get('edit/{news_id}', [App\Http\Controllers\Admin\ServicesController::class, 'edit']);
        Route::put('update/{news_id}', [App\Http\Controllers\Admin\ServicesController::class, 'update']);
        Route::get('remove/{services_id}', [App\Http\Controllers\Admin\ServicesController::class, 'destroy']);
        Route::get('checkslug', [App\Http\Controllers\Admin\ServicesController::class, 'checkslug']);
    
    
    });
    

    // USERS
    Route::prefix('users')->group(function () {
        Route::get('/',     [App\Http\Controllers\Admin\UserController::class, 'index']);
        Route::get('add',     [App\Http\Controllers\Admin\UserController::class, 'create']);
        Route::post('add',     [App\Http\Controllers\Admin\UserController::class, 'store']);
        Route::get('edit/{user_id}',     [App\Http\Controllers\Admin\UserController::class, 'edit']);
        Route::put('update/{user_id}',     [App\Http\Controllers\Admin\UserController::class, 'update']);
        Route::get('view/{user_id}',     [App\Http\Controllers\Admin\UserController::class, 'show']);
        Route::get('remove/{user_id}',     [App\Http\Controllers\Admin\UserController::class, 'destroy']);
    
    });

    Route::prefix('subscribers')->group(function () {
        Route::get('/',     [App\Http\Controllers\SubscribeController::class, 'index']);
        Route::post('/send-email',     [App\Http\Controllers\SubscribeController::class, 'sendEmail']);
    
    });

    
    Route::prefix('events')->group(function () {
        Route::get('/',     [App\Http\Controllers\Admin\EventsController::class, 'index']);
        Route::post('/add-event', [App\Http\Controllers\Admin\EventsController::class, 'add_event']);
        Route::put('/edit-event/{id}', [App\Http\Controllers\Admin\EventsController::class, 'edit_event']);
        Route::get('/remove/{id}', [App\Http\Controllers\Admin\EventsController::class, 'destroy']);
    
    });
});



   