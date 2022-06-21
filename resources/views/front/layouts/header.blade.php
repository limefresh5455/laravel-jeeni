    <header>
    <!-- Top nav row -->
    <nav
        class="jeeni-navigation w-100 d-block d-md-flex justify-content-between
        justify-content-md-start align-items-center py-3
        py-lg-3 px-2 px-lg-4 position-relative">

        <!-- Logo and mobile menu -->
        <div class="col d-inline-block d-md-flex align-items-center justify-content-md-start justify-content-between mb-3 mb-md-0 col-md-4">
            <!-- Logo -->
            <div class="d-inline-block">
                <div class="text-center text-md-start">
                    <div class="mob-logo-wrapper">
                        <a href="{{ url('/') }}">
                            <img class="logo mx-auto" src="{{ asset('front/images/icons/Top_Logo.png') }}" alt="Jeeni">
                        </a>
                    </div>
                </div>
            </div>
            <!-- // Logo -->
        </div>

        <!-- Search bar and buttons -->
        <div class="col d-inline-block justify-content-center align-items-center d-md-flex col-md-8 col-sdlg-12 justify-content-md-end">
            <!--  Search bar -->
            <div class="col-12 d-none d-md-flex text-center col-md-auto d-md-inline-block col-lg-8 d-lg-flex text-white-50 mx-md-1">
                <form class="w-100 search-form d-md-inline-block mx-md-0" action="/search" method="get">
                    @csrf
                    <div class="input-group justify-content-md-end">
                        <!-- Channel Select  -->
                        <div class="col-6 d-lg-flex p-0">
                            <select class="w-100 ddl-channels shadow-none form-control form-select custom-border rounded-0 bg-transparent">
                                <option>Select Channel</option>
                                @foreach(\App\Helpers\Jeeni::availableChannels() as $index => $channel)
                                    <option data-url="{{ url('channel') . '/' . \App\Helpers\Jeeni::encryptData($channel['id']) }}"
                                            value="{{ $channel['id'] }}">
                                        {{ $channel['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Search Bar -->
                        <div class="col-6 d-flex justify-content-md-between">
                            <div class="w-100 d-lg-flex">
                                <input class="w-100 d-inline-block form-control custom-border rounded-0 bg-transparent"
                                name="search"
                                type="text"
                                placeholder="Search Jeeni...">
                                <input name="sortby" value='latest' type="hidden">
                                <input name="view" value='grid' type="hidden">
                            </div>
                            <div class="w-auto">
                                <button
                                    class="btn shadow-none bg-transparent px-2 rounded-0 custom-border"
                                    type="submit">
                                    <i class="bi bi-search text-white"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- CTAs login/Join -->
            @if(auth()->check())
                <div class="d-none d-md-flex align-items-center">
                    <div class="h4 me-3 mb-0 d-md-inline-block">
                        <a href="{{ route('account.edit') }}" title="My Account">
                            <i class="bi bi-gear text-white"></i>
                        </a>
                    </div>
                    <div class="h4 me-3 mb-0 d-md-inline-block">
                        <a href="{{ route('myprofile').'?t=upload' }}" title="Upload Track">
                            <i class="bi bi-upload text-white"></i>
                        </a>
                    </div>
                </div>

                <!-- NAV -->
                <div class="col-md-auto d-inline-block d-md-inline-block d-lg-flex float-right-mob">
                    <!-- Top Nav -->
                    <nav class="navbar top-navbar navbar-light p-0">
                        <a class="btn hover-red hover-transparent bg-red border-0 text-white py-1 rounded-0" id="menu-btn"><span id="My_Jenni_text">My Jeeni</span>
                            <div class="hamburger" id="hamburger-1">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </a>
                    </nav>
                </div>
            @else
            <!-- NAV -->
                <div class="col-md-auto d-none mobile-special-menu float-right-mob">
                    <!-- Top Nav -->
                    <nav class="navbar top-navbar navbar-light p-0">
                        <a class="btn hover-red hover-transparent bg-red border-0 text-white py-1 rounded-0" id="menu-btn"><span id="My_Jenni_text">My Jeeni</span>
                            <div class="hamburger" id="hamburger-1">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </a>
                    </nav>
                </div>
                <div class="col-md-auto d-none d-md-inline-block d-lg-flex">
                    <div class="w-100 mx-2 mx-md-0 text-md-end text-lg-start">
                        <a href="{{ url('login') }}"
                           class="btn hover-red bg-transparent custom-border text-white text-uppercase rounded-0 px-lg-3 mx-lg-1">
                            <i class="bi bi-person d-inline"></i>
                            Login
                        </a>
                        <a href="{{ url('subscribe') }}"
                            class="btn hover-red hover-transparent bg-red custom-border text-white text-uppercase rounded-0 px-lg-3 mx-lg-1">
                            <i class="bi bi-person d-inline"></i>
                            Join Now
                        </a>
                    </div>
                </div>
            @endif
        </div>
        <!--  Search bar -->
        <div class="col-12 d-flex text-center col-md-auto d-md-none col-lg-8 text-white-50 mx-md-1">
            <form class="w-100 search-form d-md-inline-block mx-md-0" action="/search">
                <div class="input-group justify-content-md-end">
                    <!-- Channel List -->
                    <div class="col-6 d-lg-flex p-0">
                        <select class="w-100 shadow-none form-control ddl-channels form-select custom-border rounded-0 bg-transparent">
                            <option>Select Channel</option>
                            @foreach(\App\Helpers\Jeeni::availableChannels() as $index => $channel)
                                <option data-url="{{ url('channel') . '/' . \App\Helpers\Jeeni::encryptData($channel['id']) }}"
                                        value="{{ $channel['id'] }}">
                                    {{ $channel['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Search Bar -->
                    <div class="col-6 d-flex justify-content-md-between">
                        <div class="w-100 d-lg-flex">
                            <input class="w-100 d-inline-block form-control custom-border rounded-0 bg-transparent" type="text" placeholder="Search Jeeni..">
                        </div>
                        <div class="w-auto">
                            <button
                                class="btn shadow-none bg-transparent px-2 rounded-0 custom-border"
                                type="submit">
                                <i class="bi bi-search text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </nav>
    <!-- // Top nav row -->
    @if(auth()->check())
        <!-- Side-Nav -->
        <div class="side-navbar d-flex flex-wrap flex-column" id="sidebar">

            <ul class="nav flex-column text-white w-100">
                <li id="my-profile" onclick="showSubmenu(this)" class="nav-item text-white">
                    <i class="bi bi-chevron-down"></i>My Profile
                    <ul class="submenu nav flex-column text-white w-100 bg-dark">
                        <li class="nav-item">
                            <a href="{{ route('myprofile') }}" class="nav-link text-white">   <i class="bi bi-eye-fill"></i>View My Profile</a>
                        </li>
                        @if(!auth()->user()->hasRole('viewer'))
                            <li class="nav-item">
                                <a href="{{ route('myprofile').'?t=showcase' }}" class="nav-link text-white">
                                    <i class="bi bi-person-fill"></i>
                                    My Showcase
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('myprofile').'?t=tracks' }}" class="nav-link text-white">
                                    <i class="bi bi-person-fill"></i>My Tracks
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('myprofile').'?t=marketing' }}" class="nav-link text-white">
                                    <i class="bi bi-person-fill"></i>My Marketing
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('myprofile').'?t=offers' }}" class="nav-link text-white">
                                    <i class="bi bi-person-fill"></i>My Offers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('invite.view') }}" class="nav-link text-white">
                                    <i class="bi bi-person-fill"></i>My Invites
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li id="my-artists"  onclick="showSubmenu(this)" class="nav-item text-white">
                    <i class="bi bi-chevron-down"></i>My Artists
                    <ul style="top: 43px;" class="submenu nav flex-column text-white w-100 bg-dark">
                        <li class="nav-item">
                            <a href="{{ route('my-artists') }}" class="nav-link text-white">
                                <i class="bi bi-eye-fill"></i>My Artists
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('offers.list') }}" class="nav-link text-white">
                                <i class="bi bi-person-fill"></i>My Artist Offers
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="my-playlist" class="nav-item ">
                    <a href="{{ route('myplaylist') }}" class="text-white text-decoration-none">
                        My Playlist
                    </a>
                </li>
                @if(!auth()->user()->hasRole('viewer'))
                <li id="my-feedback" class="nav-item">
                    <a href="{{ route('myfeedback') }}" class="text-white text-decoration-none">
                        My Feedback
                    </a>
                </li>
                @endif
                <li id="my-account" onclick="showSubmenu(this)" class="nav-item text-white">
                    <i class="bi bi-chevron-down"></i>My Account
                    <ul style="top: 171px;" class="submenu nav flex-column text-white w-100 bg-dark">
                        <li class="nav-item">
                            <a href="{{ route('account.edit') }}" class="nav-link text-white">
                                My Password & My Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.edit') . '?delete  ' }}" class="nav-link text-white">
                                De-active My Account
                            </a>
                        </li>

                    </ul>
                </li>
                <li id="logout" class="nav-item text-white" type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#logoutwarning">
                    Logout
                </li>
            </ul>

        </div>
        <div class="sidebar-overly"></div>
    @else
        <!-- Side-Nav -->
        <div class="side-navbar d-flex flex-wrap flex-column" id="sidebar">
            <ul class="nav flex-column text-white w-100">
                <li id="my-playlist" class="nav-item ">
                    <a href="{{ route('login') }}" class="text-white text-decoration-none">
                        Login
                    </a>
                </li>
                <li id="my-feedback" class="nav-item">
                    <a href="{{ route('register') }}" class="text-white text-decoration-none">
                        Join Now
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidebar-overly"></div>
    @endif
</header>
