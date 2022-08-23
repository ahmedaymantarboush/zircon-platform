@extends('layouts.adminLayout')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />

<!-- css file -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/students.css') }}" />
@endsection
@section('content')
<div class="page-heading white-box">
    <span class="page-icon"><i class="fa-solid fa-user-graduate"></i></span>
    <h2 class="page-h">الطلاب</h2>
</div>
<div class="lectures-statistics row">
    <div class="col-lg-3 col-sm-6">
        <a href="{{route('admin.users.create')}}" class="add-new-lec" style="width: 100%">
            <div class="stc-box" data-bs-toggle="modal" data-bs-target="#quick-modify" id="addNewQuestion">
                <div class="stc-val-parent">
                    <span class="stc-value">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span data-bs-toggle="modal" data-bs-target="#quick-modify" class="stc-name">اضافة طالب جديد
                    </span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a class="real-stc" style="width: 100%">
            <div class="stc-box second-stc">
                <div class="stc-val-parent">
                    <span class="stc-value"> {{ array_sum($users->pluck('balance')->toArray()) }} </span>
                    <span class="stc-name">مجموع الارصدة</span>
                </div>
                <div class="stc-icon">
                    <span class=""><i class="fa-solid fa-money-bills"></i></span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a class="real-stc" style="width: 100%">
            <div class="stc-box second-stc">
                <div class="stc-val-parent">
                    {{-- @php
                            $count = count($users);
                            $totalLevels = 0;
                            foreach ($users as $user) :
                                $totalLevels += $user->level;
                            endforeach;
                        @endphp --}}
                    <span class="stc-value">
                        {{ \App\Models\AnswerdQuestion::count() ? (\App\Models\AnswerdQuestion::where('correct', 1)->count() / \App\Models\AnswerdQuestion::count()) * max(\App\Models\Question::all()->pluck('level')->toArray()) : 0 }}
                    </span>
                    <span class="stc-name">متوسط المستوي العام</span>
                </div>
                <div class="stc-icon">
                    <span class="">
                        <i class="fa-solid fa-person-circle-question"></i></span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a class="real-stc" style="width: 100%">
            <div class="stc-box second-stc">
                <div class="stc-val-parent">
                    <span class="stc-value">
                        {{ count($users) }}
                    </span>
                    <span class="stc-name">طالب</span>
                </div>
                <div class="stc-icon">
                    <span class=""><i class="fa-solid fa-user-graduate"></i></span>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="lectureTableParent">
    <form action="" class="lec-filter">
        <h3>لائحة الطلاب</h3>
        <div class="custome-row">
            <div class="row">
                <div class="col-lg-2 col-sm-6">
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

                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">المكان</label>
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
                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">العام الدراسي</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    الجزئية الدراسية
                                </option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">المستوي العام</label>
                        <div class="search-select-box">
                            <select name="" id="" data-live-search="true">
                                <option value="">
                                    جميع المدرس
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
    </form>
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
                    <th>الرصيد</th>
                    <th>الكود</th>
                    <th>المستوي العام</th>
                    <th>إجابة صحيحة</th>
                    <th>إجابة خاطئة</th>
                    <th class="features">اجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                @php
                $i = $index + 1;
                $correctAnswers = count(
                $user
                ->answerdQuestions()
                ->where('correct', 1)
                ->get(),
                );
                $wrongAnswers = count(
                $user
                ->answerdQuestions()
                ->where('correct', 0)
                ->get(),
                );
                @endphp
                <tr data-id="{{ $user->id }}"
                    class="@if ($user->hanging) handingStudent @endif @if ($correctAnswers || $wrongAnswers) @if ($correctAnswers > $wrongAnswers) greenBg @elseif($correctAnswers < $wrongAnswers) redBg @elseif($correctAnswers == $wrongAnswers) blueBg @endif @endif">

                    <td class="number">
                        {{$i}}
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="الاسم :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="cardClip"><i class="fa-solid fa-id-card-clip"></i></span>
                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top" title="{{$user->name}}">
                                    {{$user->name}}
                                </button>
                            </div>
                            {{-- <div class="name-teacher">
                                    <span class="job-teacher">المدرس:</span>
                                    <span>{{{{$user->name}}}}</span>
                        </div> --}}
    </div>
