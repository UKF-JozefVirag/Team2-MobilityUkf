@extends('layouts.app')

@section('content')

    <div class="top-padding-section">
    <div>
        <h1 style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 40px; line-height: 60px; padding: 40px; text-align: center">Správa o účasti na mobilite</h1>
    </div>
    <div class="container text-left" style="padding-left: 1.5%; padding-bottom: 2%">
        <div class="row">
            <!-- lava str -->   <div class="col-md-6" style="padding-left: 0%">
                <div class="container-pic-msg">
                    <img src="{{ asset('institucie/'.$vyzva[0]->fotka_institucie) }}" style="width: 100%;height: auto;object-fit: cover;">
                </div>
            </div>
            <!-- prava str -->  <div class="col-md-6" style="padding-left: 2%; position:relative;">
                <div class="container" style="padding-left: 0.2%">
                    <div class="row">
                        <div class="col-sm" style="text-align: left; padding-left: 2%; font-family: 'Poppins';font-style: normal;font-weight: 400;font-size: 20px;line-height: 30px;">
                            {{ $vyzva[0]->nazov_krajiny }}
                        </div>
                    </div>
                </div>
                <div style="padding-left: 0%">
                    <h3 style="padding-top: 3%">{{ $vyzva[0]->nazov_institucie }}</h3>
                    <p style="font-weight: 400;font-size: 17px;line-height: 26px;">Autor: {{ \Illuminate\Support\Facades\Auth::user()->name }}</p><br>
{{--                    <label for="od" class="form-label">Dátum začiatku m</label><br>--}}
{{--                    <input type="date" id="od">--}}
{{--                    <br>--}}
{{--                    <br>--}}
{{--                    <label for="do" class="form-label">Dátum konca účasti na mobilite</label><br>--}}
{{--                    <input type="date" value="" name="do" id="do">--}}
                </div>
            </div>
        </div>
    </div>
        <form method="post" action="{{ route('ucastnik.sprava.store', $idcko) }}" enctype="multipart/form-data">
            @csrf
            <div class="grey-bg-section" style="padding-bottom: 2%; padding-top: 2%">
                <div class="block-padding-section">
                    <input type="hidden" value="{{ $vyzva[0]->id }}" name="idecko" id="idecko">
                    <div class="form-group">
                        <label for="heading"><b>Nadpis:</b></label>
                        <input type="text" class="form-control" id="heading" name="heading" />
                    </div>
                    <div class="form-group">
                        <label for="comment"><b>Správa:</b></label>
                        <textarea class="form-control" rows="10" id="comment" name="comment"></textarea>
                    </div>
                    <br>
                    <label for="formFileMultiple" class="form-label"><b>Zvoľte súbory, ktoré chcete pridať ku správe</b></label>
                    <input class="form-control" type="file" id="formFileMultiple" name="formFileMultiple[]" accept=
                        "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                        text/plain, application/pdf, image/*" multiple />
                    <br>
                    <button type="submit" class="btn btn-dark">Odoslať</button>
                </div>
            </div>
        </form>

    </div>
@endsection
