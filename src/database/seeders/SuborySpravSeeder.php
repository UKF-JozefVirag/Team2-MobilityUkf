<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SuborSprav;
use Illuminate\Support\Facades\Storage;

class SuborySpravSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/suborysprav.json');
        $suborysprav = json_decode($json, true);

        foreach ($suborysprav as $suborspravy){
            SuborSprav::query()->updateOrCreate([
                'sprava_idsprava' => $suborspravy['sprava_idsprava'],
                'subor_idsubor' => $suborspravy['subor_idsubor']
            ]);
        }
    }
}
