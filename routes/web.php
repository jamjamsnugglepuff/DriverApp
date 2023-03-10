<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\RegisterDrivingInstructorController;
use App\Http\Controllers\ApproveInstructorsController;
use App\Http\Controllers\SecureFileDownloadController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UpdateDrivingInstructorTimetableController;
use App\Http\Controllers\SearchLocationDataController;
use App\Http\Controllers\SearchForDrivingInstructorsController;
use App\Http\Controllers\ToggleAdminController;
use App\Http\Controllers\CreateBookingController;
use App\Http\Controllers\BrowseLessonController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware('web')->name('dashboard');

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/register/driving-instructor', [RegisterDrivingInstructorController::class, 'process']);
    Route::get('/register/driving-instructor', [RegisterDrivingInstructorController::class, 'register']);
    Route::get('/admin', [AdminDashboardController::class, 'index']);
    Route::get('/admin/approve-instructors', [ApproveInstructorsController::class, 'index']);
    Route::get('/secure-store/{file_name}', [SecureFileDownloadController::class, 'download']);
    Route::post('/admin/approve-instructors/{registration_id}', [ApproveInstructorsController::class, 'approve']);
    Route::get('/instructor/update-profile', [UpdateDrivingInstructorTimetableController::class, 'index']);
    Route::patch('/instructor/update-profile', [UpdateDrivingInstructorTimetableController::class, 'patch']);
    Route::get('/turn_on_admin', [ToggleAdminController::class, 'on']);
    Route::get('/turn_off_admin', [ToggleAdminController::class, 'off']);
    Route::get('/create-booking/{instructor_id}', [CreateBookingController::class, 'index']);
    Route::post('/create-booking/{instructor_id}/get-available-booking-times', [CreateBookingController::class, 'getAvailableBookingTimes']);
    Route::post('/create-booking/{instructor_id}/get-days-with-timeslot', [CreateBookingController::class, 'getDaysWithTimeslot']);
    Route::post('/create-booking/{instructor_id}/process', [CreateBookingController::class, 'process_booking']);
    Route::get('/lessons', [BrowseLessonController::class, 'index']);
});

 Route::get('/search/location-data', [SearchLocationDataController::class, 'search']);
    Route::get('/driving-instructors', [SearchForDrivingInstructorsController::class, 'find']);






require __DIR__.'/auth.php';
