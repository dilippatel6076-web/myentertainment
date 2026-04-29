<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class AddMoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('add_movies')->insert([
            [
                'title' => 'KGF Chapter 1',
                'youtube_video_id' => 'Qah9sSIXJqk',
                'youtube_url' => 'https://www.youtube.com/watch?v=Qah9sSIXJqk',
                'thumbnail' => 'https://img.youtube.com/vi/Qah9sSIXJqk/maxresdefault.jpg',
                'category' => json_encode(['Action', 'Drama']),
                'artist_name' => 'Yash',
                'release_year' => 2018,
                'description' => 'A powerful action drama movie.',
                'searching_word' => 'kgf yash action movie',
                'language' => 'Hindi',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pushpa The Rise',
                'youtube_video_id' => 'Q1NKMPhP8PY',
                'youtube_url' => 'https://www.youtube.com/watch?v=Q1NKMPhP8PY',
                'thumbnail' => 'https://img.youtube.com/vi/Q1NKMPhP8PY/maxresdefault.jpg',
                'category' => json_encode(['Action', 'Thriller']),
                'artist_name' => 'Allu Arjun',
                'release_year' => 2021,
                'description' => 'Smuggling based action thriller.',
                'searching_word' => 'pushpa allu arjun movie',
                'language' => 'Telugu',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
