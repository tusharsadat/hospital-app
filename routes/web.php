<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect'])->name('home');
Route::post('/appointment', [HomeController::class, 'Appointment'])->name('appointment');
Route::get('/my-appointment', [HomeController::class, 'Myappointment'])->name('myappointment');
Route::get('/cancle-appointment/{id}', [HomeController::class, 'CancleAppointment'])->name('cancleappointment');

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
    Route::get('/admin/all-doctor', 'index')->name('doclist');
    Route::get('/admin/add-doctor', 'AddDoctor')->name('addoctor');
    Route::post('/admin/store-doctor', 'StoreDoctor')->name('storedoctor');
    Route::get('/admin/edit-doctor/{id}', 'EditDoctor')->name('editdoctor');
    Route::post('/admin/update-doctor', 'UpdateDoctor')->name('updatedoctor');
    Route::get('/admin/delete-doctor/{id}', 'DeleteDoctor')->name('deletedoctor');
});

Route::get('/admin/all-appointments', [AdminController::class, 'ShowAppointment'])->name('allappointments');
Route::get('/admin/approve-appointment/{id}', [AdminController::class, 'approveAppointment'])->name('approve-appointment');
Route::get('/admin/cancle-appointment/{id}', [AdminController::class, 'CancleAppointment'])->name('cancle-appointment');
Route::get('/admin/send-mail/{id}', [AdminController::class, 'SendUserMail'])->name('sendmail');
Route::post('/admin/submit-mail/{id}', [AdminController::class, 'SubmitMail'])->name('submitmail');
