<?php

namespace App\Models;

use App\Models\QuizQuestions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    //
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
        'text',
        'options',       // stored as JSON
        'correct_answer',
        'explanation',
    ];

    // Cast the options to an array for easy access
    protected $casts = [
        'options' => 'array',
    ];

    public function quizQuestionsModel()
    {
        return $this->hasMany(QuizQuestions::class, 'question_id');
    }
}
