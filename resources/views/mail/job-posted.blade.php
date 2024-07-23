<x-mail::message>
# Introduction

{{$job->title}}

<x-mail::button :url="url('/jobs/' . $job->id)">
Button Text
</x-mail::button>

Thanks,<br>
{{ $job->employer->user->first_name }}
</x-mail::message>
