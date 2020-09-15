@extends('layouts.back.back')
@section('back.content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-striped mt-4">
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
                            @if($user->user_type_id == 1) <span class="badge badge-success">Publisher</span>@else
                            <span class="badge badge-danger">Reader</span> @endif
                        </td>
                        <td>
                            @if($user->status == 1) <span class="badge badge-success">Active</span>@else
                            <span class="badge badge-danger">Inactive</span> @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning btn-xs"
                                href="#"><i
                                    class="fas fa-pen-square"></i></a>
                            <form action="#" method="post"
                                style="display: inline-block">
                                @method('DELETE')
                                @csrf
                                <button onclick="alert('Are You Sure to DELETE!')"
                                    class="btn btn-sm btn-danger btn-xs"><i
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