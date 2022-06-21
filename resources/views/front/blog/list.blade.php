@extends('front.layouts.master')

@section('page_title') Blogs - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', [ 'page_heading' => 'Jeeni <span class="fw-normal">Blog</span>'])

        <!-- Content after the title -->
            <div class="row pb-3 pb-md-5">
                <!-- ******* THESE ARE GRID TYPE COLUMN VIEW -->

                @foreach($blogs as $index => $blog)
                    <!-- Col -->
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-5">
                            <div class="card bg-transparent border-0">
                                <div class="position-relative track-image-container">
                                    <a href="{{ $blog->getUrl() }}" title="{{ $blog->title }}">
                                        <img src="{{ $blog->image }}" class="card-img-top object-fit"
                                             alt="{{ $blog->title }}">
                                    </a>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-2 px-0 text-center">
                                        <p class="bg-dark-grey">
                                            <small class="text-uppercase text-white mx-auto text-center">
                                                {{ $blog->created_at->format('d') }} <br> {{ $blog->created_at->format('M') }}
                                             </small>
                                        </p>
                                    </div>
                                    <div class="col-10">
                                        <div class="card-body py-0 px-0">
                                            <h6 class="card-title text-capitalize text-truncate-line-2">
                                                {{ $blog->title }}
                                            </h6>
                                            <p class="card-text text-mid-grey text-truncate-line-3">
                                                {!! strip_tags(htmlspecialchars_decode($blog->body))  !!}
                                            </p>
                                            <div class="d-block px-0">
                                                <a class="btn px-0 text-danger text-uppercase hover-dark d-inline m-0"
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
                <!-- ******* end  GRID TYPE COLUMN VIEW -->

                <div class="row">
                    <div class="d-inline">
                        {{ $blogs->appends(request()->input())->links('vendor.pagination.custom') }}
                    </div>
                </div>

            </div>
            <!-- // Content after the title -->
        </div>
        <!-- // Body content -->

    </main>
@endsection
