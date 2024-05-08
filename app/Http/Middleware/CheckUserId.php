<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Modlist;
use Illuminate\Support\Facades\DB;

class CheckUserId
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Retrieve the list_id from the URL
        $listId = $request->query('list_id');

        // Retrieve the user_id and list_id from the 'modlinks' table
        $list = DB::table('modlists')->where('id', '=', $listId)->get();
        
        if ($list[0]->user_id == $user->id) {
            return $next($request);
        } else {
            // Redirect to a different page or show an error message
            return redirect('games')->with('error', 'You are not allowed to access this page.');
        }
    }
}
