<x-app-layout>
    <div class="container mx-auto px-4">
        <a href="{{ route('lists-create', ['game_id' => $game->id]) }}" class="text-blue-500 hover:underline mb-4 block">Create List for this Game</a>
        <div class="text-center">
            <h1 class="text-2xl font-bold mb-4">{{ $game->title }}</h1> 
            <img src="{{ $game->img_path }}" alt="{{ $game->title }}" width="150" height="100" class="mx-auto m-4">
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($lists as $list)
                @foreach ($users as $user)
                    @if ($user->id == $list->user_id)
                        <div class="p-4 border rounded-md shadow-sm border-yellow-300">
                            <a href="lists-show/{{ $list->id }}" class="text-lg font-semibold hover:underline">{{ $list->name }}</a>
                            <p>Created By {{ $user->name }}</p>
                            @if ($loggedId == $list->user_id || $loggedUser->type == "admin")
                            <div class="flex space-x-2">
                                <form action="/lists/{{ ($list->id) }} " method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" >
                                    <input type="submit" value="Delete" class="mt-2 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-400">
                                </form>
                                <a href="{{ route('lists.edit', $list->id) }}" class="mt-2 px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold rounded-md text-center">Edit</a>
                            </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</x-app-layout>
