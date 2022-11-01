<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stav;
use Illuminate\Support\Facades\Storage;

class StavySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/stavy.json');
        $stavy = json_decode($json, true);

        foreach ($stavy as $stav){
            Stav::query()->updateOrCreate([
                'nazov' => $stav['nazov']
            ]);
        }
    }
}
