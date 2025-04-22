<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../">
    <meta charset="utf-8" />
    <title>@yield('title') | Techtham</title>
    <meta name="description" content="Page with empty content" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendors Styles-->
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
    <link href="{{ asset('admin') }}/assets/css/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/my.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{ asset('image/logo/' . $generalSetting->fab_logo) }}" />
    <style>
        .table td {
            text-align: center;
        }
    </style>
    @yield('CSS')
</head>
<!--end::Head-->


<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable aside-minimize footer-fixed page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        @include('master.layuot.mobile_hader')
    </div>
    <!--end::Header Mobile-->

    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            @include('master.layuot.sidebar')

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('master.layuot.hader')

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid pb-0" id="kt_content">

                    @include('master.layuot.toolbar')

                    <x-alert />

                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            {{-- @include('admin.dashbord') --}}
                            @yield('master-content')
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
                @yield('footer')

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

    {{-- @include('master.inc.profile-Panel') --}}
    <x-profile-panel></x-profile-panel>
    <x-notification></x-notification>

    {{-- @include('master.inc.notification') --}}

    <div class="modal fade" id="viewModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="viewModalContent">

        </div>
    </div>
</div>
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
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/custom/gmaps/gmaps.js"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('admin') }}/assets/js/pages/widgets.js"></script>
    <!--end::Page Scripts-->
    <script src="{{ asset('admin') }}/assets/js/pages/select2.js"></script>
    <script src="{{ asset('admin') }}/assets/js/toastr.js"></script>
    <script src="{{ asset('admin') }}/assets/js/datatables.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/js/buttons.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/custom/tinymce/tinymce.bundle.js"></script>
    <!--end::Page Vendors-->

    <script src="{{ asset('admin') }}/assets/js/my.js"></script>

    <script>
        $('input').attr('autocomplete', 'off');

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
        @if (Session::has('returnurl'))
            var url = "{{ Session::get('returnurl') }}"
            billprint(url)
        @endif
        function billprint(url) {
            $.ajax({
                url: url,
                method: "GET",
                data: {},
                success: function(result) {
                    let printWindow = window.open('', '', 'width=1000,height=900')
                    printWindow.document.open()
                    printWindow.document.write(result.data)
                    printWindow.document.close()
                    printWindow.focus()
                    printWindow.print()
                    // printWindow.close()
                }
            })
        }
    </script>
    <script>
        $(document).on('click', ".billPrintData", function(e) {
            e.preventDefault();
            let url = $(this).data('url');
            $.ajax({
                url,
                method: "POST",
                data: {},
                success: function(result) {
                    let printWindow = window.open('', '', 'width=1000,height=900')
                    printWindow.document.open()
                    printWindow.document.write(result.data)
                    printWindow.document.close()
                    printWindow.focus()
                    printWindow.print()
                    // printWindow.close()
                }
            })
        });
    </script>

    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: "Are you sure?",
                text: "Once Deleted, you will not be able to recover this important  file!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Delete it!",
                cancelButtonText: "No, Cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    )
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            });
        });
        $(document).on("click", "#delete2", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: "Are you sure?",
                text: "Once Deleted, you will not be able to recover this important  file!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Delete it!",
                cancelButtonText: "No, Cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    )
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            });
        });
        $(document).on("click", ".delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: "Are you sure?",
                text: "Once Deleted, you will not be able to recover this important  file!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Delete it!",
                cancelButtonText: "No, Cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    )
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            });
        });
    </script>

    <script>
        $(document).on("click", "#addsave", function(e) {
            e.preventDefault();
            var link = $('#addsaveurl').attr("href");
            Swal.fire({
                title: "Are you sure?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, save it!",
                cancelButtonText: "No, Cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    // window.location.href = link;
                    $("#addsaveurl").submit();
                    Swal.fire(
                        "Save!",
                        "Your file has been Saved.",
                        "success"
                    )
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            });
        });
    </script>
    <script>
        // function viewModalShow(url) {
        //     $.ajax({
        //         url: url,
        //         data: {},
        //         type: "get",
        //         success: function(data) {
        //             console.log(data);
        //             $("#viewModalContent").append(data.html);
        //         },
        //     });
        // }
    </script>
    @yield('js')
</body>
<!--end::Body-->

</html>
