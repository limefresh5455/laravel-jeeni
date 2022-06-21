@extends('front.layouts.master')

@section('page_title') Login - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">
            @include('front.layouts.sub-header', ['page_heading' => 'Login - <span class="fw-normal">My dashboard</span>'])

            <!-- Content after the title -->
            <div class="row pb-3 mt-5 pb-md-5">
                <div class="col-sm-9 col-md-7 col-lg-5 bg-light py-5 px-2 mx-auto border">
                    <div class="card bg-light border-0">
                        <div class="card-body">

                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input class="form-control @error('email') is-invalid @enderror bg-white rounded-0 shadow-none py-2"
                                           id="email" type="email" required autocomplete="email" autofocus
                                           name="email" placeholder="Username or Email*" value="{{ old('email') }}">
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
                                    <button
                                        class="btn bg-transparent w-100 border-danger border-2 rounded-0 text-center text-uppercase fw-bold"
                                        type="submit">
                                        <span class="text-red hover-dark">Login</span>
                                    </button>
                                </div>

                                <div class="form-check mb-3 d-block d-sm-flex justify-content-between pb-5">
                                    <div class="pb-2">
                                        <input class="form-check-input cursor-pointer" type="checkbox"
                                               {{ old('remember') ? 'checked' : '' }}
                                               value="" name="remember" id="remember">
                                        <label class="form-check-label cursor-pointer hover-red"
                                               for="remember"><small>Remember me</small></label>
                                    </div>
                                    @if (\Illuminate\Support\Facades\Route::has('password.request'))
                                        <div class="pb-0 pb-sm-4">
                                            <small>
                                                <a class="text-red hover-dark" href="{{ route('password.request') }}">
                                                    Lost your password?
                                                </a>
                                            </small>
                                        </div>
                                    @endif
                                </div>
                                <!-- Social media logins -->
                                <div class="d-sm-flex justify-content-evenly mb-0 mb-sm-2">
                                    <div class="w-100 pb-2">
                                        <a href="{{ route('redirect_google') }}" class="w-100 btn bg-white text-center border rounded-0">
                                            <img class="mx-2" src="{{ asset('front/images/icons/Google_Icon.png') }}" alt="">
                                            <span class="text-black hover-red">Google</span>
                                        </a>
                                    </div>
                                    <div class="mx-2 my-2 d-none d-sm-inline-block">&nbsp;</div>
                                    <div class="w-100 pb-2">
                                        <button class="w-100 btn bg-white text-center border rounded-0">
                                            <img class="mx-2" src="{{ asset('front/images/icons/FB_Icon.png') }}" alt="">
                                            <span class="text-black hover-red">Facebook</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-sm-flex justify-content-evenly"
                                     style="display: none !important;">
                                    <div class="w-100 pb-2">
                                        <button class="w-100 btn bg-white text-center border rounded-0">
                                            <img class="mx-2" src="{{ asset('front/images/icons/Microsoft_icon.png') }}" alt="">
                                            <span class="text-black hover-red">Microsoft</span>
                                        </button>
                                    </div>
                                    <div class="mx-2 my-2 d-none d-sm-inline-block">&nbsp;</div>
                                    <div class="w-100 pb-2">
                                        <button class="w-100 btn bg-white text-center border rounded-0">
                                            <img class="mx-2" src="{{ asset('front/images/icons/Apple_icon.png') }}" alt="">
                                            <span class="text-black hover-red">Apple</span>
                                        </button>
                                    </div>
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
