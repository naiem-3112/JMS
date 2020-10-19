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
                    <th style="text-align: center" width="15%">Comment</th>
                    <th style="text-align: center" width="15%">Mark</th>
                    <th style="text-align: center" width="25%">Paper</th>
                    <th style="text-align: center" width="10%">Status</th>

                </tr>
            </thead>
            <tbody>
                @if($marked_menuscripts)
                @php
                $total = 0;
                $oldmenu = 0;
                @endphp
                @foreach($marked_menuscripts as $marked_menuscript)
                @php
                $oldmenu = $marked_menuscript->menuscript_id;
                @endphp
                <tr>
                    {{ $oldmenu}}
                </tr>
               
                <tr>
                    <th>{{ $marked_menuscript->menuscript_id }}</th>
                    <td>{{ $marked_menuscript->comment }}</td>
                    <td><a href="">paper</a></td>
                    <td><span class="badge badge-danger">Pending</span></td>
                
                    <td>{{ $marked_menuscript->mark }}</td>

                </tr>
                @php
                if($marked_menuscript->menuscript_id != $oldmenu){
                $total = $total += $marked_menuscript->mark;
                }else{
                    $total = 0;
                }
                @endphp
                <tr>
                    {{-- {{ $total}} --}}
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" style="text-align: center; color: grey">No brand found</td>
                </tr>
                @endif

            </tbody>
        </table>

    </div>
</div>
@endsection
