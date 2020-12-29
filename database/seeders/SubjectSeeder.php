<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;


class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjectData =[
            [
                'name' => 'Biology and Science',
                'code' => 'XEF10'
            ],
            [
                'name' => 'Physics',
                'code' => 'XEW50'
            ],
            [
                'name' => 'Musics and Arts',
                'code' => 'RES090'
            ],
            [
                'name' => 'History',
                'code' => 'JUSG87'
            ],
            [
                'name' => 'English Education',
                'code' => 'HUY324'
            ],
            [
                'name' => 'Computer and Technology',
                'code' => 'GRE34'
            ],
            [
                'name' => 'Mathematics',
                'code' => 'RES12'
            ],
            [
                'name' => 'Life Lab or gardening',
                'code' => 'REG32'
            ],
            [
                'name' => 'Speech and Debate',
                'code' => 'DES23'
            ],
        ];

        foreach ($subjectData as $subject) {
            Subject::create($subject);
        }
    }
}
