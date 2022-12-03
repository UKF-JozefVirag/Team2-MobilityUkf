@extends('layouts.app')

@section('content')
    <div class="top-padding-section">
        <div class="grey-bg-section">
            <div class="block-padding-section">
                <h3 style="padding-top: 2%; padding-bottom: 1%">O ORGANIZACIÍ ERASMUS+.</h3>
                <p>
                    Európsky program Erasmus má dlhoročnú tradíciu. Od akademického roka 2014/2015 existuje ako integrovaný program Erasmus+
                    pre obdobie rokov 2014 – 2021, ktorý poskytuje široké možnosti mobilít študentov a zamestnancov.<br><br>

                    Erasmus+ podporuje 3 kľúčové aktivity: <br>

                    &nbsp;-&nbsp;&nbsp;KA1 = mobility jednotlivcov<br>
                    &nbsp;-&nbsp;&nbsp;KA2 = strategické partnerstvá<br>
                    &nbsp;-&nbsp;&nbsp;KA3 = reforma politík vrátane programu Jean Monnet a program Šport<br>

                    V rámci kľúčovej aktivity KA1 (Mobility jednotlivcov) Univerzita Konštantína Filozofa v Nitre realizuje mobility štúdium a stáž pre
                    študentov a výučba a školenie pre zamestnancov. Študenti a zamestnanci majú možnosť uchádzať sa o Erasmus+ mobilitu v niektorej z krajín EÚ a EHP,
                    v prípade schválenia samostatného Erasmus+ projektu UKF aj o mobilitu v rámci krajiny mimo EÚ a EHP priestoru.<br><br>

                    Mobility sa realizujú na základe Erasmus+ bilaterálnych dohôd podpísaných s partnerskými
                    vysokoškolskými inštitúciami v zahraničí. Za vypracovanie návrhu Erasmus dohody, výber študentov a zamestnancov na
                    mobilitu a uznanie výsledkov ich mobility zodpovedá katedrový a fakultný koordinátor príslušnej fakulty UKF. Pre účasť na mobilite si
                    stačí vybrať prijímajúcu zahraničnú inštitúciu, založiť prihlášku cez aplikáciu StudyAbroad (týka sa len mobilít KA103), všetky požadované
                    dokumenty odoslať online cez aplikáciu StudyAbroad, vytlačiť ich, odovzdať katedrovému koordinátorovi a zúčastniť sa výberového konania na katedre.
                    Termín na prihlasovanie na Erasmus+ mobility je zvyčajne na jar (hlavný termín) pre mobility plánované na nasledujúci akademický rok,
                    no počas roka sa zvyčajne vyhlasujú výzvy na dodatočné prihlasovanie.</p>
                <br>
                <div class="container text-left">
                    <div class="row">
                        <div class="col" style="padding-left: 0%">
                            <b>Pre viac informácii:</b><br>
                            <ul>
                                <li>www.ukf.sk/granty/erasmus</li>
                                <li>www.studyabroad.sk</li>
                            </ul>
                        </div>
                        <div class="col" style="padding-left: 2%">
                            <b>Kontakt:</b>
                            <div style="padding-left: 4%">
                                Oddelenie pre medzinárodné vzťahy<br>
                                Tr. A. Hlinku 1<br>
                                949 74 Nitra<br>
                                <br>
                                Ing. Katarína Butorová, PhD.<br>
                                Mgr. Michaela Ivaničová<br>
                                Mgr. Pavol Vakoš<br>
                            </div>
                        </div>
                        <div class="col">
                            <b> Úradné hodiny pre študentov:</b>
                            <div style="padding-left: 4%">
                                pondelok - streda: 8:30 - 11:00<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-search" style="padding-top: 100px;">
            <div class="container">
                <div class="row justify-content-center">
                    <h2>Mobility v krajinách EU</h2>
                </div>
                <div class="row pt-4">
                    <div class="col-md-12">
                        <div class="search-wrap">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg align-items-end">
                                        <label for="inputTypMobility">Typ mobility</label>
                                        <select id="inputTypMobility" class="custom-select custom-select-md">
                                            @foreach($typy_vyziev as $typ_vyzvy)
                                                <option value="{{ $typ_vyzvy->id }}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $typ_vyzvy->nazov }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg align-items-end">
                                        <label for="inputFakulty">Fakulty</label>
                                        <select id="inputFakulty" class="custom-select custom-select-md">
                                            @foreach($fakulty as $fakulta)
                                                <option value="{{$fakulta->id}}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $fakulta->nazov }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg align-items-end">
                                        <label for="inputRocnik">Ročník</label>
                                        <select id="inputRocnik" class="custom-select custom-select-md">
                                            <option selected value="1">1.Bc</option>
                                            <option value="2">2.Bc</option>
                                            <option value="3">3.Bc</option>
                                            <option value="4">1.Mgr</option>
                                            <option value="5">2.Mgr</option>
                                            <option value="6">1.Phd</option>
                                            <option value="7">2.Phd</option>
                                            <option value="8">3.Phd</option>
                                        </select>
                                    </div>
                                    <div class="col-lg align-items-end">
                                        <label for="inputKrajina">Krajina</label>
                                        <select id="inputKrajina" class="custom-select custom-select-md">
                                            @foreach($krajiny as $krajina)
                                                <option value="{{$krajina->idkrajina}}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $krajina->nazov }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg align-self-end">
                                        <input type="submit" value="Filtrovať" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-erasmus-text">

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
                                <span>{{ $vyzva->nazov_krajiny }}</span>
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
                                    <a href="{{route('erasmus.show', $vyzva->id)}}" class="btn btn-dark">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection
