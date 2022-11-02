<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subor;
use Illuminate\Support\Facades\Storage;

class SuborySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/subory.json');
        $subory = json_decode($json, true);

        foreach ($subory as $subor){
            Institucia::query()->updateOrCreate([
                'url' => $subor['url']
            ]);
        }
    }
}
