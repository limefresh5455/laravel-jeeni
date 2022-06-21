@extends('front.layouts.master')

@section('page_title') My Account - Jeeni @endsection

@section('content')
    <main>
        <!-- Breadcrumb -->
        <div style="display: block !important;" class="w-40 border-bottom-subpages d-none d-md-block mb-md-4">
            <div class="container-xl">
                <div class="row" >
                    <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                        <ol class="breadcrumb my-2 text-capitalize">
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-black-50">Home</a></li>
                            <li class="breadcrumb-item text-red" aria-current="page">My <span class="fw-normal">Account</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- // Breadcrumb -->
        <!-- Body content -->
        <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', [ 'page_heading' => 'My - <span class="fw-normal"> Account</span>'])

        <!-- Content after the title -->
            <div class="row pb-3 pb-md-2">
                <div class="col-sm-9 col-md-7 col-lg-5 bg-light pb-5 px-0 mx-auto border">
                    <!-- Tab nav -->
                    <div class="row px-4">
                        <div class="col-6 text-center py-4 border-end">
                            <h6 class="cursor-pointer text-danger"
                                id="accountDetails">
                                <small>My Password and Account Details</small>
                            </h6>
                        </div>
                        <div class="col-6 text-center py-4">
                            <h6 class="cursor-pointer" id="closeAccount">
                                <small>Close My Account</small>
                            </h6>
                        </div>
                    </div>
                    <hr class="mt-0 mb-4">
                    <!-- // Tab nav -->
                    <!--  tab accountDetailsCard -->
                    <div class="card bg-light border-0 px-3" id="accountDetailsCard">
                        <div class="card-body">
                            <div id="accountDetailsResult" class="alert"></div>
                            <div class="d-block mb-4">
                                <h6 class="text-danger text-uppercase fw-bolder">Current Subscription : {!! auth()->user()->currentRole() !!}</h6>
                            </div>
                            <form id="frmUpdateAccount" action="{{ route('account.edit.post') }}"
                                  method="POST" autocomplete="off">
                                @csrf
                                <div class="input-group mb-3">
                                    <input class="form-control bg-white rounded-0 shadow-none py-2"
                                           id="firstname" value="{{ auth()->user()->first_name }}"
                                           name="firstname" placeholder="First name*" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control bg-white rounded-0 shadow-none py-2"
                                           id="lastname" value="{{ auth()->user()->last_name }}"
                                           name="lastname" placeholder="Last name*" required>
                                </div>
                                <div class="input-group">
                                    <input class="form-control bg-white rounded-0 shadow-none py-2" id="displayName"
                                           name="displayName" value="{{ auth()->user()->getFullName() }}"
                                           placeholder="Display name*" required>
                                </div>
                                <div class="mb-3">
                                    <small class="d-block text-muted fst-italic">
                                        How I want my name to appear on Jeeni
                                    </small>
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control bg-white rounded-0 shadow-none py-2"
                                           id="email"
                                           name="email" placeholder="Email*"
                                           value="{{ auth()->user()->email }}" required>
                                </div>

                                <div class="input-group mb-3">
                                    <input class="form-check-input toggle-password-container"
                                           id="toggle-password-container"
                                           type="checkbox" style="cursor: pointer;">
                                    <label class="form-check-label" for="toggle-password-container" style="cursor: pointer;">
                                        Update Password Details
                                    </label>
                                </div>

                                <div class="input-group mb-3">
                                    <input class="form-check-input jeeni-news-letter"
                                           id="jeeni-news-letter"
                                           {{ (auth()->user()->agree_news_letter) ? 'checked' : '' }}
                                           type="checkbox" style="cursor: pointer;">
                                    <label class="form-check-label" for="jeeni-news-letter" style="cursor: pointer;">
                                        Newsletter Subscription
                                    </label>
                                </div>

                                <div id="togglePasswordContainer">
                                    <div class="input-group mb-4">
                                        <input class="form-control border-end-0 bg-white rounded-0 shadow-none py-2"
                                               type="password" id="password" name="password" placeholder="Password*"
                                               value="">
                                        <span class="input-group-text rounded-0 bg-white">
                                            <i class="bi bi-eye-slash text-red cursor-pointer" id="togglePassword"></i>
                                        </span>
                                    </div>
                                    <div class="input-group mb-4">
                                        <input class="form-control border-end-0 bg-white rounded-0 shadow-none py-2"
                                               type="password" id="confirmPassword" name="confirmPassword"
                                               placeholder="Confirm Password*" value="">
                                        <span class="input-group-text rounded-0 bg-white">
                                        <i class="bi bi-eye-slash text-red cursor-pointer" id="togglePasswordRepeat"></i>
                                    </span>
                                    </div>
                                </div>

                                <div class="input-group mt-5 mb-0">
                                    <button id="btnEditAccount"
                                            class="btn bg-white w-100 border-danger border-2 rounded-0 text-center text-uppercase fw-bold"
                                            type="submit">
                                        <span class="text-red hover-dark">Update</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- // tab accountDetailsCard -->
                    <!-- tab closeAccountCard -->
                    <div class="card bg-light border-0 px-3" id="closeAccountCard">
                        <div class="card-body">
                            <div id="closeAccountResult" class="alert"></div>
                            <form id="frmCloseAccount" action="{{ route('account.close') }}" method="POST" autocomplete="on">
                                @csrf
                                <div class="input-group mb-3">
                                    <input class="form-control bg-white rounded-0 shadow-none py-2" id="email"
                                           name="email" placeholder="Email*" value="" required>
                                </div>
                                <div class="input-group mb-4">
                                    <input class="form-control border-end-0 bg-white rounded-0 shadow-none py-2"
                                           type="password" id="passwordClose" name="password" placeholder="Password*"
                                           value="" required>
                                    <span class="input-group-text rounded-0 bg-white">
                                 </span>
                                </div>
                                <div class="input-group mt-5 mb-0">
                                    <button id="btnCloseProfile"
                                        class="btn bg-white w-100 border-danger border-2 rounded-0 text-center text-uppercase fw-bold"
                                        type="submit">
                                        <span class="text-red hover-dark">Confirm</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- // tab closeAccountCard -->
                </div>
            </div>
            <!-- // Content after the title -->
        </div>
        <!-- // Body content -->
    </main>
