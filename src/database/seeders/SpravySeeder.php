<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sprava;
use Illuminate\Support\Facades\Storage;

class SpravySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/spravy.json');
        $spravy = json_decode($json, true);

        foreach ($spravy as $sprava){
            Sprava::query()->updateOrCreate([
                'nadpis' => $sprava['nadpis'],
                'popis' => $sprava['popis']
            ]);
        }
    }
}
