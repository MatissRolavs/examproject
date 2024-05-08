<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Modlist;
use Illuminate\Support\Facades\DB;

class EditAvailability
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Retrieve the list_id from the URL
        $listId = $request->list_id;
        dd($list);
        // Retrieve the user_id and list_id from the 'modlinks' table
        $modlist = DB::table('modlists')->where('id', '=', $listId)->get();
        
        if ($user->id === $modlist->user_id || $user->type === 'admin') {
            return $next($request);
        }else{
            return redirect('games')->with('error', 'You are not allowed to access this page.');
        }
    }
}
