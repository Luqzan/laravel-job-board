<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;

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

    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with(
            'success',
            'Job application removed.'
        );
    }
}
