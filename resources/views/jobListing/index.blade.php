<x-layout>
	@foreach ($jobListings as $jobListing)
		<x-job-card class="mb-4" :jobListing="$jobListing">
			<div>
				<x-link-button :href="route('job-listing.show', $jobListing)">
					Show
				</x-link-button>
			</div>
		</x-job-card>
	@endforeach
</x-layout>
