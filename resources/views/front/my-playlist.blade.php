@extends('front.layouts.master')

@section('page_title', 'My Playlist - Jeeni')

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', ['page_heading' => 'My <span class="fw-normal">playlist</span></h2>'])

        <!-- Sorting/filter -->
            <div class="row mb-4">
                <div class="col">
                    <form action="">
                        <input
                            name="keyword"
                            id="keyword"
                            class="form-control w-100 bg-light"
                            placeholder="Type here to search for tracks"
                        >
                    </form>
                </div>
            </div>

            <!-- // Page headingline/title -->
            <div class="row text-end mb-4">
                <div class="col">
                    <button class="fs-4 gridViewBTN me-2 hover-red text-danger p-0 border-0 bg-transparent"><i
                            class="bi bi-grid-3x3"></i></button>
                    <button class="fs-4 listViewBTN hover-red p-0 border-0 bg-transparent"><i
                            class="bi bi-layout-three-columns"></i></button>
                </div>
            </div>


            <!-- Content after the title -->
            <div class="row pb-3 pb-md-5">
                <!-- ******* THESE ARE GRID TYPE COLUMN VIEW -->
                <div class="row" id="gridView">
                @foreach($tracks as $track)
                    <!-- Col -->
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-3">
                            <div class="card bg-transparent border-0">
                                <div class="position-relative track-image-container">
                                    <a href="{{ $track->getLink() }}" title="{{ $track->title }}">
                                        <img src="{{ $track->getThumbnail() }}"
                                             class="card-img-top object-fit" alt="{{ $track->title }}">
                                    </a>
                                    @include('front.partials.track.action', ['track' => $track])
                                    <!--<span><i class="bi bi-trash"></i></span>-->
                                    <div class="total-time">
                                        <span class="bg-red px-2 text-white">{{$track->getDuration()}}</span>
                                    </div>
                                </div>
                                <div class="card-body px-md-0">
                                    <a href="{{ $track->getLink() }}" title="{{ $track->title }}">
                                        <h6 class="card-title text-capitalize text-truncate-line-2">
                                            {{ $track->title }}
                                        </h6>
                                    </a>
                                    <p class="card-text text-mid-grey text-truncate-line-3">
                                        {{ $track->excerpt }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- // end Col -->
                    @endforeach
                </div>
                <!-- ******* end  GRID TYPE COLUMN VIEW -->


                <!-- ******* THESE ARE LIST VIEW -->
                <div class="row d-none" id="listView">
                    @foreach($tracks as $track)
                    <!-- Col -->
                        <div class="col-12 col-sm-6 mb-2 px-0 me-0 pe-md-4">
                            <div class="card mb-1 rounded-0 border-0">
                                <div class="row g-0 align-items-center">
                                    <div class="col-5 d-flex track-image-container-list">
                                        <a href="{{ $track->getLink() }}" title="{{ $track->title }}">
                                            <img src="{{ $track->getThumbnail() }}" class="img-fluid object-fit rounded-0"
                                                 alt="{{ $track->title }}">
                                        </a>
                                        <span><i class="bi bi-trash text-red hover-dark"></i></span>

                                        <div class="position-absolute">
                                            <span
                                                class="d-inline-block bg-red text-white px-2 m-2 text-uppercase p-0">
                                                <small>{{$track->getDuration()}}</small>
                                            </span>
                                        </div>
                                        <a href="{{ $track->getLink() }}">
                                            <i class="play-btn bi bi-play-fill"></i>
                                        </a>
                                    </div>
                                    <div class="col-7 px-0">
                                        <div class="card-body p-2">
                                            <div class="d-block share-container">
                                                @include('front.partials.track.action', ['track' => $track])
                                            </div>
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
                </div>
                <!-- ******* end LIST VIEW -->

                <div class="row">
                    <hr class="w-100 my-5">
                </div>

                <div class="row">
                    <div class="d-inline">
                        {{ $tracks->appends(request()->input())->links('vendor.pagination.custom') }}
                    </div>
                </div>

            </div>
            <!-- // Content after the title -->
        </div>
        <!-- // Body content -->

    </main>
@endsection

@section('footer_script')
    <script>
        // To change from gridView listView and vice versa
        $(function () {
            $('.listViewBTN').click(function () {
                $(this).addClass('text-danger');
                $('.gridViewBTN').removeClass('text-danger');
                $('#listView').removeClass('d-none');
                $('#gridView').addClass('d-none');
            })
            $('.gridViewBTN').click(function () {
                $(this).addClass('text-danger');
                $('.listViewBTN').removeClass('text-danger');
                $('#listView').addClass('d-none');
                $('#gridView').removeClass('d-none');
            })
        });

    </script>


    <script>
        // $('#keyword').on('keyup', function () {
        //     search();
        // });

        $('#keyword').on('keyup', _.debounce(function (e) {
            search()
        }, 500))

        function search() {
            let keyword = $('#keyword').val();
            $.post('{{ url('my-playlist/search') }}',
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword: keyword
                },
                function (data) {
                    $('#gridView').html(data.gridHtml);
                    $('#listView').html(data.listHtml);
                });
        }
    </script>
@endsection
