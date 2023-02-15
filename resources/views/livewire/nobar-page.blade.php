<div>
    <h1>Nobar</h1>
    <div class="card">
        <div class="card-body {{ $formMode ? 'd-block' : 'd-none' }}">
            <div class="d-flex justify-content-between">
                <div class="card-title">Form {{ $nobar ? 'Edit' : '' }} Nobar</div>

            </div>
            <form wire:submit.prevent="{{ $nobar ? 'updateForm' : 'submitForm' }}" class="form">
                @if ($errors->any())
                    <div class="alert alert-danger p-2">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif

                <div class="form-group">
                    <label for="branch" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control invalid-label"
                        wire:model="name" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="location" class="form-label">location <span class="text-danger">*</span></label>
                    <input type="text" name="location" id="location" class="form-control invalid-label"
                        wire:model="location" maxlength="255">

                </div>

                <div class="form-group">
                    <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                    <input type="text" name="city" id="city" class="form-control invalid-label"
                        wire:model="city" maxlength="255">

                </div>

                <div class="form-group">
                    <label for="price" class="form-label">price <span class="text-danger">*</span></label>
                    <input type="number" name="price" id="price" class="form-control invalid-label"
                        wire:model="price" maxlength="255">

                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" cols="100" rows="4" wire:model="description" class="form-control invalid-label"></textarea>

                </div>

                <div class="form-group">
                    <label for="id_tmdb" class="form-label">ID TMDB <span class="text-danger">*</span></label>
                    <input type="text" name="id_tmdb" id="id_tmdb" class="form-control invalid-label"
                        wire:model="id_tmdb" maxlength="255">

                </div>

                <div class="form-group">
                    <label for="gmaps_latitude" class="form-label">Gmaps Latitude <span class="text-danger">*</span></label>
                    <input type="text" name="gmaps_latitude" id="gmaps_latitude" class="form-control invalid-label"
                        wire:model="gmaps_latitude" maxlength="255">

                </div>

                <div class="form-group">
                    <label for="gmaps_longtitude" class="form-label">Gmaps Longtitude <span class="text-danger">*</span></label>
                    <input type="text" name="gmaps_longtitude" id="gmaps_longtitude" class="form-control invalid-label"
                        wire:model="gmaps_longtitude" maxlength="255">

                </div>

                <div class="form-group">
                    <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                    <input type="date" name="date" id="date" class="form-control invalid-label"
                        wire:model="date" maxlength="255">

                </div>

                <div class="form-group">
                    <label for="time" class="form-label">Time <span class="text-danger">*</span></label>
                    <input type="time" name="time" id="time" class="form-control invalid-label"
                        wire:model="time" maxlength="255">

                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" id="cancelBtn" class="btn btn-warning"
                        wire:click="cancel">Cancel</button>
                </div>
            </form>
        </div>
        <div class="{{ $formMode ? 'd-none' : 'd-block' }}">
            <div class="card-header d-flex justify-content-between ">
                <div class="w-25">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" class="form-control" wire:model.lazy="search"
                        placeholder="Press enter to search">
                </div>
                <div class="d-inline">
                    <button class="btn btn-primary" id="addBtn" wire:click="toggleForm">Create</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>#ID</th>
                        <th>UUID</th>
                        <th>name</th>
                        <th>City</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($nobars as $nobar)
                            <tr>
                                <td>{{ $nobar->id }}</td>
                                <td>{{ $nobar->uuid }}</td>
                                <td>{{ $nobar->name }}</td>
                                <td>{{ $nobar->city }}</td>
                                <td>{{ $nobar->location }}</td>
                                <td>{{ $nobar->date }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $nobar }})">Edit</button>
                                        <a href="{{ route('nobar.detail', ['nobar'=>$nobar]) }}" class="btn btn-sm btn-primary"> Detail </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Nobar found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center p-2">
                    {{ $nobars->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
