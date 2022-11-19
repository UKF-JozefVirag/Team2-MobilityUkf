<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institucia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class InstitutionsController extends Controller
{
    public function index(){}

    public function edit(Institucia $institution){
        //dd($institution);
        if (Auth::user()->hasRole('3')) {
            $users = DB::table('users')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();

            return view('admin.institutions_create_edit', compact('institution', 'users', 'countries', 'types'));
        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    public function create() {
        if (Auth::user()->hasRole('3')) {
            $institution = new Institucia();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            $users = DB::table('users')->get();

            return view('admin.institutions_create_edit', compact('institution', 'countries', 'types', 'users'));
        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    public function store(Request $request) {
        if (Auth::user()->hasRole('3')) {
            $nazov = $request->get('nazov');
            $mesto = $request->get('mesto');
            $nazov_fotky = "institution-".time().'.jpg';
            $url_fotka = $nazov_fotky;
            $request->file('url_fotka')->move(public_path('institucie'), $nazov_fotky);
            $zmluva_od = $request->get('zmluva_od');
            $zmluva_do = $request->get('zmluva_do');
            $typ_institucie_id = $request->get('typ_institucie_id');
            $krajina_idkrajina = $request->get('krajina_idkrajina');


            DB::insert('insert into institucia (nazov, mesto, url_fotka, zmluva_od, zmluva_do, typ_institucie_id, krajina_idkrajina) values (?, ?, ?, ?, ?, ?, ?)', [$nazov, $mesto, $url_fotka, $zmluva_od, $zmluva_do, $typ_institucie_id, $krajina_idkrajina]);


            $institutions = Institucia::with('krajina')->get();
            $users = DB::table('users')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            return view('admin.dashboard', compact('institutions', 'users', 'countries', 'types'));
        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    public function show(Institucia $institution) {

    }

    public function update(Request $request, Institucia $institution) {
        if (Auth::user()->hasRole('3')) {
            $idcko = $institution->id;
            $nazov = $request->get('nazov');
            $mesto = $request->get('mesto');
            if(empty($request->file('url_fotka')))
                $url_fotka = $institution->url_fotka;
            else
            {
                $nazov_fotky = "institution-".time().'.jpg';
                $url_fotka = $nazov_fotky;
                $request->file('url_fotka')->move(public_path('institucie'), $nazov_fotky);
            }
            $zmluva_od = $request->get('zmluva_od');
            $zmluva_do = $request->get('zmluva_do');
            $typ_institucie_id = $request->get('typ_institucie_id');
            $krajina_idkrajina = $request->get('krajina_idkrajina');
            DB::update('update institucia set nazov = ?, mesto = ?, url_fotka = ?, zmluva_od = ?, zmluva_do = ?, typ_institucie_id = ?, krajina_idkrajina = ? where id = ?', [$nazov, $mesto, $url_fotka, $zmluva_od, $zmluva_do, $typ_institucie_id, $krajina_idkrajina, $idcko]);

            $institutions = Institucia::with('krajina')->get();
            $users = DB::table('users')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            return view('admin.dashboard', compact('institutions', 'users', 'countries', 'types'));
        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }

    public function destroy(int $institution)
    {
        if (Auth::user()->hasRole('3')) {
            DB::table('institucia')->where('id', $institution)->delete();

            $institutions = Institucia::with('krajina')->get();
            $users = DB::table('users')->get();
            $countries = DB::table('krajina')->get();
            $types = DB::table('typ_institucie')->get();
            return view('admin.dashboard', compact('users', 'institutions', 'countries', 'types'));

        } else return Redirect::to('')->with('message', 'Neoprávnený prístup k údajom');
    }
}
