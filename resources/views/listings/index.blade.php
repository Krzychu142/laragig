{{-- @extends('layout') --}}
{{-- <x-layout /> --}}

{{-- everything bottom will be displayed in an extended file in place with 'content' or any other name for it, must be the same --}}
{{-- @section('content') --}}
{{-- @include('partials._hero') - just in this place display any "component", - use include when someting is used only one time and --}}
<x-layout >
@include('partials._hero')
@include('partials._search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4" >

{{-- @php
$test = 1;
@endphp

{{$test}} --}}

{{-- @if(count($listings) == 0)
    <p>No listing now</p>
@endif --}}


@unless (count($listings) == 0)
@foreach($listings as $listing) <!--- instead <?php echo $heading; ?> -->

{{-- <x-name-of-component :nameOfProp="$listing" --}}

<x-listing-card :listing="$listing" />

{{-- <x-listing-card listing="regular string" />  --}}

@endforeach

@else
<p>No listings found</p>

@endunless
</div>
</x-layout >
{{-- @endsection --}}