@extends('front.layouts.master')

@section('page_title') My Artists - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', [ 'page_heading' => 'My artists list for <span class="fw-normal">updates and offers</span>'])

        <!-- Content after the title -->
            <div class="row pb-3 pb-md-5 mt-5">

                <!-- Intro section -->
                <div class="row px-2 row-cols-md-2 px-lg-0 pb-3 pb-xl-5">
                    <!-- Left col -->
                    <div class="col-12 col-sm-6 d-md-flex align-items-md-stretch mb-3 mb-md-0">
                        <div class="w-100">
                            <div class="row">
                                <div class="d-block">
                                    <h6 class="text-uppercase">100 channels of free entertainment</h6>
                                    <ul class="list-unstyled">
                                        <li class="border-bottom py-1"><i class="bi bi-check"></i>
                                            My artists can send updates and offers to me by emails or RSS.
                                        </li>
                                        <li class="border-bottom py-1"><i class="bi bi-check"></i>
                                            I can add artists to my list by clicking the add button in their showcase.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Left col -->
                    <!-- Right col -->
                    <div class="col-12 col-sm-6 d-md-flex align-items-md-stretch">
                        <div class="w-100">
                            <div class="row">
                                <div class="d-block">
                                    <h6 class="text-uppercase">100 channels of free entertainment</h6>
                                    <ul class="list-unstyled">
                                        <li class="border-bottom py-1"><i class="bi bi-check"></i>
                                            I can remove artists from my list by clicking on their my artist button below.
                                        </li>
                                        <li class="border-bottom py-1"><i class="bi bi-check"></i>
                                            I can reinstate artists to my list by clicking the add button again.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Right col -->
                </div>
                <!-- // Intro section -->

                <!-- Sorting/filter -->
                <div class="row row-cols-1 row-cols-lg-2 mb-4 px-lg-4">
                    <div class="col-12 col-sm-6 mb-4 mb-lg-0">
                        <form class="col-12 col-md-6" action="{{ route('my-artists') }}" method="GET">
                            <p class="text-danger fw-bold">Select and follow featured Artists</p>
                            <select class="form-select bg-light text-muted" name="order_by"
                                    onchange="this.form.submit()">
                                <option value="all">ORDER BY:</option>
                                <option value="newest" {{($types == 'newest') ? 'selected' : '' }}>Newest</option>
                                <option value="oldest" {{($types == 'oldest') ? 'selected' : '' }}>Oldest</option>
                                <option value="popular" {{($types == 'popular') ? 'selected' : '' }}>Most Popular</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-12 col-sm-6 text-end">
                        <button class="btn border bg-light rounded-0 hover-dark border-danger text-danger"><i
                                class="bi bi-arrow-left"></i></button>
                        <button class="btn border bg-light rounded-0 hover-dark text-muted"><i
                                class="bi bi-arrow-right"></i></button>
                    </div>
                </div>

                <!-- ******* THESE ARE LIST VIEW -->
                <div class="row">
                @foreach($artists as $artist)
                    <!-- Col -->
                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 p-2">
                            <div class="card mb-1 rounded-0 p-1 bg-light border">
                                <div class="row g-0 align-items-center">
                                    <div class="col-4 d-flex">
                                        <img src="{{ $artist->getAvatar() }}"
                                             class="img-fluid object-fit rounded-0" alt="...">
                                    </div>
                                    <div class="col-8 px-3">
                                        <div class="card-body p-0">
                                            <div class="d-block">
                                                <h6 class="card-title text-truncate"><small>{{ $artist->name }}</small>
                                                </h6>
                                                @if(!$artist->followers->contains(auth()->id()))
                                                    <form action="{{ route('artist.following.add') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="artist_id" value="{{ $artist->id }}">
                                                        <button class="btn bg-white border rounded-0 hover-red">
                                                            <small><i>+ Add to my Artist</i></small>
                                                        </button>
                                                    </form>

                                                @else
                                                    <form action="{{ route('artist.following.remove') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="artist_id" value="{{ $artist->id }}">
                                                        <button
                                                            class="btn py-1 px-2 bg-white border rounded-0 text-danger hover-dark time">
                                                            <i><i class="bi bi-dash-circle"></i> Remove</i>
                                                        </button>
                                                    </form>
                                                @endif
                                                <span class="d-block text-muted">...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // end Col -->
                    @endforeach
                </div>
                <!-- ******* end LIST VIEW -->

                <div class="row mt-5">
                    <div class="d-inline">
                        {{ $artists->appends(request()->input())->links('vendor.pagination.custom') }}
                    </div>
                </div>

            </div>
            <!-- // Content after the title -->

        </div>
        <!-- // Body content -->

    </main>
@endsection
