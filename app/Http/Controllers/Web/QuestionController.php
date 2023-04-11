<?php

namespace App\Http\Controllers\Web;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\DraftQuestion;
use App\Http\Controllers\Controller;
use App\Models\DraftAnswer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $title = "Add new question";
        $draft = DraftQuestion::where('user_id', auth()->user()->id)->first();

        return view('web.question.create', ['title' => $title, 'draft' => $draft]);
    }


    public function show($id)
    {
        $question = Question::where('id', $id)->with('tags', 'user')->first();
        $user = auth()->user();

        $draftAnswer = DraftAnswer::where([
            ["question_id", "=", $question->id],
            ["user_id", "=", $user->id],
        ])->first();

        $data = [
            'title' => 'Show Question',
            'question' => $question,
            'draft' => $draftAnswer,
        ];

        return view('web.question.show', $data);
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
