<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sprava;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function index(){
        if (Auth::user()->hasRole('3')) {
            $spravy = Sprava::with('subory')
                ->select('sprava.*', 'mobilita.nazov as mnazov', 'users.name as ucastnik_mobility')
                ->join('mobilita', 'sprava.id', '=', 'mobilita.sprava_id')
                ->join('mobilita_has_users', 'mobilita.id', '=', 'mobilita_has_users.mobilita_id')
                ->join('users','users.id', '=', 'mobilita_has_users.users_id')
                ->where('zverejnena', '=', '0')
                ->get();
            return view('admin.messages', compact('spravy'));
        }
        else return response('503', 503);
    }

    public function update(Request $request, Sprava $sprava){
        if (Auth::user()->hasRole('3')) {

            $ajdi = ($request->idcko);

            DB::update('update sprava set zverejnena = 1 where id = ?', [$ajdi]);

            $spravy = Sprava::with('subory')->where('zverejnena', '=', '0')->get();
            return view('admin.messages', compact('spravy'));

        } else return response('503', 503);
    }


    public function destroy(int $sprava){
        if (Auth::user()->hasRole('3')) {

            DB::table('sprava')->where('id', $sprava)->delete();
            $spravy = Sprava::with('subory')->where('zverejnena', '=', '0')->get();

            return view('admin.messages', compact('spravy'));
        }
        else return response('503', 503);
    }

}
