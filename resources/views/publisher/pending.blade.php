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
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped custom-table">
            <thead>
                <tr>
                    <th class="text-center" width="5%">ID</th>
                    <th class="text-center" width="15%">Title</th>
                    <th class="text-center" width="15%">Email</th>
                    <th class="text-center" width="15%">Summery</th>
                    <th class="text-center" width="25%">Paper</th>
                    <th class="text-center" width="15%">Status</th>
                    <th class="text-center" width="10%">Action</th>
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
                        href="{{ route('admin.menuscript.download', $menuscript->paper) }}">{{ $menuscript->paper }}</a>
                </td>

                    <td>
                        <span class="badge badge-warning">Pending</span>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-success" title="view"><i class="fa fa-eye"></i></a>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" style="text-align: center; color: grey">No pending menuscript found</td>
                </tr>
                @endif

            </tbody>
        </table>
        {{ $menuscripts->links()}}
    </div>
</div>
@endsection
