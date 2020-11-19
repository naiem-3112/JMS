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
        <span>Assigned Menuscripts</span>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="dt-table" class="table table-bordered table-striped custom-table">
            <thead>
                <tr>
                    <th style="text-align: center"  width="5%">ID</th>
                    <th style="text-align: center"  width="15%">Title</th>
                    <th style="text-align: center"  width="15%">Email</th>
                    <th style="text-align: center"  width="15%">Summery</th>
                    <th style="text-align: center"  width="25%">Paper</th>
                    <th style="text-align: center"  width="10%">Status</th>
                    <th style="text-align: center" width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($rev_menus)
                @foreach($rev_menus as $rev_menu)
                <tr>
                    <th>{{ $rev_menu->menuscript->id }}</th>
                    <td>{{ $rev_menu->menuscript->title }}</td>
                    <td style="text-align: center">{{ $rev_menu->menuscript->email }}</td>
                    <td>{{ $rev_menu->menuscript->summery }}</td>
                    <td><a target="_blank" href="{{ route('menuscript.download', $rev_menu->menuscript->paper) }}">{{ $rev_menu->menuscript->paper }}</a>
                    </td>
                    <td style="text-align: center">
                        @if($rev_menu->status == 0) <span class="badge badge-warning">Unchecked</span>@else
                        <span class="badge badge-danger">Reject</span> @endif
                    </td>
                    <td style="text-align: center">
                        {{-- <a href="{{ route('mark-approve.menuscript', $menuscript->id) }}" class="btn btn-sm btn-success"
                            title="approve" onclick="alert('Are you sure to approve!')"><i class="fa fa-check"></i></a> --}}
                            
                        <a title="Give Feedback" href="{{ route('reviewer.feedback-form', $rev_menu->id) }}" class="btn btn-sm btn-info"
                            title="assign"><i class="fa fa-paper-plane"></i></a>

                        {{-- <form action="{{ route('delete.user', $menuscript->id) }}" method="post"
                            style="display: inline-block">
                            @method('DELETE')
                            @csrf
                            <button onclick="alert('Are You Sure to DELETE!')" class="btn btn-sm btn-danger"><i
                                    class="fas fa-trash"></i></button>
                        </form> --}}
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
        {{ $rev_menus->links()}}
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