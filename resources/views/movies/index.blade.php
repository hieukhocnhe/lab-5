@extends('layout')
@section('content')
<h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white text-center">List film</h1><div class="relative overflow-x-auto">
    <a href="{{route('movies.create')}}" class="text-green-600 hover:text-green-900 ms-9">Add</a>
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Poster
                </th>
                <th scope="col" class="px-6 py-3">
                    Intro
                </th>
                <th scope="col" class="px-6 py-3">
                    Release date
                </th>
                <th scope="col" class="px-6 py-3">
                    Genre
                </th>
                <th scope="col" class="px-6 py-3">
                    Function
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$movie->id}}
                </th>
                <td class="px-6 py-4">
                    {{$movie->title}}
                </td>
                <td class="px-6 py-4">
                    <img src="{{ asset('storage/' . $movie->poster) }}" alt="Movie Poster" width="60px">
                </td>
                <td class="px-6 py-4">
                    {{$movie->intro}}
                 </td>
                <td class="px-6 py-4">
                   {{$movie->release_date}}
                </td>
                <td class="px-6 py-4">
                    {{$movie->genre->name}}
                 </td>
                 <td class="px-6 py-4">
                    <a href="{{route('movies.show', $movie->id)}}" class="text-blue-600 hover:text-blue-900">Detail</a>
                    <a href="{{route('movies.edit', $movie->id)}}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                    </form>
                 </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


{{ $movies->links() }}

@endsection
