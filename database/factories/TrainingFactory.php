<?php

namespace Database\Factories;

use App\Models\Training;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Training::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentences(4, true),
            'image' => $this->faker->image('public/storage', 640, 480, null, false),
            'price' => $this->faker->randomFloat(2,10,25),
            'duration' => $this->faker->randomNumber(1),
            'user_id' => User::all()->random()->id,
            'type_id' => Type::all()->random()->id,
        ];
    }
}
