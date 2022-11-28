<?php

namespace App\Http\Controllers;

use App\Models\Sprava;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function index(){
        $spravy = Sprava::with('subory')
            ->select('sprava.*', 'mobilita.nazov as mnazov', 'users.name as ucastnik_mobility', 'institucia.url_fotka as fotka', 'vyzva.datum_od as datum_od','vyzva.datum_do as datum', 'krajina.nazov as krajina', 'institucia.nazov as nazov_institucie')
            ->join('mobilita', 'sprava.id', '=', 'mobilita.sprava_id')
            ->join('mobilita_has_users', 'mobilita.id', '=', 'mobilita_has_users.mobilita_id')
            ->join('users','users.id', '=', 'mobilita_has_users.users_id')
            ->join('vyzva', 'vyzva.id', '=', 'mobilita.vyzva_id')
            ->join('vyzva_has_institucia', 'vyzva.id', '=', 'vyzva_has_institucia.vyzva_id')
            ->join('institucia', 'institucia.id', '=', 'vyzva_has_institucia.institucia_id')
            ->join('krajina', 'institucia.krajina_idkrajina', '=', 'krajina.idkrajina')
            ->where('zverejnena', '=', '1')
            ->get();
        return view('messages.index', compact('spravy'));
    }

    public function show($id){
        $sprava = Sprava::with('subory')
            ->select('sprava.*', 'mobilita.nazov as mnazov', 'users.name as ucastnik_mobility', 'institucia.url_fotka as fotka', 'institucia.zmluva_od as datum_od','institucia.zmluva_do as datum', 'krajina.nazov as krajina', 'institucia.nazov as nazov_institucie', 'typ_vyzvy.nazov as typvyzva')
            ->join('mobilita', 'sprava.id', '=', 'mobilita.sprava_id')
            ->join('mobilita_has_users', 'mobilita.id', '=', 'mobilita_has_users.mobilita_id')
            ->join('users','users.id', '=', 'mobilita_has_users.users_id')
            ->join('vyzva', 'vyzva.id', '=', 'mobilita.vyzva_id')
            ->join('typ_vyzvy', 'vyzva.typ_vyzvy_id', '=', 'typ_vyzvy.id')
            ->join('vyzva_has_institucia', 'vyzva.id', '=', 'vyzva_has_institucia.vyzva_id')
            ->join('institucia', 'institucia.id', '=', 'vyzva_has_institucia.institucia_id')
            ->join('krajina', 'institucia.krajina_idkrajina', '=', 'krajina.idkrajina')
            ->where('sprava.id', '=', $id)
            ->get();
        return view('messages.detail', compact('sprava'));
    }



}
