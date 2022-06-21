@extends('front.layouts.master')

@section('page_title') {{ $trackData->title }} - Jeeni @endsection

@section('content')
    <main>
        <section class="single-view-bg">
            <div class="container-xl py-5">
                <div class="row">
                    <div class="px-0">
                        <div class="video-player-container">
                            <div class="video-container" id="video-container">
                                <div class="playback-animation" id="playback-animation">
                                    <svg class="playback-icons">
                                        <use class="hidden" href="#play-icon"></use>
                                        <use href="#pause"></use>
                                    </svg>
                                </div>
                                <video controls class="video" id="video" preload="metadata"
                                       poster="{{ $trackData->getThumbnail() }}">
                                    <source src="{{ $trackData->track_file }}" type="video/mp4"></source>
                                </video>
                                <div class="video-controls hidden" id="video-controls">

                                    <div class="bottom-controls">
                                        <div class="left-controls" style="width: 86%;">
                                            <button data-title="Play (k)" id="play">
                                                <svg class="playback-icons">
                                                    <use href="#play-icon"></use>
                                                    <use class="hidden" href="#pause"></use>
                                                </svg>
                                            </button>
                                            <div class="time">
                                                <time id="time-elapsed">00:00</time>
                                            </div>
                                            <!-- progress bar -->
                                            <div class="video-progress w-100 mx-2 my-0">
                                                <progress id="progress-bar" value="0" min="0"></progress>
                                                <input class="seek" id="seek" value="0" min="0" type="range" step="1">
                                                <div class="seek-tooltip" id="seek-tooltip">00:00</div>
                                            </div>
                                            <!-- // progress bar -->
                                            <div class="time">
                                                <time id="duration">00:00</time>
                                            </div>
                                        </div>
                                        <div class="right-controls d-flex">
                                            <!-- Volume -->
                                            <div class="volume-controls">
                                                <button data-title="Mute (m)" class="volume-button" id="volume-button">
                                                    <svg>
                                                        <use class="hidden" href="#volume-mute"></use>
                                                        <use class="hidden" href="#volume-low"></use>
                                                        <use href="#volume-high"></use>
                                                    </svg>
                                                </button>
                                                <input class="volume" id="volume" value="1" data-mute="0.5" type="range" max="1" min="0" step="0.01" style="position: absodlute">
                                            </div>
                                            <!-- // Volume -->
                                            <button data-title="PIP (p)" class="pip-button" id="pip-button">
                                                <svg>
                                                    <use href="#pip"></use>
                                                </svg>
                                            </button>
                                            <button data-title="Full screen (f)" class="fullscreen-button" id="fullscreen-button">
                                                <svg>
                                                    <use href="#fullscreen"></use>
                                                    <use href="#fullscreen-exit" class="hidden"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <svg style="display: none">
                            <defs>
                                <symbol id="pause" viewBox="0 0 24 24">
                                    <path d="M14.016 5.016h3.984v13.969h-3.984v-13.969zM6 18.984v-13.969h3.984v13.969h-3.984z"></path>
                                </symbol>

                                <symbol id="play-icon" viewBox="0 0 24 24">
                                    <path d="M8.016 5.016l10.969 6.984-10.969 6.984v-13.969z"></path>
                                </symbol>

                                <symbol id="volume-high" viewBox="0 0 24 24">
                                    <path d="M14.016 3.234q3.047 0.656 5.016 3.117t1.969 5.648-1.969 5.648-5.016 3.117v-2.063q2.203-0.656 3.586-2.484t1.383-4.219-1.383-4.219-3.586-2.484v-2.063zM16.5 12q0 2.813-2.484 4.031v-8.063q1.031 0.516 1.758 1.688t0.727 2.344zM3 9h3.984l5.016-5.016v16.031l-5.016-5.016h-3.984v-6z"></path>
                                </symbol>

                                <symbol id="volume-low" viewBox="0 0 24 24">
                                    <path d="M5.016 9h3.984l5.016-5.016v16.031l-5.016-5.016h-3.984v-6zM18.516 12q0 2.766-2.531 4.031v-8.063q1.031 0.516 1.781 1.711t0.75 2.32z"></path>
                                </symbol>

                                <symbol id="volume-mute" viewBox="0 0 24 24">
                                    <path d="M12 3.984v4.219l-2.109-2.109zM4.266 3l16.734 16.734-1.266 1.266-2.063-2.063q-1.547 1.313-3.656 1.828v-2.063q1.172-0.328 2.25-1.172l-4.266-4.266v6.75l-5.016-5.016h-3.984v-6h4.734l-4.734-4.734zM18.984 12q0-2.391-1.383-4.219t-3.586-2.484v-2.063q3.047 0.656 5.016 3.117t1.969 5.648q0 2.203-1.031 4.172l-1.5-1.547q0.516-1.266 0.516-2.625zM16.5 12q0 0.422-0.047 0.609l-2.438-2.438v-2.203q1.031 0.516 1.758 1.688t0.727 2.344z"></path>
                                </symbol>

                                <symbol id="fullscreen" viewBox="0 0 24 24">
                                    <path d="M14.016 5.016h4.969v4.969h-1.969v-3h-3v-1.969zM17.016 17.016v-3h1.969v4.969h-4.969v-1.969h3zM5.016 9.984v-4.969h4.969v1.969h-3v3h-1.969zM6.984 14.016v3h3v1.969h-4.969v-4.969h1.969z"></path>
                                </symbol>

                                <symbol id="fullscreen-exit" viewBox="0 0 24 24">
                                    <path d="M15.984 8.016h3v1.969h-4.969v-4.969h1.969v3zM14.016 18.984v-4.969h4.969v1.969h-3v3h-1.969zM8.016 8.016v-3h1.969v4.969h-4.969v-1.969h3zM5.016 15.984v-1.969h4.969v4.969h-1.969v-3h-3z"></path>
                                </symbol>

                                <symbol id="pip" viewBox="0 0 24 24">
                                    <path d="M21 19.031v-14.063h-18v14.063h18zM23.016 18.984q0 0.797-0.609 1.406t-1.406 0.609h-18q-0.797 0-1.406-0.609t-0.609-1.406v-14.016q0-0.797 0.609-1.383t1.406-0.586h18q0.797 0 1.406 0.586t0.609 1.383v14.016zM18.984 11.016v6h-7.969v-6h7.969z"></path>
                                </symbol>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="video-player-container track-controls">
                    <div class="row pt-3 w-100">
                        <div class="d-flex justify-content-between text-white-50 h-auto player-border p-0">
                            <div class="d-flex">

                                @include('front.partials.track.vote', ['track' => $trackData])
                                @include('front.partials.track.playlist', ['track' => $trackData])
                                @include('front.partials.track.share', ['track' => $trackData])

                                <button class="border-top-0 border-bottom-0 hover-red text-white-50 p-2 mx-0 player-border-right rounded-0"><i class="bi bi-clock-history"></i></button>
                                <a title="View Artist Showcase"
                                   href="{{ $trackData->getArtistShowcaseLink() }}"
                                   class="btn border-top-0 border-bottom-0 hover-red text-white-50 p-2 mx-0 player-border-right rounded-0">
                                    <i class="bi bi-mic"></i>
                                </a>
                                <a title="Learn About Donations" href="{{ $trackData->user->getPaypalLink() }}" class="btn btn-border-top-0 border-bottom-0 hover-red text-white-50 p-2 mx-0 player-border-right rounded-0">
                                    <i class="bi bi-currency-dollar"></i>
                                </a>
                                <!-- <button class="btn border-top-0 border-bottom-0 hover-red text-white-50 p-2 mx-0 player-border-right rounded-0"><i class="bi bi-sha"></i></button> -->
                                <button class="btn border-top-0 border-bottom-0 hover-red text-white-50 p-2 mx-0 player-border-right rounded-0"><i class="bi bi-exclamation-triangle"></i></button>
                            </div>
                            <div class="d-flex">
                                <button data-direction="previous"
                                        data-id="{{ $trackData->id }}"
                                        data-link="{{ route('go-to-track') }}"
                                        title="Previous"
                                        class="btn-go-to border-top-0 border-bottom-0 hover-red text-white-50 p-2 mx-0 player-border-right rounded-0 time">
                                    <i class="bi bi-chevron-double-left"></i>
                                </button>
                                <button data-direction="next"
                                        data-id="{{ $trackData->id }}"
                                        data-link="{{ route('go-to-track') }}"
                                        title="Next"
                                        class="btn-go-to border-top-0 border-bottom-0 hover-red text-white-50 p-2 mx-0 player-border-right rounded-0 time">
                                    <i class="bi bi-chevron-double-right"></i>
                                </button>
                                <button class="btn-show-more border-top-0 border-bottom-0 hover-red text-white-50 p-2 mx-0 player-border-right rounded-0 time">
                                    <i class="bi bi-chevron-double-up"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Breadcrumb -->
        <div class="w-100 border-bottom-subpages d-none d-md-block mb-md-4">
            <div class="container-xl">
                <div class="row" >
                    <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                        <ol class="breadcrumb my-2">
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-black-50">Home</a></li>
                            <li class="breadcrumb-item text-red" aria-current="page">{{ $trackData->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- // Breadcrumb -->

        <!-- Page headingline/title -->
        <div id="trackDetails" class="row py-3 border-bottom">
            <div class="col-12 col-md-10 col-lg-9 mx-auto">
                <div class="d-flex justify-content-between align-items-center pb-3">
                    <div class="d-inline-block">
                        <h6 class="fw-bold text-capitalize d-inline">
                            {{ $trackData->title }}
                        </h6>
                    </div>
                    <div class="d-inline-block">
                        <h6 class="fw-bold text-capitalize d-inline">
                            <span class="btn bg-light border-0 rounded-pill text-danger fw-bold px-2 py-1 me-1 my-1" onclick="sendData('{{ $trackData->id }}', '{{ $trackData->user_id }}')">
                                <i class="bi bi-hand-thumbs-up text-dark"></i> <span id="msg"></span> votes
                            </span>
                        </h6>
                    </div>
                </div>
                <p>{!! strip_tags($trackData->description) !!}</p>
                @if($trackData->getMyTags()->count() > 0)
                    <div class="hashtags">
                        @foreach($trackData->getMyTags() as $tag)
                            <button class="btn bg-light border rounded-0 text-muted px-2 py-1 me-1 my-1">
                                #{{ strtoupper($tag->name) }}
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <!-- // Page headingline/title -->
        <!-- Body content -->
        <div class="container-xl py-4">
            <!-- Content after the title -->
            <div class="row pb-3 pb-md-5">

                <div class="col-12 d-flex justify-content-between px-3">
                    <div class="p-0 m-0">
                        <h5 class="fw-bold py-3 px-0 mx-0">Similar Tracks</h5>
                    </div>
                    <div class="p-0 m-0">
                        <span class="fs-4 text-danger hover-dark cursor-pointer d-inline px-1" id="showGridLayout"><i class="bi bi-grid-3x3"></i></span>
                        <span class="fs-4 text-black hover-red cursor-pointer d-inline px-1" id="showListLayout"><i class="bi bi-layout-three-columns"></i></span>
                    </div>
                </div>
                <!-- ******* THESE ARE GRID TYPE COLUMN VIEW -->
                @php $similarTracks = $trackData->similarTracks() @endphp
                <div class="row grid-layout">
                    @foreach($similarTracks as $similarTrack)
                        <!-- Col -->
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-3 p-2">
                            <div class="card bg-transparent border-0">
                                <div class="position-relative track-image-container">
                                    <a href="{{ $similarTrack->getLink() }}" title="{{ $similarTrack->title }}">
                                        <img src="{{ $similarTrack->getThumbnail() }}"
                                             class="card-img-top object-fit" alt="{{ $similarTrack->title }}">
                                    </a>
                                    @include('front.partials.track.action', ['track' => $similarTrack])
                                    <div class="total-time">
                                        <span class="bg-red px-2 py-1 text-white">{{ $similarTrack->getDuration() }}</span>
                                    </div>
                                </div>
                                <div class="card-body px-md-0">
                                    <h6 class="card-title text-capitalize text-truncate-line-2">
                                        {{ $similarTrack->title }}
                                    </h6>
                                    <p class="card-text text-mid-grey text-truncate-line-3">
                                        {!! strip_tags($similarTrack->description) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- // end Col -->
                    @endforeach
                </div>
                <!-- ******* end  GRID TYPE COLUMN VIEW -->


                <!-- ******* THESE ARE LIST VIEW -->
                <div class="row list-layout d-none">
                    @foreach($similarTracks as $similarTrack)
                        <!-- Col -->
                        <div class="col-12 col-sm-6 mb-2 px-0 me-0 pe-md-4">
                            <div class="card mb-1 rounded-0 border-0">
                                <div class="row g-0 align-items-center">
                                    <div class="col-5 d-flex">
                                        <a href="{{ $similarTrack->getLink() }}" title="{{ $similarTrack->title }}">
                                            <img src="{{ $similarTrack->getThumbnail() }}"
                                                 class="img-fluid object-fit rounded-0"
                                                 alt="{{ $similarTrack->title }}">
                                        </a>
                                        <div class="love-share-add">
                                            <span><i class="bi bi-heart text-red hover-dark"></i></span>
                                            <span class="mx-3"><i class="bi bi-share text-red hover-dark"></i></span>
                                            <span><i class="bi bi-plus-lg text-red hover-dark"></i></span>
                                        </div>
                                        <div class="position-absolute">
                                            <!-- <span class="d-inline-block bg-red text-white px-1 m-1 text-uppercase p-0"><small>Hd</small></span> -->
                                            <span class="d-inline-block bg-red text-white px-1 m-2 text-uppercase p-0">
                                                <small>{{ $similarTrack->getDuration() }}</small>
                                            </span>
                                        </div>
                                        <a href="#"><i class="play-btn bi bi-play-fill"></i></a>
                                    </div>
                                    <div class="col-7 px-0">
                                        <div class="card-body p-2">
                                            <div class="d-block">
                                                <h6 class="card-title text-truncate pt-4">
                                                    {{ $similarTrack->title }}
                                                </h6>
                                                <p class="card-text text-truncate">
                                                    {!! strip_tags($similarTrack->description) !!}
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

            </div>
            <!-- // Content after the title -->
        </div>
        <!-- // Body content -->
    </main>
@endsection

@section('footer_script')
    <script>
        $("#msg").text('{{ $trackData->votes->count() }}');
        function sendData(tId, uId){
            $.ajax({
               type:'POST',
               url:"{{route('track.add-to-favourite')}}",
               data:{'_token': '<?php echo csrf_token() ?>','trackId': tId, 'userId': uId},
               success:function(data){
                  $("#msg").text(data.data.count);
               }
            });
        }

        let trackDetails = $('#trackDetails');

        // To handle the list view on "Sigle Page view"
        $(function () {
            $('#showListLayout').click(function() {
                $('.list-layout').show().removeClass('d-none').addClass('d-flex');
                $('.grid-layout').hide().removeClass('d-flex');
                $(this).removeClass('text-black').addClass('text-danger');
                $('#showGridLayout').removeClass('text-danger')
            });
            $('#showGridLayout').click(function() {
                $('.grid-layout').show().removeClass('d-none');
                $('.list-layout').hide().removeClass('d-flex');
                $(this).removeClass('text-black').addClass('text-danger');
                $('#showListLayout').removeClass('text-danger');
            });
        });
        // To handle the list view on "Single Page view"

        $(document).ready(function() {
            $('button.btn-show-more').on('click', function (e) {
                let i = $(this).find('i');
                if(i.hasClass('bi-chevron-double-up')) {
                    i.removeClass('bi-chevron-double-up').addClass('bi-chevron-double-down');
                    trackDetails.slideUp(1000);
                } else {
                    i.removeClass('bi-chevron-double-down').addClass('bi-chevron-double-up');
                    trackDetails.slideDown(1000);
                }
            });
        });
    </script>
@endsection
