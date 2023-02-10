<div>
    <h1>Admin</h1>
    <div class="card">
        <div class="card-body {{ $formMode ? 'd-block' : 'd-none' }}">
            <div class="d-flex justify-content-between">
                <div class="card-title">Form {{ $admin ? 'Edit' : '' }} Admin</div>

            </div>
            <form wire:submit.prevent="{{ $admin ? 'updateForm' : 'submitForm' }}" class="form">
                @if ($errors->any())
                    <div class="alert alert-danger p-2">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif

                <div class="form-group">
                    <label for="branch" class="form-label">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" id="username" class="form-control invalid-label"
                        wire:model="username" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" class="form-control invalid-label"
                        wire:model="password" maxlength="255">
                        <span class="text-danger">{{ $admin ? 'Must Reset The Password' : '' }}</span>
                </div>

                <div class="form-group">
                    <label for="rePassword" class="form-label">Re-Password <span class="text-danger">*</span></label>
                    <input type="password" name="rePassword" id="rePassword" class="form-control invalid-label"
                        wire:model="rePassword" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="no_telp" class="form-label">No Telp <span class="text-danger">*</span></label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control invalid-label"
                        wire:model="no_telp" maxlength="255">
                </div>

                <div class="form-group" wire:ignore>
                    <label for="status" class="form-label">Status</label>
                    <select id="status" class="form-control"
                    data-placeholder="Select Type" wire:model="status">
                        <option value="">Select Status Admin</option>
                        @foreach (App\Enums\AdminStatus::asSelectArray() as $status => $value)
                            <option value="{{ $status }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" wire:ignore>
                    <label for="level" class="form-label">Level</label>
                    <select id="level" class="form-control"
                    data-placeholder="Select Type" wire:model="level">
                        <option value="">Select Level Admin</option>
                        @foreach (App\Enums\AdminLevel::asSelectArray() as $level => $value)
                            <option value="{{ $level }}">{{ $value }}</option>
                        @endforeach
                    </select>
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
                        <th>Username</th>
                        <th>No Telp</th>
                        <th>Status</th>
                        <th>Level</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($admins as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->uuid }}</td>
                                <td>{{ $admin->username }}</td>
                                <td>{{ $admin->no_telp }}</td>
                                <td>{{ $admin->status->description }}</td>
                                <td>{{ $admin->level->description }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $admin }})">Edit</button>
                                        {{-- <a href="{{ route('stock-detail.index', ['stock'=>$stock]) }}" class="btn btn-sm btn-primary"> Detail </a> --}}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Admin found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center p-2">
                    {{ $admins->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
