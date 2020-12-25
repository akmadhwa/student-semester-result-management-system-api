<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User_Mark;

class Subject extends Model
{
    use HasFactory;

    public function user_mark() {
        return $this->hasMany(User_Mark::class);
    }
}
