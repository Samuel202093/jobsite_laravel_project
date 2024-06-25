@extends('layout')

@section('content')

<section class="list-container">
    <div class="list-container-header">
        {{-- <div>
            <img src="{{$listing->logo ? asset('storage/' . $listing->logo) : "No Image"}}" alt="" srcset="" width="300px" height="300px">
        </div> --}}
        <h1>{{$listing->title}}</h1>
        <h3>{{$listing->company}}</h3>
        <div class="job-technologies">
            {{-- calling the listing-tag component --}}
            <x-listing-tags :tagsCsv="$listing->tags" /> 

        </div>
        <span class="location-header"><i class="location fas fa-map-marker-alt"></i> {{$listing->location}}</span>

        <div class="edit-delete-container">
            <a href="/listings/{{$listing->id}}/edit" >
                <i class="far fa-edit"></i>
                {{-- <i class="fa fa-trash" aria-hidden="true"></i> --}}
                {{-- <i class="fa-solid fa-pencil"></i> Edit --}}
            </a>
            {{-- <a href="">Edit</a> --}}
            <form action="/listings/{{$listing->id}}" method="POST">
                @csrf
                @method('DELETE')
                {{-- <button>Delete</button> --}}
                
                <i class="fa fa-trash" aria-hidden="true"></i>
            </form>
            {{-- <a href="">Delete</a> --}}
        </div>
    </div>

    

    <x-card>
        <a href="/listings/{{$listing->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit
        </a>
    </x-card>

    <hr class="horizontal-rule">

    <div class="list-container-description">
        <h1>Job Description</h1>
        <p>{{$listing->description}}</p>
        <a href="{{$listing->email}}" class="message">Contact Employer</a>
        <a href="{{$listing->website}}">Visit Website</a>
    </div>
</section>
{{-- <h2>
    {{$listing['title']}}
</h2> --}}

{{-- <p>
    {{$listing['description']}}
</p> --}}

@endsection