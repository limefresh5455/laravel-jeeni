<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-GB">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-GB">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]>-->
<html lang="{{ config('app.locale') }}">
<head>
    <title>@yield('page_title', setting('admin.title') . " - " . setting('admin.description'))</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="assets-path" content="{{ route('voyager.voyager_assets') }}"/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=""/>
    <meta name="author" content="Jeeni"/>
    <meta name="generator" content="Jeeni 0.0.2"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Favicon -->
    <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
    @if($admin_favicon == '')
        <link rel="shortcut icon" href="{{ voyager_asset('images/logo-icon.png') }}" type="image/png">
    @else
        <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/png">
    @endif

    <!-- CSS Libs -->
    @include('front.partials.styles')

    @yield('css')

    @yield('head')
</head>

<body class="jeeni-front {{ \Illuminate\Support\Facades\Route::currentRouteName() }}">

    <!--    Page Loader-->
    @include('front.partials.loader')

    <!-- Page Header -->
    @include('front.layouts.header')

    <!-- Page Content-->
    @yield('content')

    <!-- Logout warning popup -->
    @include('front.partials.logout-popup')

    <!-- track tooltip -->
    @include('front.partials.track.tooltip')

    <!-- Page Footer -->
    @include('front.layouts.footer')

    <!-- Javascript Libs -->
    @include('front.partials.scripts')

    @yield('footer_script')

    @include('front.partials.language-scripts')
    @include('front.partials.result-set-scripts')

    <script>
        const JEENI_HOME_PAGE = '{{ url('') }}';
    </script>
</body>
</html>
