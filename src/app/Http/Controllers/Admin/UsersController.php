<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institucia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index() {}

    public function edit(User $user) {
        if (Auth::user()->hasRole('3')) {
            $institutions = DB::table('institucia')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();

            return view('admin.users_create_edit', compact('user', 'institutions', 'countries', 'types'));
        } else return response('503', 503);
    }

    public function store(Request $request) {
        if (Auth::user()->hasRole('3')) {
            User::create($request->all());

            $institutions = DB::table('institucia')->get();
            $users = DB::table('users')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            return view('admin.dashboard', compact('institutions', 'users', 'countries', 'types'));
        } else return response('503', 503);
    }

    public function create() {
        if (Auth::user()->hasRole('3')) {
            $user = new User();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            $institutions = DB::table('institucia')->get();

            return view('admin.users_create_edit', compact('user', 'countries', 'types', 'institutions'));
        } else return response('503', 503);
    }

    public function show(User $user) {}

    public function update(Request $request, User $user) {
        if (Auth::user()->hasRole('3')) {
            $user->update($request->all());

            $institutions = DB::table('institucia')->get();
            $users = DB::table('users')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            return view('admin.dashboard', compact('institutions', 'users', 'countries', 'types'));
        } else return response('503', 503);
    }

    public function destroy(int $user) {
        if (Auth::user()->hasRole('3')) {
            DB::table('users')->where('id', $user)->delete();

            $institutions = DB::table('institucia')->get();
            $users = DB::table('users')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            return view('admin.dashboard', compact('users', 'institutions', 'countries', 'types'));
        } else return response('503', 503);
    }

}
