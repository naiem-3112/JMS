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
        <span>Categories</span>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="dt-table" class="table table-bordered table-striped custom-table">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="15%">Name</th>
                    <th width="15%">Status</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($categories)
                @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    
                        {{--  <td><a
                        href="{{ route('admin.menuscript.download', $menuscript->paper) }}">{{ $menuscript->paper }}</a>
                        </td>  --}}

                    <td>
                        @if($category->status == 1) <span class="badge badge-success">Active</span>@else
                        <span class="badge badge-danger">Inactive</span> @endif
                    </td>
                    <td>
                        <a href="{{ route('menuscript.category.edit', $category->id) }}"
                            class="btn btn-sm btn-warning" title="edit"><i class="fa fa-edit"></i></a>
                        
                        <form action="{{ route('menuscript.category.delete', $category->id) }}" method="post" style="display: inline-block">
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
                    <td colspan="4" style="text-align: center; color: grey">No Category found</td>
                </tr>
                @endif

            </tbody>
        </table>
        {{ $categories->links()}}
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
