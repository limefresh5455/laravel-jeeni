<!-- Modal popup "Edit my profile" -->
<div class="modal" id="profilePopup">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- To close the Modal/popup -->
            <div class="d-inline w-100 position-absolute text-center" style="z-index: 3;">
                <div class="w-100 text-center mt-n15">
                    <button type="button" class="btn rounded-pill text-danger hover-dark p-0 m-0 cursor-pointer"
                            data-bs-dismiss="modal"><i class="bi bi-x-circle-fill h4"></i></button>
                </div>
            </div>
            <!-- Modal Header -->
            <div class="modal-header d-block p-0">
                <div class="row">
                    <div class="w-100">
                        <div class="text-center pt-5 pb-4">
                            <div class="w-100 d-inline text-center">
                                <h4 class="text-center fw-bolder text-uppercase">Edit <span class="fw-normal">my profile</span></h4>
                                <span class="under-title d-block bg-dark mx-auto"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">

                <!-- Profile cover -->
                <div class="w-100">
                    <div class="col py-3">
                        <form id="frmAvatar"
                              method="post" action="{{ route('update.profile.photo', ['type' => 'cover']) }}"
                              enctype="multipart/form">
                            @csrf
                            <p class="text-center fw-bold">Your profile picture</p>
                            <div class="mx-auto" style="width: 150px; height: auto;">
                                <img class="mb-3" id="my-image"
                                     src="{{ $user->getAvatar() }}" style="height: 150px;"
                                     alt="{{ $user->getFullName() }}"/>
                            </div>
                            <!-- <button class="btn border-danger hover-red" id="upload">Upload an image</button> -->
                            <!-- <input class="hover-red cursor-pointer" type="file" id="imgInp" name="myfile" /> -->
                            <div class="upload-btn-wrapper hover-red w-100 text-center mx-auto">
                                <button class="btn border-danger hover-red" id="upload">Upload an image</button>
                                <input class="hover-red cursor-pointer" type="file" id="imgInp" name="cover" accept="image/*" />

                                <div class="text-center py-0">
                                    <div class="upload-btn-wrapper">
                                        <button id="use" class="btn border-danger hover-red" style="display: none;">Crop</button>
                                    </div>
                                    <p class="text-success w-75 mx-auto" id="imageSavedMessage" style="display: none;">
                                        Your profile picture has been successfully cropped.
                                        <!-- <span class="text-dark">If you have edited any of your personal information below make sure to click the "<b class="text-danger">Save</b>" button at the bottom of this page.</span> -->
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- // Profile cover -->

                <!-- Form start -->
                <div id="resultData" class="alert"></div>
                <div class="form-control border-0">
                    <form id="profilePopupForm" method="POST" action="{{ route('update.profile.popup') }}">
                        @csrf
                        <input type="hidden"
                               name="userId" id="userId"
                               value="{{ $user->id }}" />

                        <div class="w-100 mb-3">
                            <label class="d-block fw-bold" for="name">Title</label>
                            <input class="d-block form-control" type="text" placeholder="Name"
                                   name="profileName"
                                   value="{{ $user->getFullName() }}"
                                   id="profileName"/>
                        </div>

                        @if(!$user->hasRole('viewer'))
                        <div class="w-100 mb-3">
                            <label class="pb-2" for="paypalLink">
                                <span class="fw-bold">
                                    My Paypal Donations Email Address or Paypal.me Link
                                </span>
                            </label>
                            <input class="d-block form-control"
                                   type="text" placeholder="www.jeeni.com"
                                   value="{{ $user->paypal_link }}"
                                   name="paypalLink" id="paypalLink" />
                            @if(is_null($user->paypal_link))
                                <p>
                                    <small>
                                        <a class="hover-dark text-danger"
                                           href="https://www.paypal.com/paypalme/" target="_blnk">
                                            Create your Paypal.me link today
                                        </a>
                                    </small>
                                </p>
                            @endif
                        </div>
                        @endif

                        <div class="w-100 pb-5">
                            <label for="aboutMe"><span
                                    class="fw-bold">About Me (Max length. 500 characters)</span></label>
                            <textarea class="form-control"
                                    placeholder="This is where I tell the world my name and useful into like my location, my background and my influences"
                                    name="profileAboutMe"
                                    id="profileAboutMe">{{ $user->bio }}</textarea>
                        </div>

                        <div class="w-100 d-block">
                            <p class="fw-bold">My interests are</p>
                            @foreach(\App\Helpers\Jeeni::availableChannels() as $channel)
                                <div class="col-12 col-sm-6 col-md-4 col-xl-3 col-xxl-3 d-inline-block mb-3 px-0">
                                    <div class="w-100">
                                        <input class="form-check-input my-interests"
                                               type="checkbox" value="{{ $channel['id'] }}"
                                               id="interest_{{ $channel['id'] }}" name="interests[]"
                                               @if(in_array($channel['id'], $myChannels)) checked @endif
                                               style="cursor: pointer;">
                                        <label class="form-check-label" for="interest_{{ $channel['id'] }}"
                                               style="cursor: pointer;">
                                            {!! $channel['name'] !!}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            <!-- // Interest item column -->
                        </div>
                        <div class="w-100 d-inline">
                            <button type="submit" id="btnSubmitProfile"
                                class="btn btn-danger w-100 text-uppercase bg-transparent hover-red text-dark-grey border-2 fw-bolder rounded-0">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End Form -->

            </div>
        </div>
    </div>
