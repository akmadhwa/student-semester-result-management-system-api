<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Repositories\SubjectRepository;
use App\Traits\RespondsWithHttpStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubjectRequest;

class SubjectController extends Controller
{
    use RespondsWithHttpStatus;

    private SubjectRepository $subjectRepository;

    public function __construct(
        SubjectRepository $subjectRepository
    ) {

        $this->middleware('isAdmin');

        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        try {
            return $this->success(
                "",
                $this->subjectRepository->getAllSubject()
            );

        } catch(\Exception $e) {
            $this->failure(
                "error",
            );
        }
    }


    public function store(CreateSubjectRequest $request)
    {
        try {
            $this->subjectRepository->createNewSubject(
                $request->subject_name,
                $request->subject_code
            );

            return $this->success(
                "Successfully created",
            );

        } catch(\Exception $e) {
            $this->failure(
                "error",
            );
        }
    }

    public function update(CreateSubjectRequest $request, $id)
    {
        try {
            $this->subjectRepository->editSubject(
                $id,
                $request->subject_name,
                $request->subject_code
            );

            return $this->success(
                "Successfully edit",
            );

        } catch(\Exception $e) {
            $this->failure(
                "error",
            );
        }
    }


}
