<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorRel extends Model
{
    use HasFactory;

    protected $table = 'actor_rels';

    protected $fillable = [
        'id_actor',
        'id_movie',
        'role'
    ];
}
