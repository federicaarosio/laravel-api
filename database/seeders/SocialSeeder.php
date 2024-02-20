<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $socialsNames = [
            'Facebook',
            'Pinterest',
            'Instagram',
            'Youtube',
            'Linkedin',
        ];

        foreach ($socialsNames as $socialName) {
            $newSocial = new Social();
            $newSocial -> name = $socialName;
            $newSocial -> home = $faker->url();
            $newSocial -> logo = $faker->imageUrl();
            $newSocial -> save();
        }
    }
}
