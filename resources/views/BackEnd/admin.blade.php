<!DOCTYPE html>
<html lang="en">

@include('BackEnd._layouts._partials.head')

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('BackEnd._layouts._partials.nav')
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
         @include('BackEnd._layouts._partials.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">@yield('page_heading')</h4> </div>

                     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="text-align: right;">
                    @yield('button')
                </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">@yield('content')</h3> </div>
                    </div>
                </div>
                <!-- ============================================================== -->
               
                
               
            </div>
            <!-- /.container-fluid -->
            <!--Footer-->
            @include('BackEnd._layouts._partials.footer')
             <!--/Footer-->
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
@include('BackEnd._layouts._partials.script')
</body>

</html>
