<?php

namespace App\Models;

use App\Models\Quizzes;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizQuestions extends Model
{
    //
    use HasFactory;
    protected $table = 'quiz_questions';
    protected $fillable = [
        'quiz_id',
        'question_id',
        'order',
        'user_answer',
        'is_correct'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quizzes::class, 'quiz_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
}
