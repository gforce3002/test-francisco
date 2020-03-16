
        @yield('css')

        <!-- Config Modules -->
        <script type="application/javascript">
            var kadoo_customers = {{ config('kadoo-customers.enabled', 'false') }};
            var kadoo_sales = {{ config('kadoo-sales.enabled', 'false') }};
        </script>

        <!-- App css -->
        <link href="{{ mix('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ mix('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ mix('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