</div>
<!-- END Modal popup "Edit my profile" -->

<!-- Modal popup "socialMediaPopup -->
<div class="modal mt-5" id="socialMediaPopup">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- To close the Modal/popup -->
            <div class="row">
                <div class="w-100 text-center mt-n15">
                    <button type="button" class="btn rounded-pill text-danger hover-dark p-0 m-0"
                            data-bs-dismiss="modal"><i class="bi bi-x-circle-fill h4"></i></button>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Title -->
                <div class="row my-2">
                    <div class="w-100">
                        <div class="text-center py-3">
                            <div class="w-100 d-inline text-center">
                                <h4 class="text-center fw-bolder text-uppercase">My Social <span class="fw-normal">Networks</span>
                                </h4>
                                <span class="under-title d-block bg-dark mx-auto"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form start -->
                <div class="form-control border-0">
                    <form action="{{ route('social.links.update') }}" method="POST">
                        @csrf

                        <div class="w-100 mb-3">
                            <label class="pb-2" for="facebook_social"><span class="fw-bold">My Facebook Profile</span></label>
                            <input class="d-block form-control" type="text" placeholder="www.jeeni.com" name="facebook_social"
                                   id="facebook_social" value="{{ $user->facebook_social }}"/>
                        </div>
                        <div class="w-100 mb-3">
                            <label class="pb-2" for="twitter_social"><span class="fw-bold">My Twitter Page</span></label>
                            <input class="d-block form-control" type="text" placeholder="www.jeeni.com" name="twitter_social"
                                   id="twitter_social" value="{{ $user->twitter_social }}"/>
                        </div>
                        <div class="w-100 mb-3">
                            <label class="pb-2" for="linkedin_social"><span class="fw-bold">My LinkedIn Page</span></label>
                            <input class="d-block form-control" type="text" placeholder="www.jeeni.com" name="linkedin_social"
                                   id="linkedin_social" value="{{ $user->linkedin_social }}"/>
                        </div>
                        <div class="w-100 mb-3">
                            <label class="pb-2" for="instagram_social"><span class="fw-bold">My Instagram Page</span></label>
                            <input class="d-block form-control" type="text" placeholder="www.jeeni.com" name="instagram_social"
                                   id="instagram_social" value="{{ $user->instagram_social }}"/>
                        </div>
                        <div class="w-100 mb-3">
                            <label class="pb-2" for="youtube_social"><span class="fw-bold">My YouTube Channel</span></label>
                            <input class="d-block form-control" type="text" placeholder="www.jeeni.com" name="youtube_social"
                                   id="youtube_social" value="{{ $user->youtube_social }}"/>
                        </div>
                        <div class="w-100 mb-5">
                            <label class="pb-2" for="website_social"><span class="fw-bold">My Website Address</span></label>
                            <input class="d-block form-control" type="text" placeholder="www.jeeni.com"
                                   name="website_social" id="website_social" value="{{ $user->website_social }}"/>
                        </div>
                        <div class="w-100 d-inline">
                            <button
                                type="submit"
                                class="btn btn-danger w-100 text-uppercase bg-transparent hover-dark text-danger border-2 fw-bolder rounded-0">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Modal popup "socialMediaPopup -->

