<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\StudentsMarksRepository;
use App\Traits\RespondsWithHttpStatus;

class UserController extends Controller
{

    use RespondsWithHttpStatus;

    private $studentMarkRepository;

    public function __construct(
        StudentsMarksRepository $studentMarkRepository
    ) {

        $this->studentMarkRepository = $studentMarkRepository;
    }

    public function getUserInfo()
    {
        return $this->success("", auth()->user());
    }

    public function getUserSemesterResult($semester)
    {
        try {
            $result = $this->studentMarkRepository->getStudentResultBySemester(
                auth()->id(),
                $semester
            );

            return $this->success(
                "",
                $result

            );
        } catch (\Throwable $th) {
            return $this->failure(
                "error"
            );
        }
    }

    public function getUserSemesterList()
    {
        try {
            $result = $this->studentMarkRepository->getSemesterTakenByStudents(
                auth()->id(),
            );

            return $this->success(
                "",
                $result

            );
        } catch (\Throwable $th) {
            return $this->failure(
                "error"
            );
        }
    }
}
