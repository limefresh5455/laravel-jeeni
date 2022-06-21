<div class="tab-pane fade mytracks" id="showcase">
    <!-- Edit settings buttons -->
    <div class="d-block text-end px-1 py-2 mb-2 mb-xl-4">
        <div class="text-end d-inline">
            @if(!$readOnly)
                <button class="btn bg-lighter-grey hover-red text-capitalize" type="button"
                        data-bs-toggle="modal" data-bs-target="#addShowcasePopup">
                    <span class="me-1"><i class="bi bi-plus-lg"></i></span>
                    <small>Add My Showcase</small>
                </button>
            @endif
        </div>
    </div>
    <!-- // Edit settings -->


    @if($user->showcases->count() > 0)
        <!-- ******* THESE ARE GRID TYPE COLUMN VIEW -->
        <div class="row">
            @foreach($user->showcases as $showcases)
                <!-- Col track-->
                    @php $thumbnail = $showcases->getThumbnail() @endphp
                    <div class="single-track col-12 col-sm-6 col-md-4 col-xl-3 mb-3">
                        <div class="card bg-transparent border-0">
                            <div class="position-relative track-image-container">
                                <a href="#">
                                    <img src="{{ $thumbnail }}"
                                         class="card-img-top object-fit" alt="{{ $showcases->title }}">
                                    <!--<div class="love-share-add">
                                        <span><i class="bi bi-heart"></i></span>
                                        <span class="mx-3"><i class="bi bi-share"></i></span>
                                        <span><i class="bi bi-plus-lg"></i></span>
                                    </div>
                                    <div class="total-time">
                                        <span class="bg-red px-2 py-1 text-white">3:16</span>
                                    </div>-->
                                </a>
                            </div>
                            <div class="card-body px-md-0">
                                <h6 class="card-title text-capitalize text-truncate-line-2">
                                    <a href="#" class="text-decoration-none hover-red">
                                        {{ $showcases->title }}
                                    </a>
                                </h6>
                                <p class="card-text text-mid-grey text-truncate-line-3">
                                    {!! strip_tags($showcases->description) !!}
                                </p>
                                @if(!$readOnly)
                                    <button
                                        data-id="{{ $showcases->id }}"
                                        data-title="{{ $showcases->title }}"
                                        data-description="{{ $showcases->description }}"
                                        data-thumbnail="{{ $thumbnail }}"
                                        class="btn-edit-showcase btn bg-light hover-red view-tab text-capitalize"
                                        type="button">
                                        <i class="bi bi-pencil me-2"></i>
                                        <small>Edit track</small>
                                    </button>
                                    <button class="btn bg-lighter-grey hover-red view-tab text-capitalize"><i
                                            class="bi bi-eye-slash me-2"></i><small>view artist showcase</small>
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

    <!-- // Tracks -->

    <div class="row">
        <hr class="w-100 my-5">
    </div>

<!--    <div class="row">
        <div class="d-inline">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link m-1" href="#" tabindex="-1" aria-disabled="true"><i
                                class="bi bi-arrow-left-short"></i></a>
                    </li>
                    <li class="page-item"><a class="page-link m-1 hover-red" href="#">1</a></li>
                    <li class="page-item"><a class="page-link m-1 border-danger text-danger"
                                             href="#">2</a></li>
                    <li class="page-item"><a class="page-link m-1 hover-red" href="#">3</a></li>
                    <li class="page-item"><a class="page-link m-1 hover-red" href="#">...20</a></li>
                    <li class="page-item">
                        <a class="page-link m-1 bg-danger text-white hover-dark " href="#"><i
                                class="bi bi-arrow-right-short"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>-->


</div>

