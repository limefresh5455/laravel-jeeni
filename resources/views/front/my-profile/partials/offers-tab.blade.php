<div class="tab-pane fade" id="offers">
    <!-- Edit settings buttons -->
    <div class="d-block text-end px-1 py-2">
        <div class="text-end d-inline">
            @if(!$readOnly)
                <button class="btn bg-lighter-grey hover-red text-capitalize"
                        type="button" data-bs-toggle="modal"
                        data-bs-target="#addOffer">
                    <span class="me-1">
                        <i class="bi bi-plus-circle"></i>
                    </span> Add an Offer/Service
                </button>
            @endif
        </div>
    </div>
    <!-- // Edit settings -->
    <div class="row">
    @foreach($data['offers'] as $offer)
        <!-- Col -->
            <div class="col-12 col-md-6 p-2">
                <div class="card mb-1 rounded-0 p-2 bg-lighter-grey border" style="text-align: center;">
                    <div class="row g-0 align-items-center">
                        <div class="col-sm-4 d-flex">
                            <img src="{{ $user->getAvatar() }}" class="img-fluid object-fit rounded-0"
                                 alt="...">
                        </div>
                        <div class="col-sm-8 px-1">
                            <div class="card-body p-2">
                                <div class="d-block pt-3">
                                    <h6 class="card-title text-truncate">{{ $offer->title }}</h6>
                                    <p class="card-text"><i>£{{ $offer->min_price }} - £{{ $offer->max_price }}</i></p>
                                    <p class="card-text text-truncate mb-0">
                                        {!! $offer->description !!}
                                    </p>
                                    @if(!$readOnly)
                                        <div>
                                            <button
                                                class="btn bg-light hover-red view-tab text-capitalize"
                                                type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#updateOffer{{$offer->id}}">
                                                <i class="bi bi-pencil me-2"></i>
                                                <small>Edit</small>
                                            </button>
                                            <button
                                                class="btn bg-light hover-red view-tab text-capitalize"
                                                type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteOffer{{$offer->id}}">
                                                <i class="bi bi-trash me-2"></i>
                                                <small>Delete</small>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Offer Modal -->
                <div class="modal mt-5" id="updateOffer{{$offer->id}}" role="dialog">
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
                                                <h4 class="text-center fw-bolder text-uppercase">Update an <span
                                                        class="fw-normal">Offer/Service</span>
                                                </h4>
                                                <span class="under-title d-block bg-dark mx-auto"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Form start -->
                                <div class="form-control border-0">
                                    <form action="{{ route('offers.update', $offer->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="w-100">
                                            <input
                                                class="d-block form-control"
                                                type="text"
                                                placeholder="Type the title of my offer here*"
                                                name="offerTitle"
                                                id="offerTitle"
                                                value="{{ $offer->title }}"
                                            />
                                        </div>
                                        <div class="w-100 pt-3">
                                            <input
                                                class="d-block form-control"
                                                type="text"
                                                placeholder="Type the min price of my offer here*"
                                                name="offerMinPrice"
                                                id="offerMinPrice"
                                                value="{{ $offer->min_price }}"
                                            />
                                        </div>
                                        <div class="w-100 py-3">
                                            <input
                                                class="d-block form-control"
                                                type="text"
                                                placeholder="Type the max price of my offer here*"
                                                name="offerMaxPrice"
                                                id="offerMaxPrice"
                                                value="{{ $offer->max_price }}"
                                            />
                                        </div>
                                        <div class="w-100">
                                            <label class="pb-2" for="offerDescription"><span class="fw-bold">Type the description of my offer below</span></label>
                                            <textarea
                                                class="form-control editor"
                                                rows="10"
                                                name="offerDescription"
                                                placeholder="This is where i tell the world my name and useful into like my location, my background and my influences"
                                            >{{ $offer->description }}</textarea>
                                        </div>
                                        <div class="w-100 py-3">
                                            <select
                                                class="offer-multi-select-tags{{$offer->id}}"
                                                name="offerTags[]"
                                                multiple="multiple">
                                                @foreach($data['tags'] as $tag)
                                                    <option
                                                        value="{{ $tag->id }}"
                                                        @if(isset($offer->tags) && $offer->tags->contains($tag)) selected @endif>
                                                        {{ $tag->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="w-100 d-inline">
                                            <button
                                                type="submit"
                                                class="btn btn-danger w-100 text-uppercase bg-transparent hover-dark text-danger border-2 fw-bolder rounded-0">
                                                Update my offer
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
                <div class="modal fade" id="deleteOffer{{$offer->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteTrackLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this offer?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center text-danger">
                                You will not be able to recover your offer once it has been deleted.
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('offers.delete', $offer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary rounded-0 text-white border-danger bg-danger">Understood, Delete anyways</button>
                                </form>
                                <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // end Col -->
        @endforeach
    </div>
</div>

<style>


@media only screen and (max-device-width: 600px) {

.img-fluid{
margin: auto;
display: block;
}
.text-end {
    text-align: center!important;
}

.avatar-edit {
    top: 20px!important;
    right: 10px!important;
}

.body-content {
    margin: 30px 0;
}
.profile-cover {
    margin-top:  auto!important;    
}

} 



</style>
