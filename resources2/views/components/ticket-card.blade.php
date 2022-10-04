@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex">
    @foreach($tags as $tag)
    <li class="flex items-center justify-center px-1 ">
    <button class="bg-transparent py-1 px-1
    hover:bg-blue-500 text-blue-700
    hover:text-white border border-blue-500
     hover:border-transparent rounded">
        <a href="/tickets/manage/?tag={{$tag}}">{{$tag}}</a>
      </button>
    </li>
   @endforeach
</ul>
