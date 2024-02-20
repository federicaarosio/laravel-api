<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'html',
            'css',
            'vue',
            'js',
            'php',
            'laravel 10',
        ];      

        foreach ($names as $techName) {
            $newTechnology = new Technology();
            $newTechnology->name = $techName;
            $newTechnology->save();
        };
    }
}