</div>
</td>
<td data-lable="المرحلة الدراسية :" class="table-level-parent">
    <span class="table-level">{{$user->grade->name}}</span>
</td>
<td data-lable="الرصيد :" class="table-sections">
    <div class="custome-parent">
        {{$user->balance}}ج.م
    </div>
</td>
<td data-lable="الكود :" class="students">
    #{{$user->code}}
</td>
<td data-lable="المستوي العام :" class="views">
    {{$correctAnswers + $wrongAnswers ? number_format(( $correctAnswers / ($correctAnswers + $wrongAnswers) ) * max(\App\Models\Question::all()->pluck('level')->toArray()) ,2) : 0 }}
</td>
<td data-lable="إجابة صحيحة :" class="table-stat-parent">
    <span class="table-stat not-active">{{$correctAnswers}}</span>
</td>
<td data-lable="اجابه خاطئة :" class="table-price-parent">
    <span class="table-price not-free">{{$wrongAnswers}}</span>
</td>
<td class="features" data-lable="اجراءات :">
    <div class="btn-group">
        <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </button>

        <ul class="dropdown-menu feat-menu">
            <li>
                <a class="dropdown-item" href="#">الملف الشخصي</a>
            </li>

            <li>
                <a data-bs-toggle="modal" data-bs-target="#studentCard" class="dropdown-item studentCard" href="#">كارت
                    الطالب
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="#">تعديل الطالب</a>
            </li>
            <li>
                <a class="dropdown-item handStudent" href="#">{{$user->hanging ? 'الغاء' : ''}} تعليق الطالب</a>
            </li>
            <li>
                <a data-bs-toggle="modal" data-bs-target="#editCharge" class="dropdown-item editCharge" href="#">تعديل
                    رصيد
                    الطالب</a>
            </li>
            <li>
                <a data-bs-toggle="modal" data-bs-target="#editCode" class="dropdown-item editCode" href="#">تعديل كود
                    الطالب</a>
            </li>
            <li>
                <a data-bs-toggle="modal" data-bs-target="#deleteStudent" class="dropdown-item" href="#">مسح الطالب</a>
            </li>
        </ul>
    </div>
