<?php

namespace App\Http\Controllers;

use App\Models\Modlink;
use App\Http\Requests\StoreModlinkRequest;
use App\Http\Requests\UpdateModlinkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModlinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Modlink::all();
        return view("links.index",["links" => $links]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $listId = $request->query('list_id');
        return view('links.create', ['listId' => $listId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $id = \Illuminate\Support\Facades\Auth::id();
        $id = auth()->id();
        $link = New Modlink();
        $link["modlink"] = $request["modlink"];
        $link["moddesc"] = $request["moddesc"];
        $link["list_id"] = $request["list_id"];
        $link["user_id"] = $id;
        $link->save();
        return redirect("/games-show/lists-show/{$request["list_id"]}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Modlink $modlink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modlink $editModlink)
    {
        return view('links.edit', ['editModlink' => $editModlink]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modlink $editModlink)
    {
        $editModlink->update($request->all());
        return redirect("/games-show/lists-show/{$editModlink["list_id"]}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $link = DB::table('modlinks')->where('id', '=', $id)->get();

        $link = Modlink::find($id);

        $link->delete();

        return redirect("/games-show/lists-show/$link->list_id");
    }
}
