@extends('layouts.adminLayout')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
<!-- css file -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/myLocations.css') }}" />
@endsection
@section('content')
<div class="page-heading white-box">
    <span class="page-icon"><i class="fa-solid fa-school-flag"></i></span>
    <h2 class="page-h">الاماكن</h2>
</div>

<form action="" class="lec-filter">
    <h3>لائحة الاماكن</h3>

    <div class="search-field">
        <div class="field search-select-box">
            <span>اظهار</span>
            <select name='"' id="" data-live-search="true">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3333</option>
            </select>
            <span>من الحقول</span>
        </div>
        <div class="filterSearchParent">
            <div class="addLocation">
                <button class="addLocationBtn" data-bs-toggle="modal" data-bs-target="#addLocationModal" type="button">
                    <i class="fa-solid fa-plus"></i>
                    اضافة مكان جديد
                </button>
            </div>
            <div class="filter-search">
                <label for="">بحث :</label>
                <input type="search" />
            </div>
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
                <th>الصورة</th>
                <th>الأسم</th>
                <th>المحافظة</th>
                <th>عدد الطلاب</th>
                <th>صفحة المكان</th>
                {{-- <th>مجموع الدخل</th> --}}

                <th class="features">اجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($centers as $key => $center)
            @php
            $i = $key + 1;
            @endphp
            <tr class="" data-id="{{$center->id}}">
                <td class=" number">
                    {{ $i }}
                    <button class="open-tr" type="button">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </td>
                <td class="imageLocation" data-lable="الصورة :">
                    <div class="imageBox">
                        <img src="{{ $center->image }}" alt="" />
                    </div>
                </td>
                <td data-lable="الأسم :" class="address">
                    <button type="button" class="btn name-lesson question-code" data-toggle="tooltip"
                        data-placement="top" title="{{ $center->name }}">
                        {{ $center->name }}
                    </button>
                </td>
                <td data-lable="المحافظة :">
                    {{ $center->governorate->name }}
                </td>
                <td data-lable="عدد الطلاب :" class="table-sections">
                    {{ $center->students->count() }}
                </td>
                <td data-lable="صفحة المكان :" class="address">
                    <a href="{{ $center->url }}" class="btn name-lesson question-code" data-toggle="tooltip"
                        data-placement="top" title="{{ $center->url }}">
                        صفحة المكان
                    </a>
                </td>
                {{-- <td data-lable="مجموع الدخل :">
                            13500
                        </td> --}}

                <td class="features" data-lable="اجراءات :">
                    <div class="btn-group">
                        <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>

                        <ul class="dropdown-menu feat-menu">
                            <li>
                                <a class="dropdown-item editCenter" href="#" data-bs-toggle="modal"
                                    data-bs-target="#editLocationModal">تعديل المكان</a>
                            </li>

                            <li>
                                <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                    data-bs-target="#delete-location">مسح المكان</a>
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
                    <td class="imageLocation" data-lable="الصورة :">
                        <div class="imageBox">
                            <img src="{{ asset('admin/assets/imgs/logo3d.png') }}" alt="" />
</div>
</td>
<td data-lable="الأسم :" class="address">
    <button type="button" class="btn name-lesson question-code" data-toggle="tooltip" data-placement="top"
        title="سنتر علي علاء لدراسة مادة التاريخ وايضا مادة التاريخ">
        سنتر علي علاء لدراسة مادة
        التاريخ وايضا مادة التاريخ
    </button>
</td>
<td data-lable="المحافظة :">
    الشرقية
</td>
<td data-lable="عدد الطلاب :" class="table-sections">
    180
</td>
<td data-lable="مجموع الدخل :">
    13500
</td>

<td class="features" data-lable="اجراءات :">
    <div class="btn-group">
        <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </button>

        <ul class="dropdown-menu feat-menu">
            <li>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editLocationModal">تعديل
                    المكان</a>
            </li>

            <li>
                <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                    data-bs-target="#delete-location">مسح المكان</a>
            </li>
        </ul>
    </div>
</td>
</tr> --}}
</tbody>
</table>
</div>