</td>
</tr>
@endforeach
{{-- <tr class="blueBg">
                    <td class="number">
                        1
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="الاسم :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="cardClip"><i class="fa-solid fa-id-card-clip"></i></span>
                                <!-- <span
                   class="question-code"
                  >
                   ما هو التيار الكهربي
                  </span> -->
                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top" title="علي علاء الدين السيد عبدالسلام البلتاجي علي علاء">
                                    علي علاء الدين السيد
                                    عبدالسلام البلتاجي
                                    علي علاء
                                </button>
                            </div>
                            <div class="name-teacher">
                                <span class="job-teacher">:المدرس</span>
                                <span>أ. محمد
                                    عبدالمعبود</span>
                            </div>
                        </div>
                    </td>
                    <td data-lable="المرحلة الدراسية :" class="table-level-parent">
                        <span class="table-level">الصف الثالث الثانوي</span>
                    </td>
                    <td data-lable="الرصيد :" class="table-sections">
                        <div class="custome-parent">
                            50ج.م
                        </div>
                    </td>
                    <td data-lable="الكود :" class="students">
                        #1sdsoasd
                    </td>
                    <td data-lable="المستوي العام :" class="views">
                        5
                    </td>
                    <td data-lable="إجابة صحيحة :" class="table-stat-parent">
                        <span class="table-stat not-active">530</span>
                    </td>
                    <td data-lable="اجابه خاطئة :" class="table-price-parent">
                        <span class="table-price not-free">1100</span>
                    </td>
                    <td class="features" data-lable="اجراءات :">
                        <div class="btn-group">
                            <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>

                            <ul class="dropdown-menu feat-menu">
                                <li>
                                    <a class="dropdown-item" href="#">الملف الشخصي</a>
                                </li>

                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#studentCard" class="dropdown-item"
                                        href="#">كارت الطالب
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">تعديل الطالب</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">تغيير حالة الطالب</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#editCharge" class="dropdown-item"
                                        href="#">تعديل رصيد
                                        الطالب</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#editCode" class="dropdown-item"
                                        href="#">تعديل كود
                                        الطالب</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#deleteStudent" class="dropdown-item"
                                        href="#">مسح الطالب</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="handingStudent">
                    <td class="number">
                        1
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="الاسم :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="cardClip"><i class="fa-solid fa-id-card-clip"></i></span>
                                <!-- <span
                   class="question-code"
                  >
                   ما هو التيار الكهربي
                  </span> -->
                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top" title="علي علاء الدين السيد عبدالسلام البلتاجي علي علاء">
                                    علي علاء الدين السيد
                                    عبدالسلام البلتاجي
                                    علي علاء
                                </button>
                            </div>
                            <div class="name-teacher">
                                <span class="job-teacher">:المدرس</span>
                                <span>أ. محمد
                                    عبدالمعبود</span>
                            </div>
                        </div>
                    </td>
                    <td data-lable="المرحلة الدراسية :" class="table-level-parent">
                        <span class="table-level">الصف الثالث الثانوي</span>
                    </td>
                    <td data-lable="الرصيد :" class="table-sections">
                        <div class="custome-parent">
                            50ج.م
                        </div>
                    </td>
                    <td data-lable="الكود :" class="students">
                        #1sdsoasd
                    </td>
                    <td data-lable="المستوي العام :" class="views">
                        5
                    </td>
                    <td data-lable="إجابة صحيحة :" class="table-stat-parent">
                        <span class="table-stat not-active">530</span>
                    </td>
                    <td data-lable="اجابه خاطئة :" class="table-price-parent">
                        <span class="table-price not-free">1100</span>
                    </td>
                    <td class="features" data-lable="اجراءات :">
                        <div class="btn-group">
                            <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>

                            <ul class="dropdown-menu feat-menu">
                                <li>
                                    <a class="dropdown-item" href="#">الملف الشخصي</a>
                                </li>

                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#studentCard" class="dropdown-item"
                                        href="#">كارت الطالب
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">تعديل الطالب</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">تعليق الطالب</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#editCharge" class="dropdown-item"
                                        href="#">تعديل رصيد
                                        الطالب</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#editCode" class="dropdown-item"
                                        href="#">تعديل كود
                                        الطالب</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#deleteStudent" class="dropdown-item"
                                        href="#">مسح الطالب</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="greenBg">
                    <td class="number">
                        1
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="الاسم :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="cardClip"><i class="fa-solid fa-id-card-clip"></i></span>
                                <!-- <span
                   class="question-code"
                  >
                   ما هو التيار الكهربي
                  </span> -->
                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top" title="علي علاء الدين السيد عبدالسلام البلتاجي علي علاء">
                                    علي علاء الدين السيد
                                    عبدالسلام البلتاجي
                                    علي علاء
                                </button>
                            </div>
                            <div class="name-teacher">
                                <span class="job-teacher">:المدرس</span>
                                <span>أ. محمد
                                    عبدالمعبود</span>
                            </div>
                        </div>
                    </td>
                    <td data-lable="المرحلة الدراسية :" class="table-level-parent">
                        <span class="table-level">الصف الثالث الثانوي</span>
                    </td>
                    <td data-lable="الرصيد :" class="table-sections">
                        <div class="custome-parent">
                            50ج.م
                        </div>
                    </td>
                    <td data-lable="الكود :" class="students">
                        #1sdsoasd
                    </td>
                    <td data-lable="المستوي العام :" class="views">
                        5
                    </td>
                    <td data-lable="إجابة صحيحة :" class="table-stat-parent">
                        <span class="table-stat not-active">530</span>
                    </td>
                    <td data-lable="اجابه خاطئة :" class="table-price-parent">
                        <span class="table-price not-free">1100</span>
                    </td>
                    <td class="features" data-lable="اجراءات :">
                        <div class="btn-group">
                            <button role="button" type="button" class="btn ftu-btn" data-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>

                            <ul class="dropdown-menu feat-menu">
                                <li>
                                    <a class="dropdown-item" href="#">الملف الشخصي</a>
                                </li>

                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#studentCard" class="dropdown-item"
                                        href="#">كارت الطالب
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">تعديل الطالب</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">تعليق الطالب</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#editCharge" class="dropdown-item"
                                        href="#">تعديل رصيد
                                        الطالب</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#editCode" class="dropdown-item"
                                        href="#">تعديل كود
                                        الطالب</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#deleteStudent" class="dropdown-item"
                                        href="#">مسح الطالب</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr> --}}
