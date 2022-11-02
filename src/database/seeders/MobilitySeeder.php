<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mobilita;
use Illuminate\Support\Facades\Storage;

class MobilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/mobility.json');
        $mobility = json_decode($json, true);

        foreach ($mobility as $mobilita){
            Mobilita::query()->updateOrCreate([
                'nazov' => $mobilita['nazov'],
                'popis' => $mobilita['popis'],
                'sprava_idsprava' => $mobilita['sprava_idsprava'],
                'vyzva_idvyzva' => $mobilita['vyzva_idvyzva']
            ]);
        }
    }
}
