<?php

namespace App\Http\Controllers;

use App\Models\Vyzva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VyzvyController extends Controller
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
            ->select('vyzva.*', 'fakulta.nazov as nazov_fakulty', 'typ_vyzvy.nazov as nazov_vyzvy', 'stav.nazov as nazov_stavu', 'mobilita.nazov as nazov_mobility')
            ->get();
        $fakulty = DB::table('fakulta')
            ->get();
        return view('mainPage.index', compact('vyzvy', 'fakulty'));
    }

    public function __construct()
    {
        //$this->middleware('auth');
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
        //
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
