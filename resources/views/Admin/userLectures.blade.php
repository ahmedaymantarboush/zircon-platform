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
        <h2 class="page-h">لائحة محاضرات الطالب</h2>
    </div>

    <form action="" class="lec-filter">
        <h3>محاضرات الطالب</h3>

        <div class="search-field">
            <div class="filterSearchParent">
                <div class="filter-search">
                    <label for="">بحث :</label>
                    <input type="search" name="code" value="{{ request()->code }}" />
                </div>
                <div class="addLocation">
                    <button class="addLocationBtn" type="submit">
                        بحث
                    </button>
                </div>
            </div>
        </div>
        @if ($user)
        <div class="field search-select-box">
            <h3><h2 class="page-h" style="display: inline">اسم الطالب :</h2> {{ $user->name }}</h3>
            <h3><h2 class="page-h" style="display: inline">الرصيد :</h2> {{ $user->balance }}</h3>
        </div>
        @endif
        @if ($user)
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
                            <th>السعر</th>
                            <th>الحالة</th>
                            <th class="features">اجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\Lecture::where(['grade_id' => $user->grade_id, 'published' => true])->get() as $index => $lecture)
                            @php
                                $i = $index + 1;
                            @endphp
                            <tr data-lectureId="{{ $lecture->id }}" data-userId="{{ $user->id }}">
                                <td class="number">
                                    {{ $i }}
                                    <button class="open-tr" type="button">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </td>
                                <td data-lable="العنوان :" class="address">
                                    <div class="custome-parent">
                                        <div class="name-lesson">
                                            {{ $lecture->title }}
                                        </div>
                                    </div>
                                </td>
                                <td data-lable="المادة الدراسية :" class="table-level-parent">
                                    <span class="table-level">{{ $lecture->grade->name }}</span>
                                </td>
                                <td data-lable="السعر :" class="table-price-parent">
                                    @php
                                        $price = getPrice($lecture);
                                    @endphp
                                    <span class="table-price {{ $price ? '' : 'not-' }}free">{{ $price }}</span>
                                </td>
                                <td data-lable="الحالة :" class="table-stat-parent">
                                    @if ($user->ownedLectures->contains($lecture))
                                        <span class="table-stat active">تم الشراء</span>
                                    @else
                                        <span
                                            class="table-stat not-active" style="width: 100px">لم يتم الشراء</span>
                                    @endif
                                </td>
                                <td class="features" data-lable="اجراءات :">
                                    <div class="btn-group">
                                        <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>

                                        <ul class="dropdown-menu feat-menu">
                                            <li>
                                                <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#purchase">شراء من الرصيد</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#direct-purchase">شراء مباشر</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#delete-lecture">إلغاء شراء المحاضرة</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </form>
    @if ($user)
        <div class="modal fade" id="purchase" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            شراء من الرصيد
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.users.buyLecture') }}" method="POST" class='delCenter'>
                        <input type="hidden" name="userId" class="userId">
                        <input type="hidden" name="lectureId" class="lectureId">
                        @csrf
                        <div class="modal-body">
                            <p class="sure-to-del">
                                هل انت متأكد انك تريد شراء
                                <span class="del-lesson"> ....</span>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">
                                شراء
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                الغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="direct-purchase" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            شراء مباشر
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.lectures.directBuy') }}" method="POST" class='delCenter'>
                        <input type="hidden" name="userId" class="userId">
                        <input type="hidden" name="lectureId" class="lectureId">

                        @csrf
                        <div class="modal-body">
                            <p class="sure-to-del">
                                هل انت متأكد انك تريد شراء
                                <span class="del-lesson"> ....</span>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">
                                شراء
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
                            إلغاء شراء المحاضرة
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.lectures.deletePurchase') }}" method="POST" class='delCenter'>
                        <input type="hidden" name="userId" class="userId">
                        <input type="hidden" name="lectureId" class="lectureId">

                        @csrf
                        <div class="modal-body">
                            <p class="sure-to-del">
                                هل انت متأكد انك تريد إلغاء شراء
                                <span class="del-lesson"> ....</span>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">
                                إلغاء الشراء
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                الغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
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
    <script src="{{ asset('admin/assets/js/userLecture.js') }}"></script>
@endsection
