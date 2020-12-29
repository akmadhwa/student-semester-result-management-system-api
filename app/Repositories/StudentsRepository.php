<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\User_Mark;
use App\Models\Subject;

class StudentsRepository
{
    public function getStudentsList()
    {
        return User::select(['id', 'name', 'student_registration_number'])
            ->where('roles', config('constants.roles.student'))
            ->get();
    }

    public function getStudent($userId)
    {
        return User::where('id', $userId)
            ->where('roles', config('constants.roles.student'))
            ->first();
    }

    public function createNewStudent(
        $email,
        $password,
        $name,
        $studentRegistrationNumber
    ) {
        $user = new User();

        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->student_registration_number = $studentRegistrationNumber;

        $user->save();

        return $user;
    }

    public function editStudent(
        $id,
        $email,
        $name,
        $studentRegistrationNumber
    ) {
        $student = $this->getStudent($id);

        $student->email = $email ?? $student->email;
        $student->name = $name ?? $student->name;
        $student->student_registration_number = $studentRegistrationNumber ?? $student->student_registration_number;

        $student->save();
    }

    public function deleteStudent($id)
    {
        return $this->getStudent($id)
            ->delete();
    }
}
