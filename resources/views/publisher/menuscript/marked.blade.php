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
                    <th style="text-align: center" width="5%">ID</th>
                    <th style="text-align: center" width="25%">Paper</th>
                    <th style="text-align: center" width="15%">Total Reviewer</th>
                    <th style="text-align: center" width="15%">Mark <small>(%)</small> </th>
                    <th style="text-align: center" width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menuscripts as $menuscript)
                @php
                $total_reviewer = $menuscript->rev_menus->count();
                $total_mark = $total_reviewer*100;   
                $total_checked = $menuscript->rev_menus->where('status', '!=', 0)->count();
                @endphp

                @if($total_reviewer == $total_checked)
                <tr>
                    <td>{{ $menuscript->id}}</td>
                    <td><a href="{{ route('menuscript.download', $menuscript->paper) }}">{{ $menuscript->paper }}</a>
                    </td>
                    <td>{{ $total_reviewer }}</td>
                    @php
                        $total_mark_get = $menuscript->rev_menus->sum('mark');
                        $total_in_percentage = ($total_mark_get/$total_mark)*100;
                    @endphp
                    <td>{{ $total_in_percentage }}</td>
                    <td style="text-align: center">
                        <a title="publish" href="{{ route('publisher.publish.menuscript', $menuscript->id) }}" 
                            class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                        <a title="reject" href="{{ route('publisher.reject.menuscript', $menuscript->id) }}" 
                            class="btn btn-sm btn-warning"><i class="fa fa-ban"></i></a>
    
                            
                    </td>
                    
                </tr>
                @endif

                @php
                $total_reviewer = 0;
                $total_mark_get = 0;
                $total_in_percentage = 0;
                $total_checked = 0;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
