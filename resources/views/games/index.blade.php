<x-app-layout>
     <div class="text-center py-6">
        <h1 class="text-4xl font-bold">Welcome to Games Mod Site!</h1>
        <p class="text-lg text-gray-600">This is a community-driven site where game enthusiasts share, discuss, and modify their favorite games.</p>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-yellow-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-wrap">
                    @if ($userType == "admin")
                    <a href="/games-create" class="text-blue-500 hover:underline ">Create New Game</a>
                    @endif
                    @foreach ($games as $game)
                    <div class="flex flex-col w-36 h-72 m-8 p-1">
                            <a href="/games-show/{{ $game['id'] }}" >
                                <img src={{ $game["img_path"] }} alt="game image" class="w-auto">
                            </a> 
                            <div style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <a href="/games-show/{{ $game['id'] }}" class="font-bold text-lg">{{ $game["title"] }}</a>
                                <p class="text-sm">Posts: {{ $game["posts_amount"] }}</p>
                            </div>
                            @if ($userType == "admin")
                                <a href="{{ route('games.edit', $game) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold rounded w-12 text-center">Edit</a>
                            @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
