@extends('layouts.back.back')
@push('base.css')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
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
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="dt-table" class="table table-bordered table-striped custom-table">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="15%">Title</th>
                    <th width="15%">Email</th>
                    <th width="15%">Summery</th>
                    <th width="25%">Paper</th>
                    <th width="10%">Status</th>
                    <th width="15%">Action</th>
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
                    <td><a
                        href="{{ route('menuscript.download', $menuscript->paper) }}">{{ $menuscript->paper }}</a>
                </td>

                    <td>
                        @if($menuscript->status == 1) <span class="badge badge-success">Approved</span>@else
                        <span class="badge badge-danger">Pending</span> @endif
                    </td>
                    <td>
                        <a href="{{ route('mark-approve.menuscript', $menuscript->id) }}"
                            class="btn btn-sm btn-success" title="approve"
                            onclick="alert('Are you sure to approve!')"><i class="fa fa-check"></i></a>
                        <a href="{{ route('mark-reject.menuscript', $menuscript->id) }}"
                            class="btn btn-sm btn-info" title="reject" onclick="alert('Are you sure to reject!')"><i
                                class="fas fa-times-circle"></i></a>

                        <form action="{{ route('delete.user', $menuscript->id) }}" method="post"
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
        {{ $menuscripts->links()}}
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
