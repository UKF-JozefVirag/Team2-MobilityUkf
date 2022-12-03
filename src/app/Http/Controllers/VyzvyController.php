<?php

namespace App\Http\Controllers;

use App\Models\Vyzva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


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
            ->join('vyzva_has_institucia', 'vyzva.id', '=', 'vyzva_has_institucia.vyzva_id')
            ->join('institucia', 'vyzva_has_institucia.institucia_id', '=',  'institucia.id')
            ->join('krajina', 'institucia.krajina_idkrajina', '=', 'krajina.idkrajina')
            ->select('vyzva.*', 'fakulta.nazov as nazov_fakulty', 'typ_vyzvy.nazov as nazov_vyzvy', 'stav.nazov as nazov_stavu', 'mobilita.nazov as nazov_mobility', 'mobilita.sprava_id as spravaid', 'krajina.nazov as nazov_krajiny')
            ->where('stav_id', '=', '1')
            ->get();
        $fakulty = DB::table('fakulta')
            ->get();
        $typy_vyziev = DB::table('typ_vyzvy')
            ->get();
        $krajiny = DB::table('krajina')
            ->get();
        $stavy = DB::table('stav')
            ->get();

        return view('mainPage.index', compact('vyzvy', 'fakulty', 'typy_vyziev', 'krajiny', 'stavy'));
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
        if (Auth::user()->hasRole('1') || Auth::user()->hasRole('2')) {
            dd($request);
        }
        else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vyzva = Vyzva::with('dokument')
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
        return view('mainPage.detail', compact('vyzva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vyzva = Vyzva::query()
            ->select('institucia.nazov as nazov_institucie', 'institucia.url_fotka as fotka_institucie', 'krajina.nazov as nazov_krajiny', 'users.name as meno_ucastnika')
            ->join('vyzva_has_institucia', 'vyzva.id', '=', 'vyzva_has_institucia.vyzva_id')
            ->join('institucia', 'institucia.id', '=', 'vyzva_has_institucia.institucia_id')
            ->join('krajina', 'krajina.idkrajina', '=', 'institucia.krajina_idkrajina')
            ->join('mobilita', 'vyzva.id', '=', 'mobilita.vyzva_id')
            ->join('mobilita_has_users', 'mobilita_has_users.mobilita_id', '=', 'mobilita.id')
            ->join('users', 'users.id', '=', 'mobilita_has_users.users_id')
            ->where('vyzva.id', '=', $id)
            ->get();
        return view('ucastnik.sprava', compact('vyzva'));
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

    public function search(Request $request) {
        $vyzvy = Vyzva::query()
            ->join("fakulta", "vyzva.fakulta_id", "=", "fakulta.id")
            ->join('stav', 'vyzva.stav_id', '=', 'stav.id')
            ->join('typ_vyzvy', 'vyzva.typ_vyzvy_id', '=', 'typ_vyzvy.id')
            ->join('mobilita', 'mobilita.vyzva_id', '=', 'vyzva.id')
            ->join('vyzva_has_institucia', 'vyzva.id', '=', 'vyzva_has_institucia.vyzva_id')
            ->join('institucia', 'vyzva_has_institucia.institucia_id', '=', 'institucia.id')
            ->join('krajina', 'institucia.krajina_idkrajina', '=', 'krajina.idkrajina')
            ->select('vyzva.*', 'fakulta.nazov as nazov_fakulty', 'typ_vyzvy.nazov as nazov_vyzvy', 'stav.nazov as nazov_stavu', 'mobilita.nazov as nazov_mobility', 'mobilita.sprava_id as spravaid', 'krajina.nazov as nazov_krajiny')
            ->where('stav_id', '=', '1');

        if(!is_null($request->get('typ_vyzvy_id'))) {
            $vyzvy = $vyzvy->where('typ_vyzvy_id', '=', $request->get('typ_vyzvy_id'));
        }

        if(!is_null($request->get('fakulta_id'))) {
            $vyzvy = $vyzvy->where('fakulta_id', '=', $request->get('fakulta_id'));
        }

        if(!is_null($request->get('program'))) {
            $vyzvy = $vyzvy->where('program', '=', $request->get('program'));
        }

        if(!is_null($request->get('rocnik'))) {
            $vyzvy = $vyzvy->where('rocnik', '=', $request->get('rocnik'));
        }

        if(!is_null($request->get('krajina.nazov'))) {
            $vyzvy = $vyzvy->where('krajina.nazov', '=', $request->get('krajina.nazov'));
        }

        $vyzvy = $vyzvy->get();

        $fakulty = DB::table('fakulta')
            ->get();
        $typy_vyziev = DB::table('typ_vyzvy')
            ->get();
        $krajiny = DB::table('krajina')
            ->get();
        $stavy = DB::table('stav')
            ->get();

        return view('mainPage.index', compact('vyzvy', 'fakulty', 'typy_vyziev', 'krajiny', 'stavy'));
    }
}
