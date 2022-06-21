@extends('front.layouts.master')

@section('page_title') Session Expired - Jeeni @endsection

@section('content')
    <main>
    <!-- Body content -->
    <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', [ 'page_heading' => '419 - <span class="fw-normal">Page Expired</span>'])

        <!-- Content after the title -->
        <div class="row pb-3 pb-md-5 mt-5">
            <!-- About Content Wrapper -->
            <div class="d-block text-center h6">
                Please visit our <a class="text-red" href="{{ url('/') }}">Home Page</a> and try again.
            </div>
            <!-- // Content after About Content Wrapper -->
        </div>
        <!-- // Content after the title -->
    </div>
    <!-- // Body content -->
</main>
@endsection
