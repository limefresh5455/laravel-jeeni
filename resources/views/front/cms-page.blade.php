@extends('front.layouts.master')

@section('page_title') {{ ucfirst($cmsPage->title) }} - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">
            @include('front.layouts.sub-header', ['page_heading' => strtoupper($cmsPage->title)])
            {!! $cmsPage->body !!}
        </div>
        <!-- // Body content -->
    </main>
@endsection
