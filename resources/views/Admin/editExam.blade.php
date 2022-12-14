@extends('layouts.adminLayout')
{{-- ////////////////////////////////////////////////////////// --}}
{{-- ///////////////////////// Css /////////////////////////// --}}
{{-- //////////////////////////////////////////////////////// --}}
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/add_exam.css') }}" />
    <script>
        parts = [
            @foreach (\App\Models\Part::where(['user_id' => $exam->publisher->id, 'grade_id' => $exam->grade->id, 'subject_id' => $exam->subject->id])->get() as $part)
                ['{{ $part->id }}', '{{ $part->name }}'],
            @endforeach
        ];
        questions = [
            @if (!$exam->dynamic)
                @foreach (\App\Models\Question::where(['user_id' => $exam->publisher->id, 'grade_id' => $exam->grade->id, 'subject_id' => $exam->subject->id])->get() as $question)
                    ['{{ $question->id }}', '{{ $question->name }}'],
                @endforeach
            @endif
        ]
    </script>
@endsection
{{-- ////////////////////////////////////////////////////////////////////// --}}
{{-- ///////////////////////// Main ////////////////////////////////////// --}}
{{-- //////////////////////////////////////////////////////////////////// --}}
@section('content')
    <div class="parent" style="width: 100%;">
        <div class="bg_addExam"></div>
        <div class="d-flex justify-content-center main_div">
            <div style="width: 90%;">
                <div class="d-flex justify-content-start align-items-center page_title">
                    <i class="fa-solid fa-clipboard-question"></i>
                    <span>?????????? ????????????????</span>
                </div>
                <div class="main_exam_info">
                    @include('components.admin.examForm', ['exam' => $exam])
                </div>
                <div class="add_questions" style="margin-bottom: 20px">
                    <div class="row">
                        <div class="col-12">
                            <p class="main_title">?????????????? <span id="que_counter">(2)</span></p>
                            <div class="blue_line"></div>
                        </div>
                        <div class="col-12"style="margin-bottom: 20px">
                            <div class="container">
                                <div class="row questions" style="width: 100%">
                                    <section class="Que-boxs">
                                        {{-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                                        {{-- ///////////////////////////////////////////////////// Questions Loop //////////////////////////////////////////////////////////////////// --}}
                                        {{-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                                        @if ($exam->dynamic)
                                            @foreach ($exam->dynamicQuestions as $index => $dynamicQuestion)
                                                @php
                                                    $i = $index + 1;
                                                @endphp
                                                {{-- ////////////// ?????? ????i ?????? counter /////////////////// --}}
                                                <div class="col-12">
                                                    {{-- \App\Models\DynamicQuestion::where(['question_id'=>$question->id,'exam_id'=>$exam->id])->first()->id --}}
                                                    <div class="question-box" data-id="{{ $dynamicQuestion->id }}">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="question_title">
                                                                <span class="que_namber">???????????? <span
                                                                        class="title_num">{{ $i }}</span>
                                                                    :</span>
                                                                <span class="que_title">
                                                                    {{-- ////////////// ?????? ???????? ?????????????? ???????????????? ???????????? /////////////////// --}}
                                                                    ???????? ?????????????? ????????????????
                                                                </span>
                                                            </div>
                                                            <div class="icons">
                                                                <i class="fa-solid fa-circle-xmark deleteBtn"
                                                                    style="margin-left: 15px;"></i>
                                                                <i
                                                                    class="fa-solid fa-chevron-down toggleBtn toggleNonActive"></i>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="container">
                                                                <div class="delete-warning" style="display: none">
                                                                    <div class="container d-flex justify-content-center">
                                                                        <section>
                                                                            <p>???? ?????? ?????????? ???? ?????? ???????? ?????? ?????? ???????????? ??</p>
                                                                            <section class="d-flex justify-content-center">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-lg"
                                                                                    id="del_{{ $i }}">??????</button>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary btn-lg"id="cancel_{{ $i }}">??????????</button>
                                                                            </section>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                                <div class="question-details"style="display: none;">
                                                                    <label for="formGroupExampleInput"
                                                                        class="form-label input_label"
                                                                        style="margin:0;">??????????????
                                                                        ???????????????? ???????????? :</label>
                                                                    <select
                                                                        class="form-select form-select-lg search-select-box select_part dynamicQuestion"
                                                                        name="part_{{ $i }}"
                                                                        id="formGroupExampleInput" data-live-search="true">
                                                                        <option value="???????? ?????????????? ??????????????????" selected>
                                                                            ???????? ?????????????? ??????????????????
                                                                        </option>
                                                                        @foreach (\App\Models\Part::where(['user_id' => $exam->publisher->id, 'grade_id' => $exam->grade->id, 'subject_id' => $exam->subject->id])->get() as $part)
                                                                            <option @selected($part->id == $dynamicQuestion->part_id)
                                                                                value="{{ $part->id }}">
                                                                                {{ $part->name }}
                                                                            </option>
                                                                        @endforeach
                                                                        {{-- <option value="???????? ???????????? ??????????????">
                                                                        ???????? ???????????? ??????????????
                                                                    </option>
                                                                    <option value="???????? ???????????? ??????????????">
                                                                        ???????? ???????????? ??????????????
                                                                    </option> --}}
                                                                    </select>
                                                                    <label for="formGroupExampleInput"
                                                                        style="margin-top: 10px;"
                                                                        class="form-label input_label">?????? ??????????????:
                                                                    </label>
                                                                    <input type="number" name='count_{{ $i }}'
                                                                        value="{{ old("count_$i") ?? $dynamicQuestion->count }}"
                                                                        class="form-control-lg form-control countInput"
                                                                        id="formGroupExampleInput"
                                                                        placeholder="???????? ?????? ??????????????"
                                                                        style="font-size: 15px">
                                                                    <input type="hidden"
                                                                        name="hardness_{{ $i }}"
                                                                        class="hidden_hardness"
                                                                        value="{{ $exam->exam_hardness }}">
                                                                    <button class="btn btn-secondary sendQuestionBtn"
                                                                        style="width: 100%;
    min-height: 35px;
    font-size: 15px;
    margin-top: 20px;
    background: #8b9bbd;">??????</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach ($exam->questions as $index => $question)
                                                @php
                                                    $i = $index + 1;
                                                @endphp
                                                <div class="col-12">
                                                    <div class="question-box"
                                                        data-id="{{ \App\Models\ExamQuestion::where(['question_id' => $question->id, 'exam_id' => $exam->id])->first()->id }}">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="question_title">
                                                                <span class="que_namber">???????????? <span
                                                                        class="title_num">{{ $i }}</span>
                                                                    :</span>
                                                                <span class="que_title">
                                                                    ???????? ????????????
                                                                </span>
                                                            </div>
                                                            <div class="icons">
                                                                <i class="fa-solid fa-circle-xmark deleteBtn"
                                                                    style="margin-left: 15px;"></i>
                                                                <i
                                                                    class="fa-solid fa-chevron-down toggleBtn toggleNonActive"></i>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="container">
                                                                <div class="delete-warning" style="display: none">
                                                                    <div class="container d-flex justify-content-center">
                                                                        <section>
                                                                            <p>???? ?????? ?????????? ???? ?????? ????????
                                                                                ?????? ?????? ???????????? ??</p>
                                                                            <section class="d-flex justify-content-center">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-lg"
                                                                                    id="del_{{ $i }}">??????</button>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary btn-lg"id="cancel_{{ $i }}">??????????</button>
                                                                            </section>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                                <div class="question-details"style="display: none;">
                                                                    {{-- <label for="formGroupExampleInput"
                                                                        class="form-label input_label"
                                                                        style="margin:0;">??????????????
                                                                        ???????????????? ???????????? :</label>
                                                                    <select
                                                                        class="form-select form-select-lg search-select-box select_part"
                                                                        name="part_{{ $i }}"
                                                                        id="formGroupExampleInput"
                                                                        data-live-search="true">
                                                                        <option value="???????? ?????????????? ??????????????????">
                                                                            ???????? ?????????????? ??????????????????
                                                                        </option>
                                                                        @foreach (\App\Models\Part::where(['user_id' => $exam->publisher->id, 'grade_id' => $exam->grade->id, 'subject_id' => $exam->subject->id])->get() as $part)
                                                                            <option @selected($question->part->id == $part->id)
                                                                                value="{{ $part->id }}">
                                                                                {{ $part->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select> --}}
                                                                    <label for="formGroupExampleInput"
                                                                        class="form-label input_label"
                                                                        style="margin:0;">????????
                                                                        ???????????? :</label>
                                                                    <select
                                                                        class="form-select form-select-lg search-select-box staticQuestion"
                                                                        name="question_{{ $i }}"
                                                                        id="formGroupExampleInput"
                                                                        data-live-search="true">
                                                                        <option value="" selected>
                                                                            ???????? ????????????
                                                                        </option>
                                                                        @foreach (\App\Models\Question::where(['user_id' => $exam->publisher->id, 'grade_id' => $exam->grade->id, 'subject_id' => $exam->subject->id])->get() as $questionOption)
                                                                            <option @selected($question->id == $questionOption->id)
                                                                                value="{{ $questionOption->id }}">
                                                                                {{ $questionOption->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="hidden"
                                                                        name="hardness_{{ $i }}"
                                                                        class="hidden_hardness"
                                                                        value="{{ $exam->exam_hardness }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        {{-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                                        {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                                    </section>
                                    <div class="col-12 add_question d-flex justify-content-center"
                                        style="cursor: pointer;">
                                        <i class="fa-solid fa-plus"></i>
                                        <span>?????????? ????????</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection




@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    {{-- <!-- text editor  --> --}}
    {{-- <!-- ?????????? ?????? ????????????????  --> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    {{-- <!-- main js file --> --}}
    {{-- <!-- ?????????? ???? ???? ??????????????  --> --}}

    {{-- Duration picker --}}
    {{-- ???????????? ???? ???? --}}
    <script src="https://cdn.jsdelivr.net/npm/html-duration-picker@latest/dist/html-duration-picker.min.js"></script>
    <style>
        .scroll-btn {
            visibility: hidden;
        }
    </style>
    {{-- <!-- Latest compiled and minified JavaScript --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    {{-- <!-- bootstrap 5  --> --}}
    {{-- <!-- ?????????? ???? ???? ??????????????  --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/add-exam.js') }}"></script>
@endsection
