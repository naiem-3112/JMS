@extends('layouts.back.back')
@section('back.content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Brands List</h4>
                        <a href="#" class="btn btn-icon btn-left btn-primary"><i
                                class="fas fa-plus"></i> Add New</a>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th class="p-0 text-center">User Name</th>
                                    <th class="p-0 text-center">Email</th>
                                    <th class="p-0 text-center">User Type</th>
                                    <th class="p-0 text-center">Status</th>
                                    <th class="p-0 text-center">Action</th>
                                </tr>
                              
                                
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input" id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="p-0 text-center">{{ $brand->id }}</th>
                                    <td class="p-0 text-center">{{ $brand->name }}</td>
                                    <td class="p-0 text-center">{{ $brand->slug  }}</td>
                                    <td class="p-0 text-center">{{ $brand->description }}</td>
                                    <td class="p-0 text-center">
                                        <div style="margin: 0 auto; width: 60px; overflow: hidden">
                                            <img class="img-fluid" src="#"
                                                alt="catImg">
                                        </div>
                                    </td>
                                    <td class="p-0 text-center">
                                        @if($brand->status == 1) <span class="badge badge-success">Active</span>@else
                                        <span class="badge badge-danger">Inactive</span> @endif
                                    </td>
                                    <td class="p-0 text-center">
                                        <a class="btn btn-sm btn-warning btn-xs"
                                            href="{{ route('brand.edit', $brand->id) }}"><i
                                                class="fas fa-pen-square"></i></a>
                                        <form action="#" method="post"
                                            style="display: inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="alert('Are You Sure to DELETE!')"
                                                class="btn btn-sm btn-danger btn-xs"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7" style="text-align: center; color: grey">No brand found</td>
                                </tr>
                                @endif
                            </table>
                            {{ $brands->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection