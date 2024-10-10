<x-layout>
	<x-breadcrumbs class="mb-4" :links="[
	    'Job Listing' => route('job-listing.index'),
	    $jobListing->title => route('job-listing.show', $jobListing),
	    'Apply' => '#',
	]" />

	<x-job-card :$jobListing />

	<x-card>
		<h2 class="mb-4 text-lg font-medium">
			Your Job Application
		</h2>

		<form action="{{ route('job-listing.application.store', $jobListing) }}" method="post">
			@csrf

			<div class="mb-4">
				<label for="expected_salary" class="mb-2 block text-sm font-medium text-slate-900">
					Expected Salary
				</label>

				<x-text-input type="number" name="expected_salary" />
			</div>

			<x-button class="w-full">Apply</x-button>
		</form>
	</x-card>
</x-layout>
