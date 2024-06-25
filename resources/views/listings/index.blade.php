@extends('layout')
{{-- the @extends('layout') is similar to the includes in normal php --}}

@section('content')
    @include('partials._hero')

    <section class="remote-jobs-section">
        <div class="remote-jobs-heading-container">
            <h1>Featured remote jobs</h1>
            <span>Explore 1k+ remote job opportunities</span>
        </div>

        {{-- <h1>Testing the grid with for each starts</h1> --}}

         <div class="job-main-container">
            @foreach ($listings as $listing)
                {{-- calling the listing-card component in the foreach method to render each card --}}
                <x-listing-card :listing="$listing" /> 
            @endforeach 
        </div>  

        <div class="pagination-container">
            {{$listings->links()}}
        </div>

    </section>

  


    <section class="companies-section">

        <div class="company-heading-wrapper">
            <h2>Companies that let you work remotely</h2>
            <span>Find companies that deserve you!</span>
        </div>

        <div class="box-wrapper">
            <div class="company-detail-container">
                <div class="image-wrapper">
                    <img src="{{ asset('images/company2.avif') }}" alt="company-image">
                </div>
                <div class="company-wrapper-content">
                    <div class="company-location">
                        <div class="company-icon-wrapper"><span>A</span></div>
                        <div class="location-wrapper">
                            <h2>Acme Corp</h2>
                            <div class="location-rating-wrapper">
                                <span class="span-location"><i class="location fas fa-map-marker-alt"></i> Chicago</span>
                                <span class="star-span"><i class="star fas fa-star"></i> 5.0</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-type">
                        <span><i class="fas fa-briefcase"></i> Blockchain</span>
                        <span><i class="fas fa-briefcase"></i> Frontend</span>
                    </div>
                    <div class="available-container">
                        <span>84 jobs available</span>
                    </div>

                </div>
            </div>

            <div class="company-detail-container">
                <div class="image-wrapper">
                    <img src="{{ asset('images/company1.avif') }}" alt="company-image">
                </div>
                <div class="company-wrapper-content">
                    <div class="company-location">
                        <div class="company-icon-wrapper"><span>W</span></div>
                        <div class="location-wrapper">
                            <h2>Webflow</h2>
                            <div class="location-rating-wrapper">
                                <span class="span-location"><i class="location fas fa-map-marker-alt"></i> New York</span>
                                <span class="star-span"><i class="star fas fa-star"></i> 4.8</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-type">
                        <span><i class="fas fa-briefcase"></i> Saas</span>
                        <span><i class="fas fa-briefcase"></i> Software</span>
                    </div>
                    <div class="available-container">
                        <span>23 jobs available</span>
                    </div>

                </div>
            </div>

            <div class="company-detail-container">
                <div class="image-wrapper">
                    <img src="{{ asset('images/company3.avif') }}" alt="company-image" srcset="">
                </div>
                <div class="company-wrapper-content">
                    <div class="company-location">
                        <div class="company-icon-wrapper"><span>M</span></div>
                        <div class="location-wrapper">
                            <h2>Uxper Group</h2>
                            <div class="location-rating-wrapper">
                                <span class="span-location"><i class="location fas fa-map-marker-alt"></i> Singapore</span>
                                <span class="star-span"><i class="star fas fa-star"></i> 4.8</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-type">
                        <span><i class="fas fa-briefcase"></i> Saas</span>
                        <span><i class="fas fa-briefcase"></i> Fintech</span>
                    </div>
                    <div class="available-container">
                        <span>45 jobs available</span>
                    </div>

                </div>
            </div>
        </div>

    </section>


    <section class="post-a-job-section">
        <div class="post-a-job-wrapper">
            <h2>Employers</h2>
            <h1>Hire remotely</h1>
            <p>Find out why over 3 million Employers trust us to deliver a qualified applicants</p>
                @auth
                <a href="/listing/create">Post jobs free</a>
                @else
                <a href="/login">Post jobs free</a>
                @endauth
            {{-- <button>Post jobs Free</button> --}}
        </div>
    </section>
@endsection
