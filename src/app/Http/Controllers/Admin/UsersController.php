<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institucia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index() {

    }

    public function edit(User $user) {
        if (Auth::user()->hasRole('3')) {
            $institutions = Institucia::with('krajina')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();

            return view('admin.users_create_edit', compact('user', 'institutions', 'countries', 'types'));
        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    public function store(Request $request) {
        if (Auth::user()->hasRole('3')) {
            User::create($request->all());

            $institutions = Institucia::with('krajina')->get();
            $users = DB::table('users')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            return view('admin.dashboard', compact('institutions', 'users', 'countries', 'types'));
        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    public function create() {
        //
    }

    public function show(User $user) {
        //
    }

    public function update(Request $request, User $user) {
        if (Auth::user()->hasRole('3')) {
            $user->update($request->all());

            $institutions = Institucia::with('krajina')->get();
            $users = DB::table('users')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            return view('admin.dashboard', compact('institutions', 'users', 'countries', 'types'));
        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    public function destroy(int $user) {
        if (Auth::user()->hasRole('3')) {
            DB::table('users')->where('id', $user)->delete();
            $institutions = Institucia::with('krajina')->get();
            $users = DB::table('users')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            return view('admin.dashboard', compact('users', 'institutions', 'countries', 'types'));
        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }



}
