<?php
namespace Database\Factories\Articles;

use App\Models\Articles\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Categories::class;
    public function definition(): array
    {

        $category = array(
            'categoryable_id' => rand(1, 2),
            'categoryable_type' => "App\User",
            'category' => "Poems",
            'category_description' => "Short Poems",
            'category_class' => "Art",
        );

        //return $doctor;
        return $category;
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
