<div>
    <h1>Bill</h1>
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
                        <th>UUID</th>
                        <th>Nobar</th>
                        <th>User</th>
                        <th>Code</th>
                        <th>Status</th>
                        {{-- <th>Action</th> --}}
                    </thead>
                    <tbody>
                        @forelse ($bills as $bill)
                            <tr>
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->uuid }}</td>
                                <td>{{ $bill->nobar->name }}</td>
                                <td>{{ $bill->user->username }}</td>
                                <td>{{ $bill->code }}</td>
                                <td class="text-{{ $nobar->status == false ? 'danger' : 'success' }}">{{ $nobar->status == false ? 'Deactive' : 'Active'}}</td>
                                {{-- <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('stock-detail.index', ['stock'=>$stock]) }}" class="btn btn-sm btn-primary"> Detail </a>
                                    </div>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Bill found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center p-2">
                    {{ $bills->withQueryString()->links() }}
                </div>
            </div>
    </div>
</div>
