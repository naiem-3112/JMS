@extends('layouts.back.back')
@section('back.content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Summery</th>
                        <th>Paper</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($menuscripts)
                    @foreach($menuscripts as $menuscript)
                    <tr>
                        <th>{{ $menuscript->id }}</th>
                        <td>{{ $menuscript->title }}</td>
                        <td>{{ $menuscript->email }}</td>
                        <td>{{ $menuscript->summery }}</td>
                        <td><a href="#">{{ $menuscript->paper }}</a></td>
                        
                        <td>
                            @if($menuscript->status == 1) <span class="badge badge-success">Approved</span>@else
                            <span class="badge badge-danger">Pending</span> @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.mark-approve.uesr', $menuscript->id) }}" class="btn btn-sm btn-warning" title="approve" onclick="alert('Are you sure to approve!')"><i class="fas fa-user-lock"></i></a>
                            <a href="{{ route('admin.mark-reject.users', $menuscript->id) }}" class="btn btn-sm btn-info" title="approve" onclick="alert('Are you sure to reject!')"><i class="fas fa-times-circle"></i></a>
                        
                            <form action="{{ route('admin.delete.user', $menuscript->id) }}" method="post"
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
              {{ $menuscripts->links()}}
        </div>
    </div>
</div>
@endsection