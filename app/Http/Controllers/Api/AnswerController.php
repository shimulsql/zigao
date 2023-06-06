<?php

namespace App\Http\Controllers\Api;

use App\Models\Vote;
use App\Models\Answer;
use App\Models\Question;
use App\Models\DraftAnswer;
use Illuminate\Http\Request;
use App\Models\QuestionEntry;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{

    private $vote;
    private $request;

    function __construct(Request $r)
    {
        $this->request = $r;
    }

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

        QuestionEntry::create([
            'user_id' => $userId,
            'question_id' => $questionId,
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

    public function vote(Request $request){
        $entry = QuestionEntry::find($request->id);
        $this->vote = $entry->hasVote($request->user->id);

        // has same type vote then delete the vote
        if($this->hasVoteSameType()){
            $this->vote->delete();

            return response()->json(['message' => 'Vote removed', 'removed' => true]);
        }

        // has different type vote then update it according to request
        if($this->hasVoteDiffType()){
            $this->updateVote();

            return response()->json(['message' => 'Vote updated']);
        }

        // create a new vote
        $entry->votes()->create([
            'user_id' => $request->user->id,
            'voteable_id' => $request->id,
            'voteable_type' => 'App\Models\QuestionEntry',
            'value' => $request->value,
        ]);

        return response()->json(['message' => 'Vote added']);
    }

    private function updateVote() {
        $this->vote->value = $this->request->value;
        $this->vote->save();
    }

    private function hasVoteSameType()
    {
        return $this->vote && $this->vote->value == $this->request->value;
    }

    private function hasVoteDiffType()
    {
        return $this->vote && $this->vote->value != $this->request->value;
    }

}