</tbody>
</table>
</div>

<div class="modal fade" id="studentCard" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    كارت الطالب
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="profileDetails" id="profileCard">
                        <div class="profileImg">
                            <img src="{{ asset('admin/assets/imgs/user.png') }}" alt="" />
                        </div>
                        <div class="profileContent">
                            <div class="personalInformation">
                                <h3 class="profileName">
                                    عبدالرحمن مصطفى محمود
                                </h3>
                                <span class="profileType">طالب</span>
                            </div>
                            <div class="paper">
                                <img src="{{ asset('admin/assets/imgs/paper2.png') }}" alt="" />
                            </div>
                            <div class="someDetails">
                                <div class="control">
                                    <h3 class="someDetailsHeading">
                                        معلومات الطالب
                                    </h3>
                                </div>
                                <div class="item">
                                    <span class="type">الاسم:</span>
                                    <span class="info cardName">عبدالرحمن مصطفى محمود</span>
                                </div>
                                <div class="item">
                                    <span class="type">المرحلة الدراسية:</span>
                                    <span class="info cardGrade">الصف الثالث الثانوي</span>
                                </div>
                                <div class="item">
                                    <span class="type">الرقم:</span>
                                    <span class="info cardNumber">01234567891</span>
                                </div>
                                <div class="item">
                                    <span class="type">رقم ولي الامر:</span>
                                    <span class="info cardParentNumber">01234567891</span>
                                </div>
                                <div class="item">
                                    <span class="type"> المحافظة:</span>
                                    <span class="info cardGovernorate">القاهرة</span>
                                </div>
                                <div class="item">
                                    <span class="type">مكان الحضور:</span>
                                    <span class="info">المنصة</span>
                                </div>
                                <div class="barcodeBox">
                                    <svg class="barcode" id="profileBarCode"></svg>
                                    <span class="barcodeText">as4df5ef12as4df5ef1212345</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        طباعة
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        الغاء
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteStudent" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    حذف الطالب
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <p class="sure-to-del">
                        هل انت متأكد انك تريد مسح
                        <span class="del-lesson"> علي علاء</span>
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
<div class="modal fade" id="editCharge" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    تعديل رصيد الطالب
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="studentNameParent">
                        <span class="studentType">اسم الطالب :</span>
                        <span class="studentName">علي علاء الدين</span>
                    </div>
                    <div class="editInput">
                        <label for="">الرصيد</label>
                        <input type="text" class="my-input" id='editChargeInput' />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveBalance">
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
<div class="modal fade" id="editCode" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    تعديل كود الطالب
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="studentNameParent">
                        <span class="studentType">اسم الطالب :</span>
                        <span class="studentName">علي علاء الدين</span>
                    </div>
                    <div class="editInput">
                        <label for="">الكود</label>
                        <input type="text" class="my-input" id='editCodeInput' />
                    </div>
                    <div class='errorParent'></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='saveCode'>
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
@endsection
@section('javascript')
<script src="{{ asset('admin/assets/js/jsBarCode.all') }}.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.8.0/dist/JsBarcode.all.min.js"></script> -->
<<<<<<< HEAD


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
<script src="{{ asset('admin/assets/js/students.js') }}"></script>
@endsection
