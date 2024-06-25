@extends('layout')    

@section('content')
    <section class="create-gig-container">  
        <div class="form-wrapper">
            <div class="form-heading">
                <h1>Register</h1>
            </div>
            <form action="/users" class="form-main-layer" method="POST">
                {{-- the @csrf prevents cross-site scripting --}}
                @csrf 
                <div class="field-wrapper">
                    <label for="company">Username</label>
                    <input type="text" name="username" id="company" placeholder="" value="{{old('username')}}">
                    @error('username')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field-wrapper">
                    <label for="title">Firstname</label>
                    <input type="text" name="firstname" id="title" placeholder="Example:John" value="{{old('firstname')}}">
                    @error('firstname')
                    <p>{{$message}}</p>
                @enderror
                </div>

                <div class="field-wrapper">
                    <label for="form-location">Lastname</label>
                    <input type="text" name="lastname" id="form-location" placeholder="Example:Doe" value="{{old('lastname')}}">
                    @error('lastname')
                    <p>{{$message}}</p>
                @enderror
                </div>

                
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

                <div class="field-wrapper">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                    <p>{{$message}}</p>
                @enderror
                </div>


                <div class="btn-wrapper">
                    <button>Register</button>
                </div>
            </form>

            <div class="already-have-account-container">
                <p>Already have an account? <a href="/login">Login</a></p>
            </div>
        </div>
    </section>

@endsection