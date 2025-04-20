<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/saved-jobs', function () {
    return view('saved-jobs');
});
use App\Http\Controllers\JobController;

Route::get('/search-jobs', [JobController::class, 'index'])->name('search.jobs');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
// Application routes
use App\Http\Controllers\ApplicationController;

Route::middleware(['auth'])->group(function () {
    Route::get('/application-status', [ApplicationController::class, 'index'])->name('application.status');
    Route::post('/jobs/{id}/apply', [ApplicationController::class, 'easyApply'])->name('jobs.apply');
});

use App\Http\Controllers\CompanyProfileController;

// Company profile routes (accessible to all authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/company-profile', [CompanyProfileController::class, 'edit'])->name('company-profile.edit');
    Route::put('/company-profile', [CompanyProfileController::class, 'update'])->name('company-profile.update');
});

// Admin Routes
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobController as AdminJobController;

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Users Management
    Route::get('/users', function() { return view('admin.users.index'); })->name('users');
    
    // Admin Job Management
    Route::get('/jobs', [AdminJobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [AdminJobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/details', [AdminJobController::class, 'details'])->name('jobs.details');
    Route::post('/jobs', [AdminJobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{id}', [AdminJobController::class, 'show'])->name('jobs.show');
    Route::get('/jobs/{id}/edit', [AdminJobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [AdminJobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{id}', [AdminJobController::class, 'destroy'])->name('jobs.destroy');
    
    // Admin Companies Management
    Route::get('/companies', function() { return view('admin.companies.index'); })->name('companies');
});

require __DIR__.'/auth.php';
