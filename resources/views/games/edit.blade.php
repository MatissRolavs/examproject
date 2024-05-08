<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-yellow-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 ">
            <h1 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Edit Game
            </h1>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('games.update', $game) }}">
                @csrf
                @method('PUT')

                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="title" class="sr-only">Title:</label>
                        <input id="title" name="title" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-yellow-300 focus:border-yellow-300 focus:z-10 sm:text-sm" placeholder="Title" value="{{ $game->title }}">
                    </div>
                </div>

                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="img_path" class="sr-only">Game Image Link:</label>
                        <input id="img_path" name="img_path" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-yellow-300 focus:border-yellow-300 focus:z-10 sm:text-sm" placeholder="Image URL" value="{{ $game->img_path }}">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-black bg-yellow-300 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300">
                        Update Game
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
