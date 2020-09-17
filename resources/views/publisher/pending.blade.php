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
                           <span class="badge badge-warning">Pending</span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-success" title="view"><i class="fa fa-eye"></i></a>
                            
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