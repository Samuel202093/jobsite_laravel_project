@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);

@endphp

@foreach ( $tags as $tag )
    <span>{{$tag}}</span>
@endforeach