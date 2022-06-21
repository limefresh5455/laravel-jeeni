@extends('front.layouts.master')

@section('page_title') Invest - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl pt-5 body-content">

            @include('front.layouts.sub-header', [ 'page_heading' => 'JEENI <span class="fw-normal">SUPPORT</span>'])

            <!-- Support Content Wrapper -->
            <div class="row pb-3 pb-md-5">

                @if (session('status'))
                    <div class="col-12 col-lg-12 mb-2">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif

                <div class="col-12 col-lg-6 p-0 mb-3">
                    <!-- form card -->
                    <div class="card rounded-0 border">
                        <div class="card-body bg-transparent">
                            <form id="support_form" action="{{ route('support.submit') }}" method="POST">
                                @csrf
                                <!-- name section -->
                                <input id="name" name="feedback-name" type="text" class="form-control bg-light rounded-0 mb-3 ps-3" placeholder="Name" required>
                                <!-- // name section -->

                                <!-- email section -->
                                <div class="input-group mb-4">
                                    <input id="email" name="feedback-email" type="email" class="form-control bg-light rounded-0 ps-3" placeholder="Email" required>
                                </div>
                                <!-- // email section -->

                                <!-- select section -->
                                <select name="feedback-type" class="form-select mb-4 bg-light border rounded-0 ps-3 text-muted" aria-label="Default select example">
                                    <option value="TECHNICAL HELPDESK" selected>TECHNICAL HELPDESK</option>
                                    <option value="LEGAL HELPDESK">LEGAL HELPDESK</option>
                                    <option value="BUSINESS HELPDESK">BUSINESS HELPDESK</option>
                                </select>
                                <!-- // select section -->

                                <!-- textarea section -->
                                <textarea name="feedback-description" class="form-control bg-light rounded-0 mb-3 ps-3"
                                          id="textAreaExample1" rows="6" placeholder="Message" required></textarea>
                                <!-- // textarea section -->
                                <!-- GOOGLE CAPTCHA GOES HERE -->
<!--                                <div class="row py-5">
                                    <div class="text-center mx-auto border bg-warning py-3" style="max-width: 250px;">
                                        Google Captcha is passed here by the backend
                                    </div>
                                </div>-->
                                <button type="submit"
                                        class="btn border-danger rounded-0 text-red fw-bold text-uppercase w-100 bg-light mt-2 mb-xl-5">
                                    submit
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- // form card  -->
                </div>

                <!-- Jeeni support information -->
                {!! $cmsPage->body !!}
                <!-- Jeeni support information -->
            </div>
            <!-- // Content after Support Content Wrapper -->
        </div>
    </main>
@endsection
