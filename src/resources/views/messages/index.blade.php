@extends('layouts.app')

@section('content')

    <body>
    <div class="top-padding-section">
        <div>
            <h1 style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 40px; line-height: 60px; padding: 40px; text-align: center">Prečítaj si informácie o mobilitách priamo od účastníkov</h1>
        </div>
        <div class="container text-left" style="padding-left: 1.5%">
            <div class="row">
                <div class="col-7" style="padding-left: 0%">
                    <div class="container-pic-msg">
                         <img src="{{ asset('img/img.png')}}" style="width: 100%;height: auto;object-fit: cover;">
                    </div>
                </div>
            <div class="col" style="padding-left: 2%; position:relative;">
                    <div class="container" style="padding-left: 0.2%">
                        <div class="row">
                            <div class="col-sm" style="text-align: left; padding-left: 2%; font-family: 'Poppins';font-style: normal;font-weight: 400;font-size: 20px;line-height: 30px;">
                                Česká republika
                            </div>
                            <div class="col-sm" style="text-align: right; font-family: 'Poppins';font-style: normal;font-weight: 400;font-size: 15px;line-height: 22px;">
                                Rok mobility: 2020
                            </div>
                        </div>
                    </div>
                    <div style="padding-left: 0%">
                        <h3 style="padding-top: 3%">masarykova univerzita</h3>
                        <p style="font-weight: 400;font-size: 17px;line-height: 26px;">Autor: Jožko Mrkvička</p><br>
                        <p style="font-style: normal; font-weight: 400; font-size: 15px; line-height: 22px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                            sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                        <br>
                    </div>
                    <button type="button" class="btn btn-dark" style="border-radius: 5px; background: #3B5D6B; border-style: none; width: 150px; height: 40px; font-style: normal;font-weight: 600;font-size: 15px;line-height: 22px; position: relative; bottom:0;padding-left: 2%">Prečítať viac</button>
                </div>
            </div>
        </div>
        <div class="container text-left" style="padding-top: 6%; padding-bottom: 10%; padding-left: 1.5%">
            <div class="row">
                <div class="col" style="position: relative">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('img/img.png')}}" style="width: 100%;height: auto;object-fit: cover;">
                        </div>
                        <p class="col" style="font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 17px;line-height: 26px;text-transform: uppercase; text-align: center; padding-top: 6%">masarykova univerzita</p>
                    </div>
                </div>

                <div class="col" style="position: relative">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('img/img.png')}}" style="width: 100%;height: auto;object-fit: cover;">
                        </div>
                        <p class="col" style="font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 17px;line-height: 26px;text-transform: uppercase; text-align: center; padding-top: 6%">masarykova univerzita</p>
                    </div>
                </div>

                <div class="col" style="position: relative">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('img/img.png')}}" style="width: 100%;height: auto;object-fit: cover;">
                        </div>
                        <p class="col" style="font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 17px;line-height: 26px;text-transform: uppercase; text-align: center; padding-top: 6%">masarykova univerzita</p>
                    </div>
                </div>

                <div class="col" style="position: relative">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('img/img.png')}}" style="width: 100%;height: auto;object-fit: cover;">
                        </div>
                        <p class="col" style="font-family: 'Poppins';font-style: normal;font-weight: 600;font-size: 17px;line-height: 26px;text-transform: uppercase; text-align: center; padding-top: 6%">masarykova univerzita</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </body>

@endsection
