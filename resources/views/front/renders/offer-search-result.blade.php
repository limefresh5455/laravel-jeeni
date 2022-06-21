@foreach($offers as $offer)
    <!-- Col -->
    <div class="col-12 col-md-6 p-2">
        <div class="card mb-1 rounded-0 p-2 bg-lighter-grey border">
            <div class="row g-0 align-items-center">
                <div class="col-4 d-flex">
                    <img src="{{ asset('images/group-singing.jpg') }}"
                         class="img-fluid object-fit rounded-0"
                         alt="...">
                </div>
                <div class="col-8 px-1">
                    <div class="card-body p-2">
                        <div class="d-block">
                            <h6 class="card-title text-truncate">{{ $offer->title }}</h6>
                            <p class="card-text"><i>£{{ $offer->min_price }} - £{{ $offer->max_price }}</i></p>
                            <p class="card-text text-truncate mb-0">
                                {!! $offer->description !!}
                            </p>
                            <p class="card-text"><a class="text-danger hover-dark" href="#"><small>View
                                        artist &amp; contact by email</small></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // end Col -->
@endforeach
