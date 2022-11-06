<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Krajina;
use Illuminate\Support\Facades\Storage;

class KrajinySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/krajiny.json');
        $krajiny = json_decode($json, true);

        foreach ($krajiny as $krajina){
            Krajina::query()->updateOrCreate([
                'nazov' => $krajina['nazov']
            ]);
        }
    }
}
