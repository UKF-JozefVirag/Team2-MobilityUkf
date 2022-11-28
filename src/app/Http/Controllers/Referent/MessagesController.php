<?php

namespace App\Http\Controllers\Referent;

use App\Http\Controllers\Controller;
use App\Models\Sprava;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if (Auth::user()->hasRole('2')) {
            $spravy = Sprava::with('subory')
                ->select('sprava.*', 'mobilita.nazov as mnazov', 'users.name as ucastnik_mobility')
                ->join('mobilita', 'sprava.id', '=', 'mobilita.sprava_id')
                ->join('mobilita_has_users', 'mobilita.id', '=', 'mobilita_has_users.mobilita_id')
                ->join('users','users.id', '=', 'mobilita_has_users.users_id')
                ->where('zverejnena', '=', '0')
                ->get();
            return view('referent.messages', compact('spravy'));
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
    public function update(Request $request, Sprava $sprava){
        if (Auth::user()->hasRole('2')) {

            $ajdi = ($request->idcko);

            DB::update('update sprava set zverejnena = 1 where id = ?', [$ajdi]);

            $spravy = Sprava::with('subory')->where('zverejnena', '=', '0')->get();
            return view('admin.messages', compact('spravy'));

        } else return response('503', 503);
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
