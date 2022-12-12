<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // add new question page
    public function add_question()
    {
        $title = "Add new question";

        return view('question.add-question', ['title' => $title]);
    }
}
