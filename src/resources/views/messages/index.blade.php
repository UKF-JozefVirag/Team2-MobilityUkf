@extends('layouts.app')

@section('content')

    <div class="top-padding-section">
        <div>
            <h1 style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 40px; line-height: 60px; padding: 40px; text-align: center">Prečítaj si informácie o mobilitách priamo od účastníkov</h1>
        </div>
        @foreach($spravy as $sprava)
            <form method="get" action="{{ route('messages.show', $sprava->id) }}">
                <h1> {{ $sprava->id }}</h1>
                <h1> {{ $sprava->nadpis }}</h1>
                <div class="container text-left" style="padding-left: 1.5%">
                    <div class="row">
                        <div class="col-7" style="padding-left: 0%">
                            <div class="container-pic-msg">
                                 <img src="{{ asset('institucie/'.$sprava->fotka) }}" style="width: 100%;height: auto;object-fit: cover;">
                            </div>
                        </div>
                    <div class="col" style="padding-left: 2%; position:relative;">
                            <div class="container" style="padding-left: 0.2%">
                                <div class="row">
                                    <div class="col-sm" style="text-align: left; padding-left: 2%; font-family: 'Poppins';font-style: normal;font-weight: 400;font-size: 20px;line-height: 30px;">
                                        {{ $sprava->krajina }}
                                    </div>
                                    <div class="col-sm" style="text-align: right; font-family: 'Poppins';font-style: normal;font-weight: 400;font-size: 15px;line-height: 22px;">
                                        {{ \Illuminate\Support\Str::limit($sprava->datum, 4) }}
                                    </div>
                                </div>
                            </div>
                            <div style="padding-left: 0%">
                                <h3 style="padding-top: 3%">{{ $sprava->nazov_institucie }}</h3>
                                <p style="font-weight: 400;font-size: 17px;line-height: 26px; overflow: hidden; width: 10ch;">Autor: {{ $sprava->ucastnik_mobility }}</p><br>
                                <p style="font-style: normal; font-weight: 400; font-size: 15px; line-height: 22px; text-align: justify;"> {{ \Illuminate\Support\Str::words($sprava->popis, 40) }} </p>
                                <br>
                            </div>
                            <button type="submit" class="btn btn-dark" style="border-radius: 5px; background: #3B5D6B; border-style: none; width: 150px; height: 40px; font-style: normal;font-weight: 600;font-size: 15px;line-height: 22px; position: relative; bottom:0;padding-left: 2%">Prečítať viac</button>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
        <br>
{{--        <div class="container text-left" style="padding-top: 6%; padding-bottom: 10%; padding-left: 1.5%">--}}
{{--            <div class="row">--}}
{{--                <div class="col" style="position: relative">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <img src="{{ asset('img/img.png')}}" style="width: 100%;height: auto;object-fit: cover;">--}}
{{--                        </div>--}}
{{--                        <p class="col" style="font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 17px;line-height: 26px;text-transform: uppercase; text-align: center; padding-top: 6%">masarykova univerzita</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col" style="position: relative">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <img src="{{ asset('img/img.png')}}" style="width: 100%;height: auto;object-fit: cover;">--}}
{{--                        </div>--}}
{{--                        <p class="col" style="font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 17px;line-height: 26px;text-transform: uppercase; text-align: center; padding-top: 6%">masarykova univerzita</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col" style="position: relative">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <img src="{{ asset('img/img.png')}}" style="width: 100%;height: auto;object-fit: cover;">--}}
{{--                        </div>--}}
{{--                        <p class="col" style="font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 17px;line-height: 26px;text-transform: uppercase; text-align: center; padding-top: 6%">masarykova univerzita</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col" style="position: relative">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <img src="{{ asset('img/img.png')}}" style="width: 100%;height: auto;object-fit: cover;">--}}
{{--                        </div>--}}
{{--                        <p class="col" style="font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 17px;line-height: 26px;text-transform: uppercase; text-align: center; padding-top: 6%">masarykova univerzita</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
    </div>

@endsection
