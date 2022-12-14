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
    {{-- <!-- Latest compiled and minified CSS --> --}}
    {{-- <!-- css file --> --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
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
                            <form action="{{ route('admin.users.forceUpdate') }}" method="POST" class="exam-form">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="main_title">???????????? ???????????? </p>
                                        <div class="blue_line"></div>
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">?????? ???????????? :</label>
                                        <input name="stu_name" value="{{ old('stu_name') ?? $user->name }}" type="text"
                                            class="@error('stu_name') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="???????? ?????? ????????????"
                                            style="font-size: 15px;width: 95%;">
                                        @error('stu_name')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label">???????????????? :</label>
                                        <select name="stu_gov"
                                            class="@error('stu_gov') is-invalid @enderror form-select form-select-lg search-select-box "
                                            id="formGroupExampleInput" data-live-search="true">
                                            <option value="">
                                                ???????? ????????????????
                                            </option>
                                            @foreach (\App\Models\Governorate::all() as $governorate)
                                                <option @selected(old('stu_gov') ? old('stu_gov') == $governorate->id : $user->governorate->id == $governorate->id ) value="{{ $governorate->id }}">
                                                    {{ $governorate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('stu_gov')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label">???????? ????????????
                                            :</label>
                                        <select name="stu_place"
                                            class="@error('stu_place') is-invalid @enderror
                                            form-select form-select-lg"
                                            aria-label="Default select example" id="formGroupExampleInput"
                                            style="font-size: 15px;width: 95%;">
                                            {{-- <option value=''>???????? ???????? ???????? ????????????</option> --}}
                                            @foreach (\App\Models\Center::all() as $center)
                                                <option @selected(old('stu_place') ? old('stu_place') == $center->id : $user->center->id == $center->id) value="{{ $center->id }}">
                                                    {{ $center->name }}</option>
                                            @endforeach

                                            {{-- <option value="2">???????? ??????????????</option>
                                            <option value="3">???????? ????????"</option> --}}
                                        </select>
                                        @error('stu_place')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label">?????????? ????????????
                                            :</label>
                                        <select name="stu_grade"
                                            class="@error('stu_grade') is-invalid @enderror
                                            form-select form-select-lg"
                                            aria-label="Default select example" id="formGroupExampleInput"
                                            style="font-size: 15px;width: 95%;">
                                            <option selected>???????? ?????????? ????????????</option>
                                            @foreach (\App\Models\Grade::all() as $grade)
                                                <option @selected(old('stu_grade') ? old('stu_grade') == $grade->id : $user->grade->id == $grade->id) value="{{ $grade->id }}">
                                                    {{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('stu_grade')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">?????? ???????? ???????????? :</label>
                                        <input value="{{ old('stu_number') ?? $user->phone_number }}" name="stu_number" type="number"
                                            class="@error('stu_number') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="???????? ?????? ???????? ????????????"
                                            style="font-size: 15px;width: 95%;">
                                        @error('stu_number')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">?????? ???????? ?????? ?????? ???????????? :</label>
                                        <input value="{{ old('stu_parent_number') ?? $user->parent_phone_number }}" name="stu_parent_number"
                                            type="number"
                                            class="@error('stu_parent_number') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="???????? ?????? ???????? ?????? ?????? ????????????"
                                            style="font-size: 15px;width: 95%;">
                                        @error('stu_parent_number')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">???????????? ???????????????????? ???????????? :</label>
                                        <input value="{{ old('stu_email') ?? $user->email }}" name="stu_email" type="email"
                                            class="@error('stu_email') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="???????? ???????????? ???????????????????? ????????????"
                                            style="font-size: 15px;width: 95%;">
                                        @error('stu_email')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">???????? ???????????? ?????????????? :</label>
                                        <input name="password" type="password"
                                            class="@error('password') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="???????? ???????? ???????? ????????????"
                                            style="font-size: 15px;width:95%;">
                                        @error('password')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">???????? ???????????? ?????????????? :</label>
                                        <input name="password_confirmation" type="password"
                                            class="form-control-lg form-control" id="formGroupExampleInput"
                                            placeholder="?????? ?????????? ???????? ???????? ????????????" style="font-size: 15px;width:95%;">
                                    </div>
                                    <div class="col-12">
                                        <label for="formGroupExampleInput" class="form-label input_label"
                                            style="margin-top: 40px">?????? ???????????? :</label>
                                        <input value="{{old('stu_code') ?? $user->code}}" name="stu_code" type="text"
                                            class="@error('stu_code') is-invalid @enderror form-control-lg form-control"
                                            id="formGroupExampleInput" placeholder="???????? ?????? ????????????"
                                            style="font-size: 15px;width: 95%;">
                                        @error('stu_code')
                                            <p class='invalid-feedback'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="end-line"></div>
                                        <button type="submit" class="sub_btn">??????????</button>
                                        <a href="{{route('admin.users.index')}}" class="a_btn">?????????? ????????????</a>
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
                                    <span class='profileType'>????????</span>
                                </div>

                                <div class="paper">
                                    <img src="{{ asset('imgs/paper2.png') }}" alt="">
                                </div>
                                <div class="someDetails">
                                    <div class="control">
                                        <h3 class='someDetailsHeading'>?????????????? ????????????</h3>
                                        <div class="controlBtns nonePrint">
                                            <button class='printBtn'><i class="fa-solid fa-print"></i></button>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <span class='type'>??????????:</span>
                                        <span class='info stu_name'></span>
                                    </div>
                                    <div class="item">
                                        <span class='type'>?????????????? ????????????????:</span>
                                        <span class='info stu_grade'></span>
                                    </div>
                                    <div class="item">
                                        <span class='type'>??????????:</span>
                                        <span class='info stu_number'></span>
                                    </div>
                                    <div class="item">
                                        <span class='type'>?????? ?????? ??????????:</span>
                                        <span class='info stu_parent_number'></span>
                                    </div>
                                    <div class="item">
                                        <span class='type'> ????????????????:</span>
                                        <span class='info stu_gov'>{{$user->governorate->name}}</span>
                                    </div>
                                    <div class="item">
                                        <span class='type'>???????? ????????????:</span>
                                        <span class='info stu_place'>{{$user->grade->name}}</span>
                                    </div>
                                    <div class='barcodeBox'>
                                        <svg class="barcode" id='profileBarCode'></svg>
                                        <span class='barcodeText stu_code'>{{$user->code}}</span>
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
    {{-- <!-- barcode  --> --}}
    {{-- <!-- ?????? ????  --> --}}
    <script src="{{ asset('js/jsBarCode.all.min.js') }}"></script>
    {{-- <!-- Latest compiled and minified JavaScript --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    {{-- <!-- bootstrap 5  --> --}}
    {{-- <!-- ?????????? ???? ???? ??????????????  --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/add-student.js') }}"></script>
@endsection
