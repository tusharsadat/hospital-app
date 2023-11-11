<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
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

/*Route::get('/add-doctor', function () {
    return view('admin.addoctor');
})->name('dashboard');*/


Route::get('/home', [HomeController::class, 'redirect'])->name('home');
Route::get('/', [HomeController::class, 'index']);
/*Route::get('/admin/add-doctor', [DoctorController::class, 'AddDoctor'])->name('addoctor');*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(DoctorController::class)->group(function () {
    Route::get('/admin/add-doctor', 'AddDoctor')->name('addoctor');
    Route::get('/admin/doc-list', 'DocList');
});
