@extends('layouts.adminLayout')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lectures.css') }}" />
@endsection
@section('content')
    <div class="page-heading white-box">
        <span class="page-icon"><i class="fa-solid fa-graduation-cap"></i></span>
        <h2 class="page-h">إضافة محاضرة جديدة</h2>
    </div>
    <div class="lectures-statistics row">
        <div class="col-lg-3 col-sm-6">
            <a href="#" class="add-new-lec" style="width: 100%">
                <div class="stc-box">
                    <div class="stc-val-parent">
                        <span class="stc-value">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                        <span class="stc-name">محاضرة جديدة</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="real-stc" style="width: 100%">
                <div class="stc-box second-stc">
                    <div class="stc-val-parent">
                        <span class="stc-value">
                            {{ number_format(array_sum($lectures->pluck('time')->toArray()) / 3600, 2) }} </span>
                        <span class="stc-name">من الساعات</span>
                    </div>
                    <div class="stc-icon">
                        <span class=""><i class="fa-solid fa-clock"></i></span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="real-stc" style="width: 100%">
                <div class="stc-box second-stc">
                    <div class="stc-val-parent">
                        <span class="stc-value"> {{ count($lectures->where('published', 0)) }} </span>
                        <span class="stc-name">محاضرة معلقة</span>
                    </div>
                    <div class="stc-icon">
                        <span class="">
                            <i class="fa-solid fa-link-slash"></i></span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="real-stc" style="width: 100%">
                <div class="stc-box second-stc">
                    <div class="stc-val-parent">
                        <span class="stc-value"> {{ count($lectures->where('published', 1)) }} </span>
                        <span class="stc-name">محاضرة مفعلة</span>
                    </div>
                    <div class="stc-icon">
                        <span class=""><i class="fa-solid fa-link"></i></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <form action="" class="lec-filter">
        <h3>لائحة المحاضرات</h3>
        <div class="custome-row">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="filter-item">
                        <label for="">المرحلة الدراسية</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    جميع المراحل الدراسية
                                </option>
                                @foreach (\App\Models\Grade::all() as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="filter-item">
                        <label for="">المادة</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    المادة
                                </option>
                                @foreach (\App\Models\Subject::all() as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="filter-item">
                        <label for="">الجزئية الدراسية</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    الجزئية الدراسية
                                </option>
                                @foreach (\App\Models\Part::all() as $part)
                                    <option value="{{ $part->id }}">{{ $part->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="filter-item">
                        <label for="">المدرس</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    جميع المدرسين
                                </option>
                                @foreach (\App\Models\User::where('role_id', 3) as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter-btn">
                <input type="submit" class="filter-btn" value="فلترة" />
            </div>
        </div>
        <div class="search-field">
            <div class="field search-select-box">
                <span>اظهار</span>
                <select name="count" id="" data-live-search="true">
                    <option value="0">الكل</option>
                    <option value="1">1</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span>من الحقول</span>
            </div>
            <div class="filter-search">
                <label for="">بحث :</label>
                <input type="search" name="q" />
            </div>
        </div>
    </form>
    <div class="lectures-table">
        <table class="">
            <thead>
                <tr>
                    <th>
                        #
                        <i class="fa-solid fa-sort"></i>
                    </th>
                    <th>العنوان</th>
                    <th>المادة الدراسية</th>
                    <th>الاقسام</th>
                    <th>الطلاب الملتحقين</th>
                    <th>مشاهدة</th>
                    <th>الحالة</th>
                    <th>السعر</th>
                    <th class="features">اجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lectures as $index => $lecture)
                    @php
                        $i = $index + 1;
                    @endphp
                    <tr class="">
                        <td class="number">
                            {{$i}}
                            <button class="open-tr" type="button">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </td>
                        <td data-lable="العنوان :" class="address">
                            <div class="custome-parent">
                                <div class="name-lesson">
{{$lecture->title}}
                                </div>
                                <div class="name-teacher">
                                    <span class="job-teacher">:المدرس</span>
                                    <span>{{$lecture->publisher->name}}</span>
                                </div>
                            </div>
                        </td>
                        <td data-lable="المادة الدراسية :" class="table-level-parent">
                            <span class="table-level">{{$lecture->grade->name}}</span>
                        </td>
                        <td data-lable="الاقسام :" class="table-sections">
                            <div class="custome-parent">
                                <div>مجموع الدروس {{count($lecture->lessons)}}</div>
                                <div>مجموع الاسئلة {{$lecture->total_questions_count}}</div>
                            </div>
                        </td>
                        <td data-lable="الطلاب الملتحقين :" class="students">
                            عدد الطلاب : {{count($lecture->owners)}}
                        </td>
                        <td data-lable="مشاهدة :" class="views">
                            {{count($lecture->viewers ?? [])}}
                        </td>
                        <td data-lable="الحالة :" class="table-stat-parent">
                            <span class="table-stat not-active">معلق</span>
                        </td>
                        <td data-lable="السعر :" class="table-price-parent">
                            <span class="table-price not-free">50</span>
                        </td>
                        <td class="features" data-lable="اجراءات :">
                            <div class="btn-group">
                                <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>

                                <ul class="dropdown-menu feat-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">عرض صفحة
                                            المحاضرة</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">عرض صفحة تشغيل
                                            المحاضرة</a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="modal" data-bs-target="#quick-modify"
                                            class="dropdown-item q-modify" href="#">تعديل سريع
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#">تعديل
                                            المحاضرة</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">الأقسام و
                                            الدروس</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">تعليق نشر
                                            المحاضرة</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                            data-bs-target="#delete-lecture">مسح المحاضرة</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach

                {{-- <tr class="">
                    <td class="number">
                        1
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="العنوان :" class="address">
                        <div class="custome-parent">
                            <div class="name-lesson">
                                مراجعة عامة على الباب
                                الثاني (الكهربية)
                            </div>
                            <div class="name-teacher">
                                <span class="job-teacher">:المدرس</span>
                                <span>أ. محمد
                                    عبدالمعبود</span>
                            </div>
                        </div>
                    </td>
                    <td data-lable="المادة الدراسية :" class="table-level-parent">
                        <span class="table-level">الصف الثالث الثانوي</span>
                    </td>
                    <td data-lable="الاقسام :" class="table-sections">
                        <div class="custome-parent">
                            <div>مجموع الدروس 4</div>
                            <div>مجموع الاسئلة 50</div>
                        </div>
                    </td>
                    <td data-lable="الطلاب الملتحقين :" class="students">
                        عدد الطلاب : 1024
                    </td>
                    <td data-lable="مشاهدة :" class="views">
                        1530
                    </td>
                    <td data-lable="الحالة :" class="table-stat-parent">
                        <span class="table-stat active">مفعل</span>
                    </td>
                    <td data-lable="السعر :" class="table-price-parent">
                        <span class="table-price free">مجاني</span>
                    </td>
                    <td class="features" data-lable="اجراءات :">
                        <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu feat-menu">
                            <li>
                                <a class="dropdown-item" href="#">عرض صفحة
                                    المحاضرة</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">عرض صفحة تشغيل
                                    المحاضرة</a>
                            </li>
                            <li>
                                <a data-bs-toggle="modal" data-bs-target="#quick-modify" class="dropdown-item q-modify"
                                    href="#">تعديل سريع
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">تعديل المحاضرة</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">الأقسام و الدروس</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">تعليق نشر
                                    المحاضرة</a>
                            </li>
                            <li>
                                <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                    data-bs-target="#delete-lecture">مسح المحاضرة</a>
                            </li>
                        </ul>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="quick-modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        إضافة درس
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="less-item custome-item">
                            <label class="sec-name">عنوان الدرس</label>

                            <div class="input-parent">
                                <input type="text" class="my-input is-invalid" placeholder=" ادخل عنوان الدرس"
                                    id="address-lec" />
                                <span class="invalid-feedback" role="alert">
                                    @error('error')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="less-item custome-item">
                            <label class="sec-name">عنوان الدرس</label>

                            <div class="input-parent">
                                <textarea name="" id="" class="my-input is-invalid"></textarea>
                                <span class="invalid-feedback" role="alert">
                                    @error('error')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="less-item custome-item">
                            <label class="sec-name">القسم</label>
                            <div class="search-select modify-select">
                                <select name="" id="" class="is-invalid" data-live-search="true">
                                    <option value="">
                                        اختر القسم الذي يتبعه هذا الدرس
                                    </option>
                                    <option value="">
                                        الصف الأول الثانوي
                                    </option>
                                    <option value="">
                                        الصف الثاني الثانوي
                                    </option>
                                    <option value="">
                                        الصف الثالث الثانوي
                                    </option>
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    @error('error')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="less-item custome-item">
                            <label class="sec-name">القسم</label>
                            <div class="search-select modify-select">
                                <select name="" id="" class="is-invalid" data-live-search="true">
                                    <option value="">
                                        اختر القسم الذي يتبعه هذا الدرس
                                    </option>
                                    <option value="">
                                        الصف الأول الثانوي
                                    </option>
                                    <option value="">
                                        الصف الثاني الثانوي
                                    </option>
                                    <option value="">
                                        الصف الثالث الثانوي
                                    </option>
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    @error('error')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="less-item custome-item">
                            <label class="sec-name">القسم</label>
                            <div class="search-select modify-select">
                                <select name="" id="" class="is-invalid" data-live-search="true">
                                    <option value="">
                                        اختر القسم الذي يتبعه هذا الدرس
                                    </option>
                                    <option value="">
                                        الصف الأول الثانوي
                                    </option>
                                    <option value="">
                                        الصف الثاني الثانوي
                                    </option>
                                    <option value="">
                                        الصف الثالث الثانوي
                                    </option>
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    @error('error')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="less-item">
                            <label class="sec-name">وصف الدرس</label>
                            <div class="text-editor2"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            إضافة
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            الغاء
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-lecture" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        إضافة قسم
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <p class="sure-to-del">
                            هل انت متأكد انك تريد مسح محاضرة
                            <span class="del-lesson">
                                مراجعة عامة على الباب الأول (الكهربية)
                            </span>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">
                            مسح
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            الغاء
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <!--font awesome-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- bootstrap 4  -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- bootstrap 5  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- text editor  -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <!-- main js file -->
    <script src="{{ asset('admin/assets/js/lectures.js') }}"></script>
@endsection
