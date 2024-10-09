<x-layout>
	@foreach ($jobListings as $jobListing)
		<div>{{ $jobListing->title }}</div>
	@endforeach
</x-layout>
