<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pouzivatel;
use Illuminate\Support\Facades\Storage;

class PouzivateliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/pouzivatelia.json');
        $pouzivatelia = json_decode($json, true);

        foreach ($pouzivatelia as $pouzivatel){
            Pouzivatel::query()->updateOrCreate([
                'meno' => $pouzivatel['meno'],
                'priezvisko' => $pouzivatel['priezvisko'],
                'login' => $pouzivatel['login'],
                'heslo' => $pouzivatel['heslo'],
                'rola_idrola' => $pouzivatel['rola_idrola']
            ]);
        }
    }
}
