{{-- prosp like in the react --}}
@props(['listing'])

{{-- <x-card class="border-solid border-2 border-sky-500"> --}}
<x-card >
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                {{-- when we are dilling with eloquent models it gives us what's called a collection, we can use syntax with the arrow  --}}
                <a href="/listing/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <x-listing-tags :tags="$listing->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>