@extends('layout')

@section('content')
<h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white text-center">{{ $movie->title }}</h1>

<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="p-6">
        <img src="{{ asset('storage/' . $movie->poster) }}" alt="Movie Poster" class="w-full h-auto object-cover mb-4 rounded">
        
        <div class="mb-4">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Intro</h2>
            <p class="text-gray-700 dark:text-gray-300">{{ $movie->intro }}</p>
        </div>
        
        <div class="mb-4">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Release Date</h2>
            <p class="text-gray-700 dark:text-gray-300">{{ $movie->release_date }}</p>
        </div>
        
        <div class="mb-4">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Genre</h2>
            <p class="text-gray-700 dark:text-gray-300">{{ $movie->genre->name }}</p>
        </div>
        
        <a href="{{ route('movies.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back to Movies</a>
    </div>
</div>
@endsection
