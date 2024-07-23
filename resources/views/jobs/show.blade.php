<x-layout>
    <x-slot:heading>{{ $job->title }}</x-slot:heading>

   @can('edit', $job)
    <x-nav-link href="/jobs/{{ $job->id }}/edit"  :activate="request()->is('/')" class=" font-bold p-4 bg-green-500">Edit</x-nav-link>
   @endcan
</x-layout>
