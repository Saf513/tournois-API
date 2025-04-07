<?php

namespace App\Http\Controllers;

use App\Http\Requests\TournamentRequest;
use App\Models\Player;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Models\TournamentPlayer;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class TournamentPlayerController extends Controller
{

    public function store($tournament_id ,Request $request){
      $validated = $request->validate([
            'player_id' => 'required|integer'
        ]);
        $player_id  =  $validated['player_id'];
        $exist_player = Player::where('id',$player_id)->exists();
        $exist_tournament = Tournament::where('id',$tournament_id)->exists();
        // dd([
        //     'player' => $player_id,
        //     'tournament' => $tournament_id,
        //     'exist_player' => $exist_player,
        //     'exist_tournament' => $exist_tournament
        // ]);
        if($exist_player && $exist_tournament)
        {
         $tournament_player = TournamentPlayer::create([
             'player_id' => $player_id,
             'tournament_id' => $tournament_id
         ]);
        return response()->json($tournament_player);

        }


    }


    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function index($tournament_id)
    {
       $players = DB::table('players as p')
       ->join('tournament_player as tp','p.id','=','tp.player_id')
       ->where('tp.tournament_id','=',$tournament_id)
       ->select('p.id','p.name')
       ->get();
       return response()->json($players);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TournamentPlayer $tournamentPlayer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TournamentPlayer $tournamentPlayer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tournament_id,$player_id)
    {
      try{
        if(Tournament :: where('id',$tournament_id)->exists())
         {
          if(Player::where('id',$player_id)->exists()){
           $player = Player::findOrFail($player_id);
           $player->delete();
              return response()->json('le joueur est bien supprimee');
               }
        }
    }
    catch(\Exception $e)
    {
    return response()->json($e->getMessage());
    }
}
}
