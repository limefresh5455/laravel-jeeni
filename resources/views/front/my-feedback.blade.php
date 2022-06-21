@extends('front.layouts.master')

@section('page_title') My Feedback - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', ['page_heading' => 'MY <span class="fw-normal">FEEDBACK</span>'])

        <!-- Content after the title -->
            <div class="row pb-3 pb-md-5">
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <!-- Completed page -->
                    <div id="completed_page" class="feedback-container mt-5">
                        <h2 class="d-flex justify-content-center">Thanks for your Feedback - you’re a Jeenius!</h2>
                    </div>
                    <!-- // Completed page -->
                @else
                    <!-- form content -->
                    <form id="feedback_form" name="feedback_form" action="{{ route('post.myfeedback') }}" method="post">
                        @csrf
                        <div class="feedback-container mt-5">
                            <!-- Description of My feedback page -->
                            <div class="d-block">
                                <p class="text-center">Welcome to MY FEEDBACK, to have my say and help improve jeeni. My
                                    feedback will be anonymous, and I agree that my feedback can become part of a Jeeni poll
                                    or survey.</p>
                            </div>
                            <!-- // Description of My feedback page -->

                            <!-- card1[] -->
                            <div class="card feedback-card feedback-card-border text-dark bg-light rounded-0 mb-3">
                                <div class="card-header bg-light text-red fw-bold d-flex justify-content-center pt-4 pb-3">
                                    What sort of Jeeni user are you? (check as many as appropriate) *
                                </div>
                                <div class="card-body px-5">
                                    <div class="d-block input-wrapper border border-0 border border-0">
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s1" hidden id="check1" type="checkbox" name="card1[]"
                                                   value="I like free music and entertainment"></input>
                                            <label class="fancy-check-label mb-2" for="check1">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">I like free music and entertainment</div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s1" hidden id="check2" required type="checkbox" name="card1[]"
                                                   value="I’m a part-time artist or performer"></input>
                                            <label class="fancy-check-label mb-2" for="check2">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">I’m a part-time artist or performer</div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s1" hidden id="check3" required type="checkbox" name="card1[]"
                                                   value="I’m a professional artist or performer"></input>
                                            <label class="fancy-check-label mb-2" for="check3">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">I’m a professional artist or performer
                                                    </div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s1" hidden id="check4" required type="checkbox" name="card1[]"
                                                   value="I’m involved with production, recording, design or composition"></input>
                                            <label class="fancy-check-label mb-2" for="check4">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">I’m involved with production, recording,
                                                        design or composition
                                                    </div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s1" hidden id="check5" required type="checkbox" name="card1[]"
                                                   value="I’m involved with management, agency or artist representation"></input>
                                            <label class="fancy-check-label mb-2" for="check5">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">I’m involved with management, agency or
                                                        artist representation
                                                    </div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s1" hidden id="check6" required type="checkbox" name="card1[]"
                                                   name="I’m involved with events, venues and gigs"></input>
                                            <label class="fancy-check-label mb-2" for="check6">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">I’m involved with events, venues and
                                                        gigs
                                                    </div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s1" hidden id="check7" required type="checkbox" name="card1[]"
                                                   value="I’m a tone-deaf killjoy and in the wrong place"></input>
                                            <label class="fancy-check-label mb-2" for="check7">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">I’m a tone-deaf killjoy and in the wrong
                                                        place
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // card1[] -->

                            <!-- card2[] -->
                            <div class="card feedback-card feedback-card-border text-dark bg-light rounded-0 mb-3">
                                <div class="card-header bg-light text-red fw-bold d-flex justify-content-center pt-4 pb-3">
                                    What is your Jeeni status? *
                                </div>
                                <div class="card-body px-5">
                                    <div class="d-block input-wrapper border border-0">
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s2" hidden id="check8" onclick="selectOnlyThis(this.id)" type="checkbox" name="card2[]"
                                                   value="Unregistered visitor"></input>
                                            <label class="fancy-check-label mb-2" for="check8">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Unregistered visitor</div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s2" hidden id="check9" onclick="selectOnlyThis(this.id)" type="checkbox" name="card2[]"
                                                   value="New registered user"></input>
                                            <label class="fancy-check-label mb-2" for="check9">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">New registered user</div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s2" hidden id="check10" onclick="selectOnlyThis(this.id)" type="checkbox" name="card2[]"
                                                   value="Regular registered user"></input>
                                            <label class="fancy-check-label mb-2" for="check10">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Regular registered user</div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s2" hidden id="check11" onclick="selectOnlyThis(this.id)" type="checkbox" name="card2[]"
                                                   value="Partner or affiliate"></input>
                                            <label class="fancy-check-label mb-2" for="check11">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Partner or affiliate</div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s2" hidden id="check11" onclick="selectOnlyThis(this.id)" type="checkbox" name="card2[]"
                                                   value="Spy for a competitor"></input>
                                            <label class="fancy-check-label mb-2" for="check11">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Spy for a competitor</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // card2[] -->

                            <!-- card3[] -->
                            <div class="card feedback-card feedback-card-border text-dark bg-light rounded-0 mb-3">
                                <div class="card-header bg-light text-red fw-bold d-flex justify-content-center pt-4 pb-3">
                                    How did you find out about Jeeni? *
                                </div>
                                <div class="card-body px-5">
                                    <div class="d-block input-wrapper border border-0">
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s3" hidden id="check12" onclick="selecthowyoufind(this.id);" type="checkbox" name="card3[]"
                                                   value="Friends and Family"></input>
                                            <label class="fancy-check-label mb-2" for="check12">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Friends and Family</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s3" hidden id="check13" onclick="selecthowyoufind(this.id);" type="checkbox" name="card3[]"
                                                   value="Facebook"></input>
                                            <label class="fancy-check-label mb-2" for="check13">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Facebook</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s3" hidden id="check14" onclick="selecthowyoufind(this.id);" type="checkbox" name="card3[]"
                                                   value="Instagram"></input>
                                            <label class="fancy-check-label mb-2" for="check14">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Instagram</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s3" hidden id="check15" onclick="selecthowyoufind(this.id);" type="checkbox" name="card3[]"
                                                   value="LinkedIn"></input>
                                            <label class="fancy-check-label mb-2" for="check15">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">LinkedIn</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s3" hidden id="check16" onclick="selecthowyoufind(this.id);" type="checkbox" name="card3[]"
                                                   value="Twitter"></input>
                                            <label class="fancy-check-label mb-2" for="check16">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Twitter</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s3" hidden id="check17" onclick="selecthowyoufind(this.id);" type="checkbox" name="card3[]"
                                                   value="Crowdcube"></input>
                                            <label class="fancy-check-label mb-2" for="check17">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Crowdcube</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s3" hidden id="check18" onclick="selecthowyoufind(this.id);" type="checkbox" name="card3[]"
                                                   value="Direct mail"></input>
                                            <label class="fancy-check-label mb-2" for="check18">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Direct mail</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s3" hidden id="check19" onclick="selecthowyoufind(this.id);" type="checkbox" name="card3[]"
                                                   value="News or blog Item"></input>
                                            <label class="fancy-check-label mb-2" for="check19">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">News or blog Item</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s3" hidden id="check20" onclick="selecthowyoufind(this.id);" type="checkbox" name="card3[]"
                                                   value="Can’t remember / not saying"></input>
                                            <label class="fancy-check-label mb-2" for="check20">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Can’t remember / not saying</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s3" hidden id="check21" onclick="selecthowyoufind(this.id);" type="checkbox" name="card3[]"
                                                   value="Other"></input>
                                            <label class="fancy-check-label mb-2" for="check21">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Other [please specify]</div>
                                                </div>
                                            </label>
                                            <input type="text" id="card3[]_other" name="card3[]_other" class="form-control"
                                                   aria-describedby="basic-addon1" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // card3[] -->

                            <!-- card4[] -->
                            <div class="card feedback-card feedback-card-border text-dark bg-light rounded-0 mb-3">
                                <div class="card-header bg-light text-red fw-bold d-flex justify-content-center pt-4 pb-3">
                                    Why did you become a member? (check as many as appropriate) *
                                </div>
                                <div class="card-body px-5">
                                    <div class="d-block input-wrapper border border-0">
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s4" hidden id="check22" type="checkbox" name="card4[]"
                                                   value="To enjoy new talent"></input>
                                            <label class="fancy-check-label mb-2" for="check22">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">To enjoy new talent</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s4" hidden id="check23" type="checkbox" name="card4[]"
                                                   value="To vote on new talent"></input>
                                            <label class="fancy-check-label mb-2" for="check23">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">To vote on new talent</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s4" hidden id="check24" type="checkbox" name="card4[]"
                                                   value="I want exposure for my creative work"></input>
                                            <label class="fancy-check-label mb-2" for="check24">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">I want exposure for my creative work
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s4" hidden id="check25" type="checkbox" name="card4[]"
                                                   value="Because Jeeni is free"></input>
                                            <label class="fancy-check-label mb-2" for="check25">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Because Jeeni is free</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s4" hidden id="check26" type="checkbox" name="card4[]"
                                                   value="Because Jeeni is an ethical alternative"></input>
                                            <label class="fancy-check-label mb-2" for="check26">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Because Jeeni is an ethical alternative
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s4" hidden id="check27" type="checkbox" name="card4[]"
                                                   value="Because I was encouraged to by friends, family or colleagues"></input>
                                            <label class="fancy-check-label mb-2" for="check27">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Because I was encouraged to by friends,
                                                        family or colleagues
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s4" hidden id="check28" type="checkbox" name="card4[]"
                                                   value="Can’t remember / not saying"></input>
                                            <label class="fancy-check-label mb-2" for="check28">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Can’t remember / not saying</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s4" hidden id="check29" type="checkbox" name="card4[]"
                                                   value="Other"></input>
                                            <label class="fancy-check-label mb-2" for="check29">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Other [please specify]</div>
                                                </div>
                                            </label>

                                            <input type="text" id="card4[]_other" name="card4[]_other" class="form-control"
                                                   aria-describedby="basic-addon1" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // card4[] -->

                            <!-- card5[] -->
                            <div class="card feedback-card feedback-card-border text-dark bg-light rounded-0 mb-3">
                                <div class="card-header bg-light text-red fw-bold d-flex justify-content-center pt-4 pb-3">
                                    What do you think of the site navigation BEFORE log-in? *
                                </div>
                                <div class="card-body px-5">
                                    <div class="d-block input-wrapper border border-0">
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s5" hidden id="check30" onclick="selectBeforeLogin(this.id);" type="checkbox" name="card5[]"
                                                   value="Very easy"></input>
                                            <label class="fancy-check-label mb-2" for="check30">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Very easy</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s5" hidden id="check31" onclick="selectBeforeLogin(this.id);" type="checkbox" name="card5[]"
                                                   value="Easy"></input>
                                            <label class="fancy-check-label mb-2" for="check31">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Easy</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s5" hidden id="check32" onclick="selectBeforeLogin(this.id);" type="checkbox" name="card5[]"
                                                   value="Neither easy nor difficult"></input>
                                            <label class="fancy-check-label mb-2" for="check32">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Neither easy nor difficult</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s5" hidden id="check33" onclick="selectBeforeLogin(this.id);" type="checkbox" name="card5[]"
                                                   value="Difficult"></input>
                                            <label class="fancy-check-label mb-2" for="check33">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Difficult</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s5" hidden id="check34" onclick="selectBeforeLogin(this.id);" type="checkbox" name="card5[]"
                                                   value="Very difficult"></input>
                                            <label class="fancy-check-label mb-2" for="check34">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Very difficult</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // card5[] -->

                            <!-- card6[] -->
                            <div class="card feedback-card feedback-card-border text-dark bg-light rounded-0 mb-3">
                                <div class="card-header bg-light text-red fw-bold d-flex justify-content-center pt-4 pb-3">
                                    What do you think of the site navigation AFTER log-in? *
                                </div>
                                <div class="card-body px-5">
                                    <div class="d-block input-wrapper border border-0">
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s6" hidden id="check35" onclick="selectAfterLogin(this.id);" type="checkbox" name="card6[]"
                                                   value="Very easy"></input>
                                            <label class="fancy-check-label mb-2" for="check35">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Very easy</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s6" hidden id="check36" onclick="selectAfterLogin(this.id);" type="checkbox" name="card6[]"
                                                   value="Easy"></input>
                                            <label class="fancy-check-label mb-2" for="check36">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Easy</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s6" hidden id="check37" onclick="selectAfterLogin(this.id);" type="checkbox" name="card6[]"
                                                   value="Neither easy nor difficult"></input>
                                            <label class="fancy-check-label mb-2" for="check37">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Neither easy nor difficult</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s6" hidden id="check38" onclick="selectAfterLogin(this.id);" type="checkbox" name="card6[]"
                                                   value="Difficult"></input>
                                            <label class="fancy-check-label mb-2" for="check38">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Difficult</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s6" hidden id="check39" onclick="selectAfterLogin(this.id);" type="checkbox" name="card6[]"
                                                   value="Very difficult"></input>
                                            <label class="fancy-check-label mb-2" for="check39">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Very difficult</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom mb-2">
                                            <input class="fancy-check s6" hidden id="check40" onclick="selectAfterLogin(this.id);" type="checkbox" name="card6[]"
                                                   value="Not applicable"></input>
                                            <label class="fancy-check-label mb-2" for="check40">
                                                <div class="d-flex">
                                                    <div class="fancy-checkbox me-2">
                                                        <i class="checkmark bi bi-check2 me-2 fs-3"></i>
                                                    </div>
                                                    <div class="fancy-label--text">Not applicable</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // card6[] -->

                            <!-- Card7 -->
                            <div class="card feedback-card feedback-card-border text-dark bg-light rounded-0 mb-3">
                                <div class="card-header bg-light text-red fw-bold d-flex justify-content-center pt-4 pb-3">
                                    If you have any other feedback or comments please let us know here
                                </div>
                                <div class="card-body px-5">
                                    <div class="d-block input-wrapper border border-0">
                                        <!-- textarea section -->
                                        <textarea name="feedback" class="form-control bg-light rounded-0 mb-3 ps-3 s7"
                                                  id="textArea1" rows="6" required></textarea>
                                        <!-- // textarea section -->
                                    </div>
                                </div>
                            </div>
                            <!-- // Card7 -->

                            <div id="message" style="text-align: center; color: #E42813; font-weight: 700;"></div>

                            <!-- Group Button -->
                            <div class="d-flex justify-content-center my-4">
                                <div id="prev_btn" type="prev_btn" class="btn p-0 mx-1" onClick="next_prev_card(-1)">
                                    <i class="bi bi-arrow-left feedback-button fs-5 py-1 px-3"></i>
                                </div>

                                <div id="next_btn" type="next_btn" class="btn p-0 mx-1" onClick="valthisform()">
                                    <i class="bi bi-arrow-right feedback-button fs-5 py-1 px-3"></i>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center bg-light mt-2">
                                <button id="feedback_btn" disabled class="submit-btn btn text-red fw-bold">
                                    CONTINUE
                                </button>
                            </div>
                            <!-- // Group Button -->
                        </div>
                    </form>
                    <!-- // Content after form Content -->
                @endif

            </div>
            <!-- // Content after the title -->
        </div>
        <!-- // Body content -->
    </main>
