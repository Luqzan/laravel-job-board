<?php

use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::resource('job-listing', JobListingController::class)->only(['index']);
