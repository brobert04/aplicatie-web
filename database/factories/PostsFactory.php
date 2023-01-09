<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(3, $asText=true);
        $slug = Str::slug($title, '-');
        return [
            'title'=>$title,
            'slug'=>$slug,
            'subtitle'=>$this->faker->sentence(3, true),
            'content' => $this->faker->paragraph(rand(6,15), true),
            'views' => rand(0, 10000),
            'published_at' => $this->faker->randomElement(array(null, $this->faker->dateTimeBetween('-2 year', 'now'))),
            'user_id' => User::all()->where('role','autor')->random(),
            'meta_title' => $this->faker->words(rand(1,5), true),
            'meta_description' => $this->faker->sentence(3, true),
            'meta_keywords' => $this->faker->words(rand(1,8), true),
        ];
    }
}
