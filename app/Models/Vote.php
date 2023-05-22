<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    const VOTE_UP = 1;
    const VOTE_DOWN = 0;

    public function voteable()
    {
        return $this->morphTo();
    }
}
