<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Exception;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        return response()->json($players);
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

        try {
            $data = $request->all();
          
            $player = Player::create($data);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed',
                'Error' => $e->getMessage()
            ], 400);
        }
        return response()->json([
            'player' => $player
        ]);

        // try {

        //     $data = $request->validate(
        //         [
        //             'name' => 'string|min:4|max:255',
        //         ]
        //     );

        //     $player = Player::create($data);

        //     return response()->json([
        //         'message' => 'le joueur est ajoute par  succes',
        //         'data' => $player
        //     ]);

        // } catch (Exception $e) {
        //     response()->json([
        //         'error' => $e->getMessage()
        //     ], 400);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
