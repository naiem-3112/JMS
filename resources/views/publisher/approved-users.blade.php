@extends('layouts.back.back')
@section('back.content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered mt-4" id="joy"">
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
                    @if($approved_users)
                    @foreach($approved_users as $user)
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
                            <a href="{{ route('user.detail', $user->id) }}" class="btn btn-sm btn-success" title="view"><i class="fa fa-eye"></i></a>
                        
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
                <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
              </table>
              {{ $approved_users->links()}}
        </div>
    </div>
</div>

@endsection

