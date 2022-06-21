@foreach($newsfeeds as $newsfeed)
    <div class="col-12 col-md-6 p-0">
        <div class="card mb-1 rounded-0 p-0 bg-lighter-grey border">
            <div class="col p-0">
                <div class="card-body p-0">
                    <div class="d-block">
                        <div class="p-3">
                            <h6 class="card-title text-truncate-line-2">{{ $newsfeed->title }}</h6>
                            <span class="d-block bg-danger separator-90px mb-1"></span>
                            <span class="border-2 border-danger"></span>
                            <p class="card-text">
                                {{ $newsfeed->created_at->format('jS, M Y') }}
                            </p>
                            <p class="card-text text-truncate-line-2 text-muted">
                                {{ strip_tags($newsfeed->description) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