<!-- Modal popup "Edit my Showcase" -->
<div class="modal" id="addShowcasePopup">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- To close the Modal/popup -->
            <div class="row">
                <div class="w-100 text-center mt-n15">
                    <button type="button" class="btn rounded-pill text-danger hover-dark p-0 m-0"
                            data-bs-dismiss="modal"><i class="bi bi-x-circle-fill h4"></i></button>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Title -->
                <div class="row my-2">
                    <div class="w-100">
                        <div class="text-center py-3">
                            <div class="w-100 d-inline text-center">
                                <h4 class="text-center fw-bolder text-uppercase">Add <span class="fw-normal">my showcase</span>
                                </h4>
                                <span class="under-title d-block bg-dark mx-auto"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form start -->
                <div class="form-control border-0">
                    <form id="frmAddShowcase"
                          action="{{ route('showcase.store') }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="w-100 pb-3">
                            <label class="d-block fw-bold" for="nameShowcase">Title</label>
                            <input class="d-block form-control" type="text"
                                   placeholder="Showcase Title" name="nameShowcase" id="nameShowcase"/>
                        </div>
                        <div class="w-100 pb-3">
                            <label for="descriptionShowcase"><span
                                    class="fw-bold">Description</span></label>
                            <textarea class="form-control"
                                      placeholder="Showcase Description"
                                      name="descriptionShowcase" id="descriptionShowcase"></textarea>
                        </div>

                        <div class="w-100 pb-3 d-none" id="thumbWrapper">
                            <input type="hidden" name="hdnShowcaseId" id="hdnShowcaseId" value="0" />
                            <img class="img-responsive w-100" id="imgThumbnailShowcase" src="" alt="" />
                        </div>

                        <div class="w-100 pb-3">
                            <label for="thumbnailShowcase"><span
                                    class="fw-bold">Thumbnail</span></label>
                            <input class="form-control" type="file" id="thumbnailShowcase"
                                   name="thumbnailShowcase" accept="image/*"/>
                        </div>

                        <div class="w-100 d-inline">
                            <button type="submit"
                                    class="btn btn-danger w-100 text-uppercase bg-transparent hover-red
                                    text-dark-grey border-2 fw-bolder rounded-0">
                                Save
                            </button>
                        </div>

                    </form>
                </div>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Modal popup "Edit my Showcase" -->

