<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $games = Game::all();
        return view("games.index",["games" => $games]);
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
        return view("games.show", ["game" => $game]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
