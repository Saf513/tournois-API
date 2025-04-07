<?php

namespace App\Http\Controllers;

use App\Http\Requests\TournamentRequest;
use App\Models\Tournament;
use Illuminate\Http\Request;


class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::all();
        return response()->json($tournaments);
    }

    public function show($id)
    {
        $tournament = Tournament::findOrFail($id);
        return response()->json($tournament);
    }

    public function store(TournamentRequest $request)
    {
        try {
            // Déboguer les données reçues
            // Déboguer les données validées
            $validatedData = $request->validated();

            // Créer le tournoi avec un log explicite en cas d'échec
            $tournament = Tournament::create($validatedData);

            // Vérifier si le tournoi a bien été créé
            if (!$tournament->exists) {
                return response()->json([
                    'message' => 'Tournament creation failed',
                    'validated_data' => $validatedData
                ], 400);
            }

            return response()->json([
                'message' => 'Tournament created successfully',
                'data' => $tournament,

            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create tournament',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'received_data' => $request->all(),
                'validated_data' => isset($validatedData) ? $validatedData : 'Not validated yet'
            ], 500);
        }
    }

    public function update(TournamentRequest $request, $id)
    {
        try {

            $data = $request->validated();
            // $tournament = Tournament::findOrFails($id);
            $tournament = Tournament::findOrFail($id);
            $tournament->update($data);
            return response()->json($tournament);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    public function destroy($id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->delete();
        return response()->json([
            'message'=>'le tournament est suprimer par succes',
            'data'=>$tournament
        ]);
    }
}
