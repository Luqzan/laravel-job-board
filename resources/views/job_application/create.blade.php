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

		<form action="{{ route('job-listing.application.store', $jobListing) }}" method="post" enctype="multipart/form-data">
			@csrf

			<div class="mb-4">
				<x-label for="expected_salary" :required="true">
					Expected Salary
				</x-label>

				<x-text-input type="number" name="expected_salary" />
			</div>

			<div class="mb-4">
				<x-label for="cv" :required="true">
					Upload CV
				</x-label>

				<x-text-input type="file" name="cv" />
			</div>

			<x-button class="w-full">Apply</x-button>
		</form>
	</x-card>
</x-layout>
