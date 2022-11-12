<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        // ak ma user rolu 3 tak redirect inak 403
        if (Auth::user()->hasRole('3')) {
            $users = DB::table('users')
                ->get();

            return view('admin.dashboard', compact('users'));
        }

        else return response('503', 503);
    }

    public function edit(User $user){
        dd($user);
    }

    public function show(User $user)
    {
        //
    }

    public function destroy(int $user)
    {
        if (Auth::user()->hasRole('3')) {

            DB::table('users')->where('id', $user)->delete();
            $users = DB::table('users')
                ->get();
            return view('admin.dashboard', compact('users'));
//            $user->delete();
        }
        else return response('503', 503);
    }

}
