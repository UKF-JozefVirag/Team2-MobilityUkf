<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institucia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InstitutionsController extends Controller
{
    public function index(){
        // ak ma user rolu 3 tak redirect inak 403
        if (Auth::user()->hasRole('3')) {
            $institutions = DB::table('institucia')
                ->get();

            return view('admin.institutions', compact('institutions'));
        }

        else return response('503', 503);
    }



    public function edit(Institucia $institution){
        dd($institution);
    }

    public function show(Institucia $institution)
    {
        //
    }

    public function destroy(int $institution)
    {
        if (Auth::user()->hasRole('3')) {

            DB::table('institucia')->where('id', $institution)->delete();
            $institutions = DB::table('institucia')
                ->get();
            return view('admin.institutions', compact('institutions'));

        }
        else return response('503', 503);
    }
}
