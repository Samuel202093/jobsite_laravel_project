@extends('layout')    

@section('content')
    <section class="create-gig-container">
        {{-- <h1>Create gig</h1> --}}
        <div class="form-wrapper">
            <div class="form-heading">
                <h1>CREATE A GIG</h1>
                <span>Post a gig to find a developer</span>
            </div>
            <form action="/listings" class="form-main-layer" method="POST" enctype="multipart/form-data">
                {{-- the @csrf prevents cross-site scripting --}}
                @csrf 
                <div class="field-wrapper">
                    <label for="company">Company Name</label>
                    <input type="text" name="company" id="company" placeholder="" value="{{old('company')}}">
                    @error('company')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field-wrapper">
                    <label for="title">Job Title</label>
                    <input type="text" name="title" id="title" placeholder="Example:NodeJs developer" value="{{old('title')}}">
                    @error('title')
                    <p>{{$message}}</p>
                @enderror
                </div>

                <div class="field-wrapper">
                    <label for="form-location">Job Location</label>
                    <input type="text" name="location" id="form-location" placeholder="Example:Berlin" value="{{old('location')}}">
                    @error('location')
                    <p>{{$message}}</p>
                @enderror
                </div>

                
                <div class="field-wrapper">
                    <label for="email">Contact Email</label>
                    <input type="email" name="email" id="email" placeholder="Example:johndoe@gmail.com" value="{{old('email')}}">
                    @error('email')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field-wrapper">
                    <label for="website">Website/Application Url</label>
                    <input type="text" name="website" id="website" placeholder="" value="{{old('website')}}">
                    @error('website')
                    <p>{{$message}}</p>
                @enderror
                </div>

                <div class="field-wrapper">
                    <label for="tags">Tags(Comma Seperated)</label>
                    <input type="text" name="tags" id="tags" placeholder="Example:Laravel,Backend,Mongodb,Postgresql etc" value="{{old('tags')}}">
                    @error('tags')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field-wrapper">
                    <label for="logo">Company Logo</label>
                    <input type="file" name="logo" id="logo">
                    @error('logo')
                        <p>{{$message || 'image format not supported!'}}</p>
                    @enderror
                </div>

                <div class="field-wrapper">
                    <label for="description">Job Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="include tasks, requirement, salary etc" >{{old('description')}}</textarea>
                    @error('description')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="btn-wrapper">
                    <button>create</button>
                </div>
            </form>
        </div>
    </section>

@endsection