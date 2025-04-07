<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'nbr_equipes',
        'date_debut',
        'date_fin',
        'lieu'

    ];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'tournament_player')
                    ->withTimestamps();
    }

}
