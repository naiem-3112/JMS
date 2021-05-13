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
@if(auth()->user()->user_type_id == 0)

<div class="card">
    {{-- <div class="card-header">
        <span>Approved Users</span>
    </div> --}}
    <!-- /.card-header -->
    <div class="card-body">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$totalMenuscript->count()}}</h3>

                                <p>Total Menuscripts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$pendingMenuscript->count()}}</h3>

                                <p>Pending Menuscripts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$revisionMenuscript->count()}}</h3>

                                <p>Under Revision</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$publishedMenuscript->count()}}</h3>

                                <p>Published Menuscripts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->

                <!-- table row -->
                <table class="table">
                    <thead>
                        <P></P>
                        <a  target="_blank" class="btn btn-sm btn-primary" href=" {{route('admin.menuscript.pdf')}}">Download Pdf</a>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Paper</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($publishedMenuscript as $menuscript)
                        <tr>
                            <td>{{$menuscript->title}}</td>
                            <td>{{$menuscript->name}}</td>
                            <td>{{$menuscript->email}}</td>
                            <td><a target="_blank" href="{{ route('menuscript.download', $menuscript->paper) }}">{{ $menuscript->paper }}</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- table row -->
                <!-- Main row -->
        </section>
    </div>
</div>
@endif


@endsection
@push('base.js')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    {
        {
            --$('#dt-table').DataTable();
            --
        }
    }

</script>

@endpush
