<?php

namespace App\Livewire\Components\Tweets;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Tweet as TweetModel;
class TweetUser extends Component
{
    public TweetModel $tweet;
    public function render():View
    {
        return view('livewire.components.tweets.tweet-user');
    }
}
