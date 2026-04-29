<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    protected $model = \App\Models\Movie::class;

    public function definition()
    {
        $categories = ['Action', 'Drama', 'Thriller', 'Comedy', 'Romance', 'Horror'];
        $languages = ['Hindi', 'Telugu', 'Tamil', 'English', 'Kannada', 'Malayalam'];

        $title = $this->faker->unique()->sentence(3);
        $videoId = $this->faker->unique()->regexify('[A-Za-z0-9]{11}');
        $category = $this->faker->randomElements($categories, rand(1, 2));
        $artist = $this->faker->name;
        $year = $this->faker->numberBetween(2000, 2025);

        return [
            'title' => $title,
            'youtube_video_id' => $videoId,
            'youtube_url' => 'https://www.youtube.com/watch?v=' . $videoId,
            'thumbnail' => 'https://img.youtube.com/vi/' . $videoId . '/maxresdefault.jpg',
            'category' => json_encode($category),
            'artist_name' => $artist,
            'release_year' => $year,
            'description' => $this->faker->paragraph,
            'searching_word' => strtolower($title . ' ' . $artist),
            'language' => $this->faker->randomElement($languages),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}