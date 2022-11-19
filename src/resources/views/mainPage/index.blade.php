@extends('layouts.app')

@section('content')

    {{--    @if(Auth::check() && auth()->user()->role == "R1")--}}
    {{--        <h1>R1</h1>--}}
    {{--    @elseif(Auth::check() && auth()->user()->role == "R2")--}}
    {{--        <h1>R2</h1>--}}
    {{--    @elseif(Auth::check() && auth()->user()->role == "R3")--}}
    {{--        <h1>R3</h1>--}}
    {{--    @else--}}
    {{--        @endif--}}

    @if ($message = Session::get('message'))
            <?php echo '<script>alert("Neoprávnený prístup k údajom")</script>'; ?>
    @endif

    <section class="section-text-map">
        <div class="container container-images">
            <img src="{{ asset('img/bcg-green.png') }}" alt="background-image" class="bcg-image">
            <img src="{{ asset('img/map.png') }}" alt="map" class="image-map">
        </div>
        <div class="container container-text">
            <div class="row">
                <div class="col">
                    <div class="col-text-title">
                        <h1>Nikdy <br>
                            neprestávaj <br>
                            objavovať!</h1>
                    </div>
                    <div>
                        <p>Vycestuj kdekoľvek už počas štúdia a zaži vlastnú výnimočnú medzinárodnú skúsenosť</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-search">
        <div class="container">
            <div class="row justify-content-center">
                <h2>Vyhľadaj si tú najlepšiu možnosť</h2>
            </div>
            <div class="row pt-4">
                <div class="col-md-12">
                    <div class="search-wrap">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg align-items-end">
                                    <label for="inputTypMobility">Typ mobility</label>
                                    <select id="inputTypMobility" class="custom-select custom-select-md">
                                        <option selected>Stáž</option>
                                        <option>Študijný pobyt</option>
                                        <option>Prednáškový pobyt</option>
                                        <option>Školenie</option>
                                    </select>
                                </div>
                                <div class="col-lg align-items-end">
                                    <label for="inputFakulty">Fakulty</label>
                                    <select id="inputFakulty" class="custom-select custom-select-md">
                                        {{--                                        Vypíše všetky fakulty zapísané v databaze a fakulta s id==1 bude vždy selected--}}
                                        @foreach($fakulty as $fakulta)
                                            <option value="{{$fakulta->id}}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $fakulta->nazov }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg align-items-end">
                                    <label for="inputInstitucia">Inštitúcia</label>
                                    <select id="inputInstitucia" class="custom-select custom-select-md">
                                        <option selected>Erasmus+</option>
                                        <option>SAIA</option>
                                        <option>DAAD</option>
                                        <option>IVF</option>
                                        <option>Študijno-prednáškové pobyty</option>
                                    </select>
                                </div>
                                <div class="col-lg align-items-end">
                                    <label for="inputRocnik">Ročník</label>
                                    <select id="inputRocnik" class="custom-select custom-select-md">
                                        <option selected>1.Bc</option>
                                        <option>2.Bc</option>
                                        <option>3.Bc</option>
                                        <option>1.Mgr</option>
                                        <option>2.Mgr</option>
                                        <option>1.Phd</option>
                                        <option>2.Phd</option>
                                        <option>3.Phd</option>
                                    </select>
                                </div>
                                <div class="col-lg align-items-end">
                                    <label for="inputKrajina">Krajina</label>
                                    <select id="inputKrajina" class="custom-select custom-select-md">
                                        <option selected>Česká republika</option>
                                        <option>USA</option>
                                    </select>
                                </div>
                                <div class="col-lg align-self-end">
                                    <input type="submit" value="Vyhľadaj mobilitu" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-actualMobilities">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-12">
                    <h2>Aktuálne mobility</h2>
                </div>
            </div>

            <div class="row">
                @foreach($vyzvy as $vyzva)
                    <div class="col-md-6 col-lg-4">
                        <div class="mobility-card">
                            <div class="card-img">
                                <div class="vr">
                                    <span>{{ Carbon\Carbon::parse($vyzva->datum_do)->isPast() ? "Ukončený" : "Otvorený" }}</span>
                                </div>
                                <img src="{{ asset('img/img.png') }}" alt="image of mobility" class="img-fluid">
                            </div>
                            <div class="card-text">
                                <h4 class="termin">Prihlasovanie do {{ Carbon\Carbon::parse($vyzva->datum_do)->format('d.m.Y') }}</h4>
                                <span>Česká republika</span>
                                <h3>
                                    <a href="#">{{ $vyzva->nazov_mobility }}</a>
                                </h3>
                                <div class="d-flex">
                                    <div class="mr-auto float-left">
                                        <span>{{ $vyzva->nazov_vyzvy }}</span>
                                    </div>

                                    <div class="float-right">
                                        <span>{{  $vyzva->nazov_fakulty }}</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center pt-4 mb-2">
                                    <button type="button" class="btn btn-dark">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="mobility-card">
                        <div class="card-img">
                            <div class="vr">
                                <span>Voľné</span>
                            </div>
                            <img src="{{ asset('img/img_1.png') }}" alt="image of mobility" class="img-fluid">
                        </div>
                        <div class="card-text">
                            <h4 class="termin">Prihlasovanie do 30.10.2022</h4>
                            <span>USA</span>
                            <h3>
                                <a href="#">Piedmont college</a>
                            </h3>
                            <div class="d-flex">
                                <div class="mr-auto float-left">
                                    <span>študijný pobyt</span>
                                </div>
                                <div class="float-right">
                                    <span>FF</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-4 mb-2">
                                <button type="button" class="btn btn-dark">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="mobility-card">
                        <div class="card-img">
                            <div class="vr">
                                <span>Voľné</span>
                            </div>
                            <img src="{{ asset('img/img_1.png') }}" alt="image of mobility" class="img-fluid">
                        </div>
                        <div class="card-text">
                            <h4 class="termin">Prihlasovanie do 30.10.2022</h4>
                            <span>USA</span>
                            <h3>
                                <a href="#">Piedmont college</a>
                            </h3>
                            <div class="d-flex">
                                <div class="mr-auto float-left">
                                    <span>študijný pobyt</span>
                                </div>
                                <div class="float-right">
                                    <span>FF</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-4 mb-2">
                                <button type="button" class="btn btn-dark">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="mobility-card">
                        <div class="card-img">
                            <div class="vr">
                                <span>Voľné</span>
                            </div>
                            <img src="{{ asset('img/img_1.png') }}" alt="image of mobility" class="img-fluid">
                        </div>
                        <div class="card-text">
                            <h4 class="termin">Prihlasovanie do 30.10.2022</h4>
                            <span>USA</span>
                            <h3>
                                <a href="#">Piedmont college</a>
                            </h3>
                            <div class="d-flex">
                                <div class="mr-auto float-left">
                                    <span>študijný pobyt</span>
                                </div>
                                <div class="float-right">
                                    <span>FF</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-4 mb-2">
                                <button type="button" class="btn btn-dark">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
