@extends('layouts.master')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="/coverages">Coberturas</a></li>
                            <li class="breadcrumb-item active">Registrar Coberturas</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Registrar Coberturas</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

    </div> <!-- container -->
    <div class="container-fluid">
        <div class="row justify-content-center" >
            <div class="col-12" id="coverage">
            </div>
        </div>
    </div>
@endsection
