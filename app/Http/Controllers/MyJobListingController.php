<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobListingRequest;
use App\Models\JobListing;

class MyJobListingController extends Controller
{
    public function index()
    {
        $this->authorize('viewAnyEmployer', JobListing::class);

        return view('my_job_listing.index', ['jobListing' => auth()->user()->employer->jobListing()->with(['employer', 'jobApplications', 'jobApplications.user'])->get()]);
    }

    public function create()
    {
        $this->authorize('create', JobListing::class);

        return view('my_job_listing.create');
    }

    public function store(JobListingRequest $request)
    {
        auth()->user()->employer->jobListing()->create($request->validated());

        return redirect()->route('my-job-listing.index')->with('success', 'Job created successfully');
    }

    public function edit(JobListing $myJobListing)
    {
        $this->authorize('update', $myJobListing);

        return view('my_job_listing.edit', ['jobListing' => $myJobListing]);
    }

    public function update(JobListingRequest $request, JobListing $myJobListing)
    {
        $this->authorize('update', $myJobListing);

        $myJobListing->update($request->validated());

        return redirect()->route('my-job-listing.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(JobListing $myJobListing)
    {
        $myJobListing->delete();

        return redirect()->route('my-job-listing.index')->with('success', 'Job deleted.');
    }
}
