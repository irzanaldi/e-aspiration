<?php

namespace App\Http\Livewire;

use App\Models\Tiket;
use Livewire\Component;
use Livewire\WithPagination;

class TicketPage extends Component
{
    use WithPagination;

    public $search = '';

    public $page = 1;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getTicket()
    {
        $ticket = Tiket::with('bill.nobar', 'bill.nobar.user')->when($this->search, fn ($query) => $query->whereRelation('bill.nobar', 'name', 'LIKE', '%'.$this->search.'%'))
        ->orderByDesc('id')
        ->paginate(15);

        return $ticket;
    }

    public function render()
    {
        return view('livewire.ticket-page',
            [
                'tickets' => $this->getTicket(),
            ],
        )->extends('layout.master')->section('content');
    }
}
