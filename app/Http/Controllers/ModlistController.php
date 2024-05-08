<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreModlistRequest;
use App\Http\Requests\UpdateModlistRequest;
use Illuminate\Http\Request;
use App\Models\Modlist;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ModlistController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(){
        $lists = Modlist::all();
        return view("lists.index",["lists" => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        $gameId = $request->query('game_id'); // Get game_id from the URL
        return view('lists.create', ['gameId' => $gameId]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $id = \Illuminate\Support\Facades\Auth::id();
        $id = auth()->id();
        $game = DB::table('games')->where('id', '=', $request["game_id"])->get();
        $posts_amount = $game[0]->posts_amount;
        $game[0]->posts_amount = $posts_amount + 1;
        DB::table('games')->where('id', '=', $request["game_id"])->update(['posts_amount' => $game[0]->posts_amount]);
        $list = New Modlist();
        $list["name"] = $request["name"];
        $list["user_id"] = $id;
        $list["game_id"] = $request["game_id"];
        $list->save();
        return redirect("/games-show/{$request["game_id"]}");
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $list = Modlist::find($id);
        $loggedId = \Illuminate\Support\Facades\Auth::id();
        $loggedUser = Auth::user();
        $links = DB::table('modlinks')->where('list_id', '=', $id)->get();
        $users = User::all();
        return view("lists.show", ["list" => $list, "links" => $links, "loggedId"=> $loggedId, "loggedUser" => $loggedUser, "users" => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modlist $list)
    {
        return view('lists.edit', ['list' => $list]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modlist $list)
    {
        $list->update($request->all());
        return redirect("/games-show/{$list["game_id"]}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $list = DB::table('modlists')->where('id', '=', $id)->get();
        $game = DB::table('games')->where('id', '=', $list[0]->game_id)->get();
        $posts_amount = $game[0]->posts_amount;
        $game[0]->posts_amount = $posts_amount - 1;
        DB::table('games')->where('id', '=', $list[0]->game_id)->update(['posts_amount' => $game[0]->posts_amount]);

        $list = Modlist::find($id);

        $list->delete();

        return redirect("/games-show/$list->game_id");
    }
}
