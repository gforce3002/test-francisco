<!-- Vendor js -->
<script src="{{ mix('js/app.js')}}"></script>
<script src="{{ mix('assets/js/vendor.min.js')}}"></script>

@yield('script')

<!-- App js -->
<script src="{{ mix('assets/js/app.min.js')}}"></script>
<script src="{{ mix('js/components.js')}}"></script>

@yield('script-bottom')
