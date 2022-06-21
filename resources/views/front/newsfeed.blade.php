@extends('front.layouts.master')

@section('page_title', 'Offers & Services - Jeeni')

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', ['page_heading' => 'My artists <span class="fw-normal">newsfeed</span>'])

        <!-- Content after the title -->
            <div class="row pb-3 pb-md-5">

                <!-- Sorting/filter -->
                <div class="row mb-4">
                    <div class="col">
                        <form action="">
                            <input
                                name="keyword"
                                id="keyword"
                                class="form-control w-100 bg-light"
                                placeholder="Type here to search for newsfeed"
                            >
                        </form>
                    </div>
                </div>

                <!-- ******* THESE ARE LIST VIEW -->
                <div class="row" id="searchResult">
                    @foreach($newsfeeds as $newsfeed)
                        <div class="col-12 col-md-6 p-0">
                            <div class="card mb-1 rounded-0 p-0 bg-lighter-grey border">
                                <div class="col p-0">
                                    <div class="card-body p-0">
                                        <div class="d-block">
                                            <div class="p-3">
                                                <h6 class="card-title text-truncate-line-2">{{ $newsfeed->title }}</h6>
                                                <span class="d-block bg-danger separator-90px mb-1"></span>
                                                <span class="border-2 border-danger"></span>
                                                <p class="card-text">
                                                    {{ $newsfeed->created_at->format('jS, M Y') }}
                                                </p>
                                                <p class="card-text text-truncate-line-2 text-muted">
                                                    {{ $newsfeed->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- ******* end LIST VIEW -->

                <div class="row mt-5">
                    <div class="d-inline">
                        {{ $newsfeeds->appends(request()->input())->links('vendor.pagination.custom') }}
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
            $.post('{{ route("marketing.search") }}',
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
