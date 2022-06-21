<div class="modal fade" id="logoutwarning" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logoutwarningLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- To close the Modal/popup -->
            <div class="row">
                <div class="w-100 text-center mt-n15">
                    <button type="button" class="btn rounded-pill text-danger hover-dark p-0 m-0" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill h4"></i></button>
                </div>
            </div>
            <div class="modal-header border-0">
                <!-- <h5 class="modal-title text-center" id="staticBackdropLabel">Are you sure?</h5> -->
                <div class="w-100 d-inline text-center">
                    <h2 class="text-center fw-bolder text-uppercase">logout</h2>
                    <span class="under-title d-block bg-dark mx-auto"></span>
                </div>
            </div>
            <div class="modal-body text-center text-danger border-0">
                Are you sure you would like to log out?
            </div>
            <div class="modal-footer border-0">
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <div class="w-100">
                    <button type="button"
                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                            class="btn btn-danger w-100 text-uppercase bg-transparent hover-dark text-danger border-2 fw-bolder rounded-0">
                        Confirm
                    </button>
                </div>
                <div class="w-100">
                    <button type="button" class="btn w-100 bg-transparent text-black-50 border-2 rounded-0"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
