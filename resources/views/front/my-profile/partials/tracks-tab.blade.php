<div class="tab-pane fade mytracks" id="tracks">

    <!-- Edit settings buttons -->
    <div class="d-block text-end px-1 py-2 mb-2 mb-xl-4">
        <div class="text-end d-inline">
            @if(!$readOnly)
                <button class="btn bg-lighter-grey hover-red upload-track file text-capitalize" type="button" data-bs-toggle="modal" data-bs-target="#uploadTrackPopup">
                    <i class="bi bi-upload me-2"></i>
                    <small>Upload a track <span>2/10</span></small>
                </button>
            @endif
            <!-- </form> -->
        </div>
    </div>
    <!-- // Edit settings -->


    @if($user->tracks->count() > 0)
        <!-- ******* THESE ARE GRID TYPE COLUMN VIEW -->
        <div class="row">
            @foreach($user->tracks as $track)
                <!-- Col track-->
                <div class="single-track col-12 col-sm-6 col-md-4 col-xl-3 mb-3">
                    <div class="card bg-transparent border-0">
                        <div class="position-relative track-image-container">
                            <a href="{{ $track->getLink() }}" title="{{ $track->title }}">
                                <img src="{{ $track->getThumbnail() }}" class="card-img-top object-fit"
                                     alt="{{ $track->title }}">

                                @if($track->isTrackOwner())
                                    <div class="love-share-add">
                                        <span data-title="{{ $track->title }}" data-id="{{ $track->id}}" class="delete-track">
                                            <i class="bi bi-trash"></i>
                                        </span>
                                    </div>
                                @endif

                                <div class="total-time">
                                    <span class="bg-red px-2 text-white time">
                                        {{ $track->getDuration() }}
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="card-body px-md-0">
                            <h6 class="card-title text-capitalize text-truncate-line-2">
                                <a href="{{ $track->getLink() }}" class="text-decoration-none hover-red">
                                    {{ $track->title }}
                                </a>
                            </h6>
                            <p class="card-text text-mid-grey text-truncate-line-3">
                                {{ strip_tags($track->description) }}
                            </p>
                            @if(!$readOnly)
                                <button
                                    data-id="{{ $track->id }}"
                                    data-title="{{ $track->title }}"
                                    data-description="{{ $track->description }}"
                                    data-track_file="{{ $track->track_file }}"
                                    data-thumbnail="{{ $track->thumbnail }}"
                                    data-channels="{{ implode(',', $track->getChannelIds()) }}"
                                    class="btn btn-edit-track bg-light hover-red view-tab text-capitalize" type="button">
                                    <i class="bi bi-pencil me-2"></i>
                                    <small>Edit track</small>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- // end Col track -->
            @endforeach
        </div>
        <!-- ******* end  GRID TYPE COLUMN VIEW -->
    @endif

    <div class="row">
        <hr class="w-100 my-5">
    </div>

<!--    <div class="row">
        <div class="d-inline">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link m-1" href="#" tabindex="-1" aria-disabled="true"><i class="bi bi-arrow-left-short"></i></a>
                    </li>
                    <li class="page-item"><a class="page-link m-1 hover-red" href="#">1</a></li>
                    <li class="page-item"><a class="page-link m-1 border-danger text-danger" href="#">2</a></li>
                    <li class="page-item"><a class="page-link m-1 hover-red" href="#">3</a></li>
                    <li class="page-item"><a class="page-link m-1 hover-red" href="#">...20</a></li>
                    <li class="page-item">
                        <a class="page-link m-1 bg-danger text-white hover-dark " href="#"><i class="bi bi-arrow-right-short"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>-->
</div>
