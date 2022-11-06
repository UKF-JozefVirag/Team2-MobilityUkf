<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UcastnikMobility;
use Illuminate\Support\Facades\Storage;

class UcastniciMobilitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/ucastnicimobilit.json');
        $ucastnici = json_decode($json, true);

        foreach ($ucastnici as $ucastnik){
            UcastnikMobility::query()->updateOrCreate([
                'users_id' => $ucastnik['users_id'],
                'mobilita_id' => $ucastnik['mobilita_id']
            ]);
        }
    }
}
