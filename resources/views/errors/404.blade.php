@extends('front.layouts.master')

@section('page_title') Page Not Found - Jeeni @endsection

@section('content')
    <main>
    <!-- Body content -->
    <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', [ 'page_heading' => '404 - <span class="fw-normal">Page not Found</span>'])

        <!-- Content after the title -->
        <div class="row pb-3 pb-md-5 mt-5">
            <!-- About Content Wrapper -->
            <div class="d-block text-center h6">
                Looks like this page hasn't been plugged in.<br/><br/>
                Try our <a class="text-red" href="{{ url('/') }}">Home Page</a> or
                <a class="text-red" href="{{ route('blogs') }}">Blog Page</a> instead.
            </div>
            <!-- // Content after About Content Wrapper -->
        </div>
        <!-- // Content after the title -->
    </div>
    <!-- // Body content -->
</main>
@endsection
