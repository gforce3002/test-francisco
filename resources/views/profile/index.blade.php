@extends('themes.adminlte.layout')

@section('content')
    <div style="padding: 20px">
        <div class=" bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">
                    Perfil
                </h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/">Inicio</a></li>
                    <li class="active">Perfil</li>
                </ol>
            </div>
        </div>

        <div class="">
            <div class="col-md-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="user-bg">
                            <div class="overlay-box">
                                <div class="user-content text-center">
                                    <h4 class="text-white">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h4>
                                    <h5 class="text-white">{{ \Illuminate\Support\Facades\Auth::user()->email }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="profile">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection