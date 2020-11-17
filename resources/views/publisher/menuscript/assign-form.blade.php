@extends('layouts.back.back')
@section('back.content')
@push('base.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endpush
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Article Assign Form</h4>
                        <small><span style="color: red">*</span>Indicates Required Field</small>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12">
                            <form action="{{ route('publisher.assign.menuscript', $menuscript->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title of Manuscript</label>
                                        <input type="text" class="form-control" name="title" readonly value="{{ $menuscript->title }}">
                                        @error('title')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Manuscript Category</label>
                                        <input type="text" class="form-control" name="category" readonly value="{{ $menuscript->category->name }}">
                                        @error('category')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Reviewer <sup style="color: red">*</sup> </label>
                                        <select id="rev" class="form-control" multiple="multiple" name="reviewer_id[]">
                                            @foreach($reviewers as $reviewer)
                                            <option value="{{ $reviewer->id }}">{{ $reviewer->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('reviewer_id')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Note<small>(optional)</small></label>
                                        <textarea name="note" class="form-control" placeholder="Message to Reviewer"></textarea>
                                        @error('paper_file')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                    <div>
                                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                        <a href="#" class="btn btn-md btn-info">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('base.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $('#rev').select2({placeholder:"Choose Reviewers", allowClear: true, tags:true});
    </script>
@endpush