<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatcheController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TournamentPlayerController;
use App\Models\TournamentPlayer;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('tournaments', TournamentController::class);
    Route::apiResource('players',PlayerController::class);
    Route::apiResource('tournament.players',TournamentPlayerController::class);
    Route::apiResource('matches',MatcheController::class);
    Route::post('/refresh-token',[AuthController::class , 'refreshToken']);
    // Route::post('/tournaments',[TournamentController::class , 'store']);

});
// Route::get('tournaments{tournament_id}/players',[TournamentPlayerController::class,'register']);



