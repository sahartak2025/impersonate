<x-layout>
    <div class="container mt-2">
        <h1>Users List</h1>
        <table class="table table-striped mt-2">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#impersonateModal{{ $user->id }}">Impersonate</button>
                        <div class="modal fade" id="impersonateModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="impersonateModalLabel{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="impersonateModalLabel{{ $user->id }}">Impersonate {{ $user->name }}</h5>
                                    </div>
                                    <form action="{{ route('impersonate', $user->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="accessKey">Access Key</label>
                                                <input type="text" class="form-control" id="accessKey" name="accessKey" placeholder="Enter access key" required>
                                                @error('accessKey')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Impersonate</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
