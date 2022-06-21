<div class="item">
    <div class="card bg-transparent border-0">
        <div class="position-relative track-image-container">
            <a href="{{ $track->getLink() }}" title="{{ $track->title }}">
                <img src="{{ $track->getThumbnail() }}"
                     class="card-img-top object-fit" alt="{{ $track->title }}">
            </a>
            @include('front.partials.track.action', ['track' => $track])
            <div class="total-time">
                <span class="bg-red px-2 text-white">{{ $track->getDuration() }}</span>
            </div>
        </div>
        <div class="card-body px-md-0">
            <a href="{{ $track->getLink() }}" title="{{ $track->title }}">
                <h5 class="card-title text-capitalize h6 text-white text-truncate-line-2">
                    {{ $track->title }}
                </h5>
            </a>
            <p class="card-text text-mid-grey text-truncate-line-3">
                {{ strip_tags($track->description) }}
            </p>
        </div>
    </div>
</div>
