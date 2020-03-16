@extends('layouts.master-without-nav')

@section('body')
    <body class="authentication-bg authentication-bg-pattern">
    @endsection

    @section('content')
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto pb-3">
                                    <a href="/">
                                        <span><img src="{{ env('LOGO_URL', '/images/kadoo.png') }}" class="img-fluid" alt=""></span>
                                    </a>
                                </div>

                                <form action="/login" method="post">
                                    {{ @csrf_field() }}
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Correo Electrónico</label>
                                        <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Contraseña</label>
                                        <input class="form-control" name="password" type="password" required="" id="password" placeholder="">
                                    </div>

                                    @if(session('error'))
                                        <div class="form-group mb-3">
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Iniciar Sesión </button>
                                    </div>

                                </form>

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p> <a href="/password/email" class="ml-1">Olvidé mi contraseña</a></p>
                                    </div> <!-- end col -->
                                </div>

                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Inicia Sesión con:</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="/auth/facebook" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="/auth/google" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2020 - {{date('Y')}} &copy; {{ env('PARTNER', 'Kadoo.mx') }}
        </footer>
@endsection
