@extends('layouts/app')
@section('content')
    <script>
        // window.onload = function() { document.forms['MarkerForm'].reset(); };
    </script>

    <div class="top-padding-section">
        <div style="background-color: #099364; padding-top: 2%; padding-bottom: 2%; margin-top: 2%">
            <h1 style="color: white !important; text-align: center"> Správy o účasti na mobilite pridané používateľmi</h1>
        </div>
    </div>
    @foreach($spravy as $sprava)
        <div style="background: #F4F4F4; padding-bottom: 1%; padding-top: 1%">
            <div style="border: 3px solid; border-color: #099364; margin: 100px; padding: 2%; background-color: white">
                <form action="{{ route('referent.spravy.update', $sprava->id) }}" method="POST" name="forma" >
                    @method('PUT')
                    @csrf

                    <h4 style="font-weight: bold">Nadpis mobility : {{ $sprava->mnazov }}</h4><br>
                    <input type="hidden" value="{{ $sprava->id }}" name="idcko" id="idcko" class="idcko">
                    <h4 style="font-weight: bold">Účastník mobility :  {{ $sprava->ucastnik_mobility }}</h4> <br>
                    <h4 style="font-weight: bold">Nadpis správy :  {{ $sprava->nadpis }}</h4> <br>
                    <h4 style="font-weight: bold">Popis správy : </h4><br>
                    <p>{{ $sprava->popis }}</p>
                    <br>
                    <h4 style="font-weight: bold">Pripojené súbory :</h4><br>
                    @foreach($sprava->subory as $subor)
                        <a href="{{ \Illuminate\Support\Facades\URL::asset('subory/'.$subor->url) }}"> {{ $subor->url }} </a>
                        <br>
                    @endforeach
                    <button type="submit" class="btn btn-primary " style="background-color: #099364; width: 120px; border: none;font-weight: 700; font-size: 15px; margin-top: 2%">
                        Zverejniť
                    </button>
                </form>
                {{--            <form method="POST" action="{{ route('admin.messages.destroy', $sprava->id) }}">--}}
                {{--                @csrf--}}
                {{--                @method('DELETE')--}}
                {{--                <button type="submit">vymazat</button>--}}
                {{--            </form>--}}
            </div>
        </div>
    @endforeach

@endsection
