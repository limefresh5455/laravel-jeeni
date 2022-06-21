@extends('front.layouts.master')

@section('page_title') Join - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content {{ $type }}">

            @include('front.layouts.sub-header', ['page_heading' => 'JOIN <span class="fw-normal">- JEENI</span>'])

            <!-- Content after the title -->
            <div class="row pb-3 pb-md-5">
                <div class="col-sm-9 col-md-7 col-lg-5 bg-light-grey py-5 mx-auto border-1">
                    <div class="card bg-light-grey border-0">
                        <div class="card-body">
                            <div id="resultData" class="alert"></div>
                            <form id="frmRegister" action="{{ route('checkout.post') }}" method="POST" autocomplete="off">
                                @csrf
                                <input type="hidden" name="hdnType" id="hdnType" value="{{ $type }}" />
                                <div class="input-group mb-3">
                                    <input class="form-control bg-white rounded-0 shadow-none py-2"
                                           type="text"
                                           id="firstname"
                                           name="firstname"
                                           placeholder="My first name*"
                                           value="{{ \App\Helpers\SocialDataHelper::getSocialData('first_name') }}">
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control bg-white rounded-0 shadow-none py-2"
                                           type="text"
                                           id="lastname"
                                           name="lastname"
                                           placeholder="My last name*"
                                           value="{{ \App\Helpers\SocialDataHelper::getSocialData('last_name') }}">
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control bg-white rounded-0 shadow-none py-2"
                                           type="email"
                                           id="email"
                                           name="email"
                                           placeholder="Email address*"
                                           value="{{ \App\Helpers\SocialDataHelper::getSocialData('email') }}">
                                </div>
                                <div class="input-group mb-4 {{ $passwordClass }}">
                                    <input class="form-control border-end-0 bg-white rounded-0 shadow-none py-2"
                                           type="password"
                                           id="password"
                                           name="password"
                                           placeholder="Password"
                                           value="{{ \App\Helpers\SocialDataHelper::getSocialData('password') }}">
                                    <span class="input-group-text rounded-0 bg-white">
                                    <i class="bi bi-eye-slash text-red" id="togglePassword" style="cursor: pointer;"></i>
                                 </span>
                                </div>
                                @if($type == 'artist')
                                    <!-- Card choices -->
                                    <input type="hidden" id="stripeToken" name="stripeToken" value="" />
                                    <div class="form-check p-0 d-block d-sm-flex justify-content-between" >
                                        <div class="form-check form-check-inline mb-3">
                                            <input checked class="payment-type form-check-input border-2 cursor-pointer" type="radio" name="CardPaymentChoices" id="stripeRadio" value="Stripe">
                                            <label class="form-check-label cursor-pointer" for="stripeRadio">
                                                <img src="{{ asset('front/images/icons/Stripe_Card.png') }}" alt="" style="margin-right: 7px;">
                                                <i>Credit Card (Stripe)</i>
                                            </label>
                                        </div>
                                        <div class="d-none form-check form-check-inline mb-3">
                                            <input class="payment-type form-check-input border-2 cursor-pointer" type="radio" name="CardPaymentChoices" id="paypleRadio" value="PayPal">
                                            <label class="form-check-label cursor-pointer" for="paypleRadio">
                                                <img src="{{ asset('front/images/icons/PayPa_Card.png') }}" alt="" style="margin-right: 7px;">
                                                <i>PayPal</i>
                                            </label>
                                        </div>
                                    </div>
                                    <div id="paypalNote">
                                        <p><i>Pay with your credit card via PayPal</i></p>
                                    </div>
                                    <!-- Card and terms -->
                                    <div class="forms bg-white p-3 mb-2">
                                        <div class="col-12">
                                            <div class="d-flex flex-column">
                                                <div id="card-modal-element"></div>
                                            </div>
                                            <div id="card-modal-errors"
                                               role="alert"
                                               class="error d-none">
                                                The payment could not be processed by the issuer for an unknown reason.
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-check d-block pb-2">
                                    <div class="pb-2 jeeni-checkbox-container">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="signUpNewsLetter" name="signUpNewsLetter" style="cursor: pointer;">
                                        <label class="form-check-label f-size-08" for="signUpNewsLetter" style="cursor: pointer;">
                                            Sign up for free jeeni Newsletter. <br>
                                            <span class="text-muted">
                                                <i>Delivered direct to your inbox for the latest news, events and offers</i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="pb-0 pb-sm-1 jeeni-checkbox-container">
                                        <input class="form-check-input" type="checkbox"
                                               name="agreeTerms" value=""
                                               id="agreeTerms" style="cursor: pointer;">
                                        <label class="form-check-label f-size-08 lh-1"
                                               for="agreeTerms" style="cursor: pointer;">
                                            I have read and agree to the jeeni
                                        </label>
                                        <span>
                                            <a class="text-red f-size-08 text-decoration"
                                               href="{{ route('terms') }}" target="_blank">
                                                terms and conditions
                                            </a>
                                        </span>
                                    </div>
                                </div>

                                <div class="input-group mt-4 mb-3">
                                    <button id="card-modal-button" class="btn btn-join-jenni bg-transparent w-100 border-danger border-2 rounded-0 text-center text-uppercase fw-bold" type="submit">
                                        <span class="text-red">Join</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Content after the title -->
        <form id="frmLogin" method="post" action="{{ route('login') }}" class="d-none">
            @csrf
            <input type="email" name="email" id="hdnEmail" value="" />
            <input type="password" name="password" id="hdnPassword" />
        </form>
    </main>

