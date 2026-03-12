<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\EntertainmentController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login-admin', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login-admin', [LoginController::class, 'login'])->name('login.process');
});


Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/about', [HomeController::class, "about"])->name('about');
Route::get('/menu', [HomeController::class, "menu"])->name('menu');
Route::get('/menu_detail/{id}', [HomeController::class, "menu_detail"])->name('menu_detail');
Route::get('/event', [HomeController::class, "event"])->name('event');
Route::get('/facility', [HomeController::class, "facility"])->name('facility');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::prefix('admin')->group(function () {
    
        Route::get('/', function () {
            return redirect()->route('dashboard');
        });    
        Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
        Route::fallback(function () {
            return redirect()->route('dashboard');
        });
    
        Route::get('/home', [DashboardController::class, "index"])->name('dashboard');
        Route::get('/event', [EventController::class, "index"])->name('admin.event');
        Route::get('/facility', [FacilityController::class, "index"])->name('admin.facility');
        Route::get('/menu', [MenuController::class, "index"])->name('admin.menu');
        Route::get('/category', [CategoryController::class, "index"])->name('admin.category');
        
        // form
        Route::get('/facility/add', [FacilityController::class, "create"])->name('admin.facility.create');
        Route::get('/event/add', [EventController::class, "create"])->name('admin.event.create');
        Route::get('/menu/add', [MenuController::class, "create"])->name('admin.menu.create');
        Route::get('/category/add', [CategoryController::class, "create"])->name('admin.category.create');
        
        Route::get('/facility/update/{id}', [FacilityController::class, "edit"])->name('admin.facility.edit');
        Route::get('/event/update/{id}', [EventController::class, "edit"])->name('admin.event.edit');
        Route::get('/menu/update/{id}', [MenuController::class, "edit"])->name('admin.menu.edit');
        Route::get('/category/update/{id}', [CategoryController::class, "edit"])->name('admin.category.edit');
        
        // create
        Route::post('/event/store', [EventController::class, "store"])->name('admin.event.store');
        Route::post('/facility/store', [FacilityController::class, "store"])->name('admin.facility.store');
        Route::post('/menu/store', [MenuController::class, "store"])->name('admin.menu.store');
        Route::post('/category/store', [CategoryController::class, "store"])->name('admin.category.store');
        
        // update
        Route::post('/master/update', [DashboardController::class, "update"])->name('master.update');
        Route::put('/event/update/{id}', [EventController::class, "update"])->name('admin.event.update');
        Route::put('/facility/update/{id}', [FacilityController::class, "update"])->name('admin.facility.update');
        Route::put('/menu/update/{id}', [MenuController::class, "update"])->name('admin.menu.update');
        Route::put('/category/update/{id}', [CategoryController::class, "update"])->name('admin.category.update');
        
        // delete
        Route::delete('/facility/delete/{id}', [FacilityController::class, "destroy"])->name('admin.facility.delete');
        Route::delete('/event/delete/{id}', [EventController::class, "destroy"])->name('admin.event.delete');
        Route::delete('/menu/delete/{id}', [MenuController::class, "destroy"])->name('admin.menu.delete');
        Route::delete('/category/delete/{id}', [CategoryController::class, "destroy"])->name('admin.category.delete');

        Route::resource('gallery', GalleryController::class);
        Route::resource('slider', SliderController::class);
        Route::resource('entertainment', EntertainmentController::class);
    });
});

Route::fallback(function () {
    return redirect()->route('home');
});