<!doctype html>
<html lang="sk">

<!-- HLAVIČKA -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <title>UKF Mobility</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<!-- MENU -->
<nav class="navbar navbar-expand-lg navbar-light menu-navbar" style="position: absolute;left: 0; right: 0; z-index: 3;">
    <div class="container" style="padding: 0;margin-top: 29px;">
        <div class="navbar-brand menu-logo">
            <img src="{{ asset('img/logo.png') }}" alt="logo FPVaI UKF">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse menu-items" id="navbarSupportedContent" style="margin-left: 40px">
            <ul class="navbar-nav mr-auto" style="font-style: normal; font-weight: 700; font-size: 15px; line-height: 22px;">
                <li class="nav-item active pr-1">
                    <a href="/" class="nav-link"><span>Domov</span></a>
                </li>
                <li class="nav-item pr-1">
                    <a href="/erasmus" class="nav-link"><span>Erasmus+</span></a>
                </li>
                <li class="nav-item pr-1">
                    <a href="/anotherMobilities" class="nav-link"><span>Iné mobility</span></a>
                </li>
                <li class="nav-item pr-1">
                    <a href="/messages" class="nav-link"><span>Správy účasníkov</span></a>
                </li>
                <li class="nav-item pr-1">
                    <a href="#" class="nav-link"><span>Kontakty</span></a>
                </li>

                @guest
                    @if (Route::has('login'))
                        <li class="menu-btn">
                            <a class="nav-link" href="{{ route('login') }}" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;  background: transparent; border-color: #3B5D6B;border-top-style: solid;border-bottom-style: solid;border-left-style: solid;height: 40px; font-style: normal;font-weight: 700;font-size: 15px;line-height: 22px;">{{ __('Prihlásiť sa') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="menu-btn">
                            <a class="nav-link" href="{{ route('register') }}" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;  background: #3B5D6B; border-style: none;height: 40px; font-style: normal;font-weight: 700;font-size: 15px;line-height: 22px;">{{ __('Registrovať sa') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Odhlásiť sa') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest


            </ul>
        </div>
{{--        --}}
{{--        <div class="menu-btn">--}}
{{--            <button type="button" class="btn btn-dark" style="border-radius: 5px; background: #3B5D6B; border-style: none; width: 150px; height: 40px; font-style: normal;font-weight: 700;font-size: 15px;line-height: 22px;">Prihlásiť sa</button>--}}
{{--        </div>--}}

        <!-- Authentication Links -->




    </div>
</nav>

@yield('content')

<!-- FOOTER = KONTAKTY -->
<footer class="bg-footer">
    <h2 class="h2-footer" style="padding-top: 2%; color: white">Kontakty</h2>
    <div style="padding-left: 4%; padding-right: 4%">
        <div class="row">
            <div class="col text-center" style="color:white">
                <b style="color: white">Oddelenie medzinárodných vzťahov
                    a jeho pracovníci</b>
                <br>
                <br>
                <div class="row">
                    <div class="col" style="text-align: left; font-size: 15px; padding: 0">
                        <p>Ing. Katarína Butorová, PhD<br>
                        Mgr. Michaela Ivaničová<br>
                            Mgr. Pavol Vakoš </p>
                    </div>
                    <div class="col" style="text-align: right; padding: 0">
                        <p>kbutorova@ukf.sk<br>
                        mivanicova@ukf.sk<br>
                        pvakos@ukf.sk</p>
                    </div>
                </div>
                <b style="color: white">Úradné hodiny pre študentov</b>
                <br>
                <br>
                <div class="row justify-content-md-center">
                    <div class="col" style="text-align: right; font-size: 15px;">
                        pondelok<br>
                        utorok<br>
                        streda
                    </div>
                    <div class="col" style="text-align: left">
                        8:30-11:00<br>
                        8:30-11:00<br>
                        8:30-11:00
                    </div>
                    <div class="col" style="text-align: center;">
                        Tr. A. Hlinku 1<br>
                        949 74 Nitra
                    </div>
                </div>
            </div>
            <div class="col" style="text-align: left; color:white; padding-left: 4%; padding-top: 2%">
                <b style="color: white">Katedroví koordinátori mobilít</b>
                <br>
                <p style="padding-top: 2%">Katedra botaniky a genetiky, Katedra zoológie a antropológie
                    Katedra ekológie a environmentalistiky<br>
                    Katedra fyziky<br>
                    Katedra geografie a regionálneho rozvoja<br>
                    Katedra chémie<br>
                    Katedra informatiky<br>
                    Katedra matematiky<br>
                    Ústav ekonomiky a manažmentu</p>
                <b style="color: white">Koordinátor na Fakulte prírodných vied a  informatiky</b>
            </div>
            <div class="col" style="">
                <div class="row" style="padding-top: 8%">
                    <div class="col text-center" style="color:white;">
                        <div class="row">
                            <div class="col" style="text-align: left; font-size: 15px;padding-top: 5%">
                                <p>PaedDr. Anna Sandanusová, PhD.<br>
                                    doc. Ing. Viera Petlušová, PhD.<br>
                                    doc. RNDr. Anton Trník, PhD.<br>
                                    doc. RNDr. Alfred Krogmann, PhD.<br>
                                    Ing. Lenka Kucková, PhD.<br>
                                    PaedDr. Viera Michaličková, PhD.<br>
                                    doc. PaedDr. Janka Medová, PhD.<br>
                                    Ing. Michal Levický, PhD.<br></p>
                                <p style="padding-top: 10px">doc. Mgr. Martin Drlík, PhD.
                                    prodekan pre vonkajšie vzťahy a rozvoj</p>
                            </div>
                            <div class="col" style="text-align: right; padding-bottom: 4%;padding-top: 5%;padding-right: 35px">
                                <p>asandanusova@ukf.sk<br>
                                    vpetlusova@ukf.sk<br>
                                    atrnik@ukf.sk<br>
                                    akrogmann@ukf.sk<br>
                                    lkuckova@ukf.sk<br>
                                    vmichalickova@ukf.sk<br>
                                    jmedova@ukf.sk<br>
                                    mlevicky@ukf.sk<br></p>
                                <p style="padding-top: 2%; padding-right: 25px">mdrlik@ukf.sk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
