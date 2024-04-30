<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Games') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="/games-create">Create New Game</a>
                    <ul>
                    @foreach ($games as $game)
                        <li>
                            <a href="/games-show/{{ $game['id'] }}">{{ $game["title"] }}
                                <img src={{ $game["img_path"] }} alt="game image" width="100" height="100">
                            </a>
                            <p>Posts Count: {{ $game["posts_amount"] }} </p>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
