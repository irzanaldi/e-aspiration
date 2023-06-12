<div>
    <h1>Quick Count</h1>
    <div class="card">
        <div class="card-body {{ $formMode ? 'd-block' : 'd-none' }}">
            <div class="d-flex justify-content-between">
                <div class="card-title">Form {{ $count ? 'Edit' : '' }} Quick Count</div>

            </div>
            <form wire:submit.prevent="{{ $count ? 'updateForm' : 'submitForm' }}" class="form" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert alert-danger p-2">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif

                <div class="form-group">
                    <label for="alamat" class="form-label">Location <span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Default select example" wire:model="location_id">
                        <option selected>Open this select menu</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->alamat }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="qty" class="form-label">Hasil Suara <span class="text-danger">*</span></label>
                    <input type="number" name="qty" id="qty" class="form-control invalid-label"
                        wire:model="qty" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="image_file" class="form-label">Foto Bukti <span class="text-danger">*</span></label>
                    <input type="file" name="image_file" id="image_file" class="form-control invalid-label"
                        wire:model="image_file" maxlength="255">
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" id="cancelBtn" class="btn btn-warning"
                        wire:click="cancel">Cancel</button>
                </div>
            </form>
        </div>
        <div class="{{ $formMode ? 'd-none' : 'd-block' }}">
            <img src="{{ asset('images/mxObMXCutZz8HtMJkb2P0fyKi0cth8XaloGCKL11.jpg') }}" alt="" title="">
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
                        <th>Suara</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($quickCounts as $count)
                            <tr>
                                <td>{{ $count->id }}</td>
                                <td>{{ $count->location->alamat }}</td>
                                <td>{{ $count->qty }}</td>
                                <td><img src="{{ asset($count->image) }}" class="img-thumbnail" alt="..."></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $count }})">Edit</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Count found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center p-2">
                    {{ $quickCounts->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
