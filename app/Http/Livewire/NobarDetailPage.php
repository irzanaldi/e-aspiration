<?php

namespace App\Http\Livewire;

use App\Models\Nobar;
use Livewire\Component;

class NobarDetailPage extends Component
{
    public $nobar;

    public function mount(Nobar $nobar)
    {
        $this->nobar = $nobar;
    }

    public function render()
    {
        return view('livewire.nobar-detail-page',
            [
                'nobar' => $this->nobar,
            ],
        )->extends('layout.master')->section('content');
    }
}
