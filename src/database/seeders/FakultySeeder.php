<?php

namespace Database\Seeders;

use App\Models\Fakulta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FakultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/fakulty.json');
        $fakulty = json_decode($json, true);

        foreach ($fakulty as $fakulta){
            Fakulta::query()->updateOrCreate([
               'nazov' => $fakulta['nazov']
            ]);
        }
    }
}
