@extends('front.layouts.master')

@section('page_title') Privacy - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">

            @include('front.layouts.sub-header', ['page_heading' => 'TEAM <span class="fw-normal">JEENI</span>'])

            <!-- Content after the title -->
            <div class="pb-3">
                <div class="row">
                    @foreach($teams as $team)
                        <!-- User -->
                        <div class="col-sm-4 col-md-4 col-lg-3 col-xl-3 col-xxl-2 p-2 team-player">
                            <div class="partner shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front border">
                                            <img class="img-fluid" src="{{ $team->image }}" alt="{{ $team->name }}"/>
                                            <div class="flip-card-front-details">
                                                <p class="text-uppercase fw-bold text-danger pt-2 mb-0">{{ $team->name }}</p>
                                                <p class="mt-0 pt-0 text-uppercase"><small>{{ $team->position }}</small></p>
                                            </div>
                                        </div>
                                        <div class="flip-card-back text-white bg-danger">
                                            <p class="text-uppercase fw-bold text-white pt-2 mb-0">{{ $team->name }}</p>
                                            <p class="mt-0 pt-0 text-uppercase text-center"><small>{{ $team->position }}</small></p>
                                            <p>{{ strip_tags($team->description) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // User -->
                    @endforeach
                </div>
            </div>
            <!-- // Content after the title -->
        </div>
        <!-- // Body content -->
    </main>
@endsection

@section('footer_script')
<script>
    /*$(document).ready(function() {
        $('.team-player').each(function(){
            var highestBox = 0;
            $(this).find('.flip-card-front').each(function(){
                if($(this).height() > highestBox){
                    highestBox = $(this).height();
                }
            });
            $(this).find('.flip-card-front').height(highestBox);
        });
    });*/
</script>
@endsection
