<?php

namespace Database\Factories;

use App\Models\User_Mark;
use App\Models\User;
use App\Models\Subject;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class User_MarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User_Mark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all()->pluck('id')->toArray();
        $subject = Subject::all()->pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($users),
            'subject_id' => $this->faker->randomElement($subject),
            'semester' => rand(1, 7),
            'grade' => $this->faker->randomFloat(2, 10, 100)
        ];
    }
}
