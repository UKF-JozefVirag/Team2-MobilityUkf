<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institucia;
use App\Models\User;
use App\Models\Krajina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(){
        // ak ma user rolu 3 tak redirect inak 403
        if (Auth::user()->hasRole('3')) {
            $users = DB::table('users')->get();
            $institutions = Institucia::with('krajina')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();

            return view('admin.dashboard', compact('users','institutions', 'countries', 'types'));
        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    public function edit(User $user){
        dd($user);
    }

    public function show(User $user) {}

    public function destroy(int $user)
    {
        if (Auth::user()->hasRole('3')) {

            DB::table('users')->where('id', $user)->delete();
            $users = DB::table('users')->get();
            $institutions = DB::table('institucia')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            return view('admin.dashboard', compact('users', 'institutions', 'countries', 'types'));
//            $user->delete();
        }
        else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }
}
