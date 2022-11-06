<!doctype html>
<html lang="sk">

<!-- HLAVIČKA -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <title>UKF Mobility</title>
</head>
<body>

<!-- MENU -->
<nav class="navbar navbar-expand-lg navbar-light" style="background: transparent !important; position: absolute;left: 0; right: 0; z-index: 3;">
    <div class="container" style="padding: 0; width: 1277px; margin-top: 29px;">
        <div class="menu-logo">
            <img src="{{ asset('img/logo.png') }}" alt="logo FPVaI UKF" style="width: 340px;">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="menu-items collapse navbar-collapse" style="margin-left: 75px">
            <ul class="navbar-nav nav ml-auto" style="font-style: normal; font-weight: 700; font-size: 15px; line-height: 22px;">
                <li class="nav-item" style="padding-right: 30px">
                    <a href="#" class="nav-link active"><span>Domov</span></a>
                </li>
                <li class="nav-item" style="padding-right: 30px">
                    <a href="#" class="nav-link"><span>Erasmus+</span></a>
                </li>
                <li class="nav-item" style="padding-right: 30px">
                    <a href="#" class="nav-link"><span>Iné mobility</span></a>
                </li>
                <li class="nav-item" style="padding-right: 30px">
                    <a href="#" class="nav-link"><span>Správy účasníkov</span></a>
                </li>
                <li class="nav-item" style="padding-right: 30px">
                    <a href="#" class="nav-link"><span>Kontakty</span></a>
                </li>
            </ul>
        </div>
        <div class="menu-btn">
            <button type="button" class="btn btn-dark" style="border-radius: 5px; background: #3B5D6B; border-style: none; width: 150px; height: 40px; font-style: normal;font-weight: 700;font-size: 15px;line-height: 22px;">Prihlásiť sa</button>
        </div>
    </div>
</nav>

@yield('content')

<!-- FOOTER = KONTAKTY -->
<footer>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</body>

</html>