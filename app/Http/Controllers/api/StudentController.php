<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\EditStudentRequest;
use App\Repositories\StudentsRepository;
use App\Traits\RespondsWithHttpStatus;


class StudentController extends Controller
{

    use RespondsWithHttpStatus;

    private $studentRepository;

    public function __construct(
        StudentsRepository $studentRepository
    ) {

        $this->studentRepository = $studentRepository;
    }

    public function getStudentList()
    {
        try {
            $studentsList = $this->studentRepository->getStudentsList();

            return $this->success(
                "",
                $studentsList
            );
        } catch (\Throwable $th) {
            $this->failure(
                "error",
            );
        }
    }

    public function createStudent(CreateStudentRequest $request)
    {
        try {
            $result = $this->studentRepository->createNewStudent(
                $request->email,
                $request->password,
                $request->name,
                $request->student_registration_number,
            );

            return $this->success(
                "Successfully inserted",
                $this->subjectRepository->getAllSubject()
            );

        } catch( \Exception $e) {
            $this->failure(
                "error",
            );
        }
    }

    public function editStudent(EditStudentRequest $request, $id)
    {
        try {

            $student = $this->studentRepository->getStudent($id);

            if(empty($student->count())) {

                return $this->failure(
                    'Student Not Found'
                );

            }

            $result = $this->studentRepository->editStudent(
                $id,
                $request->email,
                $request->name,
                $request->student_registration_number,
            );

            return $this->success(
                "Successfully inserted",
                $result
            );

        } catch( \Exception $e) {
            $this->failure(
                "error",
            );
        }
    }

    public function deleteStudent($id)
    {
        try {

            $student = $this->studentRepository->getStudent($id);

            if(empty($student)) {

                return $this->failure(
                    'Student Not Found'
                );

            }

            $result = $this->studentRepository->deleteStudent(
                $id
            );

            return $this->success(
                "Successfully deleted",
                $result
            );

        } catch( \Exception $e) {
            $this->failure(
                "error",
            );
        }
    }
}
