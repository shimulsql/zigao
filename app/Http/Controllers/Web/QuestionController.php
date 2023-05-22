<?php

namespace App\Http\Controllers\Web;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\DraftQuestion;
use App\Http\Controllers\Controller;
use App\Models\DraftAnswer;
use App\Models\QuestionEntry;

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
        $draftAnswer = null;
        $question = Question::where('id', $id)->with('tags', 'user')->first();

        
        $questionEntry = QuestionEntry::where([
            ['question_id', '=', $question->id],
            ['type', '=', QuestionEntry::TYPE_QUESTION]
            ])
            ->withCount('votes')
            ->first();

        // dd($questionEntry);
            
        $user = auth()->user();
        
        if($user)
        {
            $draftAnswer = DraftAnswer::where([
                ["question_id", "=", $question->id],
                ["user_id", "=", $user->id],
            ])->first();
        }

        $data = [
            'title' => 'Show Question',
            'question' => $question,
            'questionEntry' => $questionEntry,
            'answers' => $question->entries()->where("type", QuestionEntry::TYPE_ANSWER)->with("user")->withCount("votes")->get(),
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
