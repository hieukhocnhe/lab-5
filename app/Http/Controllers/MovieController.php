<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Gene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $movies = Movie::where('title', 'LIKE', "%{$query}%")->paginate(10);
        } else {
            $movies = Movie::paginate(10);
        }

        return view('movies.index', compact('movies', 'query'));
    }

    public function create()
    {
        $genres = Gene::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
{
    $posterPath = null;
    if ($request->hasFile('poster')) {
        $posterPath = $request->file('poster')->store('posters', 'public');
    }

    Movie::create([
        'title' => $request->input('title'),
        'poster' => $posterPath,
        'intro' => $request->input('intro'),
        'release_date' => $request->input('release_date'),
        'genre_id' => $request->input('genre_id'),
    ]);
    return redirect()->route('movies.index')->with('success', 'Movie added successfully.');
}

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Gene::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $posterPath = $movie->poster;
        if ($request->hasFile('poster')) {
            if ($posterPath) {
                Storage::disk('public')->delete($posterPath);
            }
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        $movie->update([
            'title' => $request->input('title'),
            'poster' => $posterPath,
            'intro' => $request->input('intro'),
            'release_date' => $request->input('release_date'),
            'genre_id' => $request->input('genre_id'),
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        if ($movie->poster) {
            Storage::disk('public')->delete($movie->poster);
        }
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}

