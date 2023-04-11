<?php

namespace App\Http\Controllers\Api;

use App\Models\Answer;
use App\Models\Question;
use App\Models\DraftAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $userId = $request->user->id;
        $questionId = $request->question_id;

        // get draft
        $draft = DraftAnswer::where([
            ['user_id', $userId],
            ['question_id', $questionId]
        ])->first();

        Answer::create([
            'user_id' => $draft->user_id,
            'question_id' => $draft->question_id,
            'content' => $draft->content,
        ]);

        // delete draft
        $draft->delete();

        return response()->json(['message' => 'Answer posted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    public function saveDraft(Request $request)
    {
        $user = $request->user;
        $question = Question::findOrFail($request->question_id);

        DraftAnswer::updateOrCreate(
            [
                'user_id' => $user->id,
                'question_id' => $question->id,
            ],
            [
                'content' => $request->content
            ]
        );

        return response()->json(['message' => 'Draft saved']);
    }
}
