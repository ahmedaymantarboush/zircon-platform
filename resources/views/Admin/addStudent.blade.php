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
    <!-- css file -->

    <link rel="stylesheet" href="{{ asset('admin/assets/css/add_exam.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/add-student.css') }}" />
@endsection
{{-- ////////////////////////////////////////////////////////////////////// --}}
{{-- ///////////////////////// Main ////////////////////////////////////// --}}
{{-- //////////////////////////////////////////////////////////////////// --}}
@section('content')
    <div class="parent" style="width: 100%;">
        <div class="bg_addExam"></div>
        <div class="d-flex justify-content-center main_div">
            <div style="width: 90%;">
                <div class="row">
                    <div class="col-lg-8 col-sm-12 order_2">
                        <div class="main_exam_info">
                            <form action="" class="exam-form">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="main_title">بيانات الطالب </p>
                                        <div class="blue_line"></div>
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">اسم الطالب :</label>
                                        <input name="stu_name" value="{{ old('stu_name') }}" type="text"
                                            class="@error('stu_name') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="ادخل اسم الطالب"
                                            style="font-size: 15px;width: 95%;">
                                        @error('stu_name')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label">المحافظة :</label>
                                        <select name="stu_gov" class=""@error('stu_name') is-invalid @enderror
                                            form-select form-select-lg search-select-box "
                                                id="formGroupExampleInput" data-live-search="true">
                                                <option value="">
                                                    اختر المحافظة
                                                </option>
                                                 @foreach (\App\Models\Governorate::all() as
                                            $governorate)
                                            <option @selected(old('governorate') == $governorate->id) value="{{ $governorate->id }}">
                                                {{ $governorate->name }}
                                            </option>
                                            @endforeach
                                            {{-- <option value="2">
                                                ليبيا
                                            </option>
                                            <option value="3">
                                                عين شمس
                                            </option> --}}
                                        </select>
                                        @error('stu_name')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label">مكان الحضور
                                            :</label>
                                        <select name="stu_place" class=""@error('stu_name') is-invalid @enderror
                                            form-select form-select-lg" aria-label="Default select example"
                                            id="formGroupExampleInput" style="font-size: 15px;width: 95%;">
                                            <option value=''>ادخل مكان حضور الطالب</option>
                                            @foreach (\App\Models\Center::all() as $center)
                                                <option @selected(old('stu_place') == $center->id) value="{{ $center->id }}">
                                                    {{ $center->name }}</option>
                                            @endforeach

                                            {{-- <option value="2">سنتر الاوائل</option>
                                            <option value="3">سنتر نوبل"</option> --}}
                                        </select>
                                        @error('stu_name')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label">مرحلة الطالب
                                            :</label>
                                        <select name="stu_grade" class=""@error('stu_name') is-invalid @enderror
                                            form-select form-select-lg" aria-label="Default select example"
                                            id="formGroupExampleInput" style="font-size: 15px;width: 95%;">
                                            <option selected>ادخل مرحلة الطالب</option>
                                            @foreach (\App\Models\Grade::all() as $grade)
                                                <option @selected(old('stu_grade') == $grade->id) value="{{ $grade->id }}">
                                                    {{ $grade->name }}</option>
                                            @endforeach
                                            {{-- <option value="2">الصف الثاني الثانوي</option>
                                            <option value="3">الصف الثالث الثانوي "استغفر الله"</option> --}}
                                        </select>
                                        @error('stu_name')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">رقم هاتف الطالب :</label>
                                        <input name="stu_number" type="number"
                                            class="@error('stu_name') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="ادخل رقم هاتف الطالب"
                                            style="font-size: 15px;width: 95%;">
                                        @error('stu_name')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">رقم هاتف ولي امر الطالب :</label>
                                        <input name="stu_parent_number" type="number"
                                            class="@error('stu_name') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="ادخل رقم هاتف ولي امر الطالب"
                                            style="font-size: 15px;width: 95%;">
                                        @error('stu_name')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">البريد الالكتروني للطالب :</label>
                                        <input name="stu_email" type="email"
                                            class="@error('stu_name') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="ادخل البريد الالكتروني للطالب"
                                            style="font-size: 15px;width: 95%;">
                                        @error('stu_name')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">كلمة مرور الطالب :</label>
                                        <input name="stu_password" type="text"
                                            class="@error('stu_name') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="ادخل كلمة مرور الطالب"
                                            style="font-size: 15px;width:95%;">
                                        @error('stu_name')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">كلمة مرور الطالب :</label>
                                        <input name="stu_password" type="text"
                                            class="@error('stu_name') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="أعد إدخال كلمة مرور الطالب"
                                            style="font-size: 15px;width:95%;">
                                        @error('stu_name')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label" style="margin-top: 40px">كود الطالب :</label>
                                        <input
                                            name="stu_code"
                                            type="text" class="@error('stu_name') is-invalid @enderror form-control-lg form-control" id="formGroupExampleInput"
                                            placeholder="ادخل كود الطالب" style="font-size: 15px;width: 95%;">
                                                                                @error('stu_name')
                                            <p class='invalid-feedback'>{{$message}}</p>
                                        @enderror</div> --}}

                                    <div class="col-12">
                                        <div class="end-line"></div>
                                        <button type="submit" class="sub_btn">اضافة</button>
                                        <a href="#" class="a_btn">قائمة الطلاب</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 order_1">
                        <div class="main_exam_info profileDetails ">
                            <div class="profileImg">
                                <img src="{{ asset('imgs/user.png') }}" alt="">
                            </div>
                            <div class="profileContent">
                                <div class="personalInformation">
                                    <h3 class='profileName stu_name'></h3>
                                    <span class='profileType'>طالب</span>
                                </div>

                                <div class="paper">
                                    <img src="{{ asset('imgs/paper2.png') }}" alt="">
                                </div>
                                <div class="someDetails">
                                    <div class="control">
                                        <h3 class='someDetailsHeading'>معلومات الطالب</h3>
                                        <div class="controlBtns nonePrint">
                                            <button class='printBtn'><i class="fa-solid fa-print"></i></button>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <span class='type'>الاسم:</span>
                                        <span class='info stu_name'></span>
                                    </div>
                                    <div class="item">
                                        <span class='type'>المرحلة الدراسية:</span>
                                        <span class='info stu_grade'></span>
                                    </div>
                                    <div class="item">
                                        <span class='type'>الرقم:</span>
                                        <span class='info stu_number'></span>
                                    </div>
                                    <div class="item">
                                        <span class='type'>رقم ولي الامر:</span>
                                        <span class='info stu_parent_number'></span>
                                    </div>
                                    <div class="item">
                                        <span class='type'> المحافظة:</span>
                                        <span class='info stu_gov'></span>
                                    </div>
                                    <div class="item">
                                        <span class='type'>مكان الحضور:</span>
                                        <span class='info stu_place'></span>
                                    </div>
                                    <div class='barcodeBox'>
                                        <svg class="barcode" id='profileBarCode'></svg>
                                        <span class='barcodeText stu_code'></span>
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
    <!-- barcode  -->
    <!-- هنا بس  -->
    <script src="{{ asset('js/jsBarCode.all.min.js') }}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- bootstrap 5  -->
    <!-- موجود في كل الصفحات  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/add-student.js') }}"></script>
@endsection
