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
                @if($menuscripts)
                @foreach($menuscripts as $menuscript)
                <tr>
                    <th>{{ $menuscript->id }}</th>
                    <td>{{ $menuscript->title }}</td>
                    <td style="text-align: center">{{ $menuscript->email }}</td>
                    <td>{{ $menuscript->summery }}</td>
                    <td><a href="{{ route('menuscript.download', $menuscript->paper) }}">{{ $menuscript->paper }}</a>
                    </td>
                    <td style="text-align: center">
                        @if($menuscript->status == 1) <span class="badge badge-success">Approved</span>@else
                        <span class="badge badge-danger">Pending</span> @endif
                    </td>
                    <td style="text-align: center">
                        {{-- <a href="{{ route('mark-approve.menuscript', $menuscript->id) }}" class="btn btn-sm btn-success"
                            title="approve" onclick="alert('Are you sure to approve!')"><i class="fa fa-check"></i></a> --}}
                            
                        <a title="Share" href="{{ route('publisher.assign-form.menuscript', $menuscript->id) }}" class="btn btn-sm btn-info"
                            title="assign"><i class="fa fa-share-square"></i></a>

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
        {{ $menuscripts->links()}}
    </div>
</div>
@endsection
