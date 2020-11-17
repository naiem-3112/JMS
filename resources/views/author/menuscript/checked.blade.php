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
                </tr>
            </thead>
            <tbody>
                @foreach($menuscripts as $menuscript)
                <tr>
                    <td>{{ $menuscript->id}}</td>
                    <td>{{ $menuscript->title}}</td>
                    <td><a href="{{ route('menuscript.download', $menuscript->paper) }}">{{ $menuscript->paper }}</a>
                    </td>
                    <td style="text-align: center">
                        @if($menuscript->status == 3) <span class="badge badge-success">Published</span>@elseif($menuscript->status == 4)
                        <span class="badge badge-warning">Rejected</span> @endif
                    </td>
                    <td>{{ $menuscript->updated_at }}</td>
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
