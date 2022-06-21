@extends('front.layouts.master')

@section('page_title', 'My Profile - Jeeni')

@section('content')
    <main class="body-content">
        <!-- Profile cover -->
        <section class="align-items-end">
            <div class="container-fluid p-0 m-0">
                <div class="avatar-upload">
                    @if(!$readOnly)
                        <div class="avatar-edit">
                            <input type='file' name="cover_photo" id="imageUpload" accept="image/*" />
                            <!-- <label class="hover-red" for="imageUpload"><span class="me-1"><i class="bi bi-camera"></i></span> Edit cover</label> -->

                            <label type="button" class="btn bg-white hover-red" for="imageUpload" data-bs-toggle="tooltip" data-bs-html="true" title="Change your profile cover">
                                <span class="me-1"><i class="bi bi-camera"></i></span> Edit cover
                            </label>
                        </div>
                    @endif

                    <div class="avatar-preview">
                        <!-- <div class="container-xl position-relative"> -->
                        <div id="imagePreview" style="background-image: url('{{ $user->getCoverPhoto() }}');"></div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <!-- Profile photo/picture -->
            <!-- <div class="w-100 d-block"> -->
            <div class="profile-cover mx-auto">
                <div class="profile-picture mx-auto">
                    <img class="position-absolute border border-3" src="{{ $user->getAvatar() }}" alt="" id="result">
                    @if(!$readOnly)
                        <div class="profile-photo hover-red rounded position-absolute">
                            <div class="add-photo-icon d-inline w-auto mx-auto">
                                <span class="btn bg-white hover-red rounded-pill"
                                      data-bs-toggle="modal" data-bs-target="#profilePopup" title="Change your profile picture">
                                    <span><i class="bi bi-camera"></i></span>
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- </div> -->
        </section>
        <!-- // Profile cover -->

        <!-- Breadcrumb -->
        <div class="w-40 border-bottom-subpages d-none d-md-block mb-md-4">
            <div class="container-xl">
                <div class="row" >
                    <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                        <ol class="breadcrumb my-2 text-capitalize">
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-black-50">Home</a></li>
                            <li class="breadcrumb-item text-red" aria-current="page">{{ $user->getFullName() }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- // Breadcrumb -->

        <!-- Body content -->
        <div class="container-xl py-5 body-content">

            <div class="row pb-3 pb-md-5">

                <!-- Tabs navs -->
                <div class="w-100">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-bs-toggle="tab">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#showcase" class="nav-link" data-bs-toggle="tab">My Showcase</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tracks" class="nav-link" data-bs-toggle="tab">My Tracks</a>
                        </li>
                        <li class="nav-item">
                            <a href="#marketing" class="nav-link" data-bs-toggle="tab">My Marketing</a>
                        </li>
                        <li class="nav-item">
                            <a href="#offers" class="nav-link" data-bs-toggle="tab">My Offers</a>
                        </li>
                        @if($user->hasStripeId() && !$readOnly)
                            <li class="nav-item">
                                <a href="#subscriptions" class="nav-link" data-bs-toggle="tab">My Subscriptions</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- Start all tabs content -->
                <div class="tab-content">
                    <!-- tab content item -->
                    <!-- profile tab -->
                    @include('front.my-profile.partials.profile-tab')
                    <!-- // tab content item -->

                    <!-- tab content item -->
                    <!-- showcase tab -->
                    @include('front.my-profile.partials.showcase-tab')
                    <!-- // tab content item -->

                    <!-- tab content item -->
                    <!-- tracks tab -->
                    @include('front.my-profile.partials.tracks-tab')
                    <!-- // tab content item -->

                    <!-- tab content item -->
                    <!-- newsfeed tab -->
                    @include('front.my-profile.partials.marketing-tab')
                    <!-- // tab content item -->

                    <!-- tab content item -->
                    <!-- offers tab -->
                    @include('front.my-profile.partials.offers-tab')
                    <!-- // tab content item -->

                    @if($user->hasStripeId() && !$readOnly)
                        <!-- subscription tab -->
                        @include('front.my-profile.partials.subscription-tab')
                    @endif
                </div>
                <!-- End all Tabs content -->
            </div>
        </div>
        <!-- // Body content -->
    </main>


    <!-- ALL MODALS AND POP UPS -->
    @include('front.my-profile.partials.modals')
    <!-- END ALL MODALS AND POP UPS -->
@endsection

@section('footer_script')
    <script src="{{ asset('front/js/profile.js') }}"></script>
    <script>
        let uploadCoverPhoto = '{{ route('update.profile.photo', ['type' => 'cover_photo']) }}';
        let uploadAvatar = '{{ route('update.profile.photo', ['type' => 'avatar']) }}';
        let tabName = '{{ app('request')->input('t', 'profile') }}';
        tinymce.init({
            selector: 'textarea.editor',
            menubar: false
        });
    </script>

    <!-- For select 2 on offers add modal -->
    <script>
        $(document).ready(function() {
            @foreach($data['offers'] as $offer)
                $(`.offer-multi-select-tags{{$offer->id}}`).select2({
                    dropdownParent: $(`#updateOffer{{$offer->id}}`),
                    width: '100%',
                    placeholder: "Select tags",
                });
            @endforeach
        });
    </script>
@endsection
