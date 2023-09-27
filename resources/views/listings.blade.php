@extends('layout')

{{-- everything bottom will be displayed in an extended file in place with 'content' or any other name for it, must be the same --}}
@section('content')
<h1>{{ $heading; }}</h1>  <!--- instead <?php echo $heading; ?> -->

{{-- @php
$test = 1;
@endphp

{{$test}} --}}

{{-- @if(count($listings) == 0)
    <p>No listing now</p>
@endif --}}


@unless (count($listings) == 0)
@foreach($listings as $listing) <!--- instead <?php echo $heading; ?> -->
    <h2>
        <a href="/listing/{{$listing['id']}}">
        {{$listing['title'];}}
        </a>
    </h2>
    <h3>{{$listing['id'];}}</h3>
    <p>{{$listing['description'];}}</p> 
@endforeach

@else
<p>No listings found</p>

@endunless

@endsection