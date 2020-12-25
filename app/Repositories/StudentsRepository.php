<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\User_Mark;
use App\Models\Subject;

class StudentsRepository
{
    public function getStudentsList()
    {
        return User::where('roles', config('constants.roles.student'))
            ->get();
    }

    public function getStudent($userId)
    {
        return User::findOrFail($userId)
            ->where('roles', config('constants.roles.student'))
    }

    public function getSemesterTakenByStudents($studentId)
    {
        return User_Mark::select('semester')
            ->where('user_id', $studentId)
            ->distinct()
    }

    public function getStudentResultBySemester($userId, $semester)
    {
        return User_Mark::with('subject')
            ->where('user_id', $userId)
            ->where('semester_id', $semester)
            ->get()
            ->pluck('subject.name', 'grade');
    }
}
