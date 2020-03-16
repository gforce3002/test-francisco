<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Administrador del sistema" name="description"/>
    <meta content="Kadoo.mx" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta content="{{ @csrf_token() }}" name="csrf-token"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="/images/favicon.png">
    @include('layouts.head')

</head>

<body>

<!-- Begin page -->
<div id="wrapper">
@include('layouts.topbar')
@include('layouts.sidebar')
<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            @yield('content')
        </div> <!-- content -->
        @include('layouts.footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->
@include('layouts.footer-script')
</body>
</html>
