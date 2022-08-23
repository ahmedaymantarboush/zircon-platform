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
                    <span>اضافة امتحان جديد</span>
                </div>
                <div class="main_exam_info">
                    @include('components.admin.examForm')
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