{{-- <div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        إضافة مكان
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="less-item custome-item">
                            <label class="sec-name">اسم المكان</label>

                            <div class="input-parent">
                                <input type="text" class="my-input is-invalid" placeholder=" ادخل اسم المكان"
                                    id="address-lec" />
                                @error('error')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="less-item custome-item">
    <label class="sec-name">لينك المكان</label>

    <div class="input-parent">
        <input type="text" class="my-input is-invalid" placeholder=" ادخل لينك المكان" id="address-lec" />
        @error('error')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="less-item custome-item">
    <label class="sec-name">المحافظة</label>
    <div class="search-select modify-select">
        <select name='"' id="" class="is-invalid" data-live-search="true">
            <option value="">اختر المحافظة</option>
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
</div>
<div class="less-item custome-item">
    <label class="sec-name">مجموع الطالي في المادة</label>

    <div class="input-parent">
        <input type="text" class="my-input is-invalid" placeholder=" مجموع الطالي في المادة" id="address-lec" />
        @error('error')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="file">
    <label for="">رفع صورة المكان</label>
    <input type="file" class="form-control" />
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
</div> --}}
<div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    اضافة مكان
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.centers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="less-item custome-item">
                        <label class="sec-name">اسم المكان</label>

                        <div class="input-parent">
                            <input type="text" name='name' value="{{ old('name') }}"
                                class="my-input @error('name') is-invalid @enderror" placeholder=" ادخل اسم المكان"
                                id="address-lec" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="less-item custome-item">
                        <label class="sec-name">لينك المكان</label>

                        <div class="input-parent">
                            <input type="text" name='url' value="{{ old('url') }}"
                                class="my-input @error('url') is-invalid @enderror" placeholder=" ادخل لينك المكان"
                                id="address-lec" />
                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="less-item custome-item">
                        <label class="sec-name">المحافظة</label>
                        <div class="search-select modify-select">
                            <select name='governorate' id="" class="@error('governorate') is-invalid @enderror"
                                data-live-search="true">
                                <option value="">اختر المحافظة</option>
                                @foreach (\App\Models\Governorate::all() as $governorate)
                                <option @selected(old('governorate')==$governorate->id) value="{{ $governorate->id }}">
                                    {{ $governorate->name }}</option>
                                @endforeach
                            </select>
                            @error('governorate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="file">
                            <label for="">رفع صورة المكان</label>
                            <input type="file" name='image'
                                class="form-control @error('image') is-invalid @enderror" />
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}
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
<div class="modal fade" id="editLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    تعديل المكان
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.centers.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id='trId'>
                    <div class="less-item custome-item">
                        <label class="sec-name">اسم المكان</label>

                        <div class="input-parent">
                            <input type="text nameOfCenter" name='newName' value="{{ old('newName') }}"
                                class="my-input @error('newName') is-invalid @enderror" placeholder=" ادخل اسم المكان"
                                id="address-lec" />
                            @error('newName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="less-item custome-item">
                        <label class="sec-name">لينك المكان</label>

                        <div class="input-parent">
                            <input type="text" name='newUrl' value="{{ old('newUrl') }}"
                                class="my-input urlOfCenter @error('newUrl') is-invalid @enderror"
                                placeholder=" ادخل لينك المكان" id="address-lec" />
                            @error('newUrl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="less-item custome-item">
                        <label class="sec-name">المحافظة</label>
                        <div class="search-select modify-select newGovernorateParent">
                            <select name='newGovernorate' id="" class="@error('newGovernorate') is-invalid @enderror"
                                data-live-search="true">
                                <option value="">اختر المحافظة</option>
                                @foreach (\App\Models\Governorate::all() as $governorate)
                                <option @selected(old('newGovernorate')==$governorate->id)
                                    value="{{ $governorate->id }}">
                                    {{ $governorate->name }}</option>
                                @endforeach
                            </select>
                            @error('newGovernorate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="file">
                            <label for="">رفع صورة المكان</label>
                            <input type="file" name='newImage'
                                class="form-control @error('newImage') is-invalid @enderror" />
                            @error('newImage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}
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
                    حذف المكان
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
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
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="{{ asset('admin/assets/js/myLocations.js') }}"></script>
@endsection