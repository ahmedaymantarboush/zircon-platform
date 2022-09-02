@extends('layouts.adminLayout')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
    {{-- <!-- css file --> --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/testimonials.css') }}" />
@endsection
@section('content')
    <div class="page-heading white-box">
        <span class="page-icon"><i class="fa-solid fa-award"></i></span>
        <h2 class="page-h">شهادات الطلاب المتفوقين</h2>
    </div>
    <div class="lectures-statistics row">
        <div class="col-lg-3 col-sm-6">
            <a class="add-new-lec" style="width: 100%" data-bs-toggle="modal" data-bs-target="#addCertificateModal">
                <div class="stc-box">
                    <div class="stc-val-parent">
                        <span class="stc-value">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                        <span class="stc-name">إضافة شهادة جديده</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="real-stc" style="width: 100%">
                <div class="stc-box second-stc">
                    <div class="stc-val-parent">
                        @php
                            $date = '01/07/' . date('Y', strtotime(now()));
                            if (now() >= $date):
                                $fromDate = '01/07/' . date('Y', strtotime(now()));
                                $toDate = '01/07/' . (date('Y', strtotime(now())) + 1);
                            else:
                                $fromDate = '01/07/' . (date('Y', strtotime(now())) - 1);
                                $toDate = '01/07/' . date('Y', strtotime(now()));
                            endif;
                        @endphp
                        <span class="stc-value">
                            {{ \App\Models\Testimonial::whereBetween('created_at', [$fromDate, $toDate])->count() }} </span>
                        <span class="stc-name">أوائل العام الماضي</span>
                    </div>
                    <div class="stc-icon">
                        <span class=""><i class="fa-solid fa-ranking-star"></i></span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="real-stc" style="width: 100%">
                <div class="stc-box second-stc">
                    <div class="stc-val-parent">
                        <span class="stc-value">
                            {{ count($testimonials) ? number_format(array_sum($testimonials->pluck('degree')->toArray()) / count($testimonials),2) : 0 }}
                        </span>
                        <span class="stc-name">متوسط المجموع</span>
                    </div>
                    <div class="stc-icon">
                        <span class="">
                            <i class="fa-solid fa-chart-simple"></i></span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="real-stc" style="width: 100%">
                <div class="stc-box second-stc">
                    <div class="stc-val-parent">
                        <span class="stc-value"> {{ count($testimonials) }} </span>
                        <span class="stc-name">عدد الشهادات</span>
                    </div>
                    <div class="stc-icon">
                        <span class=""><i class="fa-solid fa-certificate"></i></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <form action="" class="lec-filter">
        <h3>لائحة الشهادات</h3>
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
                                <option value="">2</option>
                                <option value="">3</option>
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
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="filter-item">
                        <label for="">العام</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    العام
                                </option>
                                <option value="">2</option>
                                <option value="">3</option>
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
                <select name="" id="" data-live-search="true">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3333</option>
                </select>
                <span>من الحقول</span>
            </div>
            <div class="filter-search">
                <label for="">بحث :</label>
                <input type="search" />
            </div>
        </div>
        <div class="lectures-table">
            <table class="">
                <thead>
                    <tr>
                        <th>
                            #
                            <i class="fa-solid fa-sort"></i>
                        </th>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>المرحلة الدراسية</th>
                        <th>المجموع</th>
                        {{-- <th>المادة</th> --}}
                        <th>مجموع المادة</th>
                        <th>التاريخ</th>
                        <th>المحتوي</th>

                        <th class="features">اجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $key => $testimonial)
                        @php
                            $i = $key + 1;
                        @endphp
                        <tr data-id="{{ $testimonial->id }}">
                            <td class="number">
                                {{ $i }}
                                <button class="open-tr" type="button">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </td>
                            <td class="imageLocation" data-lable="الصورة :">
                                <div class="imageBox">
                                    <img src="{{ $testimonial->image }}" alt="" />
                                </div>
                            </td>
                            <td data-lable="الاسم :" class="address">
                                <div class="custome-parent">
                                    <button type="button" class="btn name-lesson" data-toggle="tooltip"
                                        data-placement="top" title="{{ $testimonial->student_name }}">
                                        {{ $testimonial->student_name }}
                                    </button>
                                    <div class="name-teacher">
                                        <span class="job-teacher">:المدرس</span>
                                        <span>{{ $testimonial->teacher->nam }}</span>
                                    </div>
                                </div>
                            </td>
                            <td data-lable="المرحلة الدراسية :" class="table-level-parent">
                                <span class="table-level">{{ $testimonial->grade->name }}</span>
                            </td>
                            <td data-lable="المجموع :">{{ $testimonial->degree }}</td>

                            {{-- <td data-lable="المادة :">
                                {{$testimonial->subject->name}}
                    </td> --}}
                            <td data-lable="مجموع المادة :">
                                {{ $testimonial->subject_degree }}
                            </td>
                            <td data-lable="التاريخ :">
                                {{ date('d/m/Y', strtotime($testimonial->created_at)) }}
                                {{-- 22/7/2022 --}}
                            </td>
                            <td data-lable="المحتوى :" class="address">
                                <div class="custome-parent">
                                    <button type="button" class="btn name-lesson" data-toggle="tooltip"
                                        data-placement="top" title="{{ $testimonial->content }}">
                                        {{ $testimonial->content }}
                                    </button>
                                </div>
                            </td>
                            <td class="features" data-lable="اجراءات :">
                                <div class="btn-group">
                                    <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>

                                    <ul class="dropdown-menu feat-menu">
                                        <li>
                                            <a data-bs-toggle="modal" data-bs-target="#editCertificateModal"
                                                class="dropdown-item editTesti" href="#">تعديل الشهادة
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item delTesti" href="#" data-bs-toggle="modal"
                                                data-bs-target="#delete-certificate">مسح الشهادة</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>

    <div class="modal fade" id="addCertificateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        إضافة شهادة
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="less-item custome-item">
                            <label class="sec-name">اسم الطالب</label>

                            <div class="input-parent">
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="my-input @error('name') is-invalid @enderror" placeholder=" ادخل اسم الطالب"
                                    id="address-lec" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="less-item custome-item">
                            <label class="sec-name">مجموع الطالب</label>

                            <div class="input-parent">
                                <input type="text" name="degree" value="{{ old('degree') }}"
                                    class="my-input @error('degree') is-invalid @enderror"
                                    placeholder=" ادخل مجموع الطالب" id="address-lec" />
                                @error('degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="less-item custome-item">
                            <label class="sec-name">المادة</label>
                            <div class="search-select modify-select">
                                <select name="" id="" class="is-invalid" data-live-search="true">
                                    <option value="">اختر المادة</option>
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
                                @error('error')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
        </div> --}}
                        <div class="less-item custome-item">
                            <label class="sec-name">مجموع الطالب في المادة</label>

                            <div class="input-parent">
                                <input type="text" name="subjectDegree" value="{{ old('subjectDegree') }}"
                                    class="my-input @error('subjectDegree') is-invalid @enderror"
                                    placeholder=" مجموع الطالي في المادة" id="address-lec" />
                                @error('subjectDegree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="less-item custome-item">
                            <label class="sec-name">المرحلة الدراسية</label>
                            <div class="search-select modify-select">
                                <select name="grade" id="" class="@error('grade') is-invalid @enderror"
                                    data-live-search="true">
                                    <option value="">
                                        اختر المرحلة الدراسية
                                    </option>
                                    @foreach (\App\Models\Grade::all() as $grade)
                                        <option @selected(old('grade') == $grade->id) value="{{ $grade->id }}">
                                            {{ $grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="file">
                            <label for="">رفع صورة الطالب</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" class="form-control" />
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="less-item">
                            <label class="sec-name">المحتوى</label>
                            <textarea name="content" class="text-editor1 @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

    <div class="modal fade" id="editCertificateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        تعديل شهادة
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.testimonials.update') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name='id' id='trId'>
                        <div class="less-item custome-item">
                            <label class="sec-name">اسم الطالب</label>

                            <div class="input-parent">
                                <input type="text" name="newName" value="{{ old('newName') }}"
                                    class="editStudentName my-input @error('newName') is-invalid @enderror"
                                    placeholder=" ادخل اسم الطالب" id="address-lec" />
                                @error('newName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="less-item custome-item">
                            <label class="sec-name">مجموع الطالب</label>

                            <div class="input-parent">
                                <input type="text" name="newDegree" value="{{ old('newDegree') }}"
                                    class="editStudentSum my-input @error('newDegree') is-invalid @enderror"
                                    placeholder=" ادخل مجموع الطالب" id="address-lec" />
                                @error('newDegree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="less-item custome-item">
                            <label class="sec-name">المادة</label>
                            <div class="search-select modify-select">
                                <select name="" id="" class="is-invalid" data-live-search="true">
                                    <option value="">اختر المادة</option>
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
                                @error('error')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
        </div> --}}
                        <div class="less-item custome-item">
                            <label class="sec-name">مجموع الطالب في المادة</label>

                            <div class="input-parent">
                                <input type="text" name="newSubjectDegree" value="{{ old('newSubjectDegree') }}"
                                    class="subjectSum my-input @error('newSubjectDegree') is-invalid @enderror"
                                    placeholder=" مجموع الطالي في المادة" id="address-lec" />
                                @error('newSubjectDegree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="less-item custome-item">
                            <label class="sec-name">المرحلة الدراسية</label>
                            <div class="search-select modify-select levelsParent">
                                <select name="newGrade" id="" class="@error('newGrade') is-invalid @enderror"
                                    data-live-search="true">
                                    <option value="">
                                        اختر المرحلة الدراسية
                                    </option>
                                    @foreach (\App\Models\Grade::all() as $grade)
                                        <option @selected(old('newGrade') == $grade->id) value="{{ $grade->id }}">
                                            {{ $grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('newGrade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="file">
                            <label for="">رفع صورة الطالب</label>
                            <input type="file" class="form-control @error('newImage') is-invalid @enderror"
                                name="newImage" class="form-control" />
                            @error('newImage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="less-item">
                            <label class="sec-name">المحتوى</label>
                            <textarea name="newContent" class="text-editor2 @error('newContent') is-invalid @enderror">{{ old('newContent') }}</textarea>
                            @error('newContent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

    <div class="modal fade" id="delete-certificate" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        حذف المكان
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.testimonials.delete')}}" method="POST">
                    @csrf
                    <input type="hidden" name='id'>
                    <div class="modal-body">
                        <p class="sure-to-del">
                            هل انت متأكد انك تريد مسح
                            <span class="del-lesson"> سنتر علي علاء</span>
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
    {{-- <!--font awesome--> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <!-- bootstrap 4  --> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    {{-- <!-- bootstrap 5  --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    {{-- <!-- text editor  --> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    {{-- <!-- main js file --> --}}
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/testimonials.js') }}"></script>
@endsection
