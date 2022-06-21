@extends('front.layouts.master')

@section('page_title') Join Now - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">
        <!-- Page headingline/title -->
        <div class="row mb-5">
            <div class="w-100">
                <div class="text-center">
                    <div class="d-inline">
                        <img class="title-icon" src="{{ asset('front/images/icons/Jeeni_Icon.png') }}"/>
                    </div>
                    <div class="w-100 d-inline text-center">
                        <h2 class="text-center fw-bolder text-uppercase">Choose your <span class="fw-normal">membership</span></h2>
                        <span class="under-title d-block bg-dark mx-auto"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Page headingline/title -->
        <!-- Content after the title -->
            <div class="row row-cols-1 px-2 row-cols-md-2 px-lg-0 pb-3 pb-md-5">
                <!-- Left col -->
                <div class="col d-md-flex align-items-md-stretch mb-3 mb-md-0">
                    <div class="w-100 bg-light py-5 px-3 border">
                        <div class="row">
                            <div class="text-center mb-3">
                                <div class="d-block">
                                    <img src="{{ asset('front/images/icons/Jeeni_Icon.png') }}" alt="">
                                </div>
                                <div class="d-block py-3">
                                    <h6 class="text-uppercase fw-500">Viewers join here <span class="text-red fw-bold">for free</span></h6>
                                </div>
                                <div class="d-block mb-4">
                                    <a href="{{ url('register') }}" class="btn btn-reverse bg-white border text-uppercase fw-500 rounded-0 px-4">Join here</a>
                                </div>
                            </div>
                            <div class="d-block">
                                <h6 class="text-uppercase">100 channels of free entertainment</h6>
                                <ul class="list-unstyled">
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum dolor sit</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum dolor sit</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum dolor sit</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum dolor sit</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // Left col -->
                <!-- Right col -->
                <div class="col d-md-flex align-items-md-stretch">
                    <div class="w-100 bg-light py-5 px-3 border">
                        <div class="row">
                            <div class="text-center mb-3">
                                <div class="d-block">
                                    <img src="{{ asset('front/images/icons/Jeeni_Icon.png') }}" alt="">
                                </div>
                                <div class="d-block py-3">
                                    <h6 class="text-uppercase fw-500">Viewers join here <span class="text-red fw-bold">$10 a month</span></h6>
                                </div>
                                <div class="d-block mb-4">
                                    <a href="{{ url('register') }}" class="btn btn-reverse bg-white border text-uppercase fw-500 rounded-0 px-4">Join here</a>
                                </div>
                            </div>
                            <div class="d-block">
                                <h6 class="text-uppercase">100 channels of free entertainment</h6>
                                <ul class="list-unstyled">
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum dolo sectetur</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum dolor sit amet ur</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, sit</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum nsectetur</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum dol etur</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum nsectetur</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum dolor ectetur</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum do</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum nsectetur</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum dol etur</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum nsectetur</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum dolor ectetur</li>
                                    <li class="border-bottom py-1"><i class="bi bi-check me-1"></i>Lorem, ipsum do</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // Right col -->
            </div>
            <!-- // Content after the title -->
        </div>
        <!-- // Body content -->

    </main>
@endsection
