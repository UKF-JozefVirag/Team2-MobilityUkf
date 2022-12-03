@extends('layouts.app')

@section('content')

    <div class="top-padding-section">
        <div class="container px-0">
            <h1 style="padding-top: 40px; text-align: center">Prečítaj si informácie o mobilitách priamo od účastníkov</h1>
        </div>
        <div class="container px-0 pb-5">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="controls-top text-center py-3">
                    <a class="btn-floating" href="#carouselExampleControls" data-slide="prev"><i class="fa fa-chevron-circle-left fa-2x" style="color:#099364"></i></a>
                    <a class="btn-floating" href="#carouselExampleControls" data-slide="next"><i class="fa fa-chevron-circle-right fa-2x" style="color:#099364"></i></a>
                </div>
                <div class="carousel-inner p-3">
                    <?php $counter = 1; ?>
                    @foreach($spravy as $sprava)
                    <div class="carousel-item <?php if($counter <= 1){echo " active"; } ?>">
                        <form method="GET" action="{{ route('messages.show', $sprava->id) }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="container-pic-msg">
                                        <img src="{{ asset('institucie/'.$sprava->fotka) }}" style="width: 100%;height: auto;object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row pb-3">
                                        <div class="col-sm-6 text-left message-country">
                                            {{ $sprava->krajina }}
                                        </div>
                                        <div class="col-sm-6 text-right message-year">
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d', $sprava->datum)->year }}
                                        </div>
                                    </div>
                                    <div class="col-sm-12 px-0 message-university">
                                        <h3>{{ $sprava->nadpis }}</h3>
                                    </div>
                                    <div class="col-sm-12 px-0 message-author pb-4">
                                        <p>Autor: {{ $sprava->ucastnik_mobility }}</p>
                                    </div>
                                    <div class="col-sm-12 px-0 message-text pb-5">
                                        <p> {{ \Illuminate\Support\Str::words($sprava->popis, 40) }} </p>
                                    </div>
                                    <div class="col-sm-12 text-left px-0">
                                        <button type="submit" class="btn btn-dark" style="border-radius: 5px; background: #3B5D6B; border-style: none; width: 150px; height: 40px; font-style: normal;font-weight: 600;font-size: 15px;line-height: 22px; position: relative; bottom:0;padding-left: 2%">Prečítať viac</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php $counter++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
