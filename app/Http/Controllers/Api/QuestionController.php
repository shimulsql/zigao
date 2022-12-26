<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function saveDraft(Request $request)
    {  
        dd($request->all());
    }
}
