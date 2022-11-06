<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Institucia;
use Illuminate\Support\Facades\Storage;

class InstitucieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/institucie.json');
        $institucie = json_decode($json, true);

        foreach ($institucie as $institucia){
            Institucia::query()->updateOrCreate([
                'nazov' => $institucia['nazov'],
                'mesto' => $institucia['mesto'],
                'url_fotka' => $institucia['url_fotka'],
                'zmluva_od' => $institucia['zmluva_od'],
                'zmluva_do' => $institucia['zmluva_do'],
                'krajina_idkrajina' => $institucia['krajina_idkrajina'],
                'typ_institucie_id' => $institucia['typ_institucie_id']
            ]);
        }
    }
}
