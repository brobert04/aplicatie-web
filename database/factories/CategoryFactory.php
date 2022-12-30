<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'excerpt' => $this->faker->paragraph(rand(1,3), true),
            'views' => rand(0, 2000),
            'meta_title' => $this->faker->words(rand(1,5), true),
            'meta_description' => $this->faker->sentence(3, true),
            'meta_keywords' => $this->faker->words(rand(1,8), true),
        ];
    }
}
