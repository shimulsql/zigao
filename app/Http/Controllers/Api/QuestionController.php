<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DraftQuestion;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /*
        Save question draft
    */
    public function saveDraft(Request $request)
    {  
        $data = $request->all()['data'];

        $user = User::where('token', $request->header('X-Token'))->first();
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
        $user = User::where('token', $request->header('X-Token'))->first();
        $draft = $user->draft()->first();

        $draft->delete();
    }
}
