<?php

namespace App\Http\Controllers;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        return view(
            'my_job_application.index',
            [
                'applications' => auth()->user()->jobApplications()->with([
                    'jobListing' => fn ($query) => $query->withCount('jobApplications')->withAvg('jobApplications', 'expected_salary'),
                    'jobListing.employer',
                ])->latest()->get(),
            ]);
    }

    public function destroy(string $id)
    {
        //
    }
}
