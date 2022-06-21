@foreach($tracks as $track)
    <!-- Col -->
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-3">
        <div class="card bg-transparent border-0">
            <div class="position-relative track-image-container">
                <img src="./images/slider-3.jpg" class="card-img-top object-fit" alt="">
                <div class="love-share-add">
                    <span><i class="bi bi-heart"></i></span>
                    <span class="mx-3"><i class="bi bi-share"></i></span>
                    <span class="me-3"><i class="bi bi-plus-lg"></i></span>
                    <span><i class="bi bi-trash"></i></span>
                </div>
                <div class="total-time">
                    <span class="bg-red px-2 text-white">3:16</span>
                </div>
            </div>
            <div class="card-body px-md-0">
                <h6 class="card-title text-capitalize text-truncate-line-2">
                    {{ $track->title }}
                </h6>
                <p class="card-text text-mid-grey text-truncate-line-3">
                    {{ $track->excerpt }}
                </p>
            </div>
        </div>
    </div>
    <!-- // end Col -->
@endforeach
