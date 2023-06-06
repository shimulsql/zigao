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


    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function hasVote($userId)
    {
        return $this->votes()->where([
            ['voteable_id', $this->id], 
            ['user_id', $userId],
            ['voteable_type', 'App\Models\QuestionEntry']
        ])->first();
    }
}
