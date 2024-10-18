<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Illuminate\View\View;
use Livewire\Component;

class Home extends Component
{
    #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.pages.home');
    }
}
