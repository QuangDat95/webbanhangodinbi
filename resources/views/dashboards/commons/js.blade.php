    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>

    <script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/datatables/datatable.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <!-- <script src="{{asset('app-assets/js/scripts/charts/chart-apex.min.js')}}"></script> -->
    <script src="{{asset('app-assets/js/scripts/charts/chart-apex.js')}}"></script>
    <!-- END: Page JS-->
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#change_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image_product").change(function() {
            readURL(this);
        });
    </script>