@extends('front.layouts.master')

@section('page_title') Invest - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl pt-5 body-content">

            @include('front.layouts.sub-header', [ 'page_heading' => 'PARTNERS'])

            <!-- Content after the title -->
                <div class="pb-3">
                    <!-- Introduction of Partners page -->
                    <div class="d-block pb-3">
                        <p class="fw-bold text-center mb-4">Jeeni is proud to be in partnership with these organisations.</p>
                        <p class="fw-bold text-center mb-1">TOUCH ANY LOGO FOR DETAILS.</p>
                        <p class="text-center">For partnership enquiries please contact our Business Helpdesk
                            <a class="text-red" href="{{ route('support') }}">HERE</a>.
                        </p>
                    </div>
                    <!-- // Introduction of Partners page -->

                    <!-- Partners Images -->
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-amplify.png') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">AMPLIFYX</h5>
                                            <p>AmplifyX, our global partners for investment opportunities in emerging and established artists, and our co-producers of Jeeni Première streamed festivals. www.amplifyx.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-wings.jpeg') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">WINGS OVER EUROPE</h5>
                                            <p>Jeeni artists live on the Paul McCartney Stage of the most famous bus in the world. www.1972wingstourbus.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-chillblast.jpeg') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">CHILLBLAST</h5>
                                            <p>Jeeni’s own-brand computers and laptops from the UK’s most awarded Custom PC Builder. www.chillblast.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-arms.png') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">ARMS AROUND THE CHILD</h5>
                                            <p>Our global charity partners, providing love, hope and dignity for children living in extreme adversity. www.armsaroundthechild.org</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-seedlegals.png') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">SEEDLEGALS</h5>
                                            <p>Our expert legal and funding partners, helping Jeeni grow our businesses and reward our investors. www.seedlegals.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-acm.png') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">ACADEMY OF CONTEMPORARY MUSIC</h5>
                                            <p>World leaders in Music Industry Education, partners in Jeeni Awards. www.acm.ac.uk</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-ssu.jpeg') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">SOUTHAMPTON SOLENT UNIVERSITY</h5>
                                            <p>Our research and innovation partners, with 11,000 students and 60,000 graduates. www.solent.ac.uk</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-gradfuel.png') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">GRADFUEL</h5>
                                            <p>Matching hand-picked graduates with the perfect job opportunities working with Jeeni. www.gradfuel.co</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-linkedin.png') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">LINKEDIN CONNECT</h5>
                                            <p>Our partners for professionals in entertainment. www.linkedin.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-SBS.jpeg') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">SBS EVENTS</h5>
                                            <p>SBS Events, our public events and live gig partners, for professional Audio-Visual Hire, Installations and Equipment. https://sbs-events.com/</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-victorious.png') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">VICTORIOUS FESTIVAL</h5>
                                            <p>Jeeni is proud to be in partnership with Victorious, the biggest festival on the South Coast, where world-class stars appear alongside our brand new talent. www.victoriousfestival.co.uk</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 p-2">
                            <div class="partner bg-white shadow-none p-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img class="img-fluid" src="{{ asset('front/./images/partners-people.jpeg') }}"/>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 class="fw-bold">THE PEOPLE'S LOUNGE</h5>
                                            <p>Cultural collective of artists, musicians, poets, designers, cooks, activists, DJs, groovers, movers and shakers. Jeeni partners for new talent and live events. www.facebook.com/ThePeoplesLounge</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Partners Images -->
                </div>
                <!-- // Content after the title -->
        </div>
    </main>
@endsection
