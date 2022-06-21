<!-- Side-Nav -->
<div class="side-navbar d-flex flex-wrap flex-column" id="sidebar">

    <ul class="nav flex-column text-white w-100">
        <li id="my-profile" onclick="showSubmenu(this)" class="nav-item text-white">
            <i class="bi bi-chevron-down"></i>My Profile
            <ul class="submenu nav flex-column text-white w-100 bg-dark">
                <li class="nav-item">
                    <a href="{{ route('myprofile') }}" class="nav-link text-white">   <i class="bi bi-eye-fill"></i>View My Profile</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">   <i class="bi bi-person-fill"></i>My Profile</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white"><i class="bi bi-person-fill"></i>My Profile</a>
                </li>

            </ul>
        </li>
        <li id="my-artists"  onclick="showSubmenu(this)" class="nav-item text-white">
            <i class="bi bi-chevron-down"></i>My Artist
            <ul style="top: 43px;" class="submenu nav flex-column text-white w-100 bg-dark">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">   <i class="bi bi-eye-fill"></i>My Artist</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">   <i class="bi bi-person-fill"></i>My Artist Offers</a>
                </li>
            </ul>
        </li>
        <li id="my-playlist" class="nav-item text-white">My Playlist
        </li>
        <li id="my-feedback" class="nav-item text-white">My Feedback
        </li>
        <li id="my-account" onclick="showSubmenu(this)" class="nav-item text-white">
            <i class="bi bi-chevron-down"></i>My Account
            <ul style="top: 171px;" class="submenu nav flex-column text-white w-100 bg-dark">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">My Password & My Account</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">De-active My Account</a>
                </li>

            </ul>
        </li>
        <li id="logout" class="nav-item text-white" type="button" data-bs-toggle="modal" data-bs-target="#logoutwarning">Logout</li>
    </ul>

</div>
<div class="sidebar-overly"></div>
