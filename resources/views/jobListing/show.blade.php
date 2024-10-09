<x-layout>
	<x-breadcrumbs class="mb-4" :links="['Job Listing' => route('job-listing.index'), $jobListing->title => '#']" />

	<x-job-card :$jobListing>
		<p class="text-sm text-slate-500 mb-4">
			{!! nl2br(e($jobListing->description)) !!}
		</p>
	</x-job-card>
</x-layout>
