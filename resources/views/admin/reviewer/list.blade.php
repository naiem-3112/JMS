@extends('layouts.back.back')
@section('back.content')
<style>
    .custom-table {
        table-layout: fixed;
        width: 100%;
    }

</style>
<div class="card">
    <div class="card-header">
        <span>Pending Menuscripts</span>
        <a class="btn btn-info" href="{{ route('admin.make.team') }}">Make Team</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    
                    <th width="10%">ID</th>
                    <th width="20%">User Name</th>
                    <th width="20%">Email</th>
                    <th width="15%">User Type</th>
                    <th width="15%">Status</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($reviewers)
                @foreach($reviewers as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->user_type_id == 1) <span class="badge badge-success">Author</span>@else
                        <span class="badge badge-primary">Reviewer</span> @endif
                    </td>
                    <td>
                        @if($user->status == 1) <span class="badge badge-success">Active</span>@else
                        <span class="badge badge-danger">Inactive</span> @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.user.detail', $user->id) }}" class="btn btn-sm btn-success"
                            title="view"><i class="fa fa-eye"></i></a>

                        <form action="{{ route('admin.delete.user', $user->id) }}" method="post"
                            style="display: inline-block">
                            @method('DELETE')
                            @csrf
                            <button onclick="alert('Are You Sure to DELETE!')" class="btn btn-sm btn-danger"><i
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
        {{ $reviewers->links()}}
    </div>
</div>
@endsection
