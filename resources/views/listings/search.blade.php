@extends('layout')    

@section('content')
<section class="remote-jobs-section">
    <div class="search-container-back">
        <a href="/">back</a>
    </div>
<div class="job-main-container" id="listingContainer">
    @if(count($listings) > 0)
        @foreach ($listings as $listing)
        {{-- calling the listing-card component in the foreach method to render each card --}}
            <x-listing-card :listing="$listing" /> 
        @endforeach
        @else
        <div id="no-listing-container">
            <p id="noListing">No Result Found!!!!!!</p>
        </div>
    @endif
</div>
<div class="pagination-container">
    {{$listings->links()}}
</div>
</section>

@endsection