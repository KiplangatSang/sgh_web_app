<?php

namespace Database\Factories;

use App\Models\ExternalPostsAPI;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExternalPostsAPI>
 */
class ExternalPostsAPIFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = ExternalPostsAPI::class;
    public function definition(): array
    {
        return [
            'apiable_id' => $this->faker->numberBetween(1, 10),
            'apiable_type' => $this->faker->randomElement(['Type1', 'Type2', 'Type3']),
            'name' => $this->faker->word,
            'url' => $this->faker->url,
            'call_type' => $this->faker->randomElement(['GET', 'POST']),
            'params' => $this->faker->optional()->text,
            'description'=> $this->faker->text,
            'source' => $this->faker->optional()->word,
            'is_callable' => $this->faker->boolean,
            'status' => $this->faker->boolean,
        ];
    }
}
