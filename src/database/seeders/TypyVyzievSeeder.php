<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypVyzvy;
use Illuminate\Support\Facades\Storage;

class TypyVyzievSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/typy_vyziev.json');
        $typyvyziev = json_decode($json, true);

        foreach ($typyvyziev as $typvyzvy){
            TypVyzvy::query()->updateOrCreate([
                'typ' => $typvyzvy['typ']
            ]);
        }
    }
}
