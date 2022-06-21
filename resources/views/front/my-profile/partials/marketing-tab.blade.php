<div class="tab-pane fade" id="marketing">
    <!-- Edit settings buttons -->
    <div class="d-block text-end px-1 py-2">
        <div class="text-end d-inline">
            @if(!$readOnly)
                <button class="btn bg-light hover-red rounded-0"
                        id="addMarketingContentBTN">
                <span class="me-1">
                    <i class="bi bi-plus-circle"></i>
                </span> Add Marketing Content
                </button>
                <button class="btn bg-danger text-white rounded-0" id="closeEditorBTN" style="display: none;">
                <span class="me-1">
                    <i class="bi bi-file-x"></i>
                </span> Close Editor
                </button>
            @endif
        </div>
    </div>
    <!-- // Edit settings -->
    <div class="d-block">
        <div class="row mb-5 pb-3" id="marketingContentForm" style="display: none;">
            <div class="form-control border-0">
                <form action="{{ route('marketing.store') }}" method="POST">
                    @csrf
                    <div class="w-100 mb-3">
                        <label class="d-block fw-bold" for="newsTitle">Title(*)</label>
                        <input class="d-block form-control rounded-0" type="text" placeholder="Enter news title"
                               name="marketingTitle" id="marketingDescription">
                    </div>
                    <div class="w-100 pb-3">
                        <label for="newsContent"><span class="fw-bold">My Latest News Content(*)</span></label>
                        <textarea class="form-control rounded-0" rows="4" name="marketingDescription"
                                  id="marketingDescription"></textarea>
                    </div>
                    <div class="w-100 d-inline">
                        <button
                            class="btn btn-danger w-100 text-uppercase bg-transparent hover-red text-dark-grey border-2 fw-bolder rounded-0">
                            POST
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($data['newsfeeds'] as $newsfeed)
                <!-- Col -->
                <div class="col-12 col-md-6">
                    <div class="card mb-1 rounded-0 p-0 bg-lighter-grey border">
                        <div class="col p-0">
                            <div class="card-body p-0">
                                <div class="d-block">
                                    <div class="p-3">
                                        <h6 class="card-title text-truncate-line-2">{{ $newsfeed->title }}</h6>
                                        <span class="d-block bg-danger separator-90px mb-1"></span>
                                        <span class="border-2 border-danger"></span>
                                        <p class="card-text">
                                            {{ $newsfeed->created_at->format('jS, M Y') }}
                                        </p>
                                        <p class="card-text text-truncate-line-3 text-muted">
                                            {{ strip_tags($newsfeed->description) }}
                                        </p>
                                    </div>
                                    @if(!$readOnly)
                                        <div class="border-top px-3">
                                            <button class="btn bg-light hover-red view-tab text-capitalize px-1"
                                                    type="button" data-bs-toggle="modal" data-bs-target="#marketingOffer{{$newsfeed->id}}">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn bg-light hover-red view-tab text-capitalize px-1"
                                                    type="button" data-bs-toggle="modal" data-bs-target="#marketingOffer{{$newsfeed->id}}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Offer Modal -->
                <div class="modal mt-5" id="marketingOffer{{$newsfeed->id}}">
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
                                                <h4 class="text-center fw-bolder text-uppercase">Update <span
                                                        class="fw-normal">Marketing/Newsfeed</span>
                                                </h4>
                                                <span class="under-title d-block bg-dark mx-auto"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Form start -->
                                <div class="form-control border-0">
                                    <form action="{{ route('marketing.update', $newsfeed->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="w-100">
                                            <input
                                                class="d-block form-control"
                                                type="text"
                                                name="marketingTitle"
                                                value="{{ $newsfeed->title }}"
                                            />
                                        </div>

                                        <div class="w-100">
                                            <label class="pb-2" for="offerDescription"><span class="fw-bold">Type the description of my offer below</span></label>
                                            <textarea
                                                class="form-control"
                                                rows="10"
                                                name="marketingDescription"
                                            >{{ strip_tags($newsfeed->description) }}</textarea>
                                        </div>
                                        <div class="w-100 d-inline">
                                            <button
                                                type="submit"
                                                class="btn btn-danger w-100 text-uppercase bg-transparent hover-dark text-danger border-2 fw-bolder rounded-0"
                                            >
                                                Update my newsfeed
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- End Form -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Warning Modal -->
                <div class="modal fade" id="marketingOffer{{$newsfeed->id}}" data-bs-backdrop="static"
                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteTrackLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this
                                    newsfeed?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center text-danger">
                                You will not be able to recover your offer once it has been deleted.
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('marketing.delete', $newsfeed->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-primary rounded-0 text-white border-danger bg-danger">
                                        Understood, Delete anyways
                                    </button>
                                </form>
                                <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // end Col -->
            @endforeach
        </div>
    </div>
</div>
