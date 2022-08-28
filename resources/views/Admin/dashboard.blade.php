@extends('layouts.adminLayout')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />

    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashboard.css') }}" />
@endsection
@section('content')
    <div class="row daily">
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="daily-box">
                <div class="daily-content">
                    <h3 class="daily-name">دخل الشهر</h3>
                    <p class="daily-p">
                        @php
                            $currentMonth = date('Y-m', strtotime(now()));
                            $lastMonth = date('Y-m', strtotime(strtotime('first day of previous month')));
                            $currentMonthEncomme = array_sum(
                                \App\Models\BalanceCard::where('user_id', '!=', null)
                                    ->where('used_at', 'LIKE', "%$currentMonth%")
                                    ->get()
                                    ->pluck('value')
                                    ->toArray(),
                            );
                            $lastMonthEncomme = array_sum(
                                \App\Models\BalanceCard::where('user_id', '!=', null)
                                    ->where('used_at', 'LIKE', "%$lastMonth%")
                                    ->get()
                                    ->pluck('value')
                                    ->toArray(),
                            );
                            $monthpercentage = $lastMonthEncomme ? (($currentMonthEncomme - $lastMonthEncomme) * 100) / $lastMonthEncomme : 100;
                        @endphp
                        {{ $currentMonthEncomme }} ج.م
                        <span class="percent">{{ $monthpercentage }}</span>
                    </p>
                </div>
                <div class="daily-icon">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="daily-box">
                <div class="daily-content">
                    <h3 class="daily-name">حضور اليوم</h3>
                    <p class="daily-p">
                        @php
                            $count = 0;
                            $currentDay = date('Y-m-d', strtotime(now()));
                            $yesterday = date('Y-m-d', strtotime(strtotime('-1 day')));

                            $currentDayAttend = \App\Models\UserLesson::where('user_id', '!=', null)
                                ->where('created_at', 'LIKE', "%$currentDay%")
                                ->count();
                            $currentDayAttend += \App\Models\PassedExam::where('user_id', '!=', null)
                                ->where('created_at', 'LIKE', "%$currentDay%")
                                ->count();

                            $yesterdayAttend = \App\Models\UserLesson::where('user_id', '!=', null)
                                ->where('created_at', 'LIKE', "%$yesterday%")
                                ->count();
                            $yesterdayAttend += \App\Models\PassedExam::where('user_id', '!=', null)
                                ->where('created_at', 'LIKE', "%$yesterday%")
                                ->count();

                            $AttentPercentage = $yesterdayAttend ? (($currentDayAttend - $yesterdayAttend) * 100) / $yesterdayAttend : 100;
                        @endphp
                        {{ $currentDayAttend }} طالب
                        <span class="percent">{{ $AttentPercentage }}</span>
                    </p>
                </div>
                <div class="daily-icon">
                    <i class="fa-solid fa-user-check"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="daily-box">
                <div class="daily-content">
                    <h3 class="daily-name">الطلاب الحاليين</h3>
                    <p class="daily-p">
                        @php
                            $studentsCount = \App\Models\User::where('role_num', '>=', 4)->count();
                            $currentMonthCount = \App\Models\User::where('id', '!=', null)
                                ->where('created_at', 'LIKE', "%$currentMonth%")
                                ->count();
                            $lastMonthCount = \App\Models\User::where('id', '!=', null)
                                ->where('created_at', 'LIKE', "%$lastMonth%")
                                ->count();

                            $countPercentage = $lastMonthCount ? (($currentMonthCount - $lastMonthCount) * 100) / $lastMonthCount : 100;
                        @endphp
                        {{ $studentsCount }} طالب
                        <span class="percent">{{ $countPercentage }}</span>
                    </p>
                </div>
                <div class="daily-icon">
                    <i class="fa-solid fa-users-viewfinder"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="daily-box">
                <div class="daily-content">
                    <h3 class="daily-name">دخل اليوم</h3>
                    <p class="daily-p">
                        @php
                            $currentDay = date('Y-m-d', strtotime(now()));
                            $lastDay = date('Y-m-d', strtotime(strtotime('-1 day')));
                            $currentDayEncomme = array_sum(
                                \App\Models\BalanceCard::where('user_id', '!=', null)
                                    ->where('used_at', 'LIKE', "%$currentDay%")
                                    ->get()
                                    ->pluck('value')
                                    ->toArray(),
                            );
                            $lastDayEncomme = array_sum(
                                \App\Models\BalanceCard::where('user_id', '!=', null)
                                    ->where('used_at', 'LIKE', "%$lastDay%")
                                    ->get()
                                    ->pluck('value')
                                    ->toArray(),
                            );
                            $monthpercentage = $lastDayEncomme ? (($currentDayEncomme - $lastDayEncomme) * 100) / $lastDayEncomme : 100;
                        @endphp
                        {{ $currentDayEncomme }} ج.م
                        <span class="percent">{{ $monthpercentage }}</span>
                    </p>
                </div>
                <div class="daily-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row team">
        <div class="col-lg-7 col-md-12 white-box"style="padding-left: 5px;">
            <div class="release" style="padding:15px;">
                <div class="release-content">
                    <p class="team-by">
                        تم انشاء بواسطة مطورين
                    </p>
                    <h3 class="team-name">
                        ZIRCON Tech 2022
                    </h3>
                    <p class="sum-details">
                        تم انشاء المنصة لتطوير العملية
                        التعليمية بحلول ذكية.
                    </p>
                    <a href="#" class="page">اذهب لموقع المطورين
                        <i class="fa-solid fa-arrow-left-long"></i></a>
                </div>
                <div class="team-image">
                    <img src="{{ asset('admin/assets/imgs/logo3d.png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-sm-4 white-box mar">
            <div class="donut" style="width: 220px !important"></div>

            <div class="type">
                <div class="Presence">حضور</div>
                <div class="Absence">غياب</div>
            </div>
        </div>
        <div class="col-lg-2 col-sm-4 white-box mar">
            <div class="radial-bar"></div>
        </div>
    </div>
    <div class="row curves">
        <div class="col-lg-6 white-box" style="overflow-x: scroll">
            <div class="column" style="width: 150%; margin-right: -50%"></div>
            <div class="column-contnet">
                <div class="item1">المستوي العام</div>
                <div class="item2">الدخل</div>
                <div class="item3">عدد الطلاب</div>
            </div>

            {{-- <!-- <div>radssad</div> --> --}}
        </div>
        <div class="col-lg-5 white-box spline-parent" style="overflow-x: scroll; overflow-y: hidden">
            <div class="spline" style="min-width: 150%; margin-right: -50%"></div>
            <div class="spline-contnet">
                <div class="item1">المستوي العام</div>
                <div class="item2">الدخل</div>
            </div>
        </div>
    </div>
    <div class="row visitors">
        <div class="col-lg-8 g-praent-table">
            <div class="white-box table-parent">
                <h2>دخل السناتر</h2>
{{--                <div class="display">--}}
{{--                    <i class="fa-solid fa-check check"></i>--}}
{{--                    <span class="content">عرض </span>--}}
{{--                    <button class="display-date">--}}
{{--                        <span class="active-date">هذا الاسبوع</span>--}}
{{--                        <span class="display-arrow"><i class="fa-solid fa-caret-down"></i></span>--}}
{{--                    </button>--}}
{{--                    <ul class="display-list">--}}
{{--                        <li class="this-week">--}}
{{--                            <button class="added">--}}
{{--                                هذا الاسبوع--}}
{{--                            </button>--}}
{{--                        </li>--}}
{{--                        <li class="this-month">--}}
{{--                            <button class="added">--}}
{{--                                هذا الشهر--}}
{{--                            </button>--}}
{{--                        </li>--}}
{{--                        <li class="this-year">--}}
{{--                            <button class="added">--}}
{{--                                هذه السنة--}}
{{--                            </button>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th>السناتر</th>
                            <th>المحاضرة</th>
                            <th>عدد الحضور</th>
                            <th>الايرادات</th>
                            <th>التاريخ</th>
                            <th>نسبة الحضور</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="center-name">
                                الاوائل
                            </td>
                            <td class="subject-table">
                                الصف الثاني الثانوي - ب
                            </td>
                            <td class="member">465</td>
                            <td class="money">1698 ج.م</td>
                            <td class="date">18/7/2025</td>
                            <td class="progress-parent">
                                <span class="percentage-progress"><span class="num">70</span><span
                                        class="per">%</span></span>
                                <div class="progressbar">
                                    <span class="progress-child"></span>
                                </div>
                            </td>
                        </tr>

{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">25</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">40</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">70</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">90</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">100</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">50</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">50</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">50</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">50</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">50</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">50</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">50</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">50</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="center-name">--}}
{{--                                الاوائل--}}
{{--                            </td>--}}
{{--                            <td class="subject-table">--}}
{{--                                الصف الثاني الثانوي - ب--}}
{{--                            </td>--}}
{{--                            <td class="member">465</td>--}}
{{--                            <td class="money">1698 ج.م</td>--}}
{{--                            <td class="date">18/7/2025</td>--}}
{{--                            <td class="progress-parent">--}}
{{--                                <span class="percentage-progress"><span class="num">50</span><span--}}
{{--                                        class="per">%</span></span>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <span class="progress-child"></span>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row add-student-parent">
                <div class="col-lg-12 col-md-6 white-box add-student">
                    <div class="student-icon">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <p class="student-level">
                        الصف الأول الثانوي
                    </p>
                    <p class="total">
                        1289
                        <span class="percent">28</span>
                    </p>
                    <button class="add-btn">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <div class="col-lg-12 col-md-6 white-box add-student">
                    <div class="student-icon">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <p class="student-level">
                        الصف الأول الثانوي
                    </p>
                    <p class="total">
                        1289
                        <span class="percent">28</span>
                    </p>
                    <button class="add-btn">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <div class="col-lg-12 col-md-6 white-box add-student">
                    <div class="student-icon">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <p class="student-level">
                        الصف الأول الثانوي
                    </p>
                    <p class="total">
                        1289
                        <span class="percent">28</span>
                    </p>
                    <button class="add-btn">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <div class="col-lg-12 col-md-6 white-box add-student">
                    <div class="student-icon">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <p class="student-level">
                        الصف الثاني الثانوي
                    </p>
                    <p class="total">
                        1289
                        <span class="percent">-5</span>
                    </p>
                    <button class="add-btn">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <div class="col-lg-12 col-md-6 white-box add-student">
                    <div class="student-icon">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <p class="student-level">
                        الصف الثالث الثانوي
                    </p>
                    <p class="total">
                        1289
                        <span class="percent">63</span>
                    </p>
                    <button class="add-btn">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="white-box col-lg-12 visits-curve-parent" style="direction: ltr">
                <div class="visits-curve" style="margin-right: 0; min-width: 100%"></div>
                <div class="visits-content">
                    <span class="visitors-name">زيارات الموقع</span>
                    <div class="visits-total" style="direction: rtl">
                        <span class="visits-count">56,890</span>
                        <span class="percent">85</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra')
    <div class="overlay"></div>
    <div class="signup-menu">
        <h2>حساب جديد</h2>
        <form method="POST" action="#">
            <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input name="name" type="email" placeholder="اسمك بالكامل (باللغة العربية )" />
            </div>
            <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="email" name="email" placeholder="البريد الالكتروني" />
            </div>
            <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="password" name="password" placeholder="كلمة المرور" />
            </div>
            <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" />
            </div>

            <div class="input-box select-parent level">
                <i class="fa-solid fa-angle-down arrow-select"></i>
                <i class="fa-solid fa-user"></i>
                <select name="grade" id="" placeholder="المرحلة التعليمية ">
                    <option value="">المرحلة التعليمية</option>
                    <option value="الصف الأول الثانوي">
                        الصف الأول الثانوي
                    </option>
                    <option value="الصف الثاني الثانوي">
                        الصف الثاني الثانوي
                    </option>
                    <option value="الصف الثالث الثانوي">
                        الصف الثالث الثانوي
                    </option>
                </select>
            </div>
            <div class="input-box select-parent">
                <i class="fa-solid fa-angle-down arrow-select"></i>
                <i class="fa-solid fa-user"></i>
                <select name="center_location" id="" placeholder="مكان التعلم ">
                    <option value="NONE">مكان التعلم</option>
                    <option value="الصف الأول الثانوي">
                        الصف الأول الثانوي
                    </option>
                    <option value="الصف الثاني الثانوي">
                        الصف الثاني الثانوي
                    </option>
                    <option value="الصف الثالث الثانوي">
                        الصف الثالث الثانوي
                    </option>
                </select>
            </div>
            <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="phone_number" placeholder="رقم هاتفك" />
            </div>
            <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="parent_phone_number" placeholder="رقم هاتف والدك" />
            </div>
            <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="code" placeholder="معرف الكارت الذكي (لطلاب السنتر)" />
            </div>
            <div class="has-account">
                <button class="has-account-btn">
                    هل لديك حساب بالفعل ؟
                </button>
            </div>
            <div class="signup-registration">
                <button class="registration-btn">سجل جديد</button>
            </div>
        </form>
        <div class="close-login-signup">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
@endsection
@section('javascript')
    @php
    $studentsNamber = (int) '2150';
    $studentsCapacity = ($studentsNamber / 10000) * 100;

    $enrolledStudents = (int) '200';
    $absentStudents = (int) '50';

    @endphp
    <script>
        // students Capacity
        var option1 = {
            series: [{{ $studentsCapacity }}],
            chart: {
                height: 232,
                type: "radialBar",
                offsetY: -10,
                fontFamily: "poppins",
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 135,
                    dataLabels: {
                        name: {
                            fontSize: "16px",
                            color: undefined,
                            offsetY: 120,
                        },
                        value: {
                            offsetY: 76,
                            fontSize: "22px",
                            color: undefined,
                            formatter: function(val) {
                                return val + "%";
                            },
                        },
                    },
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    shadeIntensity: 0.15,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91],
                },
                colors: ["#3645FA"],
            },
            stroke: {
                dashArray: 4,
            },
            labels: ["سعة الطلاب"],
        };
        //الغياب و الحضور
        var options2 = {
            series: [{{ $enrolledStudents }}, {{ $absentStudents }}],
            chart: {
                type: "donut",
                fontFamily: "poppins",
                foreColor: "#373d3f",
            },
            labels: ["حضور", "غياب"],
            fill: {
                colors: ["#2484FF", "#3645FA"],
            },
        };
        //جدول العواميد
        var options3 = {
            series: [{
                    name: "المستوى العام",
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
                },
                {
                    name: "الدخل",
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
                },
                {
                    name: "عدد الطلاب",
                    data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
                },
            ],
            chart: {
                type: "bar",
                height: 280,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    endingShape: "rounded",
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 40,
                colors: ["transparent"],
            },
            xaxis: {
                categories: [
                    "الاوائل",
                    "نوبل",
                    "البطل",
                    "السنيرو",
                    "الاوائل",
                    "نوبل",
                    "البطل",
                    "السنيرو",
                    "الاوائل",
                ],
            },
            yaxis: {
                title: {
                    text: "$ (thousands)",
                },
            },
            fill: {
                colors: ["#2484FF", "#344767", "#3645FA"],
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val;
                    },
                },
            },
        };
        // curve
        var options4 = {
            series: [{
                    name: "الدخل",
                    data: [31, 40, 28, 51, 42, 109, 100],
                },
                {
                    name: "المستوى العام",
                    data: [11, 32, 45, 32, 34, 52, 41],
                },
            ],
            fill: {
                colors: ["#2484FF", "#344767"],
            },
            chart: {
                height: 280,
                type: "area",
                fontFamily: "poppins",
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
                colors: ["#3645FA", "#344767"],
            },
            xaxis: {
                type: "date",
                categories: [
                    "2018-02-20",
                    "2018-03-20",
                    "2018-04-20",
                    "2018-05-20",
                    "2018-06-20",
                    "2018-07-20",
                    "2018-08-20",
                ],
            },
            tooltip: {
                x: {
                    format: "dd/MM/yy",
                },
            },
        };
        var options5 = {
            series: [{
                name: "عدد الزوار",
                data: [31, 40, 28, 51, 42, 109, 100],
                color: '#3645FA',
            }, ],
            fill: {
                colors: ["#2484FF"],
            },
            chart: {
                height: 280,
                type: "area",
                fontFamily: "poppins",
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
                colors: ["#3645FA", "#344767"],
            },
            xaxis: {
                type: "date",
                categories: [
                    "02-19",
                    "03-19",
                    "04-19",
                    "05-19",
                    "06-19",
                    "07-19",
                    "08-19",
                ],
            },
            tooltip: {
                x: {
                    format: "dd/MM",
                },
            },
        };
    </script>


    {{-- <!--font awesome--> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <!--Apex Charts--> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
@endsection
