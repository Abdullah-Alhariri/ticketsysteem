<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('/events', [PagesController::class, 'show_events'])->name('events');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::get('/login', [AuthController::class, 'login'])->name('login');
//Route::get('/register', [AuthController::class, 'register'])->name('register');
//Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
//Route::post('/register', [AuthController::class, 'postRegistration'])->name('register.post');
//Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//Route::get('/cars', [PagesController::class, 'getAllCars'])->name('cars');
//Route::get('/add-car', [PagesController::class, 'addCar'])->name('add-car');
//Route::post('/add-car', [PagesController::class, 'processNewCar'])->name('process-add-car');
//Route::get('/edit-car/{id}', [PagesController::class, 'editCar'])->name('edit-car');
//Route::post('/edit-car/{id}', [PagesController::class, 'processEditCar'])->name('process-edit-car');
//Route::get('/delete-car/{id}', [PagesController::class, 'deleteCar'])->name('delete-car');

