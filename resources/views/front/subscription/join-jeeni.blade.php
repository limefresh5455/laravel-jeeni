@extends('front.layouts.master')

@section('page_title') Join - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', ['page_heading' => 'CHOOSE YOUR <span class="fw-normal">MEMBERSHIP</span>'])

        <!-- Content after the title -->
            <div class="row row-cols-1 mt-5 px-2 row-cols-md-2 px-lg-0 pb-3 pb-md-5">
                <!-- Left col -->
                <div class="col d-md-flex align-items-md-stretch mb-3 mb-md-0">
                    <div class="w-100 bg-light py-5 px-3 border">
                        <div class="row">
                            <div class="text-center mb-3">
                                <div class="d-block">
                                    <img src="{{ asset('front/images/icons/Jeeni_Icon.png') }}" alt="">
                                </div>
                                <div class="d-block py-3">
                                    <h6 class="text-uppercase fw-500">Viewers join here
                                        <span class="text-red fw-bold">for free</span>
                                    </h6>
                                </div>
                                <div class="d-block mb-4">
                                    <a href="{{ url('checkout?type=viewer') }}"
                                        class="btn btn-reverse bg-white border text-uppercase fw-500 rounded-0 px-4">
                                        Join here
                                    </a>
                                </div>
                            </div>
                            <div class="d-block">
                                <h6 class="text-uppercase">100 channels of free entertainment</h6>
                                <ul class="list-unstyled">
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Voting power to promote your favourite artists
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Latest news and exclusive info
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Special offers on tickets, deals & merchandise
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Create and share your own playlists
                                    </li>
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
                                    <h6 class="text-uppercase fw-500">Artists join here <span class="text-red fw-bold">$10 a month</span>
                                    </h6>
                                </div>
                                <div class="d-block mb-4">
                                    <a href="{{ url('checkout?type=artist') }}"
                                        class="btn btn-reverse bg-white border text-uppercase fw-500 rounded-0 px-4">
                                        Join here
                                    </a>
                                </div>
                            </div>
                            <div class="d-block">
                                <h6 class="text-uppercase">BUILD YOUR FANBASE & BOOST YOUR CAREER:</h6>
                                <ul class="list-unstyled">
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Your own dedicated commercial showcase
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Personal Jeeni address
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Publicity service to your fans & the whole Jeeni audience
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Pro Artist marketing suite with full analytics & reports
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Keep 100% of all your sales income
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Keep 100% of all your donations
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Full creative rights package
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Automatic eligibility for Jeeni festivals & awards
                                    </li>
                                    <li class="border-bottom py-1">
                                        <i class="bi bi-check me-1"></i>
                                        Jeeni helpdesk service
                                    </li>
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
