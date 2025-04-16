<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('layout.include-header')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    @include('layout.loading-animation')

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        @include('layout.header')
        @include('layout.nav')

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                            class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    @yield('breadcrumb1')
                                </li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">
                            @yield('breadcrumb2')
                        </h1>
                    </div>

                </div>
            </div>


            <div class="container-fluid">
                @yield('content')
            </div>
            {{-- @include('views.layout.footer') --}}
        </div>
    </div>

    @include('layout.include-footer')
    @stack('script')
    @yield('script')
</body>

</html>
