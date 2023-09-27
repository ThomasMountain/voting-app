<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class ListPolls extends Component
{
    public function render()
    {
        return view('livewire.list-polls', [
            'activePolls' => [
                (object)['id' => 1, 'date' => new Carbon('2023-09-27 00:00:00')],
            ],
        ]);
    }
}
