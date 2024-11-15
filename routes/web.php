<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', fn () => to_route('job-listing.index'));
Route::resource('job-listing', JobListingController::class)->only(['index', 'show']);

Route::get('login', fn () => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['create', 'store']);

Route::delete('logout', fn () => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::resource('user', UserController::class)->only(['create', 'store']);

Route::middleware('auth')->group(function () {
    Route::resource('job-listing.application', JobApplicationController::class)->only(['create', 'store']);

    Route::resource('my-job-applications', MyJobApplicationController::class)->only(['index', 'destroy']);

    Route::resource('employer', EmployerController::class)->only(['create', 'store']);

    Route::middleware('employer')->resource('my-job-listing', MyJobListingController::class);
});
