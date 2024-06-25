{{-- passing the listing argument as props to this component --}}
@props(['listing'])

<a href="/listing/{{$listing->id}}" class="job-wrapper-link">
    <div class="job-wrapper">
        <div class="layer-one">
            
            <div class="sublayer-one">
                <span>{{ substr($listing->title, 0, 30) }}</span>
            </div>

            <div class="icon-layer">
                <span><i class="crown fas fa-crown"></i> </span>
                <span><i class="heart fas fa-heart"></i> </span>
            </div>
        </div>

        <div class="layer-three">
            {{-- calling the listing tag component  --}}
            <x-listing-tags :tagsCsv="$listing->tags" />  
        </div>

        <div class="layer-two">
            <span class="layer-two-remote">Remote</span>
            <span class="location-span"><i class="location fas fa-map-marker-alt"></i>
                {{ $listing->location }}</span>
            <span class="dollar-span"> $450 - $500/month</span>
        </div>

    </div>
</a>