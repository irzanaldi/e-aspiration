<?php

namespace App\Http\Livewire;

use App\Models\Nobar;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class NobarPage extends Component
{
    use WithPagination;

    public $search = '';

    public $formMode = false;

    public $uuid;

    public $name;

    public $city;

    public $price;

    public $description;

    public $location;

    public $gmaps_latitude;

    public $gmaps_longtitude;

    public $date;

    public $time;

    public $id_tmdb;

    public $admin_id;

    public $nobar;

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

    public function submitForm()
    {
        $this->uuid = Str::random(20);

        $this->validate([
            'uuid' => 'required|unique:nobars,uuid',
            'name' => 'required',
            'city' => 'required',
            'price' => 'required',
            'description' => 'required',
            'location' => 'required',
            'gmaps_latitude' => 'required',
            'gmaps_longtitude' => 'required',
            'date' => 'required',
            'time' => 'required',
            'id_tmdb' => 'required',
        ]);

        $data = [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'city' => $this->city,
            'price' => $this->price,
            'description' => $this->description,
            'location' => $this->location,
            'gmaps_latitude' => $this->gmaps_latitude,
            'gmaps_longtitude' => $this->gmaps_longtitude,
            'date' => $this->date,
            'time' => $this->time,
            'id_tmdb' => $this->id_tmdb,
            'admin_id' => auth()->user()->id,
        ];

        Nobar::create($data);
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
            'name' => 'required',
            'city' => 'required',
            'price' => 'required',
            'description' => 'required',
            'location' => 'required',
            'gmaps_latitude' => 'required',
            'gmaps_longtitude' => 'required',
            'date' => 'required',
            'time' => 'required',
            'id_tmdb' => 'required',
        ]);

        $data = [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'city' => $this->city,
            'price' => $this->price,
            'description' => $this->description,
            'location' => $this->location,
            'gmaps_latitude' => $this->gmaps_latitude,
            'gmaps_longtitude' => $this->gmaps_longtitude,
            'date' => $this->date,
            'time' => $this->time,
            'id_tmdb' => $this->id_tmdb,
            'admin_id' => auth()->user()->id,
        ];

        $this->nobar->update($data);
        $this->formMode = false;
    }

    public function edit(Nobar $nobar)
    {
        $this->nobar = $nobar;
        $this->name = $nobar->name;
        $this->city = $nobar->city;
        $this->price = $nobar->price;
        $this->description = $nobar->description;
        $this->location = $nobar->location;
        $this->gmaps_latitude = $nobar->gmaps_latitude;
        $this->gmaps_longtitude = $nobar->gmaps_longtitude;
        $this->date = $nobar->date;
        $this->time = $nobar->time;
        $this->id_tmdb = $nobar->id_tmdb;

        $this->formMode = true;
    }

    public function toggleForm()
    {
        $this->formMode = ! $this->formMode;
        $this->nobar = null;
        $this->name = null;
        $this->city = null;
        $this->price = null;
        $this->description = null;
        $this->location = null;
        $this->gmaps_latitude = null;
        $this->gmaps_longtitude = null;
        $this->date = null;
        $this->time = null;
        $this->id_tmdb = null;
    }

    public function getNobar()
    {
        $user = Nobar::when($this->search, fn ($query) => $query->where('name', 'LIKE', '%'.$this->search.'%'))
            ->orderByDesc('id')
            ->paginate(15);

        return $user;
    }

    public function render()
    {
        return view('livewire.nobar-page',
            [
                'nobars' => $this->getNobar(),
            ],
        )->extends('layout.master')->section('content');
    }
}
