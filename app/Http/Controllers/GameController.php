<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $games = Game::all();
        $userId = \Illuminate\Support\Facades\Auth::id();
        $user = User::find($userId);
        $userType = $user->type;
        return view("games.index",["games" => $games,"userType"=>$userType]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view("games.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $game = New Game();
        $game["title"] = $request["title"];
        $game["posts_amount"] = 0;
        $game["img_path"] = $request["img_path"];
        $game->save();
        return redirect("/games");
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $game = Game::find($id);
        $loggedId = \Illuminate\Support\Facades\Auth::id();
        $users = User::all();
        $lists = DB::table('modlists')->where('game_id', '=', $id)->get();
        $loggedUser = Auth::user();
        return view("games.show", ["game" => $game, "lists" => $lists, "users" => $users, "loggedId" => $loggedId,"loggedUser" => $loggedUser]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('games.edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Game $game)
    {   
        $game->update($request->all());
        return redirect()->route('games');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
