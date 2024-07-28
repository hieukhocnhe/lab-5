@extends('layout')

@section('content')
<h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white text-center">Edit Film</h1>
<form class="max-w-sm mx-auto" action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title:</label>
        <input type="text" id="title" name="title" value="{{ $movie->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div class="mb-5">
        <label for="poster" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poster:</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="poster" name="poster" type="file">
        <img src="{{ asset('storage/' . $movie->poster) }}" alt="Current Poster" class="mt-2">
    </div>
    <div class="mb-5">
        <label for="intro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Intro:</label>
        <input type="text" id="intro" name="intro" value="{{ $movie->intro }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div class="mb-5">
        <label for="release_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date:</label>
        <input type="date" id="release_date" name="release_date" value="{{ $movie->release_date }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div class="mb-5">
        <label for="genre_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre:</label>
        <select id="genre_id" name="genre_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" @if($movie->genre_id == $genre->id) selected @endif>{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
</form>
@endsection
