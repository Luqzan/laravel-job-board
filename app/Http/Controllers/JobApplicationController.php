<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    use AuthorizesRequests;

    public function create(JobListing $jobListing)
    {
        $this->authorize('apply', $jobListing);

        return view('job_application.create', ['jobListing' => $jobListing]);
    }

    public function store(JobListing $jobListing, Request $request)
    {
        $this->authorize('apply', $jobListing);

        $validatedData = $request->validate([
            'expected_salary' => 'required|min:1|max:1000000',
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        $file = $request->file('cv');

        $path = $file->store('cvs', 'private');

        $jobListing->jobApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path,
        ]);

        return redirect()->route('job-listing.show', $jobListing)
            ->with('success', 'Job application submitted.');
    }

    public function destroy(string $id)
    {
        //
    }
}
