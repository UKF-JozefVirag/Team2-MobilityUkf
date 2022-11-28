@extends('layouts.app')
@section('content')
    <div class="top-padding-section">
        <div class="green-bg-section">
            <div class="block-padding-section">
                <div>
                    <h1 style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 40px; line-height: 60px; padding-left: 80px; padding-bottom: 50px; padding-top: 80px; text-align: left"> {{ $vyzva[0]->nazov_institucie }} </h1>
                </div>
                <div class="container text-left" style="padding-left: 1.5%">
                    <div class="row">
                        <div class="col-7" style="padding-left: 0%">
                            <div class="container-pic-msg">
                                <img src="{{ asset('institucie/'.$vyzva[0]->fotka_institucie)}}" style="width: 100%;height: auto; object-fit: cover;">
{{--                                pridat fotku vyzvy --}}
                            </div>
                        </div>
                        <div class="col" style="padding-left: 2%; position:relative;">
                            <div class="container" style="padding-left: 0.2%">
                                <div class="row">
                                    <div class="col" style="text-align: left; padding-left: 2%; font-family: 'Poppins';font-style: normal;font-weight: 400;font-size: 20px;line-height: 30px;">
                                    <b> Krajina:</b>  {{ $vyzva[0]->nazov_krajiny }}
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col" style="text-align: left; padding-left: 2%;  padding-top: 60px; font-family: 'Poppins';font-style: normal;font-weight: 400;font-size: 20px;line-height: 30px;">
                                    <b> Typ mobility:</b> {{$vyzva[0]->typ_vyzvy}}
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="text-align: left; padding-left: 2%;  padding-top: 60px; font-family: 'Poppins';font-style: normal;font-weight: 400;font-size: 20px;line-height: 30px;">
                                        <b> Program:</b> {{$vyzva[0]->program}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="text-align: left; padding-left: 2%;  padding-top: 180px; font-family: 'Poppins';font-style: normal;font-weight: 400;font-size: 20px;line-height: 30px;">
                                        <b>Ročník štúdia: </b>
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

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-top: 3%">
        <div style="padding-bottom: 3%">
            <div class="block-padding-section" >
                <div style="padding-left: 3%; padding-right: 3%">
                    <h3 style="padding-top: 2%; padding-bottom: 1%">Informácie o mobilite</h3>
                    <p>
                        {{$vyzva[0]->pokyny}}
                    </p>
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
