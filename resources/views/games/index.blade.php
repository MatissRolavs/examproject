<x-app-layout>
     <div class="text-center py-6">
        <h1 class="text-4xl font-bold">Welcome to Games Mod Site!</h1>
        <p class="text-lg text-gray-600">This is a community-driven site where game enthusiasts share, discuss, and modify their favorite games.</p>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-yellow-200 overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-wrap">
                    @if ($userType == "admin")
                    <a href="/games-create" class="text-blue-500 hover:underline ">Create New Game</a>
                    @endif
                    @foreach ($games as $game)
                    <div class="flex flex-col w-36 h-72 m-8 p-1">
                            <a href="/games-show/{{ $game['id'] }}" >
                                <img src={{ $game["img_path"] }} alt="game image" class="">
                            </a> 
                            <div style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <a href="/games-show/{{ $game['id'] }}" class="font-bold text-lg">{{ $game["title"] }}</a>
                                <p class="text-sm">Posts: {{ $game["posts_amount"] }}</p>
                            </div>
                            @if ($userType == "admin")
                            <div class="flex space-x-2">
                                <form action="/games/{{ ($game->id) }} " method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" >
                                    <input type="submit" value="Delete" class="mt-2 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-400">
                                </form>
                                <a href="{{ route('games.edit', $game) }}" class="mt-2 px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-400">Edit</a>
                            </div>
                            @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
