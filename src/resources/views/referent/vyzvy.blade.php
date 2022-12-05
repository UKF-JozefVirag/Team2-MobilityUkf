@extends('layouts.app')

@section('content')
    <div class="top-padding-section">
        <div style="background-color: #099364; padding-top: 2%; padding-bottom: 2%; margin-top: 2%">
            <h1 style="color: white !important; text-align: center">Formulár referenta na pridanie výzvy</h1>
        </div>
    </div>
<div style="background: #F4F4F4; padding-bottom: 1%; padding-top: 1%">
    <div style="border: 3px solid; border-color: #099364; margin: 100px; padding: 2%; background-color: white">
        <form method="post" action="{{ route('referent.vyzvy.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="pokyny_k_vyzve"><b>Pokyny k vyzve:</b> </label>
            <br>
            <textarea class="form-control" rows="6" id="comment" name="comment"></textarea>
            <br>
            <br>
            <label for="fotka_vyzvy"><b>Fotka vyzvy:</b></label>
            <input type="file" name="fotka_vyzvy" id="fotka_vyzvy" />
            <br>
            <br>
            <label for="nazov_mobility"><b>Nazov mobility:</b> </label>
            <input type="text" name="nazov_mobility" id="nazov_mobility" />
            <br>
            <br>
            <label for="popis_mobility"><b>Popis mobility:</b> </label>
            <input type="text" name="popis_mobility" id="popis_mobility" />
            <br>
            <br>
            <label for="datum_od"><b>Datum od:</b> </label>
            <input type="date" name="datum_od" id="datum_od" />
            <br>
            <br>
            <label for="datum_do"><b>Datum do:</b></label>
            <input type="date" name="datum_do" id="datum_do" />
            <br>
            <br>
            <label for="fakulta"><b>Fakulta:</b> </label>
            <select id="fakulta" name="fakulta">
                @foreach($fakulty as $fakulta)
                    <option value="{{$fakulta->id}}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $fakulta->nazov }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <label for="rocnik"><b>Ročník:</b> </label>
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
            <br>
            <label for="program"><b>Program:</b> </label>
            <select id="program" name="program">
                <option value="Erasmus+" selected>Erasmus+</option>
                <option value="Študijno-prednáškové pobyty">Študijno-prednáškové pobyty</option>
                <option value="DAAD">DAAD</option>
                <option value="IVF">IVF</option>
                <option value="SAIA">SAIA</option>
            </select>
            <br>
            <br>
            <label for="typ_vyzvy"><b>Typ vyzvy:</b> </label>
            <select id="typ_vyzvy" name="typ_vyzvy">
                @foreach($typy_vyziev as $typ_vyzvy)
                    <option value="{{$typ_vyzvy->id}}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $typ_vyzvy->nazov }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <label for="institucia"><b>Inštitúcia:</b> </label>
            <select id="institucia" name="institucia">
                @foreach($institucie as $institucia)
                    <option value="{{$institucia->id}}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $institucia->nazov }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <label for="formFileMultiple"><b>Dokumenty:</b> </label>
            <input class="form-control" type="file" id="formFileMultiple" name="formFileMultiple[]" accept=
                "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                text/plain, application/pdf, image/*" multiple />
            <br>
            <button type="submit" class="btn btn-primary " style="background-color: #099364; width: 120px; border: none;font-weight: 700; font-size: 15px; margin-top: 2%;">
                Vytvoriť
            </button>
        </form>
    </div>
</div>
@endsection
