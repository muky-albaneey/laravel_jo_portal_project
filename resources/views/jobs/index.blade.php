<x-layout>
    <x-slot:heading> <h1>jobs portal</h1></x-slot:heading>
    @foreach ($jobs as $job)

    <a href="/jobs/{{ $job->id }}" class="block mt-4 flex p-2 w-2/4 bg-gray-300 rounded justify-between">
        <h1 class="font-bold text-lg text-gray-800">{{ $job->employer->name}}</h1>
       <p> {{ $job->title }}</p>
       <p> {{ $job->salary }}</p>
    </a>
    @endforeach
</x-layout>
