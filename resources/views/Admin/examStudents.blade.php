@extends('layouts.adminLayout')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
<!-- css file -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/examsStudents.css') }}" />
@endsection
@section('content')
<div class="page-heading white-box">
    <span class="page-icon"><i class="fa-solid fa-clipboard-question"></i></span>
    <h2 class="page-h">طلاب امتحان {{ $exam->title }}</h2>
</div>

<form action="" class="lec-filter">
    <h3>لائحة الطلاب</h3>
    <div class="custome-row">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="filter-item">
                    <label for="">المكان</label>
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

            <div class="col-lg-3 col-sm-6">
                <div class="filter-item">
                    <label for="">العام الدراسي</label>
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
        <div class="filterSearchParent">
            {{-- <div class="addLocation">
                    <button class="addLocationBtn" data-bs-toggle="modal" data-bs-target="#addLocationModal" type="button">
                        <i class="fa-solid fa-plus"></i>
                        اضافة مكان جديد
                    </button>
                </div> --}}
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
                <th>الاسم</th>
                <th>المرحلة الدراسية</th>
                <th>وقت الانتهاء</th>
                <th>تاريخ البدأ</th>
                <th>النسبة</th>
                <th>إجابة صحيحة</th>
                <th>إجابة خاطئة</th>
                <th class="features">اجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($passedExams as $index => $passedExam)
            @php
            $i = $index + 1;
            $student = $passedExam->user;
            $correctAnswers = $passedExam
            ->answers()
            ->where('correct', 1)
            ->count();
            $wrongAnswers = $passedExam
            ->answers()
            ->where('correct', 0)
            ->count();
            @endphp
            <tr data-id="{{ $passedExam->id }}"
                class="@if ($correctAnswers || $wrongAnswers) @if ($correctAnswers > $wrongAnswers) greenBg @elseif($correctAnswers < $wrongAnswers) redBg @elseif($correctAnswers == $wrongAnswers) blueBg @endif @endif">
                <td class="number">
                    {{ $i }}
                    <button class="open-tr" type="button">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </td>
                <td data-lable="الاسم :" class="address">
                    <div class="custome-parent">
                        <div class="question-code-parent">
                            <span class="cardClip"><i class="fa-solid fa-id-card-clip"></i></span>
                            <button type="button" class="btn question-code" data-toggle="tooltip" data-placement="top"
                                title="{{ $student->name }}">
                                {{ $student->name }}
                            </button>
                        </div>
                        <div class="name-teacher">
                            <span class="job-teacher">:المدرس</span>
                            <span>{{ $exam->publisher->name }}</span>
                        </div>
                    </div>
                </td>
                <td data-lable="المرحلة الدراسية :" class="table-level-parent">
                    <span class="table-level">{{ $exam->grade->name }}</span>
                </td>
                <td data-lable="وقت الانتهاء :" class="table-sections">
                    <div class="custome-parent">
                        {{ decoratedTime(strtotime($passedExam->ended_at) - strtotime($passedExam->started_at)) }}
                    </div>
                </td>
                <td data-lable="تاريخ البدأ :" class="students">
                    {{ date('H:i:s d/m/Y', strtotime($passedExam->ended_at)) }}
                </td>
                <td data-lable="النسبة :" class="views">
                    {{ $passedExam->percentage }}%
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
                                <a data-bs-toggle="modal" data-bs-target="#studentCard" class="dropdown-item"
                                    href="#">كارت الطالب
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">تعديل الطالب</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
            <tr class="blueBg">
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
                            <button type="button" class="btn question-code" data-toggle="tooltip" data-placement="top"
                                title="علي علاء الدين السيد عبدالسلام البلتاجي علي علاء">
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
                <td data-lable="وقت الانتهاء :" class="table-sections">
                    <div class="custome-parent">
                        30:00
                    </div>
                </td>
                <td data-lable="تاريخ البدأ :" class="students">
                    27/7/2005
                </td>
                <td data-lable="النسبة :" class="views">
                    50%
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
                        </ul>
                    </div>
                </td>
            </tr>
            <tr class="">
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
                            <button type="button" class="btn question-code" data-toggle="tooltip" data-placement="top"
                                title="علي علاء الدين السيد عبدالسلام البلتاجي علي علاء">
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
                <td data-lable="وقت الانتهاء :" class="table-sections">
                    <div class="custome-parent">
                        30:00
                    </div>
                </td>
                <td data-lable="تاريخ البدأ :" class="students">
                    27/7/2005
                </td>
                <td data-lable="النسبة :" class="views">
                    50%
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
                            <button type="button" class="btn question-code" data-toggle="tooltip" data-placement="top"
                                title="علي علاء الدين السيد عبدالسلام البلتاجي علي علاء">
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
                <td data-lable="وقت الانتهاء :" class="table-sections">
                    <div class="custome-parent">
                        30:00
                    </div>
                </td>
                <td data-lable="تاريخ البدأ :" class="students">
                    27/7/2005
                </td>
                <td data-lable="النسبة :" class="views">
                    50%
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
                        </ul>
                    </div>
                </td>
            </tr>
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
                            <img src="{{ asset('imgs/user.png') }}" alt="" />
                        </div>
                        <div class="profileContent">
                            <div class="personalInformation">
                                <h3 class="profileName">
                                    عبدالرحمن مصطفى محمود
                                </h3>
                                <span class="profileType">طالب</span>
                            </div>
                            <div class="paper">
                                <img src="{{ asset('imgs/paper2.png') }}" alt="" />
                            </div>
                            <div class="someDetails">
                                <div class="control">
                                    <h3 class="someDetailsHeading">
                                        معلومات الطالب
                                    </h3>
                                </div>
                                <div class="item">
                                    <span class="type">الاسم:</span>
                                    <span class="info">عبدالرحمن مصطفى محمود</span>
                                </div>
                                <div class="item">
                                    <span class="type">المرحلة الدراسية:</span>
                                    <span class="info">الصف الثالث الثانوي</span>
                                </div>
                                <div class="item">
                                    <span class="type">الرقم:</span>
                                    <span class="info">01234567891</span>
                                </div>
                                <div class="item">
                                    <span class="type">رقم ولي الامر:</span>
                                    <span class="info">01234567891</span>
                                </div>
                                <div class="item">
                                    <span class="type"> المحافظة:</span>
                                    <span class="info">القاهرة</span>
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
@endsection
@section('javscript')
<script src="{{ asset('admin/assets/js/jsBarCode.all') }}.min.js"></script>
<!--font awesome-->
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

<script src="{{ asset('admin/assets/js/examsStudents.js') }}"></script>
@endsection