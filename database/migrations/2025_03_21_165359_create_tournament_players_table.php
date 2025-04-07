<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tournament_player', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained()->onDelete('cascade');
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Empêcher un joueur de s'inscrire plusieurs fois au même tournoi
            $table->unique(['tournament_id', 'player_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tournament_player');
    }
};
