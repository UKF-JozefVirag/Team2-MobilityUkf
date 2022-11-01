<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypInstitucie;
use Illuminate\Support\Facades\Storage;

class TypyInstituciiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/typy_institucii.json');
        $typyInstitucii = json_decode($json, true);

        foreach ($typyInstitucii as $typInstitucie){
            TypInstitucie::query()->updateOrCreate([
                'nazov' => $typInstitucie['nazov']
            ]);
        }
    }
}
