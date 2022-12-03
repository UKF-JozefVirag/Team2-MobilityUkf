<?php

namespace App\Http\Controllers;

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
                'mobilita.nazov as nazov_mobility', 'mobilita.sprava_id as spravaid', 'krajina.nazov as nazov_krajiny')
            ->where("vyzva.program", "=", "Erasmus+")
            ->get();
        $fakulty = DB::table('fakulta')
            ->get();
        $typy_vyziev = DB::table('typ_vyzvy')
            ->get();
        $krajiny = DB::table('krajina')
            ->get();
        return view('erasmus.index', compact('vyzvy', 'fakulty', 'typy_vyziev', 'krajiny'));
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
                'institucia.mesto as mesto_institucie', 'institucia.url_fotka as fotka_institucie', 'krajina.nazov as nazov_krajiny')
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
}
