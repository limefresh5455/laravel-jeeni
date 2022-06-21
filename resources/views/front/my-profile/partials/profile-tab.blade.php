<div class="tab-pane fade show active" id="profile">
    <!-- Edit settings buttons -->
    <div class="d-block text-end px-1 py-2">
        @if(!$readOnly)
            <div class="text-end d-inline">
                <button class="btn bg-lighter-grey hover-red text-capitalize" type="button" data-bs-toggle="modal" data-bs-target="#profilePopup">
                    <span class="me-1"><i class="bi bi-pencil"></i></span> Edit My Profile
                </button>
                <button class="btn bg-lighter-grey hover-red view-tab" type="button" data-bs-toggle="modal" data-bs-target="#socialMediaPopup"><i class="bi bi-megaphone"></i> My Social Media links</button>
            </div>
        @endif
    </div>
    <!-- // Edit settings -->

    <div class="d-block mb-4">
        <h6 class="text-danger text-uppercase fw-bolder">Current Subscription : {!! $user->currentRole() !!}</h6>
    </div>

    @if(!$user->hasRole('viewer'))
    <div class="d-block">
        <div class="w-100 mb-5">
            <p class="pb-0 mb-2" for="paypalLink">
                <span class="fw-bold">My Paypal Donations Email Address or Paypal.me Link</span>
            </p>
            @if(!is_null($user->paypal_link))
                <p class="p-2 mb-1 border text-muted">{{ $user->paypal_link }}</p>
            @else
                <p class="mb-0">
                    <small>
                        <a class="hover-dark text-danger" href="https://www.paypal.com/paypalme/" target="_blnk">
                            Create your Paypal.me link today
                        </a>
                    </small>
                </p>
            @endif
        </div>
    </div>
    @endif

    <div class="d-block">
        <h6 class="text-danger text-uppercase fw-bolder">About me <span class="px-2"><i class="bi bi-info-circle-fill "></i></span></h6>
        <p>{!! $user->bio !!}</p>
    </div>
    <!-- Share profile social links -->
    <div class="d-block pt-3 pt-xl-5 mt-xl-3">
        <div class="bg-light border">
            <h5 class=" py-2 px-4 border-bottom"><small>Share my profile with others</small></h5>
            <div class="d-flex align-items-center px-4">
                <div class="d-inline-block">
                    <ul class="list-unstyled m-0">
                        <li class="d-inline"><a href="#" target="_blank"><img src="{{ asset('/images/icons/email.png') }}" alt=""></a></li>
                        <li class="d-inline"><a href="#" target="_blank"><img src="{{ asset('/images/icons/fb.png') }}" alt=""></a></li>
                        <li class="d-inline"><a href="#" target="_blank"><img src="{{ asset('/images/icons/tw.png') }}" alt=""></a></li>
                        <li class="d-inline"><a href="#" target="_blank"><img src="{{ asset('/images/icons/lk.png') }}" alt=""></a></li>
                        <!--<li class="d-inline"><a href="#" target="_blank"><img src="{{ asset('/images/icons/pin.png') }}" alt=""></a></li>
                        <li class="d-inline"><a href="#" target="_blank"><img src="{{ asset('/images/icons/ins.png') }}" alt=""></a></li>
                        <li class="d-inline"><a href="#" target="_blank"><img src="{{ asset('/images/icons/sap.png') }}" alt=""></a></li>-->
                    </ul>
                </div>
<!--                <div class="d-inline-block px-2">
                    <form action="">
                        <input class="d-block border form-control rounded-0 w-auto" type="text" placeholder="Other...?">
                    </form>
                </div>-->
            </div>
            <div class="row mt-2 px-4 mb-4">
                <p class="text-muted m-0 p-0">Copy my publicity link</p>
                <p id="artistProfileLink" class="link-to-copy form-control rounded-0 text-black-50">
                    {{ $user->getArtistLink() }}</p>
                <button onclick="copyToClipboard('artistProfileLink')"
                        class="btn bg-transparent w-100 border-danger border-2 rounded-0 text-center text-uppercase fw-bold">
                    <span class="text-red hover-dark">Copy link</span>
                </button>
            </div>
        </div>
    </div>
</div>
