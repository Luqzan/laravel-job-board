<x-layout>
  <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

  <div class="mb-8 text-right">
    <x-link-button href="{{route('my-job-listing.create')}}">Add New</x-link-button>
  </div>

  @forelse ($jobListing as $job)
  <x-job-card :job-listing="$job">
    <div class="text-sx text-slate-500">
      @forelse ($job->jobApplications as $application)
      <div class="mb-4 flex items-center justify-between">
        <div>
          <div>{{$application->user->name}}</div>

          <div>Applied {{ $application->created_at->diffForHumans() }}</div>

          <div>Download CV</div>
        </div>

        <div>${{ number_format($application->expected_salary) }}</div>
      </div>
      @empty
      <div>No applications yet</div>
      @endforelse

      <div class="flex space-x-2">
        <x-link-button href="{{route('my-job-listing.edit', $job)}}">Edit</x-link-button>

        <form action="{{route('my-job-listing.destroy', $job)}}" method="POST">
          @csrf
          @method("DELETE")
          <x-button>Delete</x-button>
        </form>
      </div>
    </div>
  </x-job-card>
  @empty
  <div class="rounded-md border border-dashed border-slate-300 p-8">
    <div class="text-center font-medium">No jobs created yet</div>

    <div class="text-center">Post your first job <a href="{{route('my-job-listing.create')}}"
        class="text-indigo-500 hover:underline">here</a>!</div>
  </div>
  @endforelse
</x-layout>