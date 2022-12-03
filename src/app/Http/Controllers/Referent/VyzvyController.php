<?php

namespace App\Http\Controllers\Referent;

use App\Http\Controllers\Controller;
use App\Models\Fakulta;
use App\Models\Institucia;
use App\Models\TypVyzvy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class VyzvyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('2')) {
            $fakulty = Fakulta::query()
                ->select('fakulta.*')
                ->get();
            $typy_vyziev = TypVyzvy::query()
                ->select('typ_vyzvy.*')
                ->get();
            $institucie = Institucia::query()
                ->select('institucia.*')
                ->get();
            return view('referent.vyzvy', compact('fakulty', 'typy_vyziev', 'institucie'));
        }
        else return response('503', 503);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('2')){
            $pokyny = $request->get('pokyny_k_vyzve');

            $nazov_fotky = "vyzva-".time().'.jpg';
            $request->file('fotka_vyzvy')->move(public_path('vyzvy'), $nazov_fotky);

            $nazov_mobility = $request->get('nazov_mobility');
            $popis_mobility = $request->get('popis_mobility');
            $datum_od = $request->get('datum_od');
            $datum_do = $request->get('datum_do');
            $fakulta = $request->get('fakulta');
            $typ_vyzvy = $request->get('typ_vyzvy');
            $institucia = $request->get('institucia');
            $pokyny = $request->get('pokyny_k_vyzve');
            $rocnik = $request->get('rocnik');
            $program = $request->get('program');

            $dokumenty = array();
            if ($files = $request->file('formFileMultiple')){
                foreach ($files as $file){
                    $image_name = md5(rand(1000,10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.".".$ext;
                    $path = 'dokumenty_vyziev';
                    $file->move($path, $image_full_name);
                    $dokumenty[] = $image_full_name;
                }
            }

            $ddd = DB::table('vyzva')->insertGetId(
                [   'datum_od' => $datum_od,
                    'datum_do' => $datum_do,
                    'pokyny' => $pokyny,
                    'rocnik' => $rocnik,
                    'url' => $nazov_fotky,
                    'program' => $program,
                    'fakulta_id' => $fakulta,
                    'stav_id' => 1,
                    'typ_vyzvy_id' => $typ_vyzvy
                ]
            );

            DB::table('mobilita')->insert(
                [
                    'nazov' => $nazov_mobility,
                    'popis'=> $popis_mobility,
                    'sprava_id' => null,
                    'vyzva_id' => $ddd
                ]
            );

            foreach ($dokumenty as $dokument)
            {
                DB::insert('insert into dokument (url, vyzva_id) values (?, ?)', [$dokument, $ddd]);
            }

            DB::table('vyzva_has_institucia')->insert(
                [
                    'vyzva_id' => $ddd,
                    'institucia_id' => $institucia
                ]
            );

            $fakulty = Fakulta::query()
                ->select('fakulta.*')
                ->get();
            $typy_vyziev = TypVyzvy::query()
                ->select('typ_vyzvy.*')
                ->get();
            $institucie = Institucia::query()
                ->select('institucia.*')
                ->get();

            return view('referent.vyzvy', compact('fakulty', 'typy_vyziev', 'institucie'));


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
