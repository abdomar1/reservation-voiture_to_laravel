<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [indexController::class , 'index'])->name('accueil');

Route::get('/about', function(){return view('about');})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'sendContactEmail'])->name('contact.send');



Route::resource('/car',CarController::class);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/auth',[UserController:: class, 'auth'])->name('user.auth');


//les route de admin 
Route::middleware(['auth','verified','admin'])->group(function(){
    Route::get('/admin/cars',[AdminController::class, 'cars'])->name('admin.cars');
    Route::get('/admin/reservation',[AdminController::class, 'Reservation'])->name('admin.reservation');
    Route::get('/admin/dashboard',[AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/profile',[AdminController::class, 'profile'])->name('admin.profile');
    Route::PUT('/admin/profile',[AdminController::class, 'updateProfile'])->name('updateProfileA');
    Route::get('/admin/users',[AdminController::class, 'users'])->name('admin.users');
    Route::delete('/admin/reservation/{id}',[AdminController::class, 'destroy'])->name('admin.destroy');
    Route::resource('admin/categorie',CategorieController::class);

});


//les route de reservation  
Route::resource('/reserve', ReservationController::class);

Route::get('/reserve/{id}/create', [ReservationController::class, 'create'])->name('reserv.create');


//les route de users 
Route::middleware(['auth','verified','user'])->group(function(){

    Route::get('/user/dashboard',[UserController::class, 'show'])->name('user.show');

    Route::get('/user/profile',[UserController::class, 'profile'])->name('user.profile');
    
    Route::PUT('/user/{id}/profile',[UserController::class, 'updateProfile'])->name('user.updateProfile');

});

Auth::routes();






