<!-- Warning Section Ends -->
<!-- Required Jqurey -->
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/backend/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/tether/dist/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/modernizr/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/modernizr/feature-detects/css-scrollbars.js') }}"></script>
<!-- classie js -->
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/classie/classie.js') }}"></script>
<!-- Rickshow Chart js -->
<script src="{{ asset('assets/backend/bower_components/d3/d3.js') }}"></script>
<script src="{{ asset('assets/backend/bower_components/rickshaw/rickshaw.js') }}"></script>
<!-- Morris Chart js -->
<script src="{{ asset('assets/backend/bower_components/raphael/raphael.min.js') }}"></script>
{{-- <script src="{{ asset('assets/backend/bower_components/morris.js/morris.js') }}"></script> --}}
<!-- Horizontal-Timeline js -->
<script type="text/javascript" src="{{ asset('assets/backend/assets/pages/dashboard/horizontal-timeline/js/main.js') }}"></script>
<!-- amchart js -->
<script type="text/javascript" src="{{ asset('assets/backend/assets/pages/dashboard/amchart/js/amcharts.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/pages/dashboard/amchart/js/serial.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/pages/dashboard/amchart/js/light.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/pages/dashboard/amchart/js/custom-amchart.js') }}"></script>

<!-- data-table js -->
<script src="{{ asset('assets/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/backend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/backend/assets/pages/data-table/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/backend/assets/pages/data-table/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/backend/assets/pages/data-table/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/backend/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/backend/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/backend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/backend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/bower_components/dropify/js/dropify.min.js') }}"></script>

<!-- i18next.min.js -->
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/i18next/i18next.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/bower_components/jquery-i18next/jquery-i18next.min.js') }}"></script>
<!-- Sweet Alert -->
<script src="{{ asset('assets/backend/assets/pages/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/backend/assets/pages/sweetalert2/sweet-alert.init.js') }}"></script>
<!-- Sweet Alert -->
<!-- Parsley JS -->
<script src="{{ asset('assets/backend/assets/pages/parsley/parsley.min.js') }}"></script>
<!-- Parsley JS -->

<!-- Toaster JS -->
<script src="{{ asset('assets/backend/assets/pages/toaster/toastr.min.js') }}"></script>
<!-- Toaster JS -->
<script src="{{ asset('assets/backend/assets/pages/select2/select2.min.js') }}"></script>
<!-- Custom js -->
{{-- <script type="text/javascript" src="{{ asset('assets/backend/assets/pages/data-table/js/data-table-custom.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('assets/backend/assets/js/script.js') }}"></script>
@include('backend.layouts.partials.flash-message')