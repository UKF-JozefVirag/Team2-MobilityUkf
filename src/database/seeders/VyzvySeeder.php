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
        $json = Storage::disk('local')->get('/json/typy_vyziev.json');
        $vyzvy = json_decode($json, true);

        foreach ($vyzvy as $vyzva){
            Vyzva::query()->updateOrCreate([
                'typ' => $vyzva['typ']
            ]);
        }
    }
}
