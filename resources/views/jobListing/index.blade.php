<x-layout>
	@foreach ($jobListings as $jobListing)
		<x-card class="mb-4">
			{{ $jobListing->title }}
		</x-card>
	@endforeach
</x-layout>
