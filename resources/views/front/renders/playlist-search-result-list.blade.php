@foreach($tracks as $track)
    <!-- Col -->
    <div class="col-12 col-sm-6 mb-2 px-0 me-0 pe-md-4">
        <div class="card mb-1 rounded-0 border-0">
            <div class="row g-0 align-items-center">
                <div class="col-5 d-flex">
                    <img src="./images/group-singing.jpg" class="img-fluid object-fit rounded-0"
                         alt="...">
                    <div class="love-share-add">
                        <span><i class="bi bi-heart text-red hover-dark"></i></span>
                        <span class="mx-3"><i class="bi bi-share text-red hover-dark"></i></span>
                        <span class="me-3"><i class="bi bi-plus-lg text-red hover-dark"></i></span>
                        <span><i class="bi bi-trash text-red hover-dark"></i></span>
                    </div>
                    <div class="position-absolute">
                                        <span
                                            class="d-inline-block bg-red text-white px-2 m-2 text-uppercase p-0"><small>3:16</small></span>
                    </div>
                    <a href="#"><i class="play-btn bi bi-play-fill"></i></a>
                </div>
                <div class="col-7 px-0">
                    <div class="card-body p-2">
                        <div class="d-block">
                            <h6 class="card-title text-truncate pt-4">
                                {{ $track->title }}
                            </h6>
                            <p class="card-text text-truncate">
                                {{ $track->excerpt }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="w-100">
    </div>
    <!-- // end Col -->
@endforeach
