<?php

namespace App\Http\Controllers\Ucastnik;

use App\Http\Controllers\Controller;
use App\Models\Sprava;
use App\Models\Vyzva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MessagesController extends Controller
{

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

    public function edit($id)
    {
        if (Auth::user()->hasRole('1') || Auth::user()->hasRole('2') || Auth::user()->hasRole('3')){

            $vyzva = DB::table('vyzva')
                ->select('vyzva.*', 'institucia.url_fotka as fotka_institucie', 'krajina.nazov as nazov_krajiny', 'institucia.nazov as nazov_institucie')
                ->join('vyzva_has_institucia', 'vyzva.id', '=', 'vyzva_has_institucia.vyzva_id')
                ->join('institucia', 'institucia.id', '=', 'vyzva_has_institucia.institucia_id')
                ->join('krajina', 'institucia.krajina_idkrajina', '=', 'krajina.idkrajina')
                ->where('vyzva.id', '=', $id)
                ->get();
            $idcko = $id;
            return view('ucastnik.sprava', compact('vyzva', 'idcko'));

        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    public function create(){

    }

    public function store(Request $request, Vyzva $vyzvicka) {
        if (Auth::user()->hasRole('1') || Auth::user()->hasRole('2') || Auth::user()->hasRole('3')) {

            $ajdi = ($request->idecko);

            $heading = $request->get('heading');
            $comment = $request->get('comment');

            $image = array();
            if ($files = $request->file('formFileMultiple')){
                foreach ($files as $file){
                    $image_name = md5(rand(1000,10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.".".$ext;
                    $path = 'subory_sprav';
                    $file->move($path, $image_full_name);
                    $image[] = $image_full_name;
                }
            }

//            DB::insert('insert into sprava (nadpis, popis) values (?, ?)', [$heading, $comment]);
            $idSprava = DB::table('sprava')->insertGetId(
              ['nadpis' => $heading,
              'popis' => $comment]
            );

            foreach ($image as $fotka)
            {
                $ddd = DB::table('subor')->insertGetId(
                    [ 'url' => $fotka]
                );

                DB::insert('insert into sprava_subor (sprava_id, subor_id) values (?, ?)', [$idSprava, $ddd]);

            }

            DB::update('update mobilita set sprava_id = ? where id = ?', [$idSprava, $ajdi]);

//            $sprava = Sprava::create($request->all());
//            $sprava->subory()->sync($request->input('formFileMultiple', []))

            return Redirect::to('');

        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    public function save(Request $request){

    }

}
