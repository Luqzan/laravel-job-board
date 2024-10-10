<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('', fn () => to_route('job-listing.index'));
Route::resource('job-listing', JobListingController::class)->only(['index', 'show']);

Route::get('login', fn () => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['create', 'store']);
