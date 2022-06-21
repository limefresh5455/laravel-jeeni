$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let isPlayerExists =  document.getElementById('myPlayer');
if (typeof(isPlayerExists) != 'undefined' && isPlayerExists != null) {
    // This controls the "Video players"
    document.addEventListener('DOMContentLoaded', () => {
        var myPlayer = new BootstrapVideoplayer('myPlayer',{
            selectors:{
                video: '.video',
                playPauseButton: '.btn-video-playpause',
                playIcon: '.bi-play-fill',
                pauseIcon: '.bi-pause-fill',
                progress: '.progress',
                progressbar: '.progress-bar',
                pipButton: '.btn-video-pip',
                fullscreenButton: '.btn-video-fullscreen',
                volumeRange: '.form-range-volume'
                // duration: true,
            }
        });
    });
}

// For LOGIN & Register page - This is used to reveal the password
const togglePassword = document.querySelector("#togglePassword");
if (typeof(togglePassword) != 'undefined' && togglePassword != null) {
    const password = document.querySelector("#password");
    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
}

// For LOGIN & Register page - This is used to reveal the password
const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
if (typeof(toggleConfirmPassword) != 'undefined' && toggleConfirmPassword != null) {
    const password = document.querySelector("#password-confirm");
    toggleConfirmPassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
}


$(document).ready(function() {

    /* hiding loader on page load */
    toggleFrontLoader('hide');

    // This controls the carousel on the "#jenni-viewers, and #jenni-artists" section
    let owlJenniViewers = $("#jenni-viewers, #jenni-artists");
    owlJenniViewers.owlCarousel({
        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,

        singleItem:true, // is a shortcut for:
        items : 1,
        itemsDesktop : false,
        itemsDesktopSmall : false,
        itemsTablet: false,
        itemsMobile : false,
        loop:true,
    });

    // This controls the carousel on the "Latest videos" section
    let owlLatestVideos = $("#latest-videos");
    owlLatestVideos.owlCarousel({
        navigation : false, // Show next and prev buttons
        nav:true,
        navText: ["<i class='arrows bi bi-caret-left-fill'></i>","<i class='arrows bi bi-caret-right-fill'></i>"],
        dots: false,
        singleItem:true,
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false,
                // stagePadding: 30,
                loop: false,
                left: -20,
                stagePadding: 20,
            },
            540:{
                items:2,
                nav:false,
                left: -20,
                stagePadding: 20,
            },
            992:{
                items:3,
                nav:false,
                left: -20,
                stagePadding: 20,
            },
            1400:{
                items:4,
            }
        }
    });

    // This controls the carousel on the "Inside stories" for DESKTOP version only section "find the mobile version of the same section below (#mobile-inside-stories)"
    let owlInsideStories = $("#inside-stories");
    owlInsideStories.owlCarousel({
        navigation: false, // Show next and prev buttons
        nav:false,
        navText: ["<i class='arrows bi bi-caret-left-fill'></i>","<i class='arrows bi bi-caret-right-fill'></i>"],
        dots: false,
        singleItem:true,
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false,
                loop:true,
                dots: true,
                // left: -20,
                stagePadding: 10,
                // },
                // 1024:{
                //     items:1,
                //     nav:true,
                //     loop:true
            },
            1250:{
                items:1,
                nav:true,
                loop:true
            }
        }
    });
    // This controls the carousel on the "Inside stories" for MOBILE version only section (see desktop above #inside-stories)
    let owlMobileInsideStories = $("#mobile-inside-stories");
    owlMobileInsideStories.owlCarousel({
        dots: false,
        navigation:false,
        nav:false,
        loop:true,
        margin:1,
        stagePadding: 20, // To see the edge of the next slide
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                // stagePadding: 30,
                nav: false,
                loop: false,
                left: -20
            },
            // 540:{
            //     items:2,
            // },
            768:{
                items:2,
            },
            1000:{
                items:3,
            }
            // Only uncomment this block if you want to use the mobile version only on desktop but remember to display it as block
            // 1300:{
            //     items:4,
            //     // nav:false,
            //     navigation: true,
            //     loop:true
            // }
        }
    });

    $('.ddl-channels').on('change', function (e){
        location.href = $('option:selected', this).attr('data-url');
    });

    /*removing divider from language selector*/
    setTimeout(function () {
        $("a.goog-te-menu-value span").each(function(i){
            if(i === 1) {$(this).remove()}
        });
    }, 1000);

    $('.homepage-start').on('click', function (e) {
        e.preventDefault();
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#latestVideos").offset().top
        }, 500);
    });
});

