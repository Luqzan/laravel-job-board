<?php

namespace App\Policies;

use App\Models\JobListing;
use App\Models\User;

class JobListingPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, JobListing $jobListing): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, JobListing $jobListing): bool
    {
        return false;
    }

    public function delete(User $user, JobListing $jobListing): bool
    {
        return false;
    }

    public function restore(User $user, JobListing $jobListing): bool
    {
        return false;
    }

    public function forceDelete(User $user, JobListing $jobListing): bool
    {
        return false;
    }

    public function apply(User $user, JobListing $jobListing): bool
    {
        return false;
    }
}
