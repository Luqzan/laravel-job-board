<x-layout>
	<x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />

	@forelse ($applications as $application)
		<x-job-card :jobListing="$application->jobListing"></x-job-card>
	@empty
	@endforelse
</x-layout>
