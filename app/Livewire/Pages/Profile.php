<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Profile extends Component
{
    public User $user;
    public function render():View
    {
        return view('livewire.pages.profile');
    }
}
