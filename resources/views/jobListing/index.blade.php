<x-layout>
	@foreach ($jobListings as $jobListing)
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
					<x-tag>{{ Str::ucfirst($jobListing->experience) }}</x-tag>
					<x-tag>{{ $jobListing->category }}</x-tag>
				</div>
			</div>

			<p class="text-sm text-slate-500">{!! nl2br(e($jobListing->description)) !!}</p>
		</x-card>
	@endforeach
</x-layout>
