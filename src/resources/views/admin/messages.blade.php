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
                @csrf
                @method('PUT')
                <h1>{{ $sprava->nadpis }}</h1>
                {{ $sprava->popis }}
                {{ $sprava->zverejnena }}
                <br>
                @foreach($sprava->subory as $subor)
                    <a href="{{ \Illuminate\Support\Facades\URL::asset('subory/'.$subor->url) }}"> {{ $subor->url }} </a>
                    <br>
                @endforeach
                <select id="zverejnene" class="zverejnene">
                    <option value="0" {{ ($sprava->zverejnena == '0') ? 'selected="selected' : ''}}>Nezverejnená</option>
                    <option value="1" {{ ($sprava->zverejnena == '1') ? 'selected="selected' : ''}}>Zverejnená</option>
                </select>
                <button type="submit">Upraviť</button>
            </form>
        </div>

    @endforeach

@endsection
