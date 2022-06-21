@extends('front.layouts.master')

@section('page_title') Reset Password - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">
        @include('front.layouts.sub-header', ['page_heading' => 'Reset - <span class="fw-normal">Password</span>'])

        <!-- Content after the title -->
            <div class="row pb-3 mt-5 pb-md-5">
                <div class="col-sm-9 col-md-7 col-lg-5 bg-light py-5 px-2 mx-auto border">
                    <div class="card bg-light border-0">
                        <div class="card-body">

                            <!-- alerts -->
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (session('information'))
                                <div class="alert alert-info" role="alert">
                                    {!! session('information') !!}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input class="form-control @error('email') is-invalid @enderror bg-white rounded-0 shadow-none py-2"
                                           id="email" type="email" required autocomplete="email" autofocus
                                           name="email" placeholder="Email*" value="{{ old('email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <button
                                        class="btn bg-transparent w-100 border-danger border-2 rounded-0 text-center text-uppercase fw-bold"
                                        type="submit">
                                        <span class="text-red hover-dark">
                                            {{ __('Send Password Reset Link') }}
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Content after the title -->
        </div>
        <!-- // Body content -->
    </main>

<!--    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
@endsection
