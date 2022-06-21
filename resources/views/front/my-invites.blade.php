@extends('front.layouts.master')

@section('page_title') My Invites - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">
        @include('front.layouts.sub-header', [ 'page_heading' => 'My - <span class="fw-normal">INVITES</span>'])

        <!-- Content after the title -->
            <div class="row pb-3 pb-md-5">
                <!-- My Invites Content Wrapper -->
                <div class="d-block">
                    <!-- agreement -->
                    <p>
                        By typing in the email address of any contact using the MY INVITE form and then clicking on SEND
                        MY INVITE, I agree the following:
                    </p>
                    <p class="border-bottom py-1">
                        <img
                            class="me-2"
                            src="{{ asset('images/icons/Tick_Icon.png') }}"
                            alt="Tick Icon"
                        >
                        I agree they will receive an email from me, via the Jeeni system, inviting them to join Jeeni.
                    </p>
                    <p class="border-bottom py-1">
                        <img
                            class="me-2"
                            src="{{ asset('images/icons/Tick_Icon.png') }}"
                            alt="Tick Icon"
                        >
                        I agree that I am solely responsible for contacting them, and that Jeeni will not contact them
                        directly or use their data in any way unless they become a registered Jeeni member.
                    </p>
                    <!-- // agreement -->

                    <p class="text-red fw-bold mt-5">
                        I can use the MY INVITE form below as many times as I like.
                    </p>
                    <p>
                        Their email (*), to send to multiple people separate each email address with a comma.
                    </p>

                    <!-- invite form -->
                    <form action="{{ route('invite.send') }}" method="POST">
                        @csrf
                        <input
                            id="invite_email"
                            type="text"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control bg-light rounded-0   @if(session()->has('errorMessage')) is-invalid @endif"
                            placeholder="Enter their email..."
                            aria-describedby="basic-addon3"
                            required
                        >

                        @if(session()->has('errorMessage'))
                            <div class="invalid-feedback">
                                {{ session()->get('errorMessage') }}
                            </div>
                        @endif

                        <button
                            type="submit"
                            class="btn rounded-0 mt-3 text-red w-100 bg-light text-uppercase border-danger fw-bold border-2"
                        >
                            Send my invites
                        </button>
                    </form>
                    <!-- // invite form -->
                </div>
                <!-- // Content after About Content Wrapper -->
            </div>
            <!-- // Content after the title -->
        </div>
        <!-- // Body content -->
    </main>
@endsection
