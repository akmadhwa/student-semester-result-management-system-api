<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\User_Mark;
use App\Models\Subject;

class StudentsMarksRepository
{
    public function getSemesterTakenByStudents($studentId)
    {
        return User_Mark::select('semester')
            ->where('user_id', $studentId)
            ->groupBy('semester')
            ->get()
            ->pluck('semester');
    }

    public function getStudentResultBySemester($userId, $semester)
    {
        return User_Mark::with('subject')
            ->where('user_id', $userId)
            ->where('semester', $semester)
            ->get()
            ->pluck('grade', 'subject.name');
    }

    public function insertNewSubjectMarkBySemester(
        int $student_id,
        int $semester,
        array $subjectMark
    ) {
        $studentData = [];

        foreach($subjectMark as $data) {
            $arr = [
                "user_id" => $student_id,
                "semester" => $semester,
                "subject_id" => $data['subject_id'],
                "grade" => $data['grade'],
                "created_at" => now(),
                "updated_at" => now(),
            ];

            array_push($studentData, $arr);
        }

        User_mark::insert($studentData);
    }

    public function deleteStudentSemester(
        int $student_id,
        int $semester
    ) {
        return User_Mark::where('user_id', $student_id)
            ->where('semester', $semester)
            ->delete();
    }

    public function editSubjectResultBySemester($studentId, $semester, $subjectId,  $newGrade)
    {
        return User_MarK::where('user_id', $studentId)
            ->where('semester', $semester)
            ->where('subject_id', $subjectId)
            ->update([
                'grade' => $newGrade
            ]);

    }

    public function deleteSubjectResultBySemester($studentId, $semester, $subjectId)
    {
        return User_Mark::where('user_id', $studentId)
            ->where('semester', $semester)
            ->where('subject_id', $subjectId)
            ->delete();

    }
}
