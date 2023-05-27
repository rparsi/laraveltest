<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MovieActorRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            'Deadpool',
            'Logan',
            'Deadpool 2',
            'Pulp Fiction',
            'Free Guy',
            'The Matrix'
        ];
        $actors = [
            [
                'first_name' => 'Robert',
                'last_name' => 'Downey Jr',
            ],
            [
                'first_name' => 'Keanu',
                'last_name' => 'Reaves',
            ],
            [
                'first_name' => 'Lawrence',
                'last_name' => 'Fishburn',
            ],
            [
                'first_name' => 'Hugh',
                'last_name' => 'Jackman',
            ],
            [
                'first_name' => 'Ryan',
                'last_name' => 'Renalds',
            ]
        ];
        $moviesPerActor = 3;
        $movieEntities = [];

        foreach ($movies as $movie) {
            $movieEntities[] = \App\Models\Movie::factory()->create([
                'name' => $movie,
            ]);
        }

        foreach ($actors as $actor) {
            $actor = \App\Models\Actor::factory()->create([
                'first_name' => $actor['first_name'],
                'last_name' =>  $actor['last_name'],
            ]);

            // assign movies to the actor
            for ($i = 0;$i < $moviesPerActor;$i++) {
                $movieId = $movieEntities[$i]->id;
                $actor->movies()->attach($movieId);
            }
        }
    }
}
