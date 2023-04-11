<?php

namespace App\Http\Controllers\Api;

use App\Models\Tags;
use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\DraftQuestion;
use App\Http\Controllers\Controller;
use App\Models\QuestionEntry;

class QuestionController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $user = $request->user;
        $draft = DraftQuestion::where('user_id', $user->id)->first();
        $tags = $this->tagStrToArrayOfId($draft->tags);

        $question = Question::create([
            'user_id' => $user->id,
            'title' => $draft->title,
            'public' => 1,
        ]);

        QuestionEntry::create([
            'user_id' => $question->user_id,
            'question_id' => $question->id,
            'content' => $draft->content,
            'type' => QuestionEntry::TYPE_QUESTION
        ]);

        // attact tags with question
        $question->tags()->attach($tags);

        // delete draft
        $draft->delete();

        return response()->json(['post_id' => $question->id]);
    }


    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    /*
        Save question draft
    */
    public function saveDraft(Request $request)
    {  
        $data = $request->all()['data'];

        $user = $request->user;
        $data['user_id'] = $user->id;


        // previous draft question
        $prevDraft = $user->draft()->first();


        if($prevDraft)
        {
            // update that draft
            $draft = DraftQuestion::find($prevDraft->id);

            $draft->update($data);
        }
        else
        {
            // create new draft
            DraftQuestion::create($data);
        }
    }

    public function deleteDraft(Request $request){
        $user = $request->user;
        $draft = $user->draft()->first();

        $draft->delete();
    }

    /**
     * Array of tags id from tags string separated by plus(+) | if not exists, create it
     * @param string $str
     * @return array
     */
    
    private function tagStrToArrayOfId($str)
    {
        $tagsNameArr = explode('+', $str);
        $tagsIds = [];

        foreach($tagsNameArr as $name)
        {
            $tag = Tags::where('name', $name)->firstOrCreate([
                'name' => $name
            ]);
            
            array_push($tagsIds, $tag->id);
        }

        return $tagsIds;
    }
}
