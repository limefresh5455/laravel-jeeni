@extends('front.layouts.master')

@section('page_title') System Error - Jeeni @endsection

@section('content')
    <main>
    <!-- Body content -->
    <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', [ 'page_heading' => '500 - <span class="fw-normal">Server Error</span>'])

        <!-- Content after the title -->
        <div class="row pb-3 pb-md-5 mt-5">
            <!-- About Content Wrapper -->
            <div class="d-block text-center h6">
                The server encountered an internal error or misconfiguration and was unable to complete your request.<br/><br/>
                Go to our <a class="text-red" href="{{ url('/') }}">Home Page</a> or
                <a class="text-red" href="{{ url()->previous() }}">return to previous page</a>.
            </div>
            <!-- // Content after About Content Wrapper -->
        </div>
        <!-- // Content after the title -->
    </div>
    <!-- // Body content -->
</main>
@endsection
