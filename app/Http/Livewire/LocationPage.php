<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;

class LocationPage extends Component
{
    use WithPagination;

    public $search = '';

    public $page = 1;

    public $statuses = [];

    public $formMode = false;

    public $alamat;

    public $rt;

    public $rw;

    public $kecamatan;

    public $kelurahan;

    public $provinsi;

    public $location;

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
        $this->validate([
            'alamat' => 'required',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'provinsi' => 'required',
        ]);

        $data = [
            'alamat' => $this->alamat,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'kelurahan' => $this->kelurahan,
            'kecamatan' => $this->kecamatan,
            'provinsi' => $this->provinsi,
        ];

        Location::create($data);
        $this->formMode = false;
    }

    public function cancel()
    {
        return redirect()->route('location.index');
    }

    public function updateForm()
    {
        $this->validate([
            'alamat' => 'required',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'provinsi' => 'required',
        ]);

        $data = [
            'alamat' => $this->alamat,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'kelurahan' => $this->kelurahan,
            'kecamatan' => $this->kecamatan,
            'provinsi' => $this->provinsi,
        ];

        $this->location->update($data);
        $this->formMode = false;
    }

    public function edit(Location $location)
    {
        $this->location = $location;
        $this->alamat = $location->alamat;
        $this->rt = $location->rt;
        $this->rw = $location->rw;
        $this->kelurahan = $location->kelurahan;
        $this->kecamatan = $location->kecamatan;

        $this->formMode = true;
    }

    public function toggleForm()
    {
        $this->formMode = ! $this->formMode;
        $this->location = null;
        $this->alamat = '';
        $this->rt = null;
        $this->rw = null;
        $this->kelurahan = '';
        $this->kecamatan = '';

    }

    public function getLocation()
    {
        return Location::paginate(15);
    }

    public function render()
    {
        return view('livewire.location-page',
            [
                'locations' => $this->getLocation(),
            ],
        )->extends('layout.master')->section('content');
    }
}
