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
                    <th style="text-align: center" width="25%">Paper</th>
                    <th style="text-align: center" width="15%">Total Reviewer</th>
                    <th style="text-align: center" width="15%">Grade </th>
                    <th style="text-align: center" width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menuscripts as $menuscript)
                
                @php
                $total_reviewer = $menuscript->rev_menus->count();
                $total_checked = $menuscript->rev_menus->where('status', '!=', 0)->count();
                @endphp

                @if($total_reviewer == $total_checked)
                <tr>
                    <td>{{ $menuscript->id}}</td>
                    <td><a target="_blank" href="{{ route('menuscript.download', $menuscript->paper) }}">{{ $menuscript->paper }}</a>
                    </td>
                    <td>{{ $total_reviewer }}</td>
                    @php
                    $totalPerReviewer =0;
                        foreach($menuscript->rev_menus as $revmenu){
                            $qus1 = $revmenu->qus1;
                            $qus2 = $revmenu->qus2;
                            $qus3 = $revmenu->qus3;
                            $qus4 = $revmenu->qus4;
                            $qus5 = $revmenu->qus5;

                           $totalPerReviewer += $qus1+$qus2+$qus3+$qus4+$qus5;
                        }
                        $avgMarkPerReviewer = $totalPerReviewer/$total_reviewer;
                        $totalAvgMark = $avgMarkPerReviewer/5;
                        //$total_mark_get = $menuscript->rev_menus->sum('mark');
                        //$total_in_percentage = ($total_mark_get/$total_mark)*100;
                    @endphp
                    <td>
                        @if($totalAvgMark == 5) Excelent 
                        @elseif($totalAvgMark >= 4 && $totalAvgMark < 5 ) Good
                        @elseif($totalAvgMark >= 3 && $totalAvgMark < 4 ) Average
                        @elseif($totalAvgMark < 3 ) Below Average
                        @endif
                        
                    </td>
                    <td style="text-align: center">
                        <a title="publish" href="{{ route('publisher.publish.menuscript', $menuscript->id) }}" 
                            class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                        <a title="reject" href="{{ route('publisher.reject.menuscript', $menuscript->id) }}" 
                            class="btn btn-sm btn-warning"><i class="fa fa-ban"></i></a>
                            <a title="detail" href="{{ route('publisher.markDetail.menuscript', $menuscript->id) }}" 
                                class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
    
                            
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
@push('base.js')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $('#dt-table').DataTable();
</script>
    
@endpush