<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use Livewire\Component;
use Livewire\WithPagination;

class BillPage extends Component
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

    public function getBill()
    {
        $bill = Bill::when($this->search, fn ($query) => $query->whereRelation('nobar', 'name', 'LIKE', '%'.$this->search.'%'))
        ->orderByDesc('id')
        ->paginate(15);

        return $bill;
    }

    public function render()
    {
        return view('livewire.bill-page',
            [
                'bills' => $this->getBill(),
            ],
        )->extends('layout.master')->section('content');
    }
}
