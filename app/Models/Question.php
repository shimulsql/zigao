<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tags::class,'question_tags', 'question_id', 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
