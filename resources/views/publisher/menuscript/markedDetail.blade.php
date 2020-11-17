@extends('layouts.back.back')
@section('back.content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Reviewer Marking Detail</h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12">
                            @foreach($menuscript->rev_menus as $revmenu)
                            <form action="#" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                            Reviewer Name: <p style="font-weight: bold; display: inline-block">{{ $revmenu->user->name }}</p>

                                   {{--  Quesations  --}}
                                <p style="font-size: 16px; margin-bottom: 0rem; margin-top: 1rem"><b>1. Technical quality of paper (Proposed method, results, comparison of result)</b></p>
                                @if($revmenu->qus1 == 2)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="2"
                                           name="qus1">
                                    <label class="form-check-label" style="margin-right: 15px">Below Average</label>
                                </div>
                                @endif

                                @if($revmenu->qus1 == 3)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="3"
                                           name="qus1">
                                    <label class="form-check-label" style="margin-right: 15px">Average</label>
                                </div>
                                @endif

                                @if($revmenu->qus1 == 4)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="4"
                                           name="qus1">
                                    <label class="form-check-label" style="margin-right: 15px">Good</label>
                                </div>
                                @endif

                                @if($revmenu->qus1 == 5)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="5"
                                           name="qus1">
                                    <label class="form-check-label" style="margin-right: 15px">Excellent</label>
                                </div>
                                @endif
                                

                                <p style="font-size: 16px; margin-bottom: 0rem; margin-top: 1rem"><b>2. Presentation quality of the paper (IEEE format, figures, tables)</b></p>
                                @if($revmenu->qus2 == 2)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="2"
                                           name="qus2">
                                    <label class="form-check-label" style="margin-right: 15px">Below Average</label>
                                </div>
                                @endif

                                @if($revmenu->qus2 == 3)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="3"
                                           name="qus2">
                                    <label class="form-check-label" style="margin-right: 15px">Average</label>
                                </div>
                                @endif

                                @if($revmenu->qus2 == 4)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="4"
                                           name="qus2">
                                    <label class="form-check-label" style="margin-right: 15px">Good</label>
                                </div>
                                @endif

                                @if($revmenu->qus2 == 5)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="5"
                                           name="qus2">
                                    <label class="form-check-label" style="margin-right: 15px">Excellent</label>
                                </div>
                                @endif

                                <p style="font-size: 16px; margin-bottom: 0rem; margin-top: 1rem"><b>3. Clarity (Quality of English, background, description of methodology, results and analysis)</b></p>
                                @if($revmenu->qus3 == 2)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="2"
                                           name="qus3">
                                    <label class="form-check-label" style="margin-right: 15px">Below Average</label>
                                </div>
                                @endif

                                @if($revmenu->qus3 == 3)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="3"
                                           name="qus3">
                                    <label class="form-check-label" style="margin-right: 15px">Average</label>
                                </div>
                                @endif

                                @if($revmenu->qus3 == 4)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="4"
                                           name="qus3">
                                    <label class="form-check-label" style="margin-right: 15px">Good</label>
                                </div>
                                @endif

                                @if($revmenu->qus3 == 5)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="5"
                                           name="qus3">
                                    <label class="form-check-label">Excellent</label>
                                </div>
                                @endif

                                <p style="font-size: 16px; margin-bottom: 0rem; margin-top: 1rem"><b>4. Reference and literature survey (Reference , quality, publication year etc.)</b></p>
                                
                                @if($revmenu->qus4 == 2)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="2"
                                           name="qus4">
                                    <label class="form-check-label">Below Average</label>
                                </div>
                                @endif

                                @if($revmenu->qus4 == 3)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="3"
                                           name="qus4">
                                    <label class="form-check-label" style="margin-right: 15px">Average</label>
                                </div>
                                @endif

                                @if($revmenu->qus4 == 4)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="4"
                                           name="qus4">
                                    <label class="form-check-label">Good</label>
                                </div>
                                @endif

                                @if($revmenu->qus4 == 5)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="5"
                                           name="qus4">
                                    <label class="form-check-label" style="margin-right: 15px">Excellent</label>
                                </div>
                                @endif


                                <p style="font-size: 16px; margin-bottom: 0rem; margin-top: 1rem"><b>Relevance of the paper with the publication track(s) [Title, Abstraction, Conclusion]</b></p>
                                
                                @if($revmenu->qus5 == 2)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="2"
                                           name="qus5">
                                    <label class="form-check-label" style="margin-right: 15px">Below Average</label>
                                </div>
                                @endif

                                @if($revmenu->qus5 == 3)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="3"
                                           name="qus5">
                                    <label class="form-check-label" style="margin-right: 15px">Average</label>
                                </div>
                                @endif

                                @if($revmenu->qus5 == 4)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="4"
                                           name="qus5">
                                    <label class="form-check-label" style="margin-right: 15px">Good</label>
                                </div>
                                @endif

                                @if($revmenu->qus5 == 5)
                                <div class="form-check" style="display: inline-block">
                                    <input type="radio" checked class="form-check-input" id="option" value="5"
                                           name="qus5">
                                    <label class="form-check-label" style="margin-right: 15px">Excellent</label>
                                </div>
                                @endif
                                <br><br>
                               
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection