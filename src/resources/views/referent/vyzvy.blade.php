@extends('layouts.app')

@section('content')
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <form method="post" action="{{ route('referent.vyzvy.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="pokyny_k_vyzve">Pokyny k vyzve: </label>
            <br>
            <textarea name="pokyny_k_vyzve" id="pokyny_k_vyzve"></textarea>
            <br>
            <label for="fotka_vyzvy">Fotka vyzvy: </label>
            <input type="file" name="fotka_vyzvy" id="fotka_vyzvy" />
            <br>
            <label for="nazov_mobility">Nazov mobility: </label>
            <input type="text" name="nazov_mobility" id="nazov_mobility" />
            <br>
            <label for="popis_mobility">Popis mobility: </label>
            <input type="text" name="popis_mobility" id="popis_mobility" />
            <br>
            <label for="datum_od">Datum od: </label>
            <input type="date" name="datum_od" id="datum_od" />
            <br>
            <label for="datum_do">Datum do: </label>
            <input type="date" name="datum_do" id="datum_do" />
            <br>
            <label for="fakulta">Fakulta: </label>
            <select id="fakulta" name="fakulta">
                @foreach($fakulty as $fakulta)
                    <option value="{{$fakulta->id}}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $fakulta->nazov }}</option>
                @endforeach
            </select>
            <br>
            <label for="rocnik">Ročník: </label>
            <select id="rocnik" name="rocnik">
                <option value="1" selected>1.Bc</option>
                <option value="2">2.Bc</option>
                <option value="3">3.Bc</option>
                <option value="4">1.Mgr</option>
                <option value="5">2.Mgr</option>
                <option value="6">1.PhD</option>
                <option value="7">2.PhD</option>
                <option value="8">3.PhD</option>
            </select>
            <br>
            <label for="program">Program: </label>
            <select id="program" name="program">
                <option value="Erasmus+" selected>Erasmus+</option>
                <option value="Študijno-prednáškové pobyty">Študijno-prednáškové pobyty</option>
                <option value="DAAD">DAAD</option>
                <option value="IVF">IVF</option>
                <option value="SAIA">SAIA</option>
            </select>
            <br>
            <label for="typ_vyzvy">Typ vyzvy: </label>
            <select id="typ_vyzvy" name="typ_vyzvy">
                @foreach($typy_vyziev as $typ_vyzvy)
                    <option value="{{$typ_vyzvy->id}}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $typ_vyzvy->nazov }}</option>
                @endforeach
            </select>
            <br>
            <label for="institucia">Inštitúcia: </label>
            <select id="institucia" name="institucia">
                @foreach($institucie as $institucia)
                    <option value="{{$institucia->id}}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $institucia->nazov }}</option>
                @endforeach
            </select>
            <br>
            <label for="formFileMultiple">Dokumenty: </label>
            <input class="form-control" type="file" id="formFileMultiple" name="formFileMultiple[]" accept=
                "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                text/plain, application/pdf, image/*" multiple />
            <br>
            <button type="submit">Vytvoriť</button>
        </form>
    </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@endsection
