<?php

namespace App\Http\Livewire;

use App\Models\Location;
use App\Models\QuickCount;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class QuickCountPage extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';

    public $page = 1;

    public $statuses = [];

    public $formMode = false;

    public $count;

    public $location_id;

    public $qty;

    public $image;

    public $image_file;

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
            'location_id' => 'required',
            'qty' => 'required',
            'image_file' => 'required|image|max:1024',
        ]);

        $path = $this->image_file->getClientOriginalName();
        $this->image_file->storeAs('public/', $path);

        $data = [
            'created_by' => auth()->user()->id,
            'location_id' => $this->location_id,
            'qty' => $this->qty,
            'image' => $path,
        ];

        QuickCount::create($data);
        $this->formMode = false;
    }

    public function cancel()
    {
        return redirect()->route('location.index');
    }

    public function updateForm()
    {
        $this->validate([
            'location_id' => 'required',
            'qty' => 'required',
            'image_file' => 'nullable|image|max:1024',
        ]);

        $path = $this->image_file == '' ? $this->image : $this->image_file->store('images');

        $data = [
            'created_by' => auth()->user()->id,
            'location_id' => $this->location_id,
            'qty' => $this->qty,
            'image' => $path,
        ];

        $this->count->update($data);
        $this->formMode = false;
    }

    public function edit(QuickCount $count)
    {
        $this->count = $count;
        $this->location_id = $count->location_id;
        $this->image = $count->image;
        $this->qty = $count->qty;

        $this->formMode = true;
    }

    public function toggleForm()
    {
        $this->formMode = ! $this->formMode;
        $this->count = null;
        $this->image = null;
        $this->image_file = null;
        $this->qty = null;
        $this->location_id = null;
    }

    public function getCount()
    {
        return QuickCount::with('location')->paginate(15);
    }

    public function render()
    {
        return view('livewire.quick-count-page',
            [
                'quickCounts' => $this->getCount(),
                'locations' => Location::all(),
            ],
        )->extends('layout.master')->section('content');
    }
}
