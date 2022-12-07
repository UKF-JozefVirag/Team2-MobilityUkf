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
                        <form action="{{ route('search') }}" method="GET" role="search">
                            <div class="row">
                                <div class="col-lg align-items-end">
                                    <label for="inputTypMobility">Typ mobility</label>
                                    <select id="inputTypMobility" name="typ_vyzvy_nazov" class="custom-select custom-select-md">
                                        <option value="">-</option>
                                        @foreach($typy_vyziev as $typ_vyzvy)
                                            <option value="{{ $typ_vyzvy->nazov }}">{{ $typ_vyzvy->nazov }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg align-items-end">
                                    <label for="inputFakulty">Fakulty</label>
                                    <select id="inputFakulty" name="fakulta_nazov" class="custom-select custom-select-md">
                                        <option value="">-</option>
                                        {{--                                        Vypíše všetky fakulty zapísané v databaze a fakulta s id==1 bude vždy selected--}}
                                        @foreach($fakulty as $fakulta)
                                            <option value="{{$fakulta->nazov}}">{{ $fakulta->nazov }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg align-items-end">
                                    <label for="inputProgram">Program</label>
                                    <select id="inputProgram" name="program" class="custom-select custom-select-md">
                                        <option value="">-</option>
                                        <option value="Erasmus+">Erasmus+</option>
                                        <option value="SAIA">SAIA</option>
                                        <option value="DAAD">DAAD</option>
                                        <option value="IVF">IVF</option>
                                        <option value="Študijno-prednáškové pobyty">Študijno-prednáškové pobyty</option>
                                    </select>
                                </div>
                                <div class="col-lg align-items-end">
                                    <label for="inputRocnik">Ročník</label>
                                    <select id="inputRocnik" name="rocnik" class="custom-select custom-select-md">
                                        <option value="">-</option>
                                        <option value="1">1.Bc</option>
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
                                    <select id="inputKrajina" name="krajina_nazov" class="custom-select custom-select-md">
                                        <option value="">-</option>
                                        @foreach($krajiny as $krajina)
                                            <option value="{{$krajina->nazov}}">{{ $krajina->nazov }}</option>
                                        @endforeach
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
            <div class="row">
                <div class="col-md-12">
                    <p>Zapnuté filtrovanie: {{ $filter }}</p>
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
                @if($vyzvy->isNotEmpty())
                @foreach($vyzvy as $vyzva)
                    @csrf
                    @method('PUT')

                        <div class="col-md-6 col-lg-4">
                            <div class="mobility-card">
                                <div class="card-img">
                                    <div class="vr">
                                        <span>{{ $vyzva->nazov_stavu }}</span>
                                    </div>
                                    @if(file_exists(public_path('institucie/'.$vyzva->url)))
                                        <img src="{{ asset('institucie/'.$vyzva->url) }}" alt="image of mobility" class="img-fluid">
                                    @else
                                        <img src="{{ asset('vyzvy/'.$vyzva->url) }}" alt="image of mobility" class="img-fluid">
                                    @endif
                                </div>
                                <div class="card-text">
                                    <h4 class="termin">Prihlasovanie do {{ Carbon\Carbon::parse($vyzva->datum_do)->format('d.m.Y') }}</h4>
                                    <span>{{ $vyzva->krajina_nazov }}</span>
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
                                        <a href="{{route('vyzvy.show', $vyzva->id)}}" class="btn btn-dark btn-detail">Detail</a>
                                        @if(\Illuminate\Support\Facades\Auth::user())
                                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('1') && !isset($vyzva->spravaid))
                                                <a href=" {{route('ucastnik.sprava.edit', $vyzva->id)}}" class="btn btn-dark btn-sprava" style="margin-left: 15px" >Napísať správu</a>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                @else
                    <div class="col-md-12 text-center pb-4">
                        <p>Bohužiaľ, nenašli sa žiadne výsledky vyhľadávania :(</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
