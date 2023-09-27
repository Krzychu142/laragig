@extends('layout')

{{-- everything bottom will be displayed in an extended file in place with 'content' or any other name for it, must be the same --}}
@section('content')
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
<!-- Item 1 -->
<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                {{-- when we are dilling with eloquent models it gives us what's called a collection, we can use syntax with the arrow  --}}
                <a href="show.html">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <ul class="flex">
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">Laravel</a>
                </li>
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">API</a>
                </li>
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">Backend</a>
                </li>
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">Vue</a>
                </li>
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</div>
@endforeach

@else
<p>No listings found</p>

@endunless
</div>

@endsection