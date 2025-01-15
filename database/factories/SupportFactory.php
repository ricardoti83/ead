<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Support::class;

    public function definition()
    {
        $user_id = "ac40d14a-689e-4dbe-a5e2-df54a374fc78";
        $lesson_id = "ac40d14a-689e-4dbe-a5e2-df54a374fc78";

        return [
            'user_id' => User::factory(),
            'lesson_id' => Lesson::factory(),
            'title' => $this->faker->name(),
            'status' => 'P',
            'description' => $this->faker->sentence(20)

        ];
    }
}
