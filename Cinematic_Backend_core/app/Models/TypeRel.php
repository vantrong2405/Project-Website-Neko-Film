<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRel extends Model
{
    use HasFactory;

    protected $table = 'type_rels';

    protected $fillable = [
        'id_movie',
        'id_type'
    ];
}