@endsection

@section('footer_script')
    <script>
        let accountDetailsResult = $('#accountDetailsResult');
        let closeAccountResult = $('#closeAccountResult');
        let btnEditAccount = $('#btnEditAccount');
        let btnCloseProfile = $('#btnCloseProfile');
        let togglePasswordContainer = $('#togglePasswordContainer');
        let updateNewsLetterConsentLink = '{{ route('account.update-news-letter-consent') }}';

        // Hide and show and hide password and toggle bteween close my account tab on "My Account Edit" page
        $(function () {
            // To switch btween Account details and close account tab
            var closeAccountCard = $('#closeAccountCard').hide();
            $('#closeAccount').click(function () {
                $('#accountDetailsCard').hide(600);
                $('#closeAccountCard').show(600);
                $('#accountDetails').removeClass('text-danger');
                $(this).addClass('text-danger');
                $('.fw-normal').text('Dashboard');
            });
            $('#accountDetails').click(function () {
                $('#closeAccountCard').hide(600);
                $('#accountDetailsCard').show(600);
                $('#closeAccount').removeClass('text-danger');
                $(this).addClass('text-danger');
                $('.fw-normal').text('Account');
            });
            // Show and hide password
            $('#togglePassword').click(function () {
                $(this).toggleClass("bi-eye bi-eye-slash");
                var input = $("#password");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
            $('#togglePasswordRepeat').click(function () {
                $(this).toggleClass("bi-eye bi-eye-slash");
                var input = $("#confirmPassword");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });

        $(document).ready(function () {

            resetResultSetData(closeAccountResult);
            resetResultSetData(accountDetailsResult);

            togglePasswordContainer.hide();

            $(".toggle-password-container").change(function() {
                let checkbox = this;
                if(checkbox.checked) {
                    togglePasswordContainer.show();
                } else {
                    togglePasswordContainer.hide();
                }
            });

            $(".jeeni-news-letter").change(function() {
                let checkbox = this;
                let toggle = (checkbox.checked) ? 1 : 0;
                let formData = new FormData();
                formData.append('toggle', toggle);

                $.ajax({
                    url: updateNewsLetterConsentLink,
                    type: 'POST',
                    data: formData,
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend: function() {
                        toggleFrontLoader('show');
                    },
                    success: function(response) {
                        toggleFrontLoader('hide');
                        toastr.success(response.message);
                    },
                    error: function (data) {
                        toggleFrontLoader('hide');
                        toastr.error(data.message);
                    }
                });
            });

            $("#frmUpdateAccount").validate({
                ignore: ":hidden",
                rules: {
                    firstname: {
                        required: true
                    },
                    lastname: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    confirmPassword: {
                        equalTo: "#password"
                    }
                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    element.parents(".form-group").addClass("has-feedback");
                    element.parents(".input-group").removeClass("mb-3").addClass("mb-4");
                    error.addClass("help-block");
                    error.insertAfter(element);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass("error-col");
                    $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass("error-col");
                    $(element).siblings('.form-control-feedback').remove();
                    $(element).siblings('.help-block').remove();
                    $(element).parents(".input-group").removeClass("mb-4").addClass("mb-3");
                },
                submitHandler: function (form) {
                    let formData = $(form).serializeArray().reduce(function (obj, item) {
                        obj[item.name] = item.value;
                        return obj;
                    }, {});

                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'POST',
                        dataType: 'JSON',
                        data: formData,
                        beforeSend: function () {
                            btnEditAccount.attr('disabled', 'disabled');
                            toggleFrontLoader('show');
                        },
                        success: function (data) {
                            if (data.hasOwnProperty('error')) {
                                setResultSetData(accountDetailsResult, data.message, false);
                                btnEditAccount.removeAttr('disabled');
                            } else {
                                setResultSetData(accountDetailsResult, data.message, true);
                                btnEditAccount.removeAttr('disabled');
                            }
                            toggleFrontLoader('hide');
                            setTimeout(function () {
                                resetResultSetData(accountDetailsResult);
                            }, 2000);
                        },
                        error: function (data) {
                            setResultSetData(accountDetailsResult, data.message, false);
                            btnEditAccount.removeAttr('disabled');
                            toggleFrontLoader('hide');
                        }
                    });

                    return false;
                }
            });

            $("#frmCloseAccount").validate({
                ignore: ":hidden",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    element.parents(".form-group").addClass("has-feedback");
                    element.parents(".input-group").removeClass("mb-3").addClass("mb-4");
                    error.addClass("help-block");
                    error.insertAfter(element);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass("error-col");
                    $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass("error-col");
                    $(element).siblings('.form-control-feedback').remove();
                    $(element).siblings('.help-block').remove();
                    $(element).parents(".input-group").removeClass("mb-4").addClass("mb-3");
                },
                submitHandler: function (form) {
                    let formData = $(form).serializeArray().reduce(function (obj, item) {
                        obj[item.name] = item.value;
                        return obj;
                    }, {});

                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'POST',
                        dataType: 'JSON',
                        data: formData,
                        beforeSend: function () {
                            btnCloseProfile.attr('disabled', 'disabled');
                            toggleFrontLoader('show');
                        },
                        success: function (data) {
                            if (data.hasOwnProperty('error')) {
                                setResultSetData(closeAccountResult, data.message, false);
                                btnCloseProfile.removeAttr('disabled');
                            } else {
                                setResultSetData(closeAccountResult, data.message, true);
                                btnCloseProfile.removeAttr('disabled');
                            }
                            toggleFrontLoader('hide');
                            setTimeout(function () {
                                resetResultSetData(closeAccountResult);
                                window.location.reload();
                            }, 2000);
                        },
                        error: function (data) {
                            setResultSetData(closeAccountResult, data.message, false);
                            btnCloseProfile.removeAttr('disabled');
                            toggleFrontLoader('hide');
                        }
                    });

                    return false;
                }
            });
        });

        function setResultSetData(resultData, message, type) {
            resetResultSetData(resultData);
            let className = (type === false) ? 'alert-danger' : 'alert-success';
            resultData.addClass(className);
            resultData.html(message);
            resultData.show();
        }

        function resetResultSetData(resultData) {
            resultData.hide();
            resultData.html('');
            resultData.removeClass('alert-success alert-danger');
        }
    </script>
@endsection
