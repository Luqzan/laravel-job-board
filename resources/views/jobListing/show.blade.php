<x-layout>
	<x-breadcrumbs class="mb-4" :links="['Job Listing' => route('job-listing.index'), $jobListing->title => '#']" />

	<x-job-card :$jobListing />
</x-layout>
