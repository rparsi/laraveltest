<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Actor;
use App\Models\Movie;

class ActorTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:actor-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $actors = Actor::all();
        $data = [];

        /**
         * @var Actor $actor
         */
        foreach ($actors as $actor) {
            $item = [
                'full_name' => $actor->getAttribute('first_name') . ' ' . $actor->getAttribute('last_name'),
                'movies' => ''
            ];
            $ids = $actor->movies()->allRelatedIds();
            $movies = Movie::all()->find($ids);

            foreach ($movies as $movie) {
                $item['movies'] .= $movie->name . ',';
            }
            $data[] = $item;
        }
        $this->table(['Actor', 'Movies'], $data);
    }
}
