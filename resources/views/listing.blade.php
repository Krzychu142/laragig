@extends('layout')

{{-- everything bottom will be displayed in an extended file in place with 'content' or any other name for it, must be the same --}}
@section('content')

<h2>{{$listing['title'];}}</h2>
<h3>{{$listing['id'];}}</h3>
<p>{{$listing['desc'];}}</p> 

@endsection