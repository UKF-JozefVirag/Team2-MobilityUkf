@extends('layouts.app')

@section('content')

    <body>
    <div class="top-padding-section">
        <div style="background-color: #099364; height: 600px;">
            <div class="block-padding-section" style="padding: 0">
                <h3 style="padding-top: 7%; text-align: center; color: white; padding-bottom: 1%">{{ $sprava[0]->ucastnik_mobility }}</h3>
                <h1 style="text-align: center; color: white;">{{ $sprava[0]->nadpis }}</h1>
                <br>
                <p style="color: white; text-align: center; padding-bottom: 5%">KI • Aplikovaná informatika • {{ Carbon\Carbon::parse($sprava[0]->datum_od)->format('d.m.Y') }} - {{ Carbon\Carbon::parse($sprava[0]->datum_do)->format('d.m.Y') }} </p>
            </div>
        </div>
        <div class="container" style="padding-bottom: 5%; position: relative; margin-top: -300px">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="{{ asset('institucie/'.$sprava[0]->fotka) }}" alt="image of mobility" style="border: 1px solid black; width: 50%">
                </div>
            </div>
        </div>
        <div class="grey-bg-section" style="padding-bottom: 2%; padding-top: 2%">
            <div class="block-padding-section">
                <p>{{ $sprava[0]->popis }}</p>
            </div>
        </div>

        <div class="block-padding-section pt-3 pb-5">
            <div class="row">
                <div class="col-md-12">
                    <h3>Súbory na stiahnutie:</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @foreach($sprava[0]->subory as $subor)
                        <a style="color: #099364;" href="{{ \Illuminate\Support\Facades\URL::asset('subory/'.$subor->url) }}"> {{ $subor->url }} </a>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
