<x-layout>
	<x-breadcrumbs class="mb-4" :links="['Job Listing' => route('job-listing.index'), $jobListing->title => '#']" />

	<x-job-card :$jobListing>
		<p class="text-sm text-slate-500 mb-4">
			{!! nl2br(e($jobListing->description)) !!}
		</p>

		<x-link-button :href="route('job-listing.application.create', $jobListing)">
			Apply
		</x-link-button>
	</x-job-card>

	<x-card class="mb-4">
		<h2 class="mb-4 text-lg font-medium">
			More Jobs From {{ $jobListing->employer->company_name }}
		</h2>

		<div class="text-sm text-slate-500">
			@foreach ($jobListing->employer->jobListing as $otherJobListing)
				<div class="mb-4 flex justify-between">
					<div>
						<div class="text-slate-700">
							<a href="{{ route('job-listing.show', $otherJobListing) }}">
								{{ $otherJobListing->title }}
							</a>
						</div>

						<div class="text-xs">
							{{ $otherJobListing->created_at->diffForHumans() }}
						</div>
					</div>

					<div class="text-xs">
						${{ number_format($otherJobListing->salary) }}
					</div>
				</div>
			@endforeach
		</div>
	</x-card>
</x-layout>
