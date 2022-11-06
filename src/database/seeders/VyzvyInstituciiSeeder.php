<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VyzvaInstitucie;
use Illuminate\Support\Facades\Storage;

class VyzvyInstituciiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/vyzvyinstitucii.json');
        $vyzvyinstitucii= json_decode($json, true);

        foreach ($vyzvyinstitucii as $vyzvainstitucie){
            VyzvaInstitucie::query()->updateOrCreate([
                'institucia_id' => $vyzvainstitucie['institucia_id'],
                'vyzva_id' => $vyzvainstitucie['vyzva_id'],
            ]);
        }
    }
}
