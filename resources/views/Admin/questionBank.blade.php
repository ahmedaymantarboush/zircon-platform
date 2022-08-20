@extends('layouts.adminLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/questionBank.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/responsive.css') }}" />
@endsection
@section('content')
    <div class="page-heading white-box">
        <span class="page-icon"><i class="fa-solid fa-clipboard-question"></i></span>
        <h2 class="page-h">بنك الاسئلة</h2>
    </div>
    <div class="lectures-statistics row">
        <div class="col-lg-3 col-sm-6">
            <a href="#" class="add-new-lec" style="width: 100%">
                <div class="stc-box" data-bs-toggle="modal" data-bs-target="#quick-modify" id="addNewQuestion">
                    <div class="stc-val-parent">
                        <span class="stc-value">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                        <span data-bs-toggle="modal" data-bs-target="#addQues" class="stc-name">اضافة السؤال
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="real-stc" style="width: 100%">
                <div class="stc-box second-stc">
                    <div class="stc-val-parent">
                        <span class="stc-value"> 132 </span>
                        <span class="stc-name">مرات الإجابة الصحيحة</span>
                    </div>
                    <div class="stc-icon">
                        <span class=""><i class="fa-solid fa-circle-check"></i></span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="real-stc" style="width: 100%">
                <div class="stc-box second-stc">
                    <div class="stc-val-parent">
                        <span class="stc-value"> 132 </span>
                        <span class="stc-name">مرات الإجابة الخاطئة</span>
                    </div>
                    <div class="stc-icon">
                        <span class="">
                            <i class="fa-solid fa-circle-xmark"></i></span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="real-stc" style="width: 100%">
                <div class="stc-box second-stc">
                    <div class="stc-val-parent">
                        <span class="stc-value">
                            3410
                        </span>
                        <span class="stc-name">سؤال</span>
                    </div>
                    <div class="stc-icon">
                        <span class=""><i class="fa-solid fa-question"></i></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <form action="{{ route('admin.questions.filter') }}" method="POST" class="lec-filter">
        @csrf
        <h3>لائحة الأسئلة</h3>
        <div class="custome-row">
            <div class="row">
                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">المرحلة الدراسية</label>
                        <div class="search-select-box">
                            <select name="grade" id="" data-live-search="true">
                                <option value="">
                                    جميع المراحل الدراسية
                                </option>
                                @foreach (\App\Models\Grade::all() as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                                {{-- <option value="">3</option> --}}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">المادة</label>
                        <div class="search-select-box">
                            <select name="subject" id="" data-live-search="true">
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
                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">الجزئية الدراسية</label>
                        <div class="search-select-box">
                            <select name="part" id="" data-live-search="true">
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
                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">المحرر </label>
                        <div class="search-select-box">
                            <select name="teacher" id="" data-live-search="true">
                                <option value="">
                                    جميع المدرس
                                </option>
                                @foreach (\App\Models\User::where('role_id', 3) as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="filter-item">
                        <label for="">درجة الصعوبة </label>
                        <div class="search-select-box">
                            <select name="level" id="" data-live-search="true">
                                <option value="">
                                    ردجة الصعوبة
                                </option>
                                @for ($i = 1; $i <= 4; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                                <option value="5">للطالب الشكساوي</option>
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
                    <th>السؤال</th>
                    <th>المرحلة الدراسية</th>
                    <th>المادة</th>
                    <th>الجزئية الدراسية</th>
                    <th>درجة الصعوبة</th>
                    <th>إجابة صحيحة</th>
                    <th>اجابه خاطئة</th>
                    <th class="features">اجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $index => $question)
                    @php
                        $i = $index + 1;
                        $correctAnswers = count($question->answers()->where('correct',1)->get());
                        $wrongAnswers = count($question->answers()->where('correct',0)->get());
                    @endphp
                    <tr data-id="{{ $question->id }}" class="@if($correctAnswers || $wrongAnswers) @if($correctAnswers > $wrongAnswers) greenBg @elseif($correctAnswers < $wrongAnswers) redBg @elseif($correctAnswers == $wrongAnswers) blueBg @endif @endif">
                        <td class="number">
                            {{ $i }}
                            <button class="open-tr" type="button">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </td>
                        <td data-lable="السؤال :" class="address">
                            <div class="custome-parent">
                                <div class="question-code-parent">
                                    <span class="question-mark"><i class="fa-solid fa-question"></i></span>
                                    <!-- <span
                                           class="question-code"
                                          >
                                           ما هو التيار الكهربي
                                          </span> -->
                                    <button type="button" class="btn question-code" data-toggle="tooltip"
                                        data-placement="top" title="{{ $question->name }}">
                                        {{ $question->name }}
                                    </button>
                                </div>
                                <div class="name-teacher">
                                    <span class="job-teacher">المدرس:</span>
                                    <span>{{$question->publisher->name}}</span>
                                </div>
                            </div>
                        </td>
                        <td data-lable="المرحلة الدراسية :" class="table-level-parent">
                            <span class="table-level">{{$question->grade->name}}</span>
                        </td>
                        <td data-lable="المادة :" class="table-sections">
                            <div class="custome-parent">
                                {{$question->subject->name}}
                            </div>
                        </td>
                        <td data-lable="الجزئية الدراسية :" class="students">
                            {{$question->part->name}}
                        </td>
                        <td data-lable="درجة الصعوبة :" class="views">
                            {{$question->level}}
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
                                        <a class="dropdown-item" href="#">عرض السؤال</a>
                                    </li>

                                    <li>
                                        <a data-bs-toggle="modal" data-bs-target="#quick-modify"
                                            class="dropdown-item q-modify" href="#">تعديل السؤال
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                            data-bs-target="#delete-lecture">مسح السؤال</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{-- <tr class="greenBg">
                    <td class="number">
                        1
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="السؤال :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="question-mark"><i class="fa-solid fa-question"></i></span>
                                <!-- <span
                               class="question-code"
                              >
                               ما هو التيار الكهربي
                              </span> -->
                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top"
                                    title="ماهو التيار واين يوجد التيار والي متي سوف يتم تواجد التيار">
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
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
                    <td data-lable="المادة :" class="table-sections">
                        <div class="custome-parent">
                            الفيزياء
                        </div>
                    </td>
                    <td data-lable="الجزئية الدراسية :" class="students">
                        العزوم
                    </td>
                    <td data-lable="درجة الصعوبة :" class="views">
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
                                    <a class="dropdown-item" href="#">عرض السؤال</a>
                                </li>

                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#quick-modify"
                                        class="dropdown-item q-modify" href="#">تعديل السؤال
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                        data-bs-target="#delete-lecture">مسح السؤال</a>
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
                    <td data-lable="السؤال :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="question-mark"><i class="fa-solid fa-question"></i></span>
                                <!-- <span
                               class="question-code"
                              >
                               ما هو التيار الكهربي
                              </span> -->
                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top"
                                    title="ماهو التيار واين يوجد التيار والي متي سوف يتم تواجد التيار">
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
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
                    <td data-lable="المادة :" class="table-sections">
                        <div class="custome-parent">
                            الفيزياء
                        </div>
                    </td>
                    <td data-lable="الجزئية الدراسية :" class="students">
                        العزوم
                    </td>
                    <td data-lable="درجة الصعوبة :" class="views">
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
                                    <a class="dropdown-item" href="#">عرض السؤال</a>
                                </li>

                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#quick-modify"
                                        class="dropdown-item q-modify" href="#">تعديل السؤال
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                        data-bs-target="#delete-lecture">مسح السؤال</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="blueBg">
                    <td class="number">
                        1
                        <button class="open-tr" type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td data-lable="السؤال :" class="address">
                        <div class="custome-parent">
                            <div class="question-code-parent">
                                <span class="question-mark"><i class="fa-solid fa-question"></i></span>
                                <!-- <span
                               class="question-code"
                              >
                               ما هو التيار الكهربي
                              </span> -->
                                <button type="button" class="btn question-code" data-toggle="tooltip"
                                    data-placement="top"
                                    title="ماهو التيار واين يوجد التيار والي متي سوف يتم تواجد التيار">
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
                                    ما هو التيار الكهربي
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
                    <td data-lable="المادة :" class="table-sections">
                        <div class="custome-parent">
                            الفيزياء
                        </div>
                    </td>
                    <td data-lable="الجزئية الدراسية :" class="students">
                        العزوم
                    </td>
                    <td data-lable="درجة الصعوبة :" class="views">
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
                                    <a class="dropdown-item" href="#">عرض السؤال</a>
                                </li>

                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#quick-modify"
                                        class="dropdown-item q-modify" href="#">تعديل السؤال
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item delete-lec" href="#" data-bs-toggle="modal"
                                        data-bs-target="#delete-lecture">مسح السؤال</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('admin/assets/js/questionBank.js') }}"></script>
@endsection
