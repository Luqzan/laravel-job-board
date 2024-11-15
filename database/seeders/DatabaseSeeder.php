<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\JobListing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();

        $users = User::all()->shuffle();

        for ($i = 0; $i < 10; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id,
            ]);
        }

        $employers = Employer::all();

        for ($i = 0; $i < 20; $i++) {
            JobListing::factory()->create([
                'employer_id' => $employers->random()->id,
            ]);
        }

        foreach ($users as $user) {
            $jobListings = JobListing::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($jobListings as $jobListing) {
                JobApplication::factory()->create([
                    'job_listing_id' => $jobListing->id,
                    'user_id' => $user->id,
                ]);
            }
        }

        // JobListing::factory(100)->create();

        // User::factory(10)->create();
    }
}
