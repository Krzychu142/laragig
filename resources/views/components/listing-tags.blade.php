@props(['tags'])
<ul class="flex">
    @if ($tags)
        @foreach(explode(',',$tags) as $tag)
            @php
                $tag = trim($tag);
            @endphp
        <li
            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
        >
            <a href="/?tag={{$tag}}">{{$tag}}</a>
        </li>
        @endforeach
    @else
        <p>No tags, sorry...</p>
    @endif
</ul>
