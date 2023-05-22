<?php

namespace App\View\Components\Front\Question;

use App\Models\Vote;
use Illuminate\View\Component;

class Entry extends Component
{
    public $entry;
    public $content = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($entry, $content = '')
    {
        $this->entry = $entry;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $initialData = json_encode(
            $this->initialData()
        );
        // dd($this->initialData());

        return view('components.front.question.entry', compact('initialData'));
    }

    private function initialData()
    {
        return [
            'voteCount' => $this->entry->votes_count,
            'hasVoteUp' => $this->hasVoteUp(),
            'hasVoteDown' => $this->hasVoteDown(),
        ];
    }

    private function vote()
    {
        $userId = @auth()->user()->id;

        if(!$userId) return false;

        $vote = Vote::where([['user_id', $userId], ['voteable_id', $this->entry->id], ['voteable_type', 'App\Models\QuestionEntry']])->first();

        return $vote;
    }

    private function hasVoteUp()
    {
        return $this->vote() && $this->vote()->vote == Vote::VOTE_UP;
    }

    private function hasVoteDown()
    {
        return $this->vote() && $this->vote()->vote == Vote::VOTE_DOWN;
    }
}
