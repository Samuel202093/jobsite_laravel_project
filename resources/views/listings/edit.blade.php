@extends('layout')    

@section('content')
    <section class="create-gig-container">
        {{-- <h1>Create gig</h1> --}}
        <div class="form-wrapper">
            <div class="form-heading">
                <h1>EDIT GIG</h1>
                <span>{{$listings->title}}</span>
            </div>
            <form action="/listings/{{$listings->id}}" class="form-main-layer" method="POST" enctype="multipart/form-data">
                {{-- the @csrf prevents cross-site scripting --}}
                @csrf 
                @method('PUT')
                <div class="field-wrapper">
                    <label for="company">Company Name</label>
                    <input type="text" name="company" id="company" placeholder="" value="{{$listings->company}}">
                    @error('company')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field-wrapper">
                    <label for="title">Job Title</label>
                    <input type="text" name="title" id="title" placeholder="Example:NodeJs developer" value="{{$listings->title}}">
                    @error('title')
                    <p>{{$message}}</p>
                @enderror
                </div>

                <div class="field-wrapper">
                    <label for="form-location">Job Location</label>
                    <input type="text" name="location" id="form-location" placeholder="Example:Berlin" value="{{$listings->location}}">
                    @error('location')
                    <p>{{$message}}</p>
                @enderror
                </div>

                
                <div class="field-wrapper">
                    <label for="email">Contact Email</label>
                    <input type="email" name="email" id="email" placeholder="Example:johndoe@gmail.com" value="{{$listings->email}}">
                    @error('email')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field-wrapper">
                    <label for="website">Website/Application Url</label>
                    <input type="text" name="website" id="website" placeholder="" value="{{$listings->website}}">
                    @error('website')
                    <p>{{$message}}</p>
                @enderror
                </div>

                <div class="field-wrapper">
                    <label for="tags">Tags(Comma Seperated)</label>
                    <input type="text" name="tags" id="tags" placeholder="Example:Laravel,Backend,Mongodb,Postgresql etc" value="{{$listings->tags}}">
                    @error('tags')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field-wrapper">
                    <label for="logo">Company Logo</label>
                    <input type="file" name="logo" id="logo">
                    <img src="{{$listings->logo ? asset('storage/' . $listings->logo) : "No Image"}}" alt="" srcset="" width="100px" height="100px">
                    @error('logo')
                        <p>{{$message || 'image format not supported!'}}</p>
                        
                    @enderror
                </div>

                <div class="field-wrapper">
                    <label for="description">Job Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="include tasks, requirement, salary etc" >{{$listings->description}}</textarea>
                    @error('description')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="btn-wrapper">
                    <button>Update</button>
                </div>
            </form>
        </div>
    </section>

@endsection