<!-- Modal popup "Edit my Offers" -->
<div class="modal mt-5" id="addOffer">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- To close the Modal/popup -->
            <div class="row">
                <div class="w-100 text-center mt-n15">
                    <button type="button" class="btn rounded-pill text-danger hover-dark p-0 m-0"
                            data-bs-dismiss="modal"><i class="bi bi-x-circle-fill h4"></i></button>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Title -->
                <div class="row my-2">
                    <div class="w-100">
                        <div class="text-center py-3">
                            <div class="w-100 d-inline text-center">
                                <h4 class="text-center fw-bolder text-uppercase">Add an <span class="fw-normal">Offer/Service</span>
                                </h4>
                                <span class="under-title d-block bg-dark mx-auto"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form start -->
                <div class="form-control border-0">
                    <form action="{{ route('offers.store') }}" method="POST">
                        @csrf
                        <input type="hidden"
                               name="userId" id="userId"
                               value="{{ $user->id }}" />

                        <div class="w-100">
                            <input
                                class="d-block form-control"
                                type="text"
                                placeholder="Type the title of my offer here*"
                                name="offerTitle"
                                id="offerTitle"
                            />
                        </div>
                        <div class="w-100 pt-3">
                            <input
                                class="d-block form-control"
                                type="text"
                                placeholder="Type the min price of my offer here*"
                                name="offerMinPrice"
                                id="offerMinPrice"
                            />
                        </div>
                        <div class="w-100 py-3">
                            <input
                                class="d-block form-control"
                                type="text"
                                placeholder="Type the max price of my offer here*"
                                name="offerMaxPrice"
                                id="offerMaxPrice"
                            />
                        </div>
                        <div class="w-100">
                            <label class="pb-2" for="offerDescription"><span class="fw-bold">Type the description of my offer below</span></label>
                            <textarea
                                class="form-control editor"
                                rows="10"
                                name="offerDescription"
                                id="editor"
                                placeholder="This is where i tell the world my name and useful into like my location, my background and my influences"
                            ></textarea>
                        </div>
                        <div class="w-100 py-3">
                            <select
                                class="js-example-basic-multiple"
                                name="offerTags[]"
                                id="offerTags"
                                multiple="multiple"
                            >
                                @foreach($data['tags'] as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-100 d-inline">
                            <button
                                type="submit"
                                class="btn btn-danger w-100 text-uppercase bg-transparent hover-dark text-danger border-2 fw-bolder rounded-0"
                            >
                                Publish my offer
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Modal popup "Edit my Offers" -->

<!-- I HAVE STOPPED WORKING ON THIS MODAL FORM -->
<!-- Modal popup "Upload track" -->
<div class="modal" id="uploadTrackPopup">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- To close the Modal/popup -->
            <div class="row">
                <div class="w-100 text-center mt-n15">
                    <button type="button" class="btn rounded-pill text-danger hover-dark p-0 m-0"
                            data-bs-dismiss="modal"><i class="bi bi-x-circle-fill h4"></i></button>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Title -->
                <div class="row my-2">
                    <div class="w-100">
                        <div class="text-center py-3">
                            <div class="w-100 d-inline text-center">
                                <h4 class="text-center fw-bolder text-uppercase">Upload <span class="fw-normal">Video/Audio</span>
                                </h4>
                                <span class="under-title d-block bg-dark mx-auto"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form start -->
                <div class="form-control border-0">
                    <form id="trackUploadForm" method="post"
                          enctype="multipart/form-data"
                          action="{{ route('track.save-track-details') }}">
                        @csrf
                        <div class="form p-4">
                            <div class="row mb-3">
                                <label for="trackTitle" class="form-label p-0">Title of my track</label>
                                <input type="text" class="form-control rounded-0" name="trackTitle"
                                       id="trackTitle" required
                                       placeholder="Track Title">

                                <input type="hidden" value="0" name="hdnTrackId" id="hdnTrackId" />
                            </div>

                            <div class="row mb-3">
                                <label for="trackDescription" class="form-label p-0">Description of my track</label>
                                <textarea class="form-control"
                                          placeholder="Description of my track"
                                          id="trackDescription" name="trackDescription"></textarea>
                            </div>

                            <div class="row mt-4">
                                <label class="form-label p-0">Select upto 4 Channels for my track</label>
                                <div class="row bg-light justify-content-start align-items-start flex-wrap p-2">
                                    @foreach($data['availableChannels'] as $channel)

                                        <div class="customCheckBoxContainer" title="{!! $channel->name !!}">
                                            <input
                                                class="form-check-input mt-0 customCheckbox channelCheckbox"
                                                id="channel{{$channel->id}}"
                                                type="checkbox"
                                                name="selectedChannels[]"
                                                value="{{$channel->id}}"
                                            >
                                            <label
                                                for="channel{{$channel->id}}"
                                                class="form-label customCheckBoxLabel channel{{$channel->id}}"
                                            >
                                                {!! $channel->name !!}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mt-4">
                                <label class="form-label p-0">Selected (click cross sign to unselect)</label>
                            </div>
                            <div
                                class="row bg-light d-flex justify-content-start align-items-start flex-wrap px-2 py-4 selectChannelsContainer">
                                <!-- The selected channels will show here -->
                            </div>
                            <div class="row mt-4">
                                <label class="form-label p-0">Advanced</label>
                            </div>
                            <div class="row bg-light p-4">
                                <label class="form-label p-0 text-center mb-3">Select my file to upload (max 50MB, MP3
                                    or MP4 only)</label>
                                <div class="customFileInputContainer border border-2 mb-3">
                                    <input class="form-control form-control-lg p-5 customFileInput" id="trackFile"
                                           type="file" name="trackFile" placeholder="Drag and drop file here">
                                    <label for="trackFile"
                                           class="form-label p-0 text-center mb-3 customFileLabel d-flex justify-content-center align-items-center">Drag
                                        and drop file here</label>
                                </div>
                                <div class="progress p-0 mb-3">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn bg-transparent border rounded-0 hover-red m-2" type="button">
                                        BROWSE
                                    </button>
                                    <button class="btn bg-transparent border rounded-0 text-danger hover-dark m-2"
                                            type="button">CANCEL
                                    </button>
                                </div>
                            </div>
                            <div class="row bg-light p-4 mb-3">
                                <label class="form-label p-0 text-center mb-3">Select Thumbnail or let Jeeni select a
                                    random screenshot for me</label>
                                <div class="customFileInputContainer border border-2 mb-3">
                                    <input class="form-control form-control-lg p-5 customFileInput"
                                           name="thumbnailFile" id="thumbnailFile"
                                           type="file" placeholder="Drag and drop file here">
                                    <label for="thumbnailFile"
                                           class="form-label p-0 text-center mb-3 customFileLabel d-flex justify-content-center align-items-center">Drag
                                        and drop file here</label>
                                </div>
                                <div class="progress p-0 mb-3">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"
                                         aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn bg-transparent border rounded-0 hover-red m-2" type="button">
                                        BROWSE
                                    </button>
                                    <button class="btn bg-transparent border rounded-0 hover-red m-2" type="button">
                                        CANCEL
                                    </button>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn text-danger bg-light border-danger hover-dark fw-500 rounded-0 p-2"
                                        type="submit">CLICK HERE TO UPLOAD THEN WAIT
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Modal popup "Upload track" -->


<div class="modal fade" id="deleteTrack" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteTrackLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this track?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center text-danger">
                You will not be able to recover your track once it has been deleted.
                <input type="hidden" name="hdnDeleteTrackId" id="hdnDeleteTrackId" value="" />
            </div>
            <div class="modal-footer">
                <button type="button"
                        data-link="{{ route('track.delete-track') }}"
                        class="btn btn-delete-track btn-primary rounded-0 text-white border-danger bg-danger">
                    Understood, Delete anyways
                </button>
                <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

