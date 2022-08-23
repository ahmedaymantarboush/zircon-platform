@extends('layouts.adminLayout')

@section('css')
    <!-- موجود هنا بس  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/add-lecture.css') }}" />
    <!-- موجود في هنا والايديت  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
@endsection

@section('content')
    <div class="page-heading white-box">
        <span class="page-icon"><i class="fa-solid fa-graduation-cap"></i></span>
        <h2 class="page-h">إضافة محاضرة جديدة</h2>
    </div>
    <section class="add-lecture white-box">
        <div class="add-lec-heading">
            <h3>اضافة محاضرة</h3>
            <a href="#" class="go-to-lectures">
                الرجوع الي قائمة المحاضرات
                <span><i class="fa-solid fa-arrow-left-long"></i></span></a>
        </div>
        <!-- start tabs  -->
        <div class="sections-tabs">
            <button class="base tab-item active" data-index="0">
                <span><i class="fa-solid fa-pen-to-square"></i></span>
                <span class="tab-name">الأساسية</span>
            </button>
            <button class="means tab-item" data-index="1">
                <span><i class="fa-solid fa-photo-film"></i></span>
                <span class="tab-name">الوسائط</span>
            </button>
            <button class="seo tab-item" data-index="2">
                <span><i class="fa-solid fa-tags"></i></span>
                <span class="tab-name">seo</span>
            </button>
            <button class="pricing tab-item" data-index="3">
                <span><i class="fa-solid fa-money-bill-wave"></i></span>
                <span class="tab-name">التسعير</span>
            </button>
            <button class="end tab-item" data-index="4">
                <span><i class="fa-solid fa-check-to-slot"></i></span>
                <span class="tab-name">الانهاء</span>
            </button>
        </div>
        <!-- the first form in the add lecture page and it is have a 5 tabs -->

        @include('components.Admin.lectureForm')

        <div class="control">
            <span class="right-btn"><i class="fa-solid fa-angles-right"></i></span>
            <span class="left-btn"><i class="fa-solid fa-angles-left"></i></span>
        </div>
    </section>
@endsection




@section('javascript')
    <!-- bootstrap 4  -->
    <!-- موجود هنا والايديت  -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- bootstrap 5  -->
    <!-- موجود في كل الصفحات  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- موجود هنا والايديت  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- text editor  -->
    <!-- موجود هنا والايديت  -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <!-- sortable js  -->
    <!-- موجود هنا والايديت  -->
    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

    <!-- main js file -->
    <!-- موجود في كل الصفحات  -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!-- موجود هنا والايديت  -->
    <script src="{{ asset('admin/assets/js/add-lecture.js') }}"></script>
@endsection
