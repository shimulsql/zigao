<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionEntry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $title;
    public function home()
    {
        $title = "Homepage";
        $this->title = $title;

        if (Auth::check()) {
            return $this->home_auth();
        } else {
            return $this->home_guest();
        }
    }

    private function home_auth()
    {
        $questions = Question::where('public', 1)->with('tags')->withCount(['entries' => function(Builder $query){
            $query->where('type', QuestionEntry::TYPE_ANSWER);
        }])->get();
        
        return view('web.home', ['title' => $this->title, 'questions' => $questions]);
    }

    private function home_guest()
    {
        return view('web.home-guest', ['title' => $this->title]);
    }
}
