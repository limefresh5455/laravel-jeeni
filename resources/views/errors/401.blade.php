@extends('front.layouts.master')

@section('page_title') Unauthorized Access - Jeeni @endsection

@section('content')
    <main>
    <!-- Body content -->
    <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', [ 'page_heading' => '401 - <span class="fw-normal">UNAUTHORIZED</span>'])

        <!-- Content after the title -->
        <div class="row pb-3 pb-md-5 mt-5">
            <!-- About Content Wrapper -->
            <div class="d-block text-center h6">
                You are not authorized to access this page.<br/><br/>
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
