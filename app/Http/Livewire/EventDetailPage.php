<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventDetailPage extends Component
{
    public function render()
    {
        return view('livewire.event-detail-page')->extends('layout.master2')->section('content');
    }
}
