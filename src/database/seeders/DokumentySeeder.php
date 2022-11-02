<?php

namespace Database\Seeders;

use App\Models\Dokument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Institucia;
use Illuminate\Support\Facades\Storage;

class DokumentySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/dokumenty.json');
        $dokumenty= json_decode($json, true);

        foreach ($dokumenty as $dokument){
            Dokument::query()->updateOrCreate([
                'iddokument' => $dokument['iddokument'],
                'url' => $dokument['url'],
                'vyzva_idvyzva' => $dokument['vyzva_idvyzva']
            ]);
        }
    }
}
