<?php

namespace App\Livewire\Components\Tweets;

use App\Models\Comment;
use Livewire\Component;

class CommentSection extends Component
{
    public $tweet;
    public $commentBody;

    protected $rules = [
        'commentBody' => 'required|max:255',
    ];

    public function postComment()
    {
        $this->validate();

        Comment::create([
            'tweet_id' => $this->tweet->id,
            'user_id' => auth()->id(),
            'body' => $this->commentBody,
        ]);

        $this->commentBody = ''; 
    }

    public function render()
    {
        return view('livewire.components.tweets.comment-section', [
            'comments' => $this->tweet->comments()->latest()->get(),
        ]);
    }
}
