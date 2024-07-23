<x-layout>
    <x-slot:heading>Edit job</x-slot:heading>
<form action="/jobs/{{ $job->id }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">{{ $job->employer->name }}</h2>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-container>
           <x-form-label for="title">Title</x-form-label>
            <div class="mt-2">
                <x-form-input type="text" name="title" value="{{ $job->title }}" id="title" autocomplete="title" />
            </div>
          </x-form-container>
          <x-form-container>
            <x-form-label for="title">Salary</x-form-label>
             <div class="mt-2">
                 <x-form-input type="text" name="salary" value="{{ $job->salary }}" id="salary" autocomplete="salary" />
             </div>
           </x-form-container>
        </div>
      </div>

    <div class="mt-6 flex items-center justify-between gap-x-6">
       <button class="text-red-600 font-bold text-lg" form="delete_form">Delete</button>
      <div>
        <x-nav-link href="/jobs"  :activate="request()->is('/')" class="text-red-500">Cancel</x-nav-link>
        <x-form-btn>Update</x-form-btn>
      </div>
    </div>
  </form>
  <form action="/jobs/{{ $job->id }}" method="POST" id="delete_form">
    @csrf
    @method('DELETE')
  </form>
</x-layout>
