@extends('front.layouts.master')

@section('page_title', 'Offers & Services - Jeeni')

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', ['page_heading' => 'My artists <span class="fw-normal">offers and services</span>'])

        <!-- Content after the title -->
            <div class="row pb-3 pb-md-5">

                <!-- Intro section -->
                <div class="text-center mb-2">
                    <h6 class="text-uppercase">100 channels of free entertainment</h6>
                </div>
                <div class="row px-2 row-cols-md-2 px-lg-0 pb-3 pb-xl-5">
                    <!-- Left col -->
                    <div class="col-12 col-sm-6 d-md-flex align-items-md-stretch mb-3 mb-md-0">
                        <div class="w-100">
                            <div class="row">
                                <div class="d-block">
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
                                    <ul class="list-unstyled">
                                        <li class="border-bottom py-1"><i class="bi bi-check"></i>
                                            I can add artists to my list by clicking the add button in their showcase.
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
                <div class="row mb-4">
                    <div class="col">
                        <form action="">
                            <input
                                name="keyword"
                                id="keyword"
                                class="form-control w-100 bg-light"
                                placeholder="Type here to search for offers"
                            >
                        </form>
                    </div>
                </div>

                <!-- ******* THESE ARE LIST VIEW -->
                <div class="row" id="searchResult">
                @foreach($offers as $offer)
                    <!-- Col -->
                        <div class="col-12 col-md-6 p-2">
                            <div class="card mb-1 rounded-0 p-2 bg-lighter-grey border">
                                <div class="row g-0 align-items-center">
                                    <div class="col-4 d-flex">
                                        <img src="{{ asset('images/group-singing.jpg') }}"
                                             class="img-fluid object-fit rounded-0"
                                             alt="...">
                                    </div>
                                    <div class="col-8 px-1">
                                        <div class="card-body p-2">
                                            <div class="d-block">
                                                <h6 class="card-title text-truncate">{{ $offer->title }}</h6>
                                                <p class="card-text"><i>£{{ $offer->min_price }} -
                                                        £{{ $offer->max_price }}</i></p>
                                                <p class="card-text text-truncate mb-0">
                                                    {!! $offer->description !!}
                                                </p>
                                                <p class="card-text"><a class="text-danger hover-dark" href="#"><small>View
                                                            artist &amp; contact by email</small></a></p>
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
                        {{ $offers->appends(request()->input())->links('vendor.pagination.custom') }}
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
        // $('#keyword').on('keyup', function () {
        //     search();
        // });

        $('#keyword').on('keyup', _.debounce(function (e) {
            search()
        }, 500))

        function search() {
            let keyword = $('#keyword').val();
            $.post('{{ route("offers.search") }}',
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword: keyword
                },
                function (data) {
                    $('#searchResult').html(data.html);
                });
        }
    </script>
@endsection
