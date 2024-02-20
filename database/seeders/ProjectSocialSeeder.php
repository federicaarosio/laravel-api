<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Social;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = Project::all();
        $socialsIds = Social::all()->pluck('id');

        foreach ($projects as $project) {
            $project->socials()->sync($faker->randomElements( $socialsIds, rand(1,5), false ));
        }

    }
}
