<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>Login | MedPro</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('admin') }}/assets/css/pages/login/classic/login-5.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('admin') }}/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    {{-- <link rel="shortcut icon" href="{{ asset('admin') }}/assets/media/logos/favicon.ico" /> --}}
    <link rel="shortcut icon" href="{{ asset('image/logo/' . $generalSetting->fab_logo) }}" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
                style="background-image: url({{ asset('image/bg.jpg') }});">
                <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="{{ asset('image/logo/' . $generalSetting->mane_logo) }}" class="max-h-75px"
                                alt="" />
                        </a>
                    </div>
                    <div class="login-signin">
                        <div class="mb-10">
                            <h2 class=" text-bold text-dark"><b>Sign In</b></h2>
                            <p class="text-bold text-dark"><b>Enter your details to login to your account:</b></p>
                        </div>
                        <form class="form" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input
                                    class="form-control h-auto text-dark rounded-pill border-0 py-4 w-400px px-8"
                                    id="email" type="text" placeholder="Email" name="email" />
                            </div>
                            <div class="form-group">
                                <input
                                    class="form-control h-auto text-dark rounded-pill border-0 py-4 w-400px px-8"
                                    id="password" type="password" name="password"
                                    autocomplete="current-password" />
                            </div>
                            <div
                                class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-dark text-dark m-0">
                                        <input id="remember_me" type="checkbox" name="remember" />
                                        <span></span><b>Remember me</b></label>
                                </div>
                            </div>
                            <div class="form-group text-center mt-10">
                                <button type="submit" class="btn btn-pill btn-block btn-primary opacity-90 px-15 py-3">Sign
                                    In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('admin') }}/assets/js/pages/custom/login/login-general.js"></script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
