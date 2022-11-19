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
            $spravy = Sprava::with('subory')->get();

            return view('admin.messages', compact('spravy'));
        }
        else return response('503', 503);
    }

    public function update(Request $request, Sprava $sprava){
        if (Auth::user()->hasRole('3')) {
            return "xd";
        } else return response('503', 503);
    }

    public function destroy(){

    }
}
