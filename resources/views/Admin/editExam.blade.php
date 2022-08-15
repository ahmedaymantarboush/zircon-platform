@extends('layouts.adminLayout')
{{-- ////////////////////////////////////////////////////////// --}}
{{-- ///////////////////////// Css /////////////////////////// --}}
{{-- //////////////////////////////////////////////////////// --}}
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/add_exam.css') }}" />
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
                    <form action="" class="exam-form">
                        <div class="row">
                            <div class="col-12">
                                <p class="main_title">المعلومات الاساسية <span>4ds54f54</span></p>
                                <div class="blue_line"></div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="formGroupExampleInput" class="form-label input_label">:اسم الامتحان</label>
                                <input type="text" class="form-control-lg form-control" id="formGroupExampleInput"
                                    placeholder="ادخل اسم الامتحان" style="font-size: 15px;width: 90%;">
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="formGroupExampleInput" class="form-label input_label">: وقت بدأ الامتحان</label>
                                <input type="datetime-local" class="form-control-lg form-control" id="formGroupExampleInput"
                                    placeholder="ادخل اسم الامتحان" style="font-size: 15px;width: 90%;">
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="formGroupExampleInput" class="form-label input_label">: وقت انتهاء
                                    الامتحان</label>
                                <input type="datetime-local" class="form-control-lg form-control is-invalid"
                                    id="formGroupExampleInput" placeholder="ادخل اسم الامتحان"
                                    style="font-size: 15px;width: 90%;">
                                <div class="invalid-feedback" style="font-size: 13px;">
                                    كده نزعل من بعضتيشنا
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <label for="formGroupExampleInput" class="form-label input_label">: مادة الامتحان</label>
                                <select class="form-select form-select-lg" aria-label="Default select example"
                                    id="formGroupExampleInput" style="font-size: 15px;width: 90%;">
                                    <option selected>ادخل مادة الامتحان</option>
                                    <option value="1">كيمياء</option>
                                    <option value="2">فيزياء</option>
                                    <option value="3">برمجة عشان بحبها</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <label for="formGroupExampleInput" class="form-label input_label">مرحلة الامتحان:</label>
                                <select class="form-select form-select-lg" aria-label="Default select example"
                                    id="formGroupExampleInput" style="font-size: 15px;width: 90%;">
                                    <option selected>ادخل مرحلة الامتحان</option>
                                    <option value="1">الصف الاول الثانوي</option>
                                    <option value="2">الصف الثاني الثانوي</option>
                                    <option value="3">الصف الثالث الثانوي "استغفر الله"</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-12">
                                <label for="formGroupExampleInput" class="form-label input_label">نوع الامتحان:</label>
                                <select name="exam_type" class="form-select form-select-lg exam_type"
                                    aria-label="Default select example" id="formGroupExampleInput"
                                    style="font-size: 15px;width: 90%;" disabled>
                                    <option>ادخل نوع الامتحان</option>
                                    <option value="1">امتحان زيركون</option>
                                    <option value="0"selected>امتحان ثابت</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-12">
                                <label for="question_hardness" class="form-label input_label">درجة الصعوبة :</label>
                                <select name="question_hardness" class="form-select form-select-lg is-valid"
                                    aria-label="Default select example" id="question_hardness"
                                    style="font-size: 15px;width: 90%;">
                                    <option selected>ادخل درجة الصعوبة</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <div class="valid-feedback" style="font-size: 13px;">
                                    انت راجل صح الصح و كلامك صح الصح
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-12">
                                <label for="formGroupExampleInput" class="form-label input_label">وقت الامتحان :</label>
                                <input type="text" class="html-duration-picker form-control form-control-lg"
                                    id="formGroupExampleInput" placeholder="ادخل اسم الامتحان"
                                    style="font-size: 15px;width: 88%;">

                            </div>
                            <div class="col-11">
                                <label for="formGroupExampleInput" class="form-label input_label">وصف الامتحان :</label>
                                <textarea class="text-editor-div" id="formGroupExampleInput" style="width: 90%;min-height: 300px;"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="end-line"></div>
                                <button type="submit" class="sub_btn">تعديل</button>
                                <a href="#" class="a_btn">قائمة الامتحانات</a>
                            </div>
                        </div>
                    </form>
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
                                        @for ($i = 1; $i <= 2; $i++)
                                            {{-- ////////////// بدل الi ضيف counter /////////////////// --}}
                                            <div class="col-12">
                                                <div class="question-box">
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
                                                                    style="margin:0;">الجزئية الدراسية للسؤال :</label>
                                                                <select
                                                                    class="form-select form-select-lg search-select-box select_part"
                                                                    name="part_{{ $i }}"
                                                                    id="formGroupExampleInput" data-live-search="true">
                                                                    <option value="اختر الجزئية التعليمية" selected>
                                                                        اختر الجزئية التعليمية
                                                                    </option>
                                                                    <option value="الصف الأول الثانوي">
                                                                        الصف الأول الثانوي
                                                                    </option>
                                                                    <option value="الصف الثاني الثانوي">
                                                                        الصف الثاني الثانوي
                                                                    </option>
                                                                    <option value="الصف الثالث الثانوي">
                                                                        الصف الثالث الثانوي
                                                                    </option>
                                                                </select>
                                                                @if (1)
                                                                    <label for="formGroupExampleInput"
                                                                        class="form-label input_label"
                                                                        style="margin:0;">اختر السؤال :</label>
                                                                    <select
                                                                        class="form-select form-select-lg search-select-box "
                                                                        name="question_{{ $i }}"
                                                                        id="formGroupExampleInput"
                                                                        data-live-search="true">
                                                                        <option value="" selected>
                                                                            اختر السؤال
                                                                        </option>
                                                                        <option value="الصف الأول الثانوي">
                                                                            الصف الأول الثانوي
                                                                        </option>
                                                                        <option value="الصف الثاني الثانوي">
                                                                            الصف الثاني الثانوي
                                                                        </option>
                                                                        <option value="الصف الثالث الثانوي">
                                                                            الصف الثالث الثانوي
                                                                        </option>
                                                                    </select>
                                                                @endif
                                                                <input type="hidden" name="hardness_{{ $i }}"
                                                                    class="hidden_hardness" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                        {{-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                                        {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                                    </section>
                                    <div class="col-12 add_question d-flex justify-content-center">
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

    <!-- text editor  -->
    <!-- موجود هنا والايديت  -->
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
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- bootstrap 5  -->
    <!-- موجود في كل الصفحات  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/add-exam.js') }}"></script>
@endsection