@endsection

@section('footer_script')
    @include('front.partials.stripe-scripts')
    <script>
        let paypleRadio = $('#paypleRadio');
        let paypalNote = $('#paypalNote');

        $(document).ready(function (){

            togglePaypalNote();

            $("#frmRegister").validate({
                ignore: ":hidden",
                rules: {
                    firstname : {
                        required: true
                    },
                    lastname : {
                        required: true
                    },
                    email : {
                        required: true,
                        email: true
                    },
                    password : {
                        required: true
                    },
                    agreeTerms : {
                        required : true
                    }
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    if(element.attr('type') === 'checkbox') {
                        element.parents('.jeeni-checkbox-container').addClass('position-relative shadow-lg rounded');
                    } else {
                        element.parents(".form-group").addClass("has-feedback");
                        element.parents(".input-group").removeClass("mb-3").addClass("mb-4");
                    }
                    error.addClass("help-block");
                    error.insertAfter(element);
                },
                highlight: function ( element, errorClass, validClass ) {
                    $(element).addClass("error-col");
                    $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $(element).removeClass("error-col");
                    $(element).siblings('.form-control-feedback').remove();
                    $(element).siblings('.help-block').remove();
                    if($(element).attr('type') === 'checkbox') {
                        $(element).parents('.jeeni-checkbox-container').removeClass('position-relative shadow-lg rounded');
                    } else {
                        $(element).parents(".input-group").removeClass("mb-4").addClass("mb-3");
                    }
                },
                submitHandler: function (form) {
                    let formData = $(form).serializeArray().reduce(function(obj, item) {
                        obj[item.name] = item.value;
                        return obj;
                    }, {});

                    registerUser($(form).attr('action'), formData);
                    return false;
                }
            });

            $('.payment-type').change(function(){
                togglePaypalNote();
            });
        });

        function togglePaypalNote() {
            if(paypleRadio.is(':checked')) {
                paypalNote.removeClass('d-none');
            } else {
                paypalNote.addClass('d-none');
            }
        }

        function registerUser(submitUrl, formData) {
            let btnJoinJenni = $('.btn-join-jenni');
            $.ajax({
                url: submitUrl,
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                beforeSend: function() {
                    btnJoinJenni.attr('disabled', 'disabled');
                    toggleFrontLoader('show');
                },
                success: async function (data) {
                    let responseData = data;
                    if (data.hasOwnProperty('error')) {
                        setResultData(data.message, false);
                        btnJoinJenni.removeAttr('disabled');
                    } else {
                        setLoginForm(data.data);
                        if (formData.hdnType === 'artist') {
                            const cardHolderName = responseData.data.cardHolderName;
                            const clientSecret = responseData.data.indentSecret;
                            const {setupIntent, error} = await modelStripe.confirmCardSetup(
                                clientSecret, {
                                    payment_method: {
                                        card: modelCard,
                                        billing_details: {name: cardHolderName}
                                    }
                                }
                            );

                            if (error) {
                                toggleFrontLoader('hide');
                                setResultData(error.message, false);
                            } else {
                                chargePayment(setupIntent, formData, responseData);
                            }

                        } else {
                            setResultData(data.message, true);
                            btnJoinJenni.removeAttr('disabled');
                            loginToDashboard()
                        }
                    }
                    toggleFrontLoader('hide');
                },
                error: function (data) {
                    setResultData(data.message, false);
                    btnJoinJenni.removeAttr('disabled');
                    toggleFrontLoader('hide');
                }
            });
        }

        function setLoginForm(data) {
            $('#hdnEmail').val(data.email);
            $('#hdnPassword').val(data.password);
        }

        function chargePayment(setupIntent, formData, responseData) {
            $.ajax({
                url: '{{ route('checkout.charge_payment') }}',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'payment_method' : setupIntent.payment_method,
                    'token' : document.querySelector('meta[name="csrf-token"]').content,
                    'email' : formData.email
                },
                beforeSend: function() {
                    toggleFrontLoader('show');
                },
                success: function (data) {
                    setResultData(data.message, true);
                    toggleFrontLoader('hide');
                    loginToDashboard();
                },
                error: function (data) {
                    console.log(data)
                    setResultData(data.message, false);
                    toggleFrontLoader('hide');
                }
            });
        }

        function goToHomePage() {
            window.location.href = JEENI_HOME_PAGE;
        }

        function loginToDashboard() {
            setTimeout(function (){
                $('#frmLogin').submit();
            }, 500);
        }
    </script>
@endsection
