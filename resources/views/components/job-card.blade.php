<x-card class="mb-4">
	<div class="flex justify-between mb-4">
		<h2 class="text-lg font-medium">{{ $jobListing->title }}</h2>

		<div class="text-slate-500">${{ number_format($jobListing->salary) }}</div>
	</div>

	<div class="mb-4 flex justify-between text-sm text-slate-500 items-center">
		<div class="flex space-x-4">
			<div>Company Name</div>

			<div>{{ $jobListing->location }}</div>
		</div>

		<div class="flex space-x-1 text-xs">
			<x-tag>
				<a href="{{ route('job-listing.index', ['experience' => $jobListing->experience]) }}">
					{{ Str::ucfirst($jobListing->experience) }}
				</a>
			</x-tag>

			<x-tag>
				<a href="{{ route('job-listing.index', ['category' => $jobListing->category]) }}">
					{{ $jobListing->category }}
				</a>
			</x-tag>
		</div>
	</div>

	{{ $slot }}
</x-card>
