<?php

namespace App\Http\Livewire\Sanef;

use Livewire\Component;

class NewAgent extends Component
{
    public function render()
    {
        return view('livewire.sanef.new-agent')
            ->layout("templates.sidebar-i.sidebar-one");
    }
}
