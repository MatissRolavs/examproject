<x-app-layout>
    <div class="w-full max-w-6xl mx-auto p-6 space-y-6">
        <h1 class="text-center text-3xl">{{ $list->name }} by @foreach ($users as $user) @if ($user->id == $list->user_id) {{$user->name}} @endif @endforeach </h1>
        @if ($loggedId == $list->user_id)
            <div class="text-center">
                <a href="{{ route('links-create', ['list_id' => $list->id]) }}" class="text-blue-500 hover:underline">Create Link for this List</a>
            </div>
        @endif
        <ul class="list-disc pl-5">
            @foreach ($links as $link)
                <li class="mb-4">
                    <a href="{{ $link->modlink }}" class="text-blue-500 hover:underline">{{ $link->modlink }}</a>
                    <p class="text-sm mt-2">{{$link->moddesc}}</p>
                </li>
                <div class="flex space-x-2">
                    <form action="/links/{{ ($link->id) }} " method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" >
                        <input type="submit" value="Delete" class="mt-2 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-400">
                    </form>
                    <a href="{{ route('links.edit', $link->id) }}" class="mt-2 px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold rounded-md text-center">Edit</a>
                </div>
            @endforeach
        </ul>
    </div>
</x-app-layout>
