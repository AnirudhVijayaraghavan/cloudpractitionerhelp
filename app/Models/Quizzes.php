<?php

namespace App\Models;

use App\Models\User;
use App\Models\QuizQuestions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quizzes extends Model
{
    //
    use HasFactory;
    protected $table = 'quizzes';
    protected $fillable = [
        'user_id',
        'started_at',
        'finished_at',
        'score',
        'status'
    ];

    protected $dates = ['started_at', 'finished_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quizQuestions()
    {
        return $this->hasMany(QuizQuestions::class,'quiz_id');
    }
}
