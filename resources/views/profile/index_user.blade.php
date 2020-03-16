@extends('layouts.master')

@section('content')
    <div class=" bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">
                Perfil
            </h4>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-4 col-12 float-left">
            <div class="card">
                <div class="card-body">
                    <div class="user-bg">
                        <div class="overlay-box">
                            <div class="user-content text-center text-dark">
                                <h4 >{{ \Illuminate\Support\Facades\Auth::user()->name }}</h4>
                                <h5 >{{ \Illuminate\Support\Facades\Auth::user()->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12 float-left">
            <div class="card ">
                <div class="card-body" id="profile">

                </div>
            </div>
        </div>
    </div>
@endsection