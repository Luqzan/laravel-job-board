<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class MyJobListingController extends Controller
{
    public function index()
    {
        return view('my_job_listing.index', ['jobListing' => auth()->user()->employer->jobListing()->with(['employer', 'jobApplications', 'jobApplications.user'])->get()]);
    }

    public function create()
    {
        return view('my_job_listing.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|max:5000',
            'description' => 'required|string',
            'experience' => 'required|in:'.implode(',', JobListing::$experience),
            'category' => 'required|in:'.implode(',', JobListing::$category),
        ]);

        auth()->user()->employer->jobListing()->create($validatedData);

        return redirect()->route('my-job-listing.index')->with('success', 'Job created successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
