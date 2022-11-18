@extends('layouts/app')
@section('content')
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
        <br>
        <br>
        <h1>{{ $sprava->nadpis }}</h1>
        {{ $sprava->popis }}
        {{ $sprava->zverejnena }}
        <br>
        @foreach($sprava->subory as $subor)
            <a href="{{ \Illuminate\Support\Facades\URL::asset('subory/'.$subor->url) }}"> {{ $subor->url }} </a>
            <br>
        @endforeach
        <input type="radio">
        <br>
        <br>
        <br>
    @endforeach

@endsection
