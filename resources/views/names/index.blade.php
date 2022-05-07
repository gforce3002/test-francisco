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
                            <li class="breadcrumb-item active">Names</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Names</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

    </div> <!-- container -->
    <div class="container-fluid">
        <div class="row justify-content-center" >
            <div class="col-12" id="names-list">
                
            </div>
        </div>
    </div>
@endsection