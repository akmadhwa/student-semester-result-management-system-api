<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User_Mark;

class UserMarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userMark = [
            [
                'user_id' => 1,
                'subject_id' => 1,
                'semester'=> 1,
                'grade'=> 78
            ],
            [
                'user_id' => 1,
                'subject_id'=> 2,
                'semester'=> 1,
                'grade'=> 88
            ],
            [
                'user_id' => 1,
                'subject_id'=> 3,
                'semester'=> 1,
                'grade'=> 67
            ],
            [
                'user_id' => 1,
                'subject_id'=> 4,
                'semester'=> 2,
                'grade'=> 75
            ],
            [
                'user_id' => 1,
                'subject_id'=> 5,
                'semester'=> 2,
                'grade'=> 77
            ],
            [
                'user_id' => 1,
                'subject_id'=> 6,
                'semester'=> 2,
                'grade'=> 45
            ],
            [
                'user_id' => 2,
                'subject_id' => 1,
                'semester'=> 1,
                'grade'=> 86
            ],
            [
                'user_id' => 2,
                'subject_id'=> 2,
                'semester'=> 1,
                'grade'=> 54
            ],
            [
                'user_id' => 2,
                'subject_id'=> 3,
                'semester'=> 1,
                'grade'=> 40
            ],
            [
                'user_id' => 2,
                'subject_id'=> 4,
                'semester'=> 2,
                'grade'=> 90
            ],
            [
                'user_id' => 2,
                'subject_id'=> 5,
                'semester'=> 2,
                'grade'=> 88
            ],
            [
                'user_id' => 1,
                'subject_id'=> 6,
                'semester'=> 2,
                'grade'=> 75
            ],
        ];

        foreach ($userMark as $mark) {
            User_Mark::create($mark);
        }
    }
}
