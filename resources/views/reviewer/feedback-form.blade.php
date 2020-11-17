@extends('layouts.back.back')
@section('back.content')
@section('base.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Menuscript Feedback Form</h4>
                        <small><span style="color: red">*</span>Indicates Required Field</small>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12">
                            <form action="{{ route('reviewer.feedback.store', $rev_menus->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title of Manuscript</label>
                                        <input type="text" class="form-control" name="title" readonly value="{{ $rev_menus->menuscript->title }}">
                                        <input type="hidden" class="form-control" name="menuscript_id" value="{{ $rev_menus->menuscript->id }}">
                                        @error('title')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   {{--  Quesations  --}}
                                <p style="font-size: 16px; margin-bottom: 0rem; margin-top: 1rem"><b>1. Technical quality of paper (Proposed method, results, comparison of result)</b></p>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="a"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Below Average</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Average</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Good</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Excellent</label>
                                </div>
                                

                                <p style="font-size: 16px; margin-bottom: 0rem; margin-top: 1rem"><b>2. Presentation quality of the paper (IEEE format, figures, tables)</b></p>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="a"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Below Average</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Average</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Good</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Excellent</label>
                                </div>

                                <p style="font-size: 16px; margin-bottom: 0rem; margin-top: 1rem"><b>3. Clarity (Quality of English, background, description of methodology, results and analysis)</b></p>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="a"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Below Average</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Average</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Good</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label">Excellent</label>
                                </div>
                                <p style="font-size: 16px; margin-bottom: 0rem; margin-top: 1rem"><b>4. Reference and literature survey (Reference , quality, publication year etc.)</b></p>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="a"
                                           name="">
                                    <label class="form-check-label">Below Average</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Average</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label">Good</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Excellent</label>
                                </div>

                                <p style="font-size: 16px; margin-bottom: 0rem; margin-top: 1rem"><b>Relevance of the paper with the publication track(s) [Title, Abstraction, Conclusion]</b></p>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="a"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Below Average</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Average</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Good</label>
                                </div>
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" class="form-check-input" id="option" value="b"
                                           name="">
                                    <label class="form-check-label" style="margin-right: 15px">Excellent</label>
                                </div>
                                <div style="margin-top: 10px" class="form-group">
                                    <label>Comment<small>(If any)</small></label>
                                    <input type="text" class="form-control" name="comment" placeholder="Give comment">
                                    @error('comment')
                                    <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br><br>
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
@section('base.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $('#rev').select2({placeholder:"Choose Reviewers", allowClear: true, tags:true});
    </script>
@endsection