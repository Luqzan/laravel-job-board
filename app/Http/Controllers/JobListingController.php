<?php

namespace App\Http\Controllers;

use App\Models\JobListing;

class JobListingController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', JobListing::class);

        $filters = request()->only(
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category',
        );

        return view(
            'job_listing.index',
            ['jobListings' => JobListing::with('employer')->latest()->filter($filters)->get()]
        );
    }

    public function show(JobListing $jobListing)
    {
        $this->authorize('view', $jobListing);

        return view(
            'job_listing.show',
            ['jobListing' => $jobListing->load('employer.jobListing')]
        );
    }
}
