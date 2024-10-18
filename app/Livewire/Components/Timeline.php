<?php

namespace App\Livewire\Components;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;


class Timeline extends Component
{
    public Collection $tweets;
    public  function mount():void
    {
        $this->tweets = Tweet::whereNull('parent_id')->latest()->get();
    }
    public function render():View   
    {
        return view('livewire.components.timeline');
    }
}
