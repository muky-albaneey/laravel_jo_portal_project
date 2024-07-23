@props(['activate'=>false])
<a {{ $attributes }}  class="{{  $activate ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}rounded-md px-3 py-2 text-sm font-medium text-white" aria-current="page">{{ $slot }}</a>

{{--
@props(['active'=>false])
<a {{ $attributes }} class=" {{ $active ? 'bg-gray-900 text-white' : 'hover:bg-gray-700 hover:text-white'}}block rounded-md px-3 py-2 text-base font-medium text-white" aria-current="{{ request()->is('/') ? 'page': 'false' }}">{{$slot}}</a> --}}

