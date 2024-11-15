<?php

namespace App\Policies;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobListingPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function viewAnyEmployer(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, JobListing $jobListing): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->employer !== null;
    }

    public function update(User $user, JobListing $jobListing): bool|Response
    {
        if ($jobListing->employer->user_id !== $user->id) {
            return false;
        }

        if ($jobListing->jobApplications()->count() > 0) {
            return Response::deny('Cannot change the job with applications');
        }

        return true;
    }

    public function delete(User $user, JobListing $jobListing): bool
    {
        return $jobListing->employer->user_id === $user->id;
    }

    public function restore(User $user, JobListing $jobListing): bool
    {
        return $jobListing->employer->user_id !== $user->id;
    }

    public function forceDelete(User $user, JobListing $jobListing): bool
    {
        return $jobListing->employer->user_id !== $user->id;
    }

    public function apply(User $user, JobListing $jobListing): bool
    {
        return ! $jobListing->hasUserApplied($user);
    }
}
