@extends('layouts.app')
@section('content')
    <div class="top-padding-section">
        <div class="green-bg-section" style="height: 500px;">
            <div class="block-padding-section">
                <div>
                    <h1 style="padding-left: 80px; padding-bottom: 50px; padding-top: 80px; text-align: left; color: #ffffff;">{{ $vyzva[0]->nazov_institucie }}</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="container-pic-msg">
                                <img src="{{ asset('institucie/'.$vyzva[0]->fotka_institucie)}}" style="width: 100%;height: auto; object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 pb-3 text-left">
                                        <h3 style="color: #ffffff;"> Krajina:</h3>
                                    </div>
                                    <div class="col-md-6 pb-3 text-left mt-1">
                                        <p style="color: #ffffff;font-size: 20px;">{{ $vyzva[0]->krajina_nazov }} </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pb-3 text-left">
                                        <h3 style="color: #ffffff;font-size: 20px;">Typ mobility: </h3>
                                    </div>
                                    <div class="col-md-6 pb-3 text-left mt-1">
                                        <p style="color: #ffffff;font-size: 20px;">{{ $vyzva[0]->typ_vyzvy}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pb-3 text-left">
                                        <h3 style="color: #ffffff;">Určené pre:</h3>
                                    </div>
                                    <div class="col-md-6 pb-3 text-left mt-1">
                                        <p style="color: #ffffff;font-size: 20px;">{{ $vyzva[0]->nazov_fakulty}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <h3 style="color: #ffffff;">Ročník štúdia:</h3>
                                    </div>
                                    <div class="col-md-6 pb-3 text-left mt-1">
                                        <p style="color: #ffffff;font-size: 20px;">
                                        @switch($vyzva[0]->rocnik)
                                            @case(1)
                                                1.Bc
                                                @break
                                            @case(2)
                                                2.Bc
                                                @break
                                            @case(3)
                                                3.Bc
                                                @break
                                            @case(4)
                                                1.Mgr
                                                @break
                                            @case(5)
                                                2.Mgr
                                                @break
                                            @case(6)
                                                1.PhD
                                                @break
                                            @case(7)
                                                2.PhD
                                                @break
                                            @case(8)
                                                3.PhD
                                                @break
                                            @default
                                                Všetky
                                        @endswitch
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="top-padding-section-bottom" style="padding-top: 180px;">
        <div style="padding-bottom: 3%">
            <div class="block-padding-section" >
                <div style="padding-left: 3%; padding-right: 3%">
                    <h3 style="padding-top: 2%; padding-bottom: 1%">Informácie o mobilite</h3>
                    <p>{{$vyzva[0]->pokyny}}</p>
            </div>
        </div>
            <div class="block-padding-section">
                <div style="padding-left: 3%; padding-right: 3%">
                    <h3 style="padding-top: 2%; padding-bottom: 1%">Prihláška</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
    </div>
    </div>




@endsection
