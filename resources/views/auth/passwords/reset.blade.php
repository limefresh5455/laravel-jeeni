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

                            @if (session('failed'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('failed') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" value="{{ $token }}" name="token" />
                                <div class="input-group mb-3">
                                    <input class="form-control @error('email') is-invalid @enderror bg-white rounded-0 shadow-none py-2"
                                           id="email" type="email" required autocomplete="email" autofocus
                                           name="email" placeholder="Username or Email*" value="{{ $email ?? old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input class="form-control @error('password') is-invalid @enderror border-end-0 bg-white rounded-0 shadow-none py-2"
                                           type="password" id="password" name="password" placeholder="Password"
                                           required autocomplete="current-password"
                                           value="">
                                    <span class="input-group-text rounded-0 bg-white">
                                        <i class="bi bi-eye-slash text-red cursor-pointer" id="togglePassword"></i>
                                    </span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input class="form-control border-end-0 bg-white rounded-0 shadow-none py-2"
                                           type="password" id="password-confirm" name="password_confirmation"
                                           placeholder="Confirm Password"
                                           required autocomplete="new-password"
                                           value="">
                                    <span class="input-group-text rounded-0 bg-white">
                                        <i class="bi bi-eye-slash text-red cursor-pointer" id="toggleConfirmPassword"></i>
                                    </span>
                                </div>

                                <div class="input-group mb-3">
                                    <button
                                        class="btn bg-transparent w-100 border-danger border-2 rounded-0 text-center text-uppercase fw-bold"
                                        type="submit">
                                        <span class="text-red hover-dark">
                                            {{ __('Reset Password') }}
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
@endsection