@endsection

@section('footer_script')
    <script>
        // default current card is the first card
        let current_card = 0;
        show_card(current_card);

        const feedback_submit = document.getElementById("feedback_btn");
        const cards = document.querySelectorAll('.feedback-card');

        function show_card(current_card) {
            let cards = document.getElementsByClassName("feedback-card");
            cards[current_card].style.display = "block";

            if(current_card === 0){
                // when current card is the first card, do not show prev button
                document.getElementById("prev_btn").style.display = "none";
            }else{
                document.getElementById("prev_btn").style.display = "flex";
            }

            if(current_card === cards.length-1){
                // when current card is the last card, do not show next button and change the submit button's innerHTML
                document.getElementById("next_btn").style.display = "none";
                document.getElementById("feedback_btn").innerHTML = "SUBMIT";
                document.getElementById("feedback_btn").disabled = false;

            } else {
                document.getElementById("next_btn").style.display = "flex";
                document.getElementById("feedback_btn").innerHTML = "CONTINUE";
            }
        }

        feedback_submit.addEventListener('click', (e) => show_completed_page(e));

        function next_prev_card(card_number){
            // do not show the current card
            cards[current_card].style.display = "none";
            // add 1 or -1 to current depends on the next or prev button
            current_card = current_card + card_number;

            if(current_card > cards.length){
                return false;
            }
            // show the next or prev card
            show_card(current_card);
            
        }

        function show_completed_page(e){
            e.preventDefault();
            document.getElementById('feedback_form').submit();
        }
    
    function selectOnlyThis(checkbox_id) {
    if (document.getElementById(checkbox_id).checked) {
        for (var i = 8; i < 13; i++) {
            document.getElementById("check"+i).checked = false;
        }
        document.getElementById(checkbox_id).checked = true;
    }
}

  
function selecthowyoufind(checkbox_id) {
    if (document.getElementById(checkbox_id).checked) {
        for (var i = 12; i < 22; i++) {
            document.getElementById("check"+i).checked = false;
        }
        document.getElementById(checkbox_id).checked = true;
    }
}

