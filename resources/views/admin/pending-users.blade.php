@extends('layouts.back.back')
@push('base.css')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@section('back.content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <table id="dt-table" class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($pending_users)
                    @foreach($pending_users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->user_type_id == 1) <span class="badge badge-success">Author</span>@else
                            <span class="badge badge-primary">Reader</span> @endif
                        </td>
                        <td>
                            @if($user->status == 1) <span class="badge badge-success">Active</span>@else
                            <span class="badge badge-danger">Inactive</span> @endif
                        </td>
                        <td>
                            <a href="{{ route('mark-approve.uesr', $user->id) }}" class="btn btn-sm btn-success" title="approve" onclick="alert('Are you sure to approve!')"><i class="fa fa-check"></i></a>
                            <a href="{{ route('mark-reject.users', $user->id) }}" class="btn btn-sm btn-info" title="reject" onclick="alert('Are you sure to reject!')"><i class="fas fa-times-circle"></i></a>
                        
                            <form action="{{ route('delete.user', $user->id) }}" method="post"
                                style="display: inline-block">
                                @method('DELETE')
                                @csrf
                                <button onclick="alert('Are You Sure to DELETE!')"
                                    class="btn btn-sm btn-danger"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7" style="text-align: center; color: grey">No brand found</td>
                    </tr>
                    @endif
                
                </tbody>
              </table>
              {{ $pending_users->links()}}
        </div>
    </div>
</div>
@endsection
@push('base.js')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $('#dt-table').DataTable();
</script>
    
@endpush