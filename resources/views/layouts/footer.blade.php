<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                2019 - {{date('Y')}} &copy; Desarrollado por @if(empty(env('PARTNER'))) <a href="https://kadoo.mx">Kadoo.mx</a> @else {{ env('PARTNER') }} @endif
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->
