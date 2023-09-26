<h1>{{ $heading; }}</h1>  <!--- instead <?php echo $heading; ?> -->

{{-- @php
$test = 1;
@endphp

{{$test}} --}}

@if(count($listings) == 0)
    <p>No listing now</p>
@endif


@unless (count($listings) == 0)
@foreach($listings as $listing) <!--- instead <?php echo $heading; ?> -->
    <h2>{{$listing['title'];}}</h2>
    <h3>{{$listing['id'];}}</h3>
    <p>{{$listing['desc'];}}</p>
@endforeach

@else
<p>No listings found</p>

@endunless