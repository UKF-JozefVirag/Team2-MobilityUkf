<?php

namespace App\Http\Controllers;

use App\Models\Vyzva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ErasmusPlusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vyzvy = DB::table('vyzva')
            ->join("fakulta", "vyzva.fakulta_id", "=", "fakulta.id")
            ->join('stav', 'vyzva.stav_id', '=', 'stav.id')
            ->join('typ_vyzvy', 'vyzva.typ_vyzvy_id', '=', 'typ_vyzvy.id')
            ->join('mobilita', 'mobilita.vyzva_id', '=', 'vyzva.id')
            ->join('vyzva_has_institucia', 'vyzva.id', '=', 'vyzva_has_institucia.vyzva_id')
            ->join('institucia', 'vyzva_has_institucia.institucia_id', '=', 'institucia.id')
            ->join('krajina', 'institucia.krajina_idkrajina', '=', 'krajina.idkrajina')
            ->select('vyzva.*', 'fakulta.nazov as nazov_fakulty', 'typ_vyzvy.nazov as nazov_vyzvy', 'stav.nazov as nazov_stavu',
                'mobilita.nazov as nazov_mobility', 'mobilita.sprava_id as spravaid', 'krajina.nazov AS nazov_krajiny')
            ->where("vyzva.program", "=", "Erasmus+")
            ->get();
        $fakulty = DB::table('fakulta')
            ->get();
        $typy_vyziev = DB::table('typ_vyzvy')
            ->get();
        $krajiny = DB::table('krajina')
            ->get();
        $filter = "žiadne aktívne filtre";

        return view('erasmus.index', compact('vyzvy', 'fakulty', 'typy_vyziev', 'krajiny', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vyzva = DB::table('vyzva')
            ->join("fakulta", "vyzva.fakulta_id", "=", "fakulta.id")
            ->join('stav', 'vyzva.stav_id', '=', 'stav.id')
            ->join('typ_vyzvy', 'vyzva.typ_vyzvy_id', '=', 'typ_vyzvy.id')
            ->join('mobilita', 'mobilita.vyzva_id', '=', 'vyzva.id')
            ->join('vyzva_has_institucia', 'vyzva.id', '=', 'vyzva_has_institucia.vyzva_id')
            ->join('institucia', 'vyzva_has_institucia.institucia_id', '=', 'institucia.id')
            ->join('krajina', 'institucia.krajina_idkrajina', '=', 'krajina.idkrajina')
            ->select('vyzva.*', 'fakulta.nazov as nazov_fakulty', 'typ_vyzvy.nazov as typ_vyzvy', 'stav.nazov as nazov_stavu',
                'mobilita.nazov as nazov_mobility', 'institucia.nazov as nazov_institucie',
                'institucia.mesto as mesto_institucie', 'institucia.url_fotka as fotka_institucie', 'krajina.nazov as krajina_nazov')
            ->where("vyzva.id", "=", $id)
            ->get();
        return view('erasmus.detail', compact('vyzva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchE(Request $request) {
        $filter = "";
        $vyzvy = Vyzva::query()
            ->select('vyzva.*', 'fakulta.nazov as nazov_fakulty', 'typ_vyzvy.nazov as nazov_vyzvy', 'stav.nazov as nazov_stavu',
                'mobilita.nazov as nazov_mobility', 'mobilita.sprava_id as spravaid', 'krajina.nazov as nazov_krajiny')
            ->join("fakulta", "vyzva.fakulta_id", "=", "fakulta.id")
            ->join('stav', 'vyzva.stav_id', '=', 'stav.id')
            ->join('typ_vyzvy', 'vyzva.typ_vyzvy_id', '=', 'typ_vyzvy.id')
            ->join('mobilita', 'mobilita.vyzva_id', '=', 'vyzva.id')
            ->join('vyzva_has_institucia', 'vyzva.id', '=', 'vyzva_has_institucia.vyzva_id')
            ->join('institucia', 'vyzva_has_institucia.institucia_id', '=', 'institucia.id')
            ->join('krajina', 'institucia.krajina_idkrajina', '=', 'krajina.idkrajina')
            ->where("vyzva.program", "=", "Erasmus+");

        if(!is_null($request->get('krajina_nazov'))) {
            $filter = $filter."Názov krajiny: ".$request->get('krajina_nazov')." | ";
            $vyzvy = $vyzvy->where('krajina.nazov', 'LIKE', '%'.$request->get('krajina_nazov').'%');
        }

        if(!is_null($request->get('typ_vyzvy_nazov'))) {
            $filter = $filter."  Typ mobility: ".$request->get('typ_vyzvy_nazov')." | ";
            $vyzvy = $vyzvy->where('typ_vyzvy.nazov', 'LIKE', '%'.$request->get('typ_vyzvy_nazov').'%');
        }

        if(!is_null($request->get('fakulta_nazov'))) {
            $filter = $filter."  Fakulta: ".$request->get('fakulta_nazov')." | ";
            $vyzvy = $vyzvy->where('fakulta.nazov', 'LIKE', '%'.$request->get('fakulta_nazov').'%');
        }

        if(!is_null($request->get('rocnik'))) {
            $filter = $filter."  Ročník: ".$request->get('rocnik')." | ";
            $vyzvy = $vyzvy->where('rocnik', 'LIKE', '%'.$request->get('rocnik').'%');
        }

        $vyzvy = $vyzvy->get();

        $fakulty = DB::table('fakulta')
            ->get();
        $typy_vyziev = DB::table('typ_vyzvy')
            ->get();
        $krajiny = DB::table('krajina')
            ->get();

        if(empty($filter)) {
            $filter = "žiadne aktívne filtre";
        }

        return view('erasmus.index', compact('vyzvy', 'fakulty', 'typy_vyziev', 'krajiny', 'filter'));
    }
}
