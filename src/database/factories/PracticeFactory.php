<?php

namespace Database\Factories;

use App\Models\Practice;
use App\Models\PracticeStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Practice>
 */
class PracticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Practice::class;
    public function definition(): array
    {
        return [
            'from' => $this->faker->dateTimeBetween("2023/09/01","2023/09/30"),
            'to' => $this->faker->dateTimeBetween("2024/05/01","2024/05/31"),
            'user_id' => 5,
            'company_employee_id' => 1,
            'contract' => 'cesta ku suboru',
            'practice_status_id' => PracticeStatus::firstWhere("status", "Vypísaná")->id
        ];
    }
}
