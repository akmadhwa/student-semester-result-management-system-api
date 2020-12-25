<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\User_Mark;
use App\Models\Subject;

class SubjectRepository
{
    public function getAllSubject()
    {
        return Subject::all();
    }

    public function findSubjectById($subjectId)
    {
        return Subject::findOrFail($subjectId);
    }

    public function createNewSubject($subjectName, $subjectCode)
    {
        $subject = new Subject;
        $subject->name = $subjectName;
        $subject->subjectCode = $subjectCode;

        $subject->save;
    }

    public function editSubject($subjectId, $subjectName, $subjectCode)
    {
        $subject = $this->findSubjectById($subjectId);

        $subjectName = $subjectName ?? $subject->name;
        $subjectCode = $subjectCode ?? $subject->subjectCode;

        Subject::where('id',$subjectId)
            ->update([
                'name'=> $subjectName,
                'code'=> $subjectCode
            ]);

    }


}
