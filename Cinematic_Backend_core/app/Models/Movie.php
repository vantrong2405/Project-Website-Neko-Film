<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        'original_name',
        'vietnamese_name',
        'id_image',
        'description',
        'rating',
        'id_contries',
        'id_author',
        'id_user_upload',
        'id_language_original',
        'date',
        'views',
    ];
}
