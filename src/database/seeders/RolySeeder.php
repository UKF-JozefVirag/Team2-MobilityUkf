<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rola;
use Illuminate\Support\Facades\Storage;


class RolySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/roly.json');
        $roly = json_decode($json, true);

        foreach ($roly as $rola){
            Rola::query()->updateOrCreate([
                'nazov' => $rola['nazov']
            ]);
        }
    }
}
