<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'content',
        'type',
        'correct',
    ];

    const TYPE_ANSWER = 0;
    const TYPE_QUESTION = 1;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
