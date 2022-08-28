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
                    <span>تعديل الامتحان</span>
                </div>
                <div class="main_exam_info">
                    @include('components.Admin.examForm', ['exam' => $exam])
                </div>
                <div class="add_questions" style="margin-bottom: 20px">
                    <div class="row">
                        <div class="col-12">
                            <p class="main_title">الاسئلة <span id="que_counter">(2)</span></p>
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
                                            @foreach ($exam->dynamicQuestions as  $index => $dynamicQuestion)
                                            @php
                                                $i = $index + 1;
                                            @endphp
                                                {{-- ////////////// بدل الi ضيف counter /////////////////// --}}
                                                <div class="col-12">
                                                    {{-- \App\Models\DynamicQuestion::where(['question_id'=>$question->id,'exam_id'=>$exam->id])->first()->id --}}
                                                    <div class="question-box" data-id="{{$dynamicQuestion->id}}">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="question_title">
                                                                <span class="que_namber">السؤال <span
                                                                        class="title_num">{{ $i }}</span>
                                                                    :</span>
                                                                <span class="que_title">
                                                                    {{-- ////////////// هنا مكان الجزئيه الدراسية للسؤال /////////////////// --}}
                                                                    اختر الجزئية الدراسية
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
                                                                            <p>هل انت متأكد من انك تريد مسح هذا السؤال ؟</p>
                                                                            <section class="d-flex justify-content-center">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-lg"
                                                                                    id="del_{{ $i }}">مسح</button>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary btn-lg"id="cancel_{{ $i }}">الغاء</button>
                                                                            </section>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                                <div class="question-details"style="display: none;">
                                                                    <label for="formGroupExampleInput"
                                                                        class="form-label input_label"
                                                                        style="margin:0;">الجزئية
                                                                        الدراسية للسؤال :</label>
                                                                    <select
                                                                        class="form-select form-select-lg search-select-box select_part dynamicQuestion"
                                                                        name="part_{{ $i }}"
                                                                        id="formGroupExampleInput" data-live-search="true">
                                                                        <option value="اختر الجزئية التعليمية" selected>
                                                                            اختر الجزئية التعليمية
                                                                        </option>
                                                                        @foreach (\App\Models\Part::where(['user_id' => $exam->publisher->id, 'grade_id' => $exam->grade->id, 'subject_id' => $exam->subject->id])->get() as $part)
                                                                            <option @selected($part->id == $dynamicQuestion->part_id) value="{{ $part->id }}">
                                                                                {{ $part->name }}
                                                                            </option>
                                                                        @endforeach
                                                                        {{-- <option value="الصف الثاني الثانوي">
                                                                        الصف الثاني الثانوي
                                                                    </option>
                                                                    <option value="الصف الثالث الثانوي">
                                                                        الصف الثالث الثانوي
                                                                    </option> --}}
                                                                    </select>
                                                                    <label for="formGroupExampleInput"
                                                                        style="margin-top: 10px;"
                                                                        class="form-label input_label">عدد الأسئلة:
                                                                    </label>
                                                                    <input type="number" name='count_{{ $i }}'
                                                                        value="{{ old("count_$i") ?? $dynamicQuestion->count }}"
                                                                        class="form-control-lg form-control countInput"
                                                                        id="formGroupExampleInput"
                                                                        placeholder="ادخل عدد الأسئلة"
                                                                        style="font-size: 15px">
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
                                        @else
                                            @foreach ($exam->questions as $index => $question)
                                                @php
                                                    $i = $index + 1;
                                                @endphp
                                                <div class="col-12">
                                                    <div class="question-box" data-id="{{\App\Models\ExamQuestion::where(['question_id'=>$question->id,'exam_id'=>$exam->id])->first()->id}}">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="question_title">
                                                                <span class="que_namber">السؤال <span
                                                                        class="title_num">{{ $i }}</span>
                                                                    :</span>
                                                                <span class="que_title">
                                                                    اختر السؤال
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
                                                                            <p>هل انت متأكد من انك تريد
                                                                                مسح هذا السؤال ؟</p>
                                                                            <section class="d-flex justify-content-center">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-lg"
                                                                                    id="del_{{ $i }}">مسح</button>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary btn-lg"id="cancel_{{ $i }}">الغاء</button>
                                                                            </section>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                                <div class="question-details"style="display: none;">
                                                                    {{-- <label for="formGroupExampleInput"
                                                                        class="form-label input_label"
                                                                        style="margin:0;">الجزئية
                                                                        الدراسية للسؤال :</label>
                                                                    <select
                                                                        class="form-select form-select-lg search-select-box select_part"
                                                                        name="part_{{ $i }}"
                                                                        id="formGroupExampleInput"
                                                                        data-live-search="true">
                                                                        <option value="اختر الجزئية التعليمية">
                                                                            اختر الجزئية التعليمية
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
                                                                        style="margin:0;">اختر
                                                                        السؤال :</label>
                                                                    <select
                                                                        class="form-select form-select-lg search-select-box staticQuestion"
                                                                        name="question_{{ $i }}"
                                                                        id="formGroupExampleInput"
                                                                        data-live-search="true">
                                                                        <option value="" selected>
                                                                            اختر السؤال
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
                                        <span>اضافة سؤال</span>
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
    {{-- <!-- موجود هنا والايديت  --> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    {{-- <!-- main js file --> --}}
    {{-- <!-- موجود في كل الصفحات  --> --}}

    {{-- Duration picker --}}
    {{-- الصفحة دي بس --}}
    <script src="https://cdn.jsdelivr.net/npm/html-duration-picker@latest/dist/html-duration-picker.min.js"></script>
    <style>
        .scroll-btn {
            visibility: hidden;
        }
    </style>
    {{-- <!-- Latest compiled and minified JavaScript --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    {{-- <!-- bootstrap 5  --> --}}
    {{-- <!-- موجود في كل الصفحات  --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/add-exam.js') }}"></script>
@endsection
