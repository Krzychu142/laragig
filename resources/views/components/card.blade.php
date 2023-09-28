{{-- thats how we can merged class from invoke our component (<x-card class="some-classes") > --}}
<div {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}}>
    {{-- whatever we beetwen <x-card> and </x-card> will be outputted here --}}
    {{$slot}}
</div>