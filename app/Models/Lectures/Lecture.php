<?php

namespace App\Models\Lectures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecture extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lecture_quizses() : HasMany
    {
        return $this->hasMany(\App\Models\Lectures\LectureQuiz::class);
    }
}
