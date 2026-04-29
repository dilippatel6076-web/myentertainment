<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Specify your existing table name
    protected $table = 'add_movies';
    protected $guarded = [];
    // Allow mass assignment
    // protected $fillable = [
    //     'title',
    //     'youtube_video_id',
    //     'youtube_url',
    //     'thumbnail',
    //     'category',
    //     'artist_name',
    //     'release_year',
    //     'description',
    //     'searching_word',
    //     'language',
    //     'status',
    //     'created_at',
    //     'updated_at'
    // ];
}
