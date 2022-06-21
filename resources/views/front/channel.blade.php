@extends('front.layouts.master')

@section('page_title') {{ $channel->name }} - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">
            @include('front.layouts.sub-header', ['page_heading' => $channel->name])

            <div class="d-flex justify-content-between align-items-center">
                <div class="px-3">
                    <h5 class="text-uppercase mt-1">{{ $channel->name }}</h5>
                </div>
                <div class="d-flex">
                    <div class="d-flex">
                        <!-- select section -->
                        <select class="ddl-sort-channel form-select bg-light border rounded-0 text-muted mx-2 py-0" aria-label="Order Channel">
                            <option selected>ORDER CHANNEL BY</option>
                            <option {{ ($order == 'latest') ? 'selected' : '' }} value="latest">LATEST</option>
                            <option {{ ($order == 'votes') ? 'selected' : '' }} value="votes">VOTES</option>
                            <option {{ ($order == 'random') ? 'selected' : '' }} value="random">RANDOM</option>
                        </select>
                        <!-- // select section -->
                    </div>

                    <!-- diplay icons -->
                    <div class="d-flex">
                        <div class="col d-flex">
                            <button class="fs-4 gridViewBTN me-2 hover-red text-danger p-0 border-0 bg-transparent">
                                <i class="bi bi-grid-3x3"></i>
                            </button>
                            <button class="fs-4 listViewBTN hover-red p-0 border-0 bg-transparent">
                                <i class="bi bi-layout-three-columns"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col px-3">
                <p class="text-mid-grey">{{ $channel->tracks->count() }} Videos</p>
            </div>

            <div class="pb-3 pb-md-5 px-0 p-3">
                <!-- ******* THESE ARE GRID TYPE COLUMN VIEW -->
                <div class="row px-0" id="gridView">
                    <!-- Col -->
                    @foreach($tracks as $track)
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-3">
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
                                    <h6 class="card-title text-capitalize text-truncate-line-2">
                                        <a class="text-decoration-none" href="{{ $track->getLink() }}">{{ $track->title }}</a>
                                    </h6>
                                    <p class="card-text text-mid-grey text-truncate-line-3">
                                        {!! strip_tags($track->description) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- // end Col -->
                </div>
                <!-- ******* end  GRID TYPE COLUMN VIEW -->


                <!-- ******* THESE ARE LIST VIEW -->
                <div class="row d-none" id="listView">
                    <!-- Col -->
                    @foreach($tracks as $track)
                        <div class="col-12 col-sm-6 mb-2 px-0 me-0 pe-md-4">
                            <div class="card mb-1 rounded-0 border-0">
                                <div class="row g-0 align-items-center">
                                    <div class="col-5 d-flex track-image-container-list">
                                        <img src="{{ $track->getThumbnail() }}" class="img-fluid object-fit rounded-0" alt="{{ $track->title }}">
                                        <div class="position-absolute">
                                            <span class="d-inline-block bg-red text-white px-2 m-2 text-uppercase p-0">
                                                <small>{{ $track->getDuration() }}</small>
                                            </span>
                                        </div>
                                        <a href="#"><i class="play-btn bi bi-play-fill"></i></a>
                                    </div>
                                    <div class="col-7 px-0">
                                        <div class="card-body p-2">
                                            <div class="d-block share-container">
                                                @include('front.partials.track.action', ['track' => $track])
                                            </div>
                                            <div class="d-block">
                                                <h6 class="card-title text-truncate pt-4">
                                                    <a class="text-decoration-none" href="{{ $track->getLink() }}">
                                                        {{ $track->title }}
                                                    </a>
                                                </h6>
                                                <p class="card-text text-truncate">
                                                    {!! $track->descriptiopn !!}
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
                </div>
                <!-- ******* end LIST VIEW -->

                <div class="row">
                    <hr class="w-100 my-5">
                </div>

                <div class="row mt-5">
                    <div class="d-inline">
                        {{ $tracks->appends(request()->input())->links('vendor.pagination.custom') }}
                    </div>
                </div>

            </div>
        </div>
        <!-- // Body content -->
    </main>
@endsection

@section('footer_script')
    <script>
        $(document).ready(function() {
            $('.listViewBTN').click(function(){
                $(this).addClass('text-danger');
                $('.gridViewBTN').removeClass('text-danger');
                $('#listView').removeClass('d-none');
                $('#gridView').addClass('d-none');
            });

            $('.gridViewBTN').click(function(){
                $(this).addClass('text-danger');
                $('.listViewBTN').removeClass('text-danger');
                $('#listView').addClass('d-none');
                $('#gridView').removeClass('d-none');
            });

            $('.ddl-sort-channel').on('change', function (e) {
                let location = window.location.href;
                location += (location.match(/\?/) ? '&' : '?') + 'order=' + $(this).val();
                window.location.href = location;
            });

        });
    </script>
@endsection
