<!-- footer -->
<footer class="footer bg-dark pt-5 mt-4">
    <div class="container-xl">
        <div class="row">
            <!-- Col 1 -->
            <div class="col-12 col-md-6 col-lg-3 pb-4">
                <h4 class="text-light d-inline">Social Media</h4>
                <div class="heading-undelines mt-2">
                    <div class="red"></div>
                    <div class="grey"></div>
                </div>
                <div class="mt-3">
                    <a class="me-2" href="{{ \App\Helpers\Jeeni::getSocialMedialLink('facebook') }}" target="_blank">
                        <img src="{{ asset('front/images/icons/FB_Icon_footer.png') }}" alt="">
                    </a>
                    <a class="me-2" href="{{ \App\Helpers\Jeeni::getSocialMedialLink('youtube') }}" target="_blank">
                        <img src="{{ asset('front/images/icons/youtube_footer.png') }}" alt="">
                    </a>
                    <a class="me-2" href="{{ \App\Helpers\Jeeni::getSocialMedialLink('twitter') }}" target="_blank">
                        <img src="{{ asset('front/images/icons/tweeter_footer.png') }}" alt="">
                    </a>
                    <a class="me-2" href="{{ \App\Helpers\Jeeni::getSocialMedialLink('instagram') }}" target="_blank">
                        <img src="{{ asset('front/images/icons/insta_footer.png') }}" alt="">
                    </a>
                </div>
                <div class="mt-3">
                    <div class="selectBox" id="google_translate_element"></div>
                </div>
            </div>

            @foreach(\App\Helpers\CmsDataHelper::getFooterMenu() as $footerMenu)
                <div class="col-12 col-md-6 col-lg-3 pb-4">
                    <h4 class="text-light d-inline">{{ $footerMenu['title'] }}</h4>
                    <div class="heading-undelines mt-2">
                        <div class="red"></div>
                        <div class="grey"></div>
                    </div>
                    <div class="mt-3">
                        <ul class="list-unstyled">
                            @foreach($footerMenu['children'] as $children)
                                <li>
                                    <a class="text-decoration-none" target="{{ $children['target'] }}" href="{{ $children['url'] }}">
                                        {{ $children['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="w-100 border-top-separator"></div>
    <div class="col-12 p-4">
        <div class="d-block text-center m-4">
            <img class="d-inline" src="{{ asset('front/images/icons/Logo_Footer.png') }}" alt="Jeeni Footer Logo"/>
        </div>
        <p class="pb-4 text-center text-muted">
            © {{ date('Y') }} Jeeni.com
        </p>
    </div>
</footer>
@include('front.partials.border')
