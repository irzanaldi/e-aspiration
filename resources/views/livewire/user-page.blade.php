<div>
    <h1>User</h1>
    <div class="card">
            <div class="card-header d-flex justify-content-between ">
                <div class="w-25">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" class="form-control" wire:model.lazy="search"
                        placeholder="Press enter to search">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>#ID</th>
                        <th>Username</th>
                        <th>No Telp</th>
                        <th>Province</th>
                        <th>City</th>
                        <th>Status</th>
                        {{-- <th>Action</th> --}}
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->no_telp }}</td>
                                <td>{{ $user->province }}</td>
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->status->description }}</td>
                                {{-- <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('stock-detail.index', ['stock'=>$stock]) }}" class="btn btn-sm btn-primary"> Detail </a>
                                    </div>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No User found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center p-2">
                    {{ $users->withQueryString()->links() }}
                </div>
            </div>
    </div>
</div>
