<div>
    <h1>Location</h1>
    <div class="card">
        <div class="card-body {{ $formMode ? 'd-block' : 'd-none' }}">
            <div class="d-flex justify-content-between">
                <div class="card-title">Form {{ $location ? 'Edit' : '' }} Location</div>

            </div>
            <form wire:submit.prevent="{{ $location ? 'updateForm' : 'submitForm' }}" class="form">
                @if ($errors->any())
                    <div class="alert alert-danger p-2">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif

                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <input type="text" name="alamat" id="alamat" class="form-control invalid-label"
                        wire:model="alamat" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="rt" class="form-label">RT <span class="text-danger">*</span></label>
                    <input type="number" name="rt" id="rt" class="form-control invalid-label"
                        wire:model="rt" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="rw" class="form-label">RW <span class="text-danger">*</span></label>
                    <input type="number" name="rw" id="rw" class="form-control invalid-label"
                        wire:model="rw" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="kelurahan" class="form-label">Kelurahan <span class="text-danger">*</span></label>
                    <input type="text" name="kelurahan" id="kelurahan" class="form-control invalid-label"
                        wire:model="kelurahan" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                    <input type="text" name="kecamatan" id="kecamatan" class="form-control invalid-label"
                        wire:model="kecamatan" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="provinsi" class="form-label">Provinsi <span class="text-danger">*</span></label>
                    <input type="text" name="provinsi" id="provinsi" class="form-control invalid-label"
                        wire:model="provinsi" maxlength="255">
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
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($locations as $location)
                            <tr>
                                <td>{{ $location->id }}</td>
                                <td>{{ $location->alamat }}</td>
                                <td>{{ $location->rt }}</td>
                                <td>{{ $location->rw }}</td>
                                <td>{{ $location->kelurahan }}</td>
                                <td>{{ $location->kecamatan }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $location }})">Edit</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Location found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center p-2">
                    {{ $locations->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
