<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class AdminPage extends Component
{
    use WithPagination;

    public $search = '';

    public $page = 1;

    public $statuses = [];

    public $formMode = false;

    public $uuid;

    public $no_telp;

    public $username;

    public $password;

    public $rePassword;

    public $level;

    public $status;

    public $admin;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'statuses' => ['except' => []],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function submitForm()
    {
        $this->uuid = Str::random(20);

        $this->validate([
            'uuid' => 'required|unique:admins,uuid',
            'password' => 'required',
            'username' => 'required',
            'rePassword' => 'required|same:password',
            'no_telp' => 'required',
            'status' => 'required',
            'level' => 'required',
        ]);

        $data = [
            'uuid' => $this->uuid,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'no_telp' => $this->no_telp,
            'status' => $this->status,
            'level' => $this->level,
        ];

        Admin::create($data);
        $this->formMode = false;
    }

    public function cancel()
    {
        return redirect()->route('admin.index');
    }

    public function updateForm()
    {
        $this->validate([
            'uuid' => 'required|unique:admins,uuid',
            'password' => 'required',
            'username' => 'required',
            'rePassword' => 'required|same:password',
            'no_telp' => 'required',
            'status' => 'required',
            'level' => 'required',
        ]);

        $data = [
            'uuid' => $this->uuid,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'no_telp' => $this->no_telp,
            'status' => $this->status,
            'level' => $this->level,
        ];

        $this->admin->update($data);
        $this->formMode = false;
    }

    public function edit(Admin $admin)
    {
        $this->admin = $admin;
        $this->username = $admin->username;
        $this->status = $admin->status->value;
        $this->level = $admin->level->value;
        $this->no_telp = $admin->no_telp;

        $this->formMode = true;
    }

    public function toggleForm()
    {
        $this->formMode = !$this->formMode;
        $this->password = null;
        $this->rePassword = null;
        $this->username = '';
        $this->status = null;
        $this->level = null;
        $this->no_telp = '';
    }

    public function getAdmin()
    {
        return Admin::paginate(15);
    }

    public function render()
    {
        return view('livewire.admin-page',
        [
            'admins' => $this->getAdmin(),
        ],
        )->extends('layout.master')->section('content');
    }
}
