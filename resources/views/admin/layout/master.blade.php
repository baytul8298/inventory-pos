<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Adminixor – Bootstrap 5  Admin & Dashboard Template">
        <meta name="author" content="Techne Infosys">
        <meta name="keywords"
            content="admin template, Adminixor admin template, dashboard template, flat admin template, responsive admin template, web app">

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="https://dev.techneinfosys.com/html/adminixor/assets/images/brand/favicon.ico">

        <!-- TITLE -->
        <title>@yield('title') | {{ config('app.name') }}</title>
        
        <link id="style" href="{{ asset('admin/assets/css/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <!-- STYLE CSS -->
        <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" />
        <!-- Plugins CSS -->
        <link href="{{ asset('admin/assets/css/plugins.css') }}" rel="stylesheet" />
        <!--- FONT-ICONS CSS -->
        <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet" />
        <!-- INTERNAL Switcher css -->
        <link href="{{ asset('admin/assets/switcher/css/switcher.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/switcher/demo.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/css/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
        <style>

        </style>

        @yield('style')
    </head>
    <body class="app sidebar-mini ltr light-mode">
        <!--{ Pre-loder start }-->
        <div id="global-loader">
            <img src="https://dev.techneinfosys.com/html/adminixor/assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!--{ Pre-loder end }-->

        <!--{ Switcher Start }-->
        @include('admin.layout.setting')
        <!--{ Switcher End }-->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">
                <!--{ app header start }-->
                @include('admin.layout.topbar')
                <!--{ app header end }-->

                <!--{ app sidebar start }-->
                
                <!--{ app sidebar end }-->

                <!--{ app content start }-->
                @yield('content')
                <!--{ app content end }-->
            </div>
        </div>

        <!-- FOOTER -->
        @include('admin.layout.footer')
        <!-- FOOTER END -->

        <!-- Modal for Branch Details -->
        <div class="modal fade" id="modaldemo8" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered text-center">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalTitle">Message Preview</h4>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="modalBody">
                        <input type="hidden" name="branch_id" id="branchId">
                        <h4>Are you sure!! You want to access this branch?</h4>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary branchAccess">Login</button>
                        <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
        <!--{ JQUERY JS }-->
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <!--{ BOOTSTRAP JS }-->
        <script src="{{ asset('admin/assets/js/plugins/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--{ SPARKLINE JS }-->
        <script src="{{ asset('admin/assets/js/jquery.sparkline.min.js') }}"></script>
        <!--{ Sticky js }-->
        <script src="{{ asset('admin/assets/js/sticky.js') }}"></script>
        <!--{ CHART-CIRCLE JS }-->
        <script src="{{ asset('admin/assets/js/circle-progress.min.js') }}"></script>
        <!--{ PIETY CHART JS }-->
        <script src="{{ asset('admin/assets/js/plugins/peitychart/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/peitychart/peitychart.init.js') }}"></script>
        <!--{ SIDEBAR JS }-->
        <script src="{{ asset('admin/assets/js/plugins/sidebar/sidebar.js') }}"></script>
        <!-- Perfect SCROLLBAR JS-->
        <script src="{{ asset('admin/assets/js/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/p-scroll/pscroll.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/p-scroll/pscroll-1.js') }}"></script>
        <!--{ INTERNAL CHARTJS CHART JS }-->
        <script src="{{ asset('admin/assets/js/plugins/chart/Chart.bundle.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/chart/utils.js') }}"></script>
        <!--{ Select2 js }-->
        <script src="{{ asset('admin/assets/js/plugins/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/select2/select2.init.js') }}"></script>
        <!--{ classic editor   js }-->
        <script src="{{ asset('admin/assets/js/plugins/ckeditor/classic/ckeditor.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/ckeditor/classic/classic.init.js') }}"></script>

        <!--{ form select  js }-->
        <script src="{{ asset('admin/assets/js/form-select.js') }}"></script>

        <!--{  INTERNAL Data tables js }-->
        <script src="{{ asset('admin/assets/js/plugins/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/datatable/dataTables.bootstrap5.min.js') }}"></script>
        <!--{ INTERNAL APEXCHART JS }-->
        <script src="{{ asset('admin/assets/js/apexcharts.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/apexchart/irregular-data-series.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/flot/chart.flot.sampledata.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/flot/dashboard.sampledata.js') }}"></script>
        <!--{ INTERNAL Vector js }-->
        <script src="{{ asset('admin/assets/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!--{ form datepicker  js }-->
        <script src="{{ asset('admin/assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/form-datepicker.js') }}"></script>
        <!--{ SIDE-MENU JS }-->
        <script src="{{ asset('admin/assets/js/plugins/sidemenu/sidemenu.js') }}"></script>
        <!--{ INTERNAL INDEX JS }-->
        <script src="{{ asset('admin/assets/js/index1.js') }}"></script>
        <!--{ Color Theme js }-->
        <script src="{{ asset('admin/assets/js/themeColors.js') }}"></script>
        <!--{ CUSTOM JS }-->
        <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
        <!--{ Custom-switcher }-->
        <script src="{{ asset('admin/assets/js/custom-swicher.js') }}"></script>
        <!--{ Switcher js }-->
        <script src="{{ asset('admin/assets/switcher/js/switcher.js') }}"></script>
        <!--{ Notifier js }-->
        <script src="{{ asset('admin/assets/js/plugins/notifier/notifier.js') }}"></script>
        <script src="{{ asset('admin/assets/js/notification.js') }}"></script>
        <!--{ Sweet alert }-->
        <script src="{{ asset('admin/assets/js/plugins/sweet-alert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/sweet-alert.js') }}"></script>
        <!-- FILE UPLOADES JS -->
        <script src="{{ asset('admin/assets/js/plugins/fileuploads/js/fileupload.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/fileuploads/js/file-upload.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins/fancyuploder/fancy-uploader.js') }}"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.min.css" />
        <script>
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var message = "{{ session('message') }}";
                var isError = "{{ session('error') }}";

                // Prevent showing on back/forward nav
                if (!window.performance || window.performance.navigation.type !== window.performance.navigation.TYPE_BACK_FORWARD) {
                    if (message !== "") {
                        if (isError === "1" || isError === "true") {
                            notifier.show('Oops!', message, 'danger', "{{ asset('admin/assets/images/notification/high_priority-48.png') }}", 7000);
                        } else {
                            notifier.show('Success!', message, 'success', "{{ asset('admin/assets/images/notification/ok-48.png') }}", 7000);
                        }
                    }
                }
            });
        </script>


    @yield('script')
    </body>>
</html>