@extends('front.layouts.master')

@section('page_title') Home - Jeeni @endsection

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="hero-bg-img">
            <div class="container-xl py-5">

                <div class="row row-cols-1 row-cols-md-2 pb-lg-3 pt-lg-5">
                    <!-- Content - left col -->
                    <div class="col mb-5 mb-lg-0">
<!--                        <div class="row row-cols-1 text-center text-md-start text-white">
                            <div class="col">
                                <h1 class="fw-bold text-uppercase">Jeeni</h1>
                            </div>
                            <div class="col">
                                <p class="col-12 col-xxl-10 m-0 h5 text-uppercase lh-sm">
                                    SAFE, ETHICAL, ALTERNATIVE
                                    <br><br>
                                    100 CHANNELS OF FREE ENTERTAINMENT<br>
                                    FROM INDEPENDENT PERFORMERS<br>
                                    WHO KEEP ALL THE REWARDS<br>
                                    <br><br>
                                    THIS WEBSITE IS IN BETA-TEST,<br>
                                    ENJOY THE RIDE!</p>
                            </div>
                            <div class="col">
                                <div
                                    class="row row-cols-1 row-cols-lg-3 justify-content-between align-items-center py-4">
                                    <div class="col px-0">
                                        <div
                                            class="hero-feature row justify-content-center justify-content-md-start flex-lg-column gap-lg-2 flex-xl-row px-xl-2 px-xxl-0 py-2">
                                            <div class="col-auto px-0">
                                                <img src="https://jeeni-22.s3.eu-west-2.amazonaws.com/homepage-assets/thumbnail_Funds_Icon.png" alt="">
                                            </div>
                                            <div class="col-auto px-lg-0 d-lg-inline text-start">
                                                <p class="m-0 h5">$1,172,000</p>
                                                <p class="m-0 text-uppercase fs-13">RECENT FUNDS</p>
                                                &lt;!&ndash; <p class="m-0 text-uppercase h5 lh-sm">£880,501 RECENT FUNDS</p> &ndash;&gt;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col px-0">
                                        <div
                                            class="hero-feature row justify-content-center justify-content-md-start flex-lg-column gap-lg-2 flex-xl-row px-xl-2 py-2">
                                            <div class="col-auto px-0">
                                                <img src="https://jeeni-22.s3.eu-west-2.amazonaws.com/homepage-assets/thumbnail_Artists_Helping_Icon.png"
                                                     alt="">
                                            </div>
                                            <div class="col-auto px-lg-0 d-lg-inline text-start">
                                                <p class="m-0 h5">2,547</p>
                                                <p class="m-0 text-uppercase fs-13">ARTISTS HELPING</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col px-0">
                                        <div
                                            class="hero-feature row justify-content-center justify-content-md-start flex-lg-column gap-lg-2 flex-xl-row px-xl-2 py-2">
                                            <div class="col-auto px-0">
                                                <img src="https://jeeni-22.s3.eu-west-2.amazonaws.com/homepage-assets/thumbnail_viewers_Reach_Icon.png"
                                                     alt="">
                                            </div>
                                            <div class="col-auto px-lg-0 d-lg-inline text-start">
                                                <p class="m-0 h5">3,610,904</p>
                                                <p class="m-0 text-uppercase fs-13">REACH VIEWERS</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <a href="#"
                                   class="btn homepage-start hover-red bg-transparent border text-white text-uppercase rounded-0 px-lg-4">
                                    Start
                                </a>
                            </div>
                        </div>-->
                        {!! \App\Helpers\HomePageHelper::getConfigurationData('site.home_page_header_text') !!}
                    </div>
                    <!-- Video - right col  -->
                    <div class="col pb-4">
                        <div class="px-0">
                            <div class="video-player-container">
                                <div class="video-container" id="video-container">

                                    <div class="love-share-add z-index-2">
                                        <span><i class="bi bi-heart"></i></span>
                                        <span class="mx-3"><i class="bi bi-share"></i></span>
                                        <span><i class="bi bi-plus-lg"></i></span>
                                    </div>
                                    <div class="playback-animation" id="playback-animation">
                                        <svg class="playback-icons">
                                            <use class="hidden" href="#play-icon"></use>
                                            <use href="#pause"></use>
                                        </svg>
                                    </div>
                                    <video controls class="video" id="video" preload="metadata"
                                           poster="https://jeeni-22.s3.eu-west-2.amazonaws.com/track/4900/Screenshot-2021-06-27-at-18.49.10_thumbnail.jpg">
                                        <source
                                            src="https://jeeni-22.s3.eu-west-2.amazonaws.com/track/4900/ZmJ7dsQj1HR2.mp4"></source>
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
                                                    <input class="seek" id="seek" value="0" min="0" type="range"
                                                           step="1">
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
                                                    <button data-title="Mute (m)" class="volume-button"
                                                            id="volume-button">
                                                        <svg>
                                                            <use class="hidden" href="#volume-mute"></use>
                                                            <use class="hidden" href="#volume-low"></use>
                                                            <use href="#volume-high"></use>
                                                        </svg>
                                                    </button>
                                                    <input class="volume" id="volume" value="1" data-mute="0.5"
                                                           type="range" max="1" min="0" step="0.01"
                                                           style="position: absodlute">
                                                </div>
                                                <!-- // Volume -->
                                                <button data-title="PIP (p)" class="pip-button" id="pip-button">
                                                    <svg>
                                                        <use href="#pip"></use>
                                                    </svg>
                                                </button>
                                                <button data-title="Full screen (f)" class="fullscreen-button"
                                                        id="fullscreen-button">
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
                                        <path
                                            d="M14.016 5.016h3.984v13.969h-3.984v-13.969zM6 18.984v-13.969h3.984v13.969h-3.984z"></path>
                                    </symbol>

                                    <symbol id="play-icon" viewBox="0 0 24 24">
                                        <path d="M8.016 5.016l10.969 6.984-10.969 6.984v-13.969z"></path>
                                    </symbol>

                                    <symbol id="volume-high" viewBox="0 0 24 24">
                                        <path
                                            d="M14.016 3.234q3.047 0.656 5.016 3.117t1.969 5.648-1.969 5.648-5.016 3.117v-2.063q2.203-0.656 3.586-2.484t1.383-4.219-1.383-4.219-3.586-2.484v-2.063zM16.5 12q0 2.813-2.484 4.031v-8.063q1.031 0.516 1.758 1.688t0.727 2.344zM3 9h3.984l5.016-5.016v16.031l-5.016-5.016h-3.984v-6z"></path>
                                    </symbol>

                                    <symbol id="volume-low" viewBox="0 0 24 24">
                                        <path
                                            d="M5.016 9h3.984l5.016-5.016v16.031l-5.016-5.016h-3.984v-6zM18.516 12q0 2.766-2.531 4.031v-8.063q1.031 0.516 1.781 1.711t0.75 2.32z"></path>
                                    </symbol>

                                    <symbol id="volume-mute" viewBox="0 0 24 24">
                                        <path
                                            d="M12 3.984v4.219l-2.109-2.109zM4.266 3l16.734 16.734-1.266 1.266-2.063-2.063q-1.547 1.313-3.656 1.828v-2.063q1.172-0.328 2.25-1.172l-4.266-4.266v6.75l-5.016-5.016h-3.984v-6h4.734l-4.734-4.734zM18.984 12q0-2.391-1.383-4.219t-3.586-2.484v-2.063q3.047 0.656 5.016 3.117t1.969 5.648q0 2.203-1.031 4.172l-1.5-1.547q0.516-1.266 0.516-2.625zM16.5 12q0 0.422-0.047 0.609l-2.438-2.438v-2.203q1.031 0.516 1.758 1.688t0.727 2.344z"></path>
                                    </symbol>

                                    <symbol id="fullscreen" viewBox="0 0 24 24">
                                        <path
                                            d="M14.016 5.016h4.969v4.969h-1.969v-3h-3v-1.969zM17.016 17.016v-3h1.969v4.969h-4.969v-1.969h3zM5.016 9.984v-4.969h4.969v1.969h-3v3h-1.969zM6.984 14.016v3h3v1.969h-4.969v-4.969h1.969z"></path>
                                    </symbol>

                                    <symbol id="fullscreen-exit" viewBox="0 0 24 24">
                                        <path
                                            d="M15.984 8.016h3v1.969h-4.969v-4.969h1.969v3zM14.016 18.984v-4.969h4.969v1.969h-3v3h-1.969zM8.016 8.016v-3h1.969v4.969h-4.969v-1.969h3zM5.016 15.984v-1.969h4.969v4.969h-1.969v-3h-3z"></path>
                                    </symbol>

                                    <symbol id="pip" viewBox="0 0 24 24">
                                        <path
                                            d="M21 19.031v-14.063h-18v14.063h18zM23.016 18.984q0 0.797-0.609 1.406t-1.406 0.609h-18q-0.797 0-1.406-0.609t-0.609-1.406v-14.016q0-0.797 0.609-1.383t1.406-0.586h18q0.797 0 1.406 0.586t0.609 1.383v14.016zM18.984 11.016v6h-7.969v-6h7.969z"></path>
                                    </symbol>
                                </defs>
                            </svg>
                            <div class="title text-white mt-3">
                                <h5>{{ \App\Helpers\HomePageHelper::getConfigurationData('site.pick_of_the_day_video_sub_title') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Hero Section -->

    @include('front.partials.border')

    <!-- Jenni viewers and artists section -->
        <section class="jeeni-viewers-artists py-5">
            <div class="container-xl">
                <div class="row">
                    <!-- JEENI Viewers caroussel -->
                    <div class="col-12 col-md-6">
                        <div id="jenni-viewers" class="owl-carousel owl-theme">
                            <!-- Slide "single" -->
                            <div class="item overflow-hidden">
                                <div class="card text-white">
                                    <img src="https://jeeni-22.s3.eu-west-2.amazonaws.com/default/thumbnail_welcome+viewers.png"
                                         class="card-img border-0 rounded-0" alt="">
                                    <div
                                        class="card-img-overlay w-100 d-flex align-items-center h-auto row-cols-1 rounded-0 px-4 py-5">
                                        <div>
                                            <div class="mb-3">
                                                <span
                                                    class="btn border rounded-0 d-inline-block btn btn-transparent text-white text-uppercase py-1 hd">HD</span>
                                                <span
                                                    class="btn border rounded-0 d-inline-block btn btn-transparent text-white text-capitalize py-1 mx-1 time">1:17min</span>
                                            </div>
                                            <div class="w-100 mb-3">
                                                <h5 class="card-title text-uppercase h3 fw-bolder p-0 m-0">Jeeni
                                                    Viewers</h5>
                                            </div>
                                            <div class="col-12 col-sm-8 col-md-10 col-xl-6 mb-3">
                                                <p class="card-text fs-16 text-truncate-line-2">What you get for FREE
                                                    when you join Jeeni as a Viewer</p>
                                            </div>
                                            <div>
                                                <a href="track/MjQ1MTk=">
                                                    <button
                                                        class="btn hover-red bg-transparent border text-white text-uppercase rounded-0 px-lg-4">
                                                        <i class="bi bi-caret-right-fill"></i>
                                                        <span>Start now</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Slide "single" -->
                            <!-- Slide "single" -->
                            <div class="item overflow-hidden">
                                <div class="card text-white">
                                    <img src="https://jeeni-22.s3.eu-west-2.amazonaws.com/default/thumbnail_welcome+artists.png"
                                         class="card-img border-0 rounded-0" alt="">
                                    <div
                                        class="card-img-overlay w-100 d-flex align-items-center h-auto row-cols-1 rounded-0 px-4 py-5">
                                        <div>
                                            <div class="mb-3">
                                                <span
                                                    class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-uppercase py-1 hd">HD</span>
                                                <span
                                                    class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-capitalize py-1 mx-1 time">1:17min</span>
                                            </div>
                                            <div class="w-100 mb-3">
                                                <h5 class="card-title text-uppercase h3 fw-bolder p-0 m-0">Jeeni
                                                    Artists</h5>
                                            </div>
                                            <div class="col-12 col-sm-8 col-md-10 col-xl-6 mb-3">
                                                <p class="card-text fs-16 text-truncate-line-2">What you get
                                                    when you join Jeeni as an Artist</p>
                                            </div>
                                            <div>
                                                <a href="track/MjQ4MzA=">
                                                    <button
                                                        class="btn hover-red bg-transparent border text-white text-uppercase rounded-0 px-lg-4">
                                                        <i class="bi bi-caret-right-fill"></i>
                                                        <span>Start now</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Slide "single" -->
                        </div>
                        <div class="w-100">
                            <h2 class="text-uppercase py-2 mt-4">
                                <strong class="text-dark-grey">Welcome</strong>
                                <span class="fw-400">Viewers</span>
                            </h2>
                        </div>
                    </div>
                    <!-- // JEENI Viewers caroussel -->


                    <!-- JEENI Artists carouseel -->
                    <div class="col-12 col-md-6">
                        <div id="jenni-artists" class="owl-carousel owl-theme">
                            <!-- Slide "single" -->
                            <div class="item overflow-hidden">
                                <div class="card text-white">
                                    <img src="https://jeeni-22.s3.eu-west-2.amazonaws.com/default/thumbnail_welcome+artists.png"
                                         class="card-img border-0 rounded-0" alt="">
                                    <div
                                        class="card-img-overlay w-100 d-flex align-items-center h-auto row-cols-1 rounded-0 px-4 py-5">
                                        <div>
                                            <div class="mb-3">
                                                <span
                                                    class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-uppercase py-1 hd">HD</span>
                                                <span
                                                    class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-capitalize py-1 mx-1 time">1:17min</span>
                                            </div>
                                            <div class="w-100 mb-3">
                                                <h5 class="card-title text-uppercase h3 fw-bolder p-0 m-0">Jeeni
                                                    Artists</h5>
                                            </div>
                                            <div class="col-12 col-sm-8 col-md-10 col-xl-6 mb-3">
                                                <p class="card-text fs-16 text-truncate-line-2">What you get
                                                    when you join Jeeni as an Artist.</p>
                                            </div>
                                            <div>
                                                <a href="track/MjQ4MzA=">
                                                    <button
                                                        class="btn hover-red bg-transparent border text-white text-uppercase rounded-0 px-lg-4">
                                                        <i class="bi bi-caret-right-fill"></i>
                                                        <span>Start now</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Slide "single" -->
                            <!-- Slide "single" -->
                            <div class="item overflow-hidden">
                                <div class="card text-white">
                                    <img src="https://jeeni-22.s3.eu-west-2.amazonaws.com/default/thumbnail_welcome+viewers.png"
                                         class="card-img border-0 rounded-0" alt="">
                                    <div
                                        class="card-img-overlay w-100 d-flex align-items-center h-auto row-cols-1 rounded-0 px-4 py-5">
                                        <div>
                                            <div class="mb-3">
                                                <span
                                                    class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-uppercase py-1 hd">HD</span>
                                                <span
                                                    class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-capitalize py-1 mx-1 time">1:17min</span>
                                            </div>
                                            <div class="w-100 mb-3">
                                                <h5 class="card-title text-uppercase h3 fw-bolder p-0 m-0">Jeeni
                                                    Viewers</h5>
                                            </div>
                                            <div class="col-12 col-sm-8 col-md-10 col-xl-6 mb-3">
                                                <p class="card-text fs-16 text-truncate-line-2">What you get for FREE
                                                    when you join Jeeni as a Viewer</p>
                                            </div>
                                            <div>
                                                <a href="track/MjQ1MTk=">
                                                    <button
                                                        class="btn hover-red bg-transparent border text-white text-uppercase rounded-0 px-lg-4">
                                                        <i class="bi bi-caret-right-fill"></i>
                                                        <span>Start now</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Slide "single" -->
                        </div>
                        <div class="w-100">
                            <h2 class="text-uppercase py-2 mt-4">
                                <strong class="text-dark-grey">Welcome</strong>
                                <span class="fw-400">Artists</span>
                            </h2>
                        </div>
                    </div>
                    <!-- // JEENI Artists -->
                </div>
            </div>
        </section>
        <!-- // Jenni viewers and artists -->

        <!-- Latest Videos -->
        <section id="latestVideos" class="latest-videos pb-2 pt-5">
            <div class="container-xl py-2 px-0">
                <div class="row">
                    <!-- Section title -->
                    <div class="w-100 mb-md-5 mb-4">
                        <div class="text-center">
                            <div class="d-inline">
                                <img class="title-icon" src="{{ asset('front/images/icons/Jeeni_Icon_white.png') }}"
                                     alt=""/>
                            </div>
                            <div class="w-100 d-inline text-center">
                                <h2 class="text-center text-white fw-bolder text-uppercase">Latest</h2>
                                <span class="under-title d-block bg-light mx-auto"></span>
                            </div>
                        </div>
                    </div>
                    <!-- // Section title -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="latest-videos" class="owl-carousel owl-theme ">
                            <!-- Slide item -->
                        @foreach($latestVideos as $latestVideo)
                            @include('front.partials.track-item', ['track' => $latestVideo])
                        @endforeach
                        <!-- // Slide item -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Latest Videos -->

    @include('front.partials.border')

    <!-- Inside story videos -->
        <section class="inside-stories pb-2 pt-5">
            <div class="container-xl py-2 px-0">
                <div class="row">
                    <!-- Section title -->
                    <div class="w-100 mb-md-5 mb-4">
                        <div class="text-center">
                            <div class="d-inline">
                                <img class="title-icon" src="{{ asset('front/images/icons/Jeeni_Icon.png') }}" alt=""/>
                            </div>
                            <div class="w-100 d-inline text-center">
                                <h2 class="text-center text-black fw-bolder text-uppercase">inside <span
                                        class="fw-normal">story</span></h2>
                                <span class="under-title d-block bg-black mx-auto"></span>
                            </div>
                        </div>
                    </div>
                    <!-- // Section title -->
                </div>

                <!-- DESKTOP ONLY VERSION CAROUSEL FOR "INSIDE STORIES" (HIDDEN ON MOBILE) -->
                <div class="row d-none d-xl-block">
                    <div class="col-12">
                        <div id="inside-stories" class="owl-carousel owl-theme mb-3">
                            <!-- Item caroussel -->
                            @foreach($insideStoryVideos as $insideStoryVideo)
                                <div class="item overflow-hidden p-2">
                                    <div class="container-grid">
                                        <!-- Col start "top left"-->
                                        <div class="top-left">
                                            <div class="w-100 d-block position-relative">
                                                <div class="img-cover h-auto">
                                                    <img class="w-100 object-fit"
                                                         src="{{ $insideStoryVideo[0]->getThumbnail() }}"
                                                         alt="{{ $insideStoryVideo[0]->title }}">
                                                </div>
                                                @include('front.partials.track.action', ['track' => $insideStoryVideo[0]])
                                                <div class="video-quality-time">
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-uppercase py-1 hd">HD</span>
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-capitalize py-1 mx-1 time">
                                                        {{ $insideStoryVideo[0]->getDuration() }}min
                                                    </span>
                                                </div>
                                                <div class="faded-bottom-card-text pb-2">
                                                    <h3 class="py-0 mb-0 fs-20 text-white fw-bolder text-uppercase text-truncate">
                                                        <a class="text-white text-decoration-none"
                                                           href="{{ $insideStoryVideo[0]->getLink() }}"
                                                           title="{{ $insideStoryVideo[0]->title }}">
                                                            {{ $insideStoryVideo[0]->title }}
                                                        </a>
                                                    </h3>
                                                    <p class="m-0 text-truncate">
                                                        {!! strip_tags($insideStoryVideo[0]->description) !!}
                                                    </p>
                                                </div>
                                                <!-- The below link is to pass in the video (URL) link destinations -->
                                                <a href="{{ $insideStoryVideo[0]->getLink() }}">
                                                    <i class="play-btn bi bi-play-fill"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Col start "bottom left" -->
                                        <div class="bottom-left">
                                            <div class="w-100 d-block position-relative">
                                                <div class="img-cover h-auto">
                                                    <img class="w-100 object-fit"
                                                         src="{{ $insideStoryVideo[1]->getThumbnail() }}" alt="">
                                                </div>
                                                @include('front.partials.track.action', ['track' => $insideStoryVideo[1]])
                                                <div class="video-quality-time">
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-uppercase py-1 hd">HD</span>
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-capitalize py-1 mx-1 time">
                                                        {{ $insideStoryVideo[1]->getDuration() }}min
                                                    </span>
                                                </div>
                                                <div class="faded-bottom-card-text pb-2">
                                                    <h3 class="py-0 mb-0 fs-20 text-white fw-bolder text-uppercase text-truncate">
                                                        <a class="text-white text-decoration-none"
                                                           href="{{ $insideStoryVideo[1]->getLink() }}"
                                                           title="{{ $insideStoryVideo[1]->title }}">
                                                            {{ $insideStoryVideo[1]->title }}
                                                        </a>
                                                    </h3>
                                                    <p class="m-0 text-truncate">
                                                        {{ strip_tags($insideStoryVideo[1]->description) }}
                                                    </p>
                                                </div>
                                                <!-- The below link is to pass in the video (URL) link destinations -->
                                                <a href="{{ $insideStoryVideo[1]->getLink() }}"><i class="play-btn bi bi-play-fill"></i></a>
                                            </div>
                                        </div>
                                        <!-- Col start "middle col" -->
                                        <div class="middle">
                                            <div class="w-100 d-block position-relative">
                                                <div class="img-cover h-auto">
                                                    <img class="w-100 object-fit"
                                                         src="{{ $insideStoryVideo[2]->getThumbnail() }}" alt="">
                                                </div>
                                                @include('front.partials.track.action', ['track' => $insideStoryVideo[2]])
                                                <div class="video-quality-time">
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-uppercase py-1 hd">HD</span>
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-capitalize py-1 mx-1 time">
                                                        {{ $insideStoryVideo[2]->getDuration() }}min
                                                    </span>
                                                </div>
                                                <div class="faded-bottom-card-text pb-2">
                                                    <h3 class="py-0 mb-0 fs-36 text-white fw-bolder text-uppercase text-truncate">
                                                        <a class="text-white text-decoration-none"
                                                           href="{{ $insideStoryVideo[2]->getLink() }}"
                                                           title="{{ $insideStoryVideo[2]->title }}">
                                                            {{ $insideStoryVideo[2]->title }}
                                                        </a>
                                                    </h3>
                                                    <p class="m-0 text-truncate-line-2">
                                                        {!! strip_tags($insideStoryVideo[2]->description) !!}
                                                    </p>
                                                </div>
                                                <!-- The below link is to pass in the video (URL) link destinations -->
                                                <a href="{{ $insideStoryVideo[2]->getLink() }}"><i class="play-btn bi bi-play-fill"></i></a>
                                            </div>
                                        </div>
                                        <!-- Col start "top right" -->
                                        <div class="top-right">
                                            <div class="w-100 d-block position-relative">
                                                <div class="img-cover h-auto">
                                                    <img class="w-100 object-fit"
                                                         src="{{ $insideStoryVideo[3]->getThumbnail() }}" alt="">
                                                </div>
                                                @include('front.partials.track.action', ['track' => $insideStoryVideo[3]])
                                                <div class="video-quality-time">
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-uppercase py-1 hd">HD</span>
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-capitalize py-1 mx-1 time">
                                                        {{ $insideStoryVideo[3]->getDuration() }}min
                                                    </span>
                                                </div>
                                                <div class="faded-bottom-card-text pb-2">
                                                    <h3 class="py-0 mb-0 fs-20 text-white fw-bolder text-uppercase text-truncate">
                                                        <a href="{{ $insideStoryVideo[3]->getLink() }}"
                                                           class="text-decoration-none text-white"
                                                           title="{{ $insideStoryVideo[3]->title }}">
                                                            {{ $insideStoryVideo[3]->title }}
                                                        </a>
                                                    </h3>
                                                    <p class="m-0 text-truncate">
                                                        {{ strip_tags($insideStoryVideo[3]->description) }}
                                                    </p>
                                                </div>
                                                <!-- The below link is to pass in the video (URL) link destinations -->
                                                <a href="{{ $insideStoryVideo[3]->getLink() }}">
                                                    <i class="play-btn bi bi-play-fill"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Col start "bottom right"-->
                                        <div class="bottom-right">
                                            <div class="w-100 d-block position-relative">
                                                <div class="img-cover h-auto">
                                                    <img class="w-100 object-fit"
                                                         src="{{ $insideStoryVideo[4]->getThumbnail() }}" alt="">
                                                </div>
                                                @include('front.partials.track.action', ['track' => $insideStoryVideo[4]])
                                                <div class="video-quality-time">
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-uppercase py-1 hd">HD</span>
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-capitalize py-1 mx-1 time">
                                                        {{ $insideStoryVideo[4]->getDuration() }}min
                                                    </span>
                                                </div>
                                                <div class="faded-bottom-card-text pb-2">
                                                    <h3 class="py-0 mb-0 fs-20 text-white fw-bolder text-uppercase text-truncate">
                                                        <a title="{{ $insideStoryVideo[4]->title }}"
                                                           class="text-white text-decoration-none"
                                                           href="{{ $insideStoryVideo[4]->getLink() }}">
                                                            {{ $insideStoryVideo[4]->title }}
                                                        </a>
                                                    </h3>
                                                    <p class="m-0 text-truncate">
                                                        {!! strip_tags($insideStoryVideo[4]->description) !!}
                                                    </p>
                                                </div>
                                                <!-- The below link is to pass in the video (URL) link destinations -->
                                                <a href="{{ $insideStoryVideo[4]->getLink() }}">
                                                    <i class="play-btn bi bi-play-fill"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- // Item caroussel -->
                        </div>
                    </div>
                </div>
                <!-- // end DESKTOP ONLY VERSION CAROUSEL FOR "INSIDE STORIES" (HIDDEN ON MOBILE) -->
                <!-- ################################# IMPORTANT (MAKE SURE TO READ THESE COMMENTS) ################################# -->
                <!-- MOBILE ONLY VERSION CAROUSEL FOR "INSIDE STORIES" (HIDDEN ON DESKTOP) -->
                <div class="row d-block d-xl-none">
                    <div class="col-12">
                        <div id="mobile-inside-stories" class="owl-carousel owl-theme mb-3">
                            <!-- Item (mobile) -->
                            @foreach(\App\Helpers\Jeeni::getInsideStoryVideos(false) as $insideStoryVideo)
                            <div class="item overflow-hidden p-2">
                                <div class="mob-container">
                                    <!-- The below link is to passing in video link destinations -->
                                    <a href="#">
                                        <i class="play-btn bi bi-play-fill"></i>
                                        <div class="mob-slide">
                                            <div class="w-100 d-block position-relative">
                                                <div class="img-cover h-auto">
                                                    <a href="{{ $insideStoryVideo->getLink() }}" title="{{ $insideStoryVideo->title }}">
                                                        <img class="w-100 object-fit"
                                                             src="{{ $insideStoryVideo->getThumbnail() }}" alt="{{ $insideStoryVideo->title }}">
                                                    </a>
                                                </div>
                                                @include('front.partials.track.action', ['track' => $insideStoryVideo])
                                                <div class="video-quality-time">
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn btn-transparent fs-14 text-white text-uppercase py-1 hd">HD</span>
                                                    <span
                                                        class="btn border rounded-0 d-inline-block btn
                                                        btn-transparent fs-14 text-white text-capitalize py-1 mx-1 time">
                                                        {{ $insideStoryVideo->getDuration() }}
                                                    </span>
                                                </div>
                                                <div class="faded-bottom-card-text pb-2">
                                                    <h3 class="py-0 mb-0 fs-20 text-white fw-bolder text-uppercase text-truncate">
                                                        <a title="{{ $insideStoryVideo->title }}"
                                                           class="text-white text-decoration-none"
                                                           href="{{ $insideStoryVideo->getLink() }}">
                                                            {{ $insideStoryVideo->title }}
                                                        </a>
                                                    </h3>
                                                    <p class="m-0 text-truncate">
                                                        {!! strip_tags($insideStoryVideo->description) !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- // end MOBILE ONLY VERSION CAROUSEL FOR "INSIDE STORIES" (HIDDEN ON DESKTOP) -->
            </div>
        </section>
        <!-- // Inside story videos -->
    </main>
@endsection
