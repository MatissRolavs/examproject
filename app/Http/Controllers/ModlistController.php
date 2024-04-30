<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModlistRequest;
use App\Http\Requests\UpdateModlistRequest;
use Illuminate\Http\Request;
use App\Models\Modlist;

class ModlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $modlists = Modlist::all();
        return view("lists.index",["lists" => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view("lists.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $list = New Modlist();
        $list["name"] = $request["name"];
        $list["user_id"] = "j";
        $list["game_id"] = "j";
        $list->save();
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
