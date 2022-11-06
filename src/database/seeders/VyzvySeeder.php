<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vyzva;
use Illuminate\Support\Facades\Storage;

class VyzvySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/vyzvy.json');
        $vyzvy = json_decode($json, true);

        foreach ($vyzvy as $vyzva){
            Vyzva::query()->updateOrCreate([
                'datum_od' => $vyzva['datum_od'],
                'datum_do' => $vyzva['datum_do'],
                'pokyny' => $vyzva['pokyny'],
                'url' => $vyzva['url'],
                'fakulta_id' => $vyzva['fakulta_id'],
                'stav_id' => $vyzva['stav_id'],
                'typ_vyzvy_id' => $vyzva['typ_vyzvy_id']
            ]);
        }
    }
}
