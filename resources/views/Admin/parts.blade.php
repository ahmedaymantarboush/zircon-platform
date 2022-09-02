@extends('layouts.adminLayout')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
    {{-- <!-- css file --> --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/myLocations.css') }}" />
@endsection
@section('content')
    <div class="page-heading white-box">
        <span class="page-icon"><i class="fa-solid fa-school-flag"></i></span>
        <h2 class="page-h">الأجزاء الدراسية</h2>
    </div>

    <form action="" class="lec-filter">
        <h3>لائحة الأجزاء الدراسية</h3>

        <div class="search-field">
            <div class="field search-select-box">
            </div>
            <div class="filterSearchParent">
                <div class="addLocation">
                    <button class="addLocationBtn" data-bs-toggle="modal" data-bs-target="#addLocationModal" type="button">
                        <i class="fa-solid fa-plus"></i>
                        اضافة جزئية دراسية جديدة
                    </button>
                </div>
                <div class="filter-search">
                    <label for="">بحث :</label>
                    <input type="search" name="q" value="{{request()->q}}"/>
                </div>
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
                        <th>الاسم</th>
                        <th>المرحلة الدراسية</th>
                        <th>المادة</th>
                        {{-- <th>مجموع الدخل</th> --}}

                        <th class="features">اجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parts as $key => $part)
                        @php
                            $i = $key + 1;
                        @endphp
                        <tr class="" data-id="{{ $part->id }}">
                            <td class=" number">
                                {{ $i }}
                                <button class="open-tr" type="button">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </td>
                            <td data-lable="الأسم :" class="address">
                                <button type="button" class="btn name-lesson question-code" data-toggle="tooltip"
                                    data-placement="top" title="{{ $part->name }}">
                                    {{ $part->name }}
                                </button>
                            </td>
                            <td data-lable="المحافظة :">
                                {{ $part->grade->name }}
                            </td>
                            <td data-lable="عدد الطلاب :" class="table-sections">
                                {{ $part->subject->name }}
                            </td>

                            <td class="features" data-lable="اجراءات :">
                                <div class="btn-group">
                                    <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>

                                    <ul class="dropdown-menu feat-menu">
                                        <li>
                                            <a class="dropdown-item editCenter" href="#" data-bs-toggle="modal"
                                                data-bs-target="#editLocationModal">تعديل الجزئية الدراسية</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                                data-bs-target="#delete-location">مسح الجزئية الدراسية</a>
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
    <div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        اضافة جزئية الدراسية
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.parts.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="less-item custome-item">
                            <label class="sec-name">اسم الجزئية الدراسية</label>

                            <div class="input-parent">
                                <input type="text" name='name' value="{{ old('name') }}"
                                    class="my-input @error('name') is-invalid @enderror" placeholder=" ادخل اسم الجزئية الدراسية"
                                    id="address-lec" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="less-item custome-item">
                            <label class="sec-name">المرحلة الدراسية</label>
                            <div class="search-select modify-select">
                                <select name='grade_id' id=""
                                    class="@error('grade_id') is-invalid @enderror" data-live-search="true">
                                    <option value="">اختر المرحلة الدراسية</option>
                                    @foreach (\App\Models\Grade::all() as $grade)
                                        <option @selected(old('grade_id') == $grade->id) value="{{ $grade->id }}">
                                            {{ $grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
    <div class="modal fade" id="editLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        تعديل الجزئية الدراسية
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.parts.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="less-item custome-item">
                            <label class="sec-name">اسم الجزئية الدراسية</label>

                            <div class="input-parent">
                                <input type="text" name='name' value="{{ old('name') }}"
                                    class="my-input @error('name') is-invalid @enderror" placeholder=" ادخل اسم الجزئية الدراسية"
                                    id="address-lec" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="less-item custome-item">
                            <label class="sec-name">المرحلة الدراسية</label>
                            <div class="search-select modify-select">
                                <select name='grade_id' id=""
                                    class="@error('grade_id') is-invalid @enderror" data-live-search="true">
                                    <option value="">اختر المرحلة الدراسية</option>
                                    @foreach (\App\Models\Grade::all() as $grade)
                                        <option @selected(old('grade_id') == $grade->id) value="{{ $grade->id }}">
                                            {{ $grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            تعديل
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            الغاء
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-location" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        حذف الجزئية الدراسية
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.parts.delete') }}" method="POST" class='delCenter'>
                    <input type="hidden" name="id" id='trId'>

                    @csrf
                    <div class="modal-body">
                        <p class="sure-to-del">
                            هل انت متأكد انك تريد مسح
                            <span class="del-lesson"> ....</span>
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
    {{-- <script src="{{ asset('admin/assets/js/myLocations.js') }}"></script> --}}
@endsection
