<?php

namespace App\Http\Controllers;

use App\Models\matche;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Match_;

class MatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches = matche::all();
        return response()->json($matches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tournament_id' => 'integer'
        ]);
        $tournament_id = $request['tournament_id'];
        $matche = matche :: create(['tournament_id'=>$tournament_id]);
        return response()->json($matche);
    }

    /**
     * Display the specified resource.
     */
    public function show(matche $matche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(matche $matche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, matche $matche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(matche $matche)
    {
        //
    }
}
