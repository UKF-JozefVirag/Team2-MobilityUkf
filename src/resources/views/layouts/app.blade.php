<!doctype html>
<html lang="sk">

<!-- HLAVIČKA -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <title>UKF Mobility</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<!-- MENU -->
<nav class="navbar navbar-expand-lg navbar-light" style="background: transparent !important; position: absolute;left: 0; right: 0; z-index: 3;">
    <div class="container" style="padding: 0;margin-top: 29px;">
        <div class="menu-logo">
            <img src="{{ asset('img/logo.png') }}" alt="logo FPVaI UKF" style="width: 340px;">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="menu-items collapse navbar-collapse" style="margin-left: 75px">
            <ul class="navbar-nav nav ml-auto" style="font-style: normal; font-weight: 700; font-size: 15px; line-height: 22px;">
                <li class="nav-item" style="padding-right: 20px">
                    <a href="#" class="nav-link active"><span>Domov</span></a>
                </li>
                <li class="nav-item" style="padding-right: 20px">
                    <a href="#" class="nav-link"><span>Erasmus+</span></a>
                </li>
                <li class="nav-item" style="padding-right: 20px">
                    <a href="#" class="nav-link"><span>Iné mobility</span></a>
                </li>
                <li class="nav-item" style="padding-right: 20px">
                    <a href="#" class="nav-link"><span>Správy účasníkov</span></a>
                </li>
                <li class="nav-item" style="padding-right: 20px">
                    <a href="#" class="nav-link"><span>Kontakty</span></a>
                </li>

                @guest
                    @if (Route::has('login'))
                        <li class="menu-btn">
                            <a class="nav-link btn btn-dark" href="{{ route('login') }}" style="border-radius: 5px; background: #3B5D6B; border-style: none; width: 150px; height: 40px; font-style: normal;font-weight: 700;font-size: 15px;line-height: 22px;">{{ __('Prihlásiť sa') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="menu-btn">
                            <a class="nav-link btn btn-dark" href="{{ route('register') }}" style="border-radius: 5px; background: #3B5D6B; border-style: none; width: 150px; height: 40px; font-style: normal;font-weight: 700;font-size: 15px;line-height: 22px;">{{ __('Registrovať sa') }}</a>
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
                    <div class="col" style="text-align: left; font-size: 15px; padding-left: 40px">
                        Ing. Katarína Butorová, PhD<br>
                        Mgr. Michaela Ivaničová<br>
                        Mgr. Pavol Vakoš
                    </div>
                    <div class="col" style="text-align: right; padding-bottom: 6%; padding-right: 40px">
                        kbutorova@ukf.sk<br>
                        mivanicova@ukf.sk<br>
                        pvakos@ukf.sk
                    </div>
                </div>
                <b style="color: white">Úradné hodiny pre študentov</b>
                <br>
                <br>
                <div class="row justify-content-md-center">
                    <div class="col" style="text-align: left; font-size: 15px; padding-left: 90px">
                        pondelok<br>
                        utorok<br>
                        streda
                    </div>
                    <div class="col" style="text-align: center">
                        8:30-11:00<br>
                        8:30-11:00<br>
                        8:30-11:00
                    </div>
                    <div class="col" style="text-align: right; padding-right: 80px">
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
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</body>

</html>
