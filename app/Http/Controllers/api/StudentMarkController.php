<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\StudentsMarksRepository;
use App\Traits\RespondsWithHttpStatus;
use App\Http\Requests\CreateSubjectMarkRequest;


class StudentMarkController extends Controller
{
    use RespondsWithHttpStatus;

    private $studentsMarksRepository;

    public function __construct(
        StudentsMarksRepository $studentsMarksRepository
    ) {
        $this->studentsMarksRepository = $studentsMarksRepository;
    }

    public function getResultBySemester($id, $semester_id)
    {
        $result = $this->studentsMarksRepository->getStudentResultBySemester(
            $id,
            $semester_id
        );

        return $this->success(
            "",
            $result
        );
    }

    public function insertSubjectMarkToSemester(CreateSubjectMarkRequest $request)
    {
        try {
            $result = $this->studentsMarksRepository->insertNewSubjectMarkBySemester(
                $request->input('student_id'),
                $request->input('semester'),
                $request->input('results')
            );

            return $this->success(
                "",
                $result
            );
        } catch(\Exception $e) {
            return $this->failure(
                'error'
            );
        }
    }

    public function deleteStudentSemester($id, $semester)
    {
        try {
            $result = $this->studentsMarksRepository->deleteStudentSemester(
                $id,
                $semester
            );

            return $this->success(
                "",
                $result
            );
        } catch (\Throwable $th) {
            return $this->failure(
                'error'
            );
        }
    }

    public function editSubjectResultSemester(
        Request $request,
        $id,
        $semester_id,
        $subject_id
    ) {

        $request->validate([
            'new_grade' => ['required', 'integer', 'min:0', 'max:100']
        ]);

        try {
            $result = $this->studentsMarksRepository->editSubjectResultBySemester(
                $id,
                $semester_id,
                $subject_id,
                $request->new_grade
            );

            return $this->success(
                "",
                $result
            );
        } catch (\Throwable $th) {
            return $this->failure(
                'error'
            );
        }
    }

    public function deleteSubjectResultSemester(
        $id,
        $semester_id,
        $subject_id
    ) {

        try {
            $result = $this->studentsMarksRepository->deleteSubjectResultBySemester(
                $id,
                $semester_id,
                $subject_id,
            );

            return $this->success(
                "",
                $result
            );
        } catch (\Throwable $th) {
            return $this->failure(
                'error'
            );
        }
    }
}
