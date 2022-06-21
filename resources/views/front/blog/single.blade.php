@extends('front.layouts.master')

@section('page_title') {{ $blog->title }} - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">
            <div class="row mb-5">
                <div class="w-100">
                    <div class="text-center pb-3 " style="border-bottom:1px dotted rgba(215,215,215,1.0);">
                        <div class="d-inline">
                            <img class="title-icon"
                                 src="{{ asset('front/images/icons/Jeeni_Icon.png') }}" alt=""/>
                        </div>
                        <div class="w-100 d-inline text-center">
                            <h2 class="text-center fw-bolder text-uppercase">Jeeni Blog</h2>
                            <p>Helping the next generation of talent to build a global fanbase</p>
                            <h2 class="text-center fw-bolder text-uppercase">{{ $blog->title }}</h2>
                            <a href="" class="text-decoration-none text-secondary">
                                / By {{ $blog->getAuthorName() }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pb-3 pb-md-5">
                <!-- Blog Content Wrapper -->
                <div class="col-12 col-lg-9 p-0">
                    <div class="d-block pe-lg-2 pe-xl-3">
                        <div class="row">
                            <!-- blog image -->
                            <img class="d-block w-100 img-fluid mb-3"
                                 style="margin: auto;"
                                 src="{{ $blog->image }}"
                                 alt="{{ $blog->title }}">
                            <!-- // blog image -->
                        </div>
                        <div class="row post-body-content">

                            {!! $blog->body !!}

                            <!--<div class="d-block mb-3">
                                <div class="d-block">
                                    <button class="btn mb-2 border hover-red bg-light p-1 mx-1">#Indenpendent</button>
                                    <button class="btn mb-2 border hover-red bg-light p-1 mx-1">#Jazz</button>
                                    <button class="btn mb-2 border hover-red bg-light p-1 mx-1">#Jeeni</button>
                                    <button class="btn mb-2 border hover-red bg-light p-1 mx-1">#Maplesky</button>
                                    <button class="btn mb-2 border hover-red bg-light p-1 mx-1">#Singer</button>
                                </div>
                            </div>-->

                            <!-- social icons -->
                            <div class="d-inline-block">
                                <ul class="list-unstyled fs-3 m-0">
                                    <li class="d-inline social-share" data-share="{{ $blog->getSocialShare() }}">
                                        <i class="bi bi-facebook hover-red cursor-pointer"></i>
                                    </li>
                                    <li class="d-inline social-share"
                                        data-share="{{ $blog->getSocialShare('twitter') }}">
                                        <i class="bi bi-twitter hover-red cursor-pointer"></i>
                                    </li>
                                    <li class="d-inline social-share" data-share="{{ $blog->getSocialShare('linkedin') }}">
                                        <i class="bi bi-linkedin hover-red cursor-pointer"></i>
                                    </li>
                                    <li class="d-inline social-share"
                                        data-type="email"
                                        data-share="{{ $blog->getEmailShareContent() }}">
                                        <i class="bi bi-envelope hover-red cursor-pointer"></i>
                                    </li>
                                </ul>
                            </div>
                            <!-- // social icons -->
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-3 mt-4 mt-lg-0 p-0">
                    <!-- Side blog Wrapper -->
                    <div class="row pb-3 pb-md-5">
                        @foreach($relatedBlogs as $post)
                        <!-- Col -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-12 mb-5">
                            <div class="card bg-transparent border-0">
                                <div class="position-relative track-image-container">
                                    <a title="{{ $post->title }}" href="{{ $post->getUrl() }}">
                                        <img src="{{ $post->image }}" class="card-img-top object-fit"
                                             alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-2 px-0 text-center">
                                        <p class="bg-dark-grey">
                                            <small class="text-uppercase text-white mx-auto text-center">
                                                {{ $blog->created_at->format('d') }}
                                                <br> {{ $blog->created_at->format('M') }}
                                            </small>
                                        </p>
                                    </div>
                                    <div class="col-10">
                                        <div class="card-body py-0 px-0">
                                            <h6 class="card-title text-capitalize text-truncate-line-2">
                                                <a title="{{ $post->title }}" href="{{ $post->getUrl() }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h6>
                                            <p class="card-text text-mid-grey text-truncate-line-3">
                                                {!! strip_tags(htmlspecialchars_decode($blog->body))  !!}
                                            </p>
                                            <div class="d-block px-0">
                                                <a class="btn px-0 text-danger text-uppercase hover-dark d-inline m-0 time"
                                                   href="{{ $blog->getUrl() }}">
                                                    Read more
                                                    <span class="border border-danger py-0 px-2 rounded-pill mx-2">
                                                        <i class="bi bi-arrow-right"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // end Col -->
                        @endforeach
                    </div>
                    <!-- // Side blog Wrapper -->
                </div>
                <!-- // Blog Content Wrapper -->
            </div>
        </div>
    </main>
@endsection

@section('footer_script')
    <script>
        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).ready(function (){
            $('li.social-share').on('click', function (e) {
                if($(this).attr('data-type') === 'email') {
                    window.location.href = $(this).attr('data-share');
                } else {
                    var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                        horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

                    var popup = window.open($(this).attr('data-share'), 'social',
                        'width=' + popupSize.width + ',height=' + popupSize.height +
                        ',left=' + verticalPos + ',top=' + horisontalPos +
                        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

                    if (popup) {
                        popup.focus();
                        e.preventDefault();
                    }
                }
            });
        });
    </script>
@endsection
