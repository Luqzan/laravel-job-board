<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function create(JobListing $jobListing)
    {
        return view('job_application.create', ['jobListing' => $jobListing]);
    }

    public function store(Request $request)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
