<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Training;
use App\Models\TrainingsCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingsCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrainingsCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'training_id' => Training::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
