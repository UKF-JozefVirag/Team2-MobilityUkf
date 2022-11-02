<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FakultySeeder::class);
        $this->call(RolySeeder::class);
        $this->call(KrajinySeeder::class);
        $this->call(StavySeeder::class);
        $this->call(VyzvySeeder::class);
        $this->call(TypyInstituciiSeeder::class);
        $this->call(InstitucieSeeder::class);
        $this->call(PouzivateliaSeeder::class);
        $this->call(DokumentySeeder::class);
        $this->call(MobilitySeeder::class);
        $this->call(SpravySeeder::class);
        $this->call(SuborySeeder::class);
        $this->call(SuborySpravSeeder::class);
        $this->call(TypyVyzievSeeder::class);
        $this->call(UcastniciMobilitSeeder::class);
        $this->call(VyzvyInstituciiSeeder::class);
    }
}