function toggleFrontLoader(loaderType) {
    if(loaderType === 'show') {
        document.getElementById("loaderContainer").style.display = "block";
    } else {
        document.getElementById("loaderContainer").style.display = "none";
    }
}

// sidebar
const menu_btn = document.querySelector("#menu-btn");
const sidebar = document.querySelector("#sidebar");
const container = document.querySelector(".my-container");
const hamburgerIcon = document.querySelector(".hamburger");

if (typeof(menu_btn) != 'undefined' && menu_btn != null) {
    menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        sidebarOverly.classList.toggle("active-sidebaroverly")
        hamburgerIcon.classList.toggle("is-active")
        ArtistsMenu.children[0].classList.remove("bi-chevron-left");
        ArtistsMenu.children[1].classList.remove("submenu-active");
        AccountMenu.children[0].classList.remove("bi-chevron-left");
        AccountMenu.children[1].classList.remove("submenu-active");
        ProfileMenu.children[0].classList.remove("bi-chevron-left");
        ProfileMenu.children[1].classList.remove("submenu-active")
    });
}

function showSubmenu(sub){
    sub.classList.toggle("summenuactive");
    sub.children[0].classList.toggle("bi-chevron-left");
    sub.children[1].classList.toggle("submenu-active");
}
const SubMenus = document.querySelector(".submenu");
const ProfileMenu = document.querySelector("#my-profile");
const ArtistsMenu = document.querySelector("#my-artists");
const AccountMenu = document.querySelector("#my-account");
const sidebarOverly = document.querySelector(".sidebar-overly")

if (typeof(ProfileMenu) != 'undefined' && ProfileMenu != null) {
    ProfileMenu.addEventListener("click", function(){
        ArtistsMenu.children[0].classList.remove("bi-chevron-left");
        ArtistsMenu.children[1].classList.remove("submenu-active")
        AccountMenu.children[0].classList.remove("bi-chevron-left");
        AccountMenu.children[1].classList.remove("submenu-active")
    });
}

if (typeof(ArtistsMenu) != 'undefined' && ArtistsMenu != null) {
    ArtistsMenu.addEventListener("click", function(){
        ProfileMenu.children[0].classList.remove("bi-chevron-left");
        ProfileMenu.children[1].classList.remove("submenu-active")
        AccountMenu.children[0].classList.remove("bi-chevron-left");
        AccountMenu.children[1].classList.remove("submenu-active")
    });

    AccountMenu.addEventListener("click", function(){
        ArtistsMenu.children[0].classList.remove("bi-chevron-left");
        ArtistsMenu.children[1].classList.remove("submenu-active")
        ProfileMenu.children[0].classList.remove("bi-chevron-left");
        ProfileMenu.children[1].classList.remove("submenu-active")
    });
}

if (typeof(sidebarOverly) != 'undefined' && sidebarOverly != null) {
    sidebarOverly.addEventListener("click", function(){
        sidebarOverly.classList.remove("active-sidebaroverly");
        sidebar.classList.remove("active-nav");
        hamburgerIcon.classList.remove("is-active")
        ArtistsMenu.children[0].classList.remove("bi-chevron-left");
        ArtistsMenu.children[1].classList.remove("submenu-active");
        AccountMenu.children[0].classList.remove("bi-chevron-left");
        AccountMenu.children[1].classList.remove("submenu-active");
        ProfileMenu.children[0].classList.remove("bi-chevron-left");
        ProfileMenu.children[1].classList.remove("submenu-active")
    });
}
