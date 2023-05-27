<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActorRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateActorRequest;
use App\Models\Actor;
use App\Models\Movie;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::all();
        $data = [];
        foreach ($actors as $actor) {
            $ids = $actor->movies()->allRelatedIds();
            $movies = Movie::all()->find($ids);

            $data[] = [
                'actor' => $actor,
                'movies' => $movies
            ];
        }
        return view('actor.movies', ['actors_with_movies' => $data]);
    }

    /**
     * Display a listing of the resource.
     */
    public function actormovies(Request $request)
    {
        $filterByActorIds = $request->post('filterByActorIds', []);
        if (empty($filterByActorIds)) {
            return $this->index();
        }

        $actors = Actor::all()->find($filterByActorIds);
        $data = [];
        foreach ($actors as $actor) {
            $ids = $actor->movies()->allRelatedIds();
            $movies = Movie::all()->find($ids);

            $data[] = [
                'actor' => $actor,
                'movies' => $movies
            ];
        }
        return view('actor.movies', ['actors_with_movies' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActorRequest $request, Actor $actor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        //
    }

    public function search()
    {
        return view('actor.search');
    }

    public function searchresult(Request $request)
    {
        $search = $request->post('search', null);
        if (empty($search)) {
            return $this->search();
        }

        // The api call via guzzle should really be in a separate class, for separation of concerns.
        // The service or resource url should be an env variable or some other source (ie redis), but I've run out of time so doing the simplest approach here.
        $response = Http::get('https://swapi.dev/api/people', ['search' => $search]);

        $result = null;
        if ($response->successful()) {
            $result = $response->json();
        }

        if (!$result) {
            // very crude, should have something user friendly to show the error, but am out of time to implement
            return $this->search();
        }
        return view('actor.searchresult', ['result' => $result]);
    }
}
