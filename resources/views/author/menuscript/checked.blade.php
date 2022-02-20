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
                    <th style="text-align: center" width="5%">ID</th>
                    <th style="text-align: center" width="5%">Title</th>
                    <th style="text-align: center" width="25%">Paper</th>
                    <th style="text-align: center" width="15%">Status</th>
                    <th style="text-align: center" width="15%">Date</th>
                    <th style="text-align: center" width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menuscripts->where('author_id', Auth::id()) as $menuscript)
                <tr>
                    <td>{{ $menuscript->id}}</td>
                    <td>{{ $menuscript->title}}</td>
                    <td><a target="_blank" href="{{ route('menuscript.download', $menuscript->paper) }}">{{ $menuscript->paper }}</a>
                    </td>
                    <td style="text-align: center">
                        @if($menuscript->status == 3) <span class="badge badge-success">Published</span>@elseif($menuscript->status == 4)
                        <span class="badge badge-warning">Rejected</span> @endif
                    </td>
                    <td>{{ $menuscript->updated_at }}</td>
                    @if($menuscript->status == 4 && $menuscript->remark == 0)
                    <td style="text-align: center">
                        <a title="Resubmit" href="{{ route('author.resubmit.menuscript', $menuscript->id) }}" class="btn btn-sm btn-info"
                            title="assign"><i class="fa fa-arrow-alt-circle-right"></i></a>
                    </td>
                    @else
                    <td></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
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
