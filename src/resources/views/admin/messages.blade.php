@extends('layouts/app')
@section('content')
    <script>
        // window.onload = function() { document.forms['MarkerForm'].reset(); };
    </script>

    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br>
    @foreach($spravy as $sprava)
        <div style="border: 1px solid black; margin: 100px">
            <form action="{{ route('admin.messages.update', $sprava->id) }}" method="POST" name="forma" >
                @method('PUT')
                @csrf

                Nadpis mobility = {{ $sprava->mnazov }}
                <input type="hidden" value="{{ $sprava->id }}" name="idcko" id="idcko" class="idcko">
                <h1>ucastnik_mobility =  {{ $sprava->ucastnik_mobility }}</h1> <br>
                <h1>nadpis spravy =  {{ $sprava->nadpis }}</h1> <br>
                <h5>popis spravy = {{ $sprava->popis }}</h5>
                <br>
                @foreach($sprava->subory as $subor)
                    <a href="{{ \Illuminate\Support\Facades\URL::asset('subory/'.$subor->url) }}"> {{ $subor->url }} </a>
                    <br>
                @endforeach
                <button type="submit">zverejnit</button>
            </form>
{{--            <form method="POST" action="{{ route('admin.messages.destroy', $sprava->id) }}">--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                <button type="submit">vymazat</button>--}}
{{--            </form>--}}
        </div>

    @endforeach

@endsection