function selectBeforeLogin(checkbox_id) {
    if (document.getElementById(checkbox_id).checked) {
        for (var i = 30; i < 35; i++) {
            document.getElementById("check"+i).checked = false;
        }
        document.getElementById(checkbox_id).checked = true;
    }
}

function selectAfterLogin(checkbox_id) {
    if (document.getElementById(checkbox_id).checked) {
        for (var i = 35; i < 41; i++) {
            document.getElementById("check"+i).checked = false;
        }
        document.getElementById(checkbox_id).checked = true;
    }
}

function valthisform()
{
    if(current_card == 0){
    var checkboxs=document.getElementsByClassName("s1");
    }
    if(current_card == 1){
    var checkboxs=document.getElementsByClassName("s2");
    }
    if(current_card == 2){
    var checkboxs=document.getElementsByClassName("s3");
    }
    if(current_card == 3){
    var checkboxs=document.getElementsByClassName("s4");
    }
    if(current_card == 4){
    var checkboxs=document.getElementsByClassName("s5");
    }
    if(current_card == 5){
    var checkboxs=document.getElementsByClassName("s6");
    }

    var okay=false;
    for(var i=0,l=checkboxs.length;i<l;i++)
    {
        if(checkboxs[i].checked)
        {
            okay=true;
            break;
        }
    }
    if(okay){
        next_prev_card(1);
    }
    else {
        document.getElementById("message").innerHTML = "Please choose atleast one field  *";
        setTimeout(function(){					 
        document.getElementById("message").innerHTML = "";},4000);
        };
}

    </script>
@endsection
