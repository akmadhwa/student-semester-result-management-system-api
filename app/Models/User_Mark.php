<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\User;


class User_Mark extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'users_marks';

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
