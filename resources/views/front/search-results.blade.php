@extends('front.layouts.master')

@section('page_title') Search Results - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5">
            <!-- the number of search results and icons -->
<!--            <div class="d-flex justify-content-between align-items-center">
                <div class="px-3">
                    <h6 class="fw-bold mt-1">Search results for "example": 29 Results</h6>
                </div>

                <div class="d-flex">
                    &lt;!&ndash; diplay icons &ndash;&gt;
                    <div class="col d-flex">
                        <button class="fs-4 gridViewBTN me-2 hover-red text-danger p-0 border-0 bg-transparent"><i class="bi bi-grid-3x3"></i></button>
                        <button class="fs-4 listViewBTN hover-red p-0 border-0 bg-transparent"><i class="bi bi-layout-three-columns"></i></button>
                    </div>
                    &lt;!&ndash; // diplay icons &ndash;&gt;
                </div>
            </div>-->
            <!-- // the number of search results and icons -->
            @if(!is_null($tracks))
            <div class="d-flex justify-content-between align-items-center">
                <div class="px-3">
                    <h6 class="fw-bold mt-1"> Search results for "{{$query}}": {{$tracks->total()}} Results </h6>
                </div>

                <div class="d-flex">
                    <!-- Sort by window -->
{{--                    <form action="/search" method="get">--}}
{{--                        @csrf--}}
{{--                        <label type="hidden" name="search" value="{{$query}}"></label>--}}
{{--                        <div class="col-6 d-lg-flex p-0">--}}
{{--                            <label for="sortby"> Sort by:</label>--}}
{{--                            <select class="w-100 shadow-none form-control ddl-channels form-select custom-border rounded-0 bg-transparent">--}}
{{--                                <option value="upload oldest"><a href="#oldest">Upload date: Oldest first</a></option>--}}
{{--                                <option name="sortby" id="sortby" value="relevant">--}}
{{--                                   Most relevant {{$sortby}}--}}
{{--                                </option>--}}
{{--                                <option name="sortby" id="sortby" value="votes">--}}
{{--                                    Vote count--}}
{{--                                </option>--}}
{{--                                --}}{{--<option value="view">View count</option>--}}
{{--                                <option value="upload newest"><a href={{Request::url()."newest"}}>Upload date: Newest first</a></option>--}}
{{--                                <option value="upload oldest"><a href="#oldest">Upload date: Oldest first</a></option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <input type="submit" value="Submit">--}}
{{--                    </form>--}}
                    <!-- diplay icons -->

                    <div class="d-flex">
                        <!-- select section -->
                        <form action="/search" method="get" style="margin-right: 10px;">
                            @csrf
                            <input type="hidden" name="search" value={{$query}}>
                            <input type="hidden" name="view" value={{$view}}>
                            <select onchange="this.form.submit()"
                                    name="sortby"
                                    style="margin-top: 5px;"
                                    class="ddl-sort-channel form-select bg-light border rounded-0 text-muted mx-0 py-0 pr-0"
                                    aria-label="Order Channel">
                                <option value="none" selected disabled hidden>{{strtoupper($sortby)}}</option>
                                <option value="relevant">RELEVANT</option>
                                <option value="latest">LATEST</option>
                                <option value="oldest">OLDEST</option>
{{--                                <option value="votes">VOTES</option>--}}
                                <option value="random">RANDOM</option>
                            </select>
                        </form>
                        <!-- // select section -->
                    </div>

                    <div class="col d-flex">
                        <form action="/search" method="get">
                            @csrf
                            <input type="hidden" name="search" value={{$query}}>
                            <input type="hidden" name="sortby" value={{$sortby}}>
                            @if($view =='grid')
                                <button type="submit" name="view" value="grid" class="fs-4 gridViewBTN me-2 hover-red text-danger p-0 border-0 bg-transparent"><i class="bi bi-grid-3x3"></i></button>
                                <button type="submit" name="view" value="rows" class="fs-4 listViewBTN hover-red p-0 border-0 bg-transparent"><i class="bi bi-layout-three-columns"></i></button>
                            @else
                                <button type="submit" name="view" value="grid" class="fs-4 gridViewBTN me-2 hover-red p-0 border-0 bg-transparent"><i class="bi bi-grid-3x3"></i></button>
                                <button type="submit" name="view" value="rows" class="fs-4 listViewBTN hover-red p-0 text-danger border-0 bg-transparent"><i class="bi bi-layout-three-columns"></i></button>
                            @endif
                        </form>
                    </div>
                    <!-- // diplay icons -->
                </div>
            </div>
            <div class="pb-3 pb-md-5 px-0 p-3">
                <!-- ******* THESE ARE GRID TYPE COLUMN VIEW -->
                @if($view == 'grid')
                <div class="row px-0" id="gridView">
                    <!-- Col -->
                    @foreach($tracks as $track)
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-3">
                            <div class="card bg-transparent border-0">
                                <div class="position-relative track-image-container">
                                    <a href="{{ $track->getLink() }}" title="{{ $track->title }}">
                                        <img src="{{$track->getThumbnail()}}" class="card-img-top object-fit" alt="">
                                    </a>
                                    @include('front.partials.track.action', ['track' => $track])
                                    <div class="total-time">
                                        <span class="bg-red px-2 text-white">{{$track->getDuration()}}</span>
                                    </div>
                                </div>
                                <div class="card-body px-md-0">
                                    <a href="{{ $track->getLink() }}" style="text-decoration: none">
                                        <h6 class="card-title text-capitalize text-truncate-line-2"> {{$track->title}}</h6>
                                        <p class="card-text text-mid-grey text-truncate-line-3">{{$track->excerpt}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- // end Col -->
                    <!-- Col -->
                    <!-- <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-3">
                        <div class="card bg-transparent border-0">
                            <div class="position-relative track-image-container">
                                <img src="./images/slider-3.jpg" class="card-img-top object-fit" alt="">
                                <div class="love-share-add">
                                    <span><i class="bi bi-heart"></i></span>
                                    <span class="mx-3"><i class="bi bi-share"></i></span>
                                    <span class="me-3"><i class="bi bi-plus-lg"></i></span>
                                </div>
                                <div class="total-time">
                                    <span class="bg-red px-2 text-white">3:16</span>
                                </div>
                            </div>
                            <div class="card-body px-md-0">
                            <h6 class="card-title text-capitalize text-truncate-line-2"> Gloria - a holiday love story - original christimas song for 2021</h6>
                            <p class="card-text text-mid-grey text-truncate-line-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur dicta quae recusandae accusantium sequi autem rerum, magni accusamus?</p>
                            </div>
                        </div>
                    </div> -->
                    <!-- // end Col -->
                </div>

                <!-- ******* end  GRID TYPE COLUMN VIEW -->


                <!-- ******* THESE ARE LIST VIEW -->
                @else
                <div class="row px-0" id="listView">
                    <!-- Col -->
                    @foreach($tracks as $track)
                        <div class="col-12 col-sm-6 mb-2 px-0 me-0 pe-md-4">
                            <div class="card mb-1 rounded-0 border-0">
                                <div class="row g-0 align-items-center">
                                    <div class="col-5 d-flex track-image-container-list">
                                        <a href="{{ $track->getLink() }}" title="{{ $track->title }}">
                                            <img src="{{$track->getThumbnail()}}" class="img-fluid object-fit rounded-0" alt="">
                                        </a>
                                        <div class="position-absolute">
                                            <span class="d-inline-block bg-red text-white px-2 m-2 text-uppercase p-0"><small>3:16</small></span>
                                        </div>
                                        <a href="#"><i class="play-btn bi bi-play-fill"></i></a>
                                    </div>
                                    <div class="col-7 px-0">
                                        <div class="card-body p-2">
                                            <div class="d-block share-container">
                                                @include('front.partials.track.action', ['track' => $track])
                                            </div>
                                            <div class="d-block">
                                                <a href="{{ $track->getLink() }}" style="text-decoration: none">
                                                    <h6 class="card-title text-truncate pt-4">{{$track->title}}</h6>
                                                    <p class="card-text text-truncate">{{$track->excerpt}}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="w-100">
                        </div>
                    @endforeach
                    <!-- // end Col -->
                    <!-- Col -->
{{--                    <div class="col-12 col-sm-6 mb-2 px-0 me-0 pe-md-4">--}}
{{--                        <div class="card mb-1 rounded-0 border-0">--}}
{{--                            <div class="row g-0 align-items-center">--}}
{{--                                <div class="col-5 d-flex">--}}
{{--                                    <img src="./images/group-singing.jpg" class="img-fluid object-fit rounded-0" alt="...">--}}
{{--                                    <div class="love-share-add">--}}
{{--                                        <span><i class="bi bi-heart text-red hover-dark"></i></span>--}}
{{--                                        <span class="mx-3"><i class="bi bi-share text-red hover-dark"></i></span>--}}
{{--                                        <span class="me-3"><i class="bi bi-plus-lg text-red hover-dark"></i></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="position-absolute">--}}
{{--                                        <span class="d-inline-block bg-red text-white px-2 m-2 text-uppercase p-0"><small>3:16</small></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="#"><i class="play-btn bi bi-play-fill"></i></a>--}}
{{--                                </div>--}}
{{--                                <div class="col-7 px-0">--}}
{{--                                    <div class="card-body p-2">--}}
{{--                                        <div class="d-block">--}}
{{--                                            <h6 class="card-title text-truncate pt-4">Gloria - A Holiday Love Story - Original Christimas Song For 2021 Lorem ipsum dolor sit amet.</h6>--}}
{{--                                            <p class="card-text text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr class="w-100">--}}
{{--                    </div>--}}
                    <!-- // end Col -->
                </div>
                <!-- ******* end LIST VIEW -->
                @endif
                <div class="row">
                    <hr class="w-100 my-5">
                </div>

                <div class="row">
                    <div class="d-inline">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                @csrf
                                {{$tracks->appends(request()->input())->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            @else
            <div>
                <h6 class="card-title text-capitalize text-truncate-line-2"> No Results</h6>
            </div>
            @endif
            <!-- // Content after the title -->
        </div>
        <!-- // Body content -->

        <!-- <script src="Javascript/select_channel_page.js"></script> -->
    </main>
@endsection
