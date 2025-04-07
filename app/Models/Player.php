<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
       'position'
    ];

    public function players()
    {
        return $this->belongsToMany(Tournament::class, 'tournament_player')
                    ->withTimestamps();
    }

}
