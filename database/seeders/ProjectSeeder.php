<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = [
            'project' => [
                    'title' => 'Progetto 1',
                    'author' => 'Federica Arosio',
                    'cover_image' => 'https://picsum.photos/id/104/640/480',
                    'description' => 'Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto',
                    'creation_date' => '2023-10-12'
                ],
                [
                    'title' => 'Progetto 2',
                    'author' => 'Federica Arosio',
                    'cover_image' => 'https://picsum.photos/id/102/640/480',
                    'description' => 'Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto',
                    'creation_date' => '2023-11-06'
                ],
                [
                    'title' => 'Progetto 3',
                    'author' => 'Federica Arosio',
                    'cover_image' => 'https://picsum.photos/id/101/640/480',
                    'description' => 'Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto',
                    'creation_date' => '2023-12-12'
                ],
                [
                    'title' => 'Progetto 4',
                    'author' => 'Federica Arosio',
                    'cover_image' => 'https://picsum.photos/id/106/640/480',
                    'description' => 'Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto Breve descrizione del progetto',
                    'creation_date' => '2022-01-12'
                ],
        ];

        //prendo tutti gli id di tutti i tipi e li salvo in $typesIds
        $typesIds = Type::all()->pluck('id');

        for ($i=0; $i < 50; $i++) { 
            $newProject = new Project();
            $newProject->title = $faker->unique()->realTextBetween(9, 25);
            $newProject->type_id = $typesIds[ $faker->numberBetween(0, count($typesIds) - 1 )];
            $newProject->author = $faker->name() . $faker->lastname();
            $newProject->description = $faker->paragraph(3, true);
            $newProject->cover_image = 'https://picsum.photos/id/'. $faker->numberBetween(1,300).'/640/480';
            $newProject->creation_date= $faker->date();
            $newProject->save();
        };
    
        // foreach ($projects as $singleProject) {
        //     $newProject = new Project();
        //     $newProject->title = $singleProject['title'];
        //     $newProject->type_id = $typesIds[rand(0, count($typesIds) - 1 )];
        //     $newProject->author = $singleProject['author'];
        //     $newProject->description = $singleProject['description'];
        //     $newProject->cover_image = $singleProject['cover_image'];
        //     $newProject->creation_date= $singleProject['creation_date'];
        //     $newProject->save();
        // };
    }
}
