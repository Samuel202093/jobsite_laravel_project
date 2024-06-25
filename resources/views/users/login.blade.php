@extends('layout')    

@section('content')
    <section class="create-gig-container">
        {{-- <h1>Create gig</h1> --}}
        <div class="form-wrapper">
            <div class="form-heading">
                <h1>Login</h1>
                <span>Login to post a gig</span>
            </div>
            <form action="/users/authenticate" class="form-main-layer" method="POST">
                {{-- the @csrf prevents cross-site scripting --}}
                @csrf 
                
                <div class="field-wrapper">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Example:johndoe@gmail.com" value="{{old('email')}}">
                    @error('email')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field-wrapper">
                    <label for="website">Password</label>
                    <input type="password" name="password" id="website" placeholder="" value="{{old('password')}}">
                    @error('password')
                    <p>{{$message}}</p>
                @enderror
                </div>


                <div class="btn-wrapper">
                    <button>Login</button>
                </div>
            </form>

            <div class="already-have-account-container">
                <p>Don't have an account? <a href="/register">Register</a></p>
            </div>
        </div>
    </section>

@endsection