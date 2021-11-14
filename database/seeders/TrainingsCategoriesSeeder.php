<?php

namespace Database\Seeders;

use App\Models\TrainingsCategories;
use Illuminate\Database\Seeder;

class TrainingsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrainingsCategories::factory()->count(24)->create();
    }
}
