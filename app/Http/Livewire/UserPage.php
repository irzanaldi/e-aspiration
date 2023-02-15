<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserPage extends Component
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

    public function getUser()
    {
        $user = User::when($this->search, fn ($query) => $query->where('product_name', 'LIKE', '%' . $this->search . '%')
        ->orWhere('no_telp', 'LIKE', '%' . $this->search . '%'))
        ->orderByDesc('id')
        ->paginate(15);

        return $user;
    }

    public function render()
    {
        return view('livewire.user-page',
        [
            'users' => $this->getUser(),
        ],
        )->extends('layout.master')->section('content');
    }
}
