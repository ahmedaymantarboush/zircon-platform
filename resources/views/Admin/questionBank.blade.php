@extends('layouts.adminLayout')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />

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
                <div class="stc-box" data-bs-toggle="modal" data-bs-target="#addQues" id="addNewQuestion">
                    <div class="stc-val-parent">
                        <span class="stc-value">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                        <span class="stc-name">اضافة السؤال
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="real-stc" style="width: 100%">
                <div class="stc-box second-stc">
                    <div class="stc-val-parent">
                        <span class="stc-value"> {{ count(\App\Models\AnswerdQuestion::where('correct', 1)->get()) }}
                        </span>
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
                        <span class="stc-value"> {{ count(\App\Models\AnswerdQuestion::where('correct', 0)->get()) }}
                        </span>
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
                            {{ count(\App\Models\AnswerdQuestion::all()) }}
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
    <div class="lectureTableParent">
        <form action="" class="lec-filter">
            <input type="hidden" name="hasFilter" value="true">
            <h3>لائحة الأسئلة</h3>
            <div class="custome-row">
                <div class="row">
                    <div class="col-lg-2 col-sm-6">
                        <div class="filter-item">
                            <label for="">المرحلة الدراسية</label>
                            <div class="search-select-box">
                                <select name="grade_id" id="" data-live-search="true">
                                    <option value="all">
                                        جميع المراحل الدراسية
                                    </option>
                                    @foreach (\App\Models\Grade::all() as $grade)
                                        <option @selected(request()->grade_id == $grade->id) value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <div class="filter-item">
                            <label for="">المادة</label>
                            <div class="search-select-box">
                                <select name="subject_id" id="" data-live-search="true">
                                    <option value="all">
                                        المادة
                                    </option>
                                    @foreach (\App\Models\Subject::all() as $subject)
                                        <option @selected(request()->subject_id == $subject->id) value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="filter-item">
                            <label for="">الجزئية الدراسية</label>
                            <div class="search-select-box">
                                <select name="part_id" id="" data-live-search="true">
                                    <option value="all">
                                        الجزئية الدراسية
                                    </option>
                                    @foreach (\App\Models\Part::all() as $part)
                                        <option @selected(request()->part_id == $part->id) value="{{ $part->id }}">{{ $part->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="filter-item">
                            <label for="">المحرر </label>
                            <div class="search-select-box">
                                <select name="user_id" id="" data-live-search="true">
                                    <option value="all">
                                        جميع المدرسين
                                    </option>
                                    @foreach (\App\Models\User::where('role_num','<', 4)->get() as $teacher)
                                        <option @selected(request()->user_id == $teacher->id) value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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
                                    <option value="all">
                                        ردجة الصعوبة
                                    </option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option @selected(request()->level == $i) value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-btn">
                    <input type="submit" class="filter-btn" value="فلترة" />
                </div>
            </div>
            {{-- <div class="search-field">
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
            </div> --}}
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
                            $correctAnswers = count(
                                $question
                                    ->answers()
                                    ->where('correct', 1)
                                    ->get(),
                            );
                            $wrongAnswers = count(
                                $question
                                    ->answers()
                                    ->where('correct', 0)
                                    ->get(),
                            );
                        @endphp
                        <tr data-id="{{ $question->id }}"
                            class="@if ($correctAnswers || $wrongAnswers) @if ($correctAnswers > $wrongAnswers) greenBg @elseif($correctAnswers < $wrongAnswers) redBg @elseif($correctAnswers == $wrongAnswers) blueBg @endif @endif">
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
                                        <button type="button" class="btn question-code" data-toggle="tooltip"
                                            data-placement="top" title="@php echo $question->text; @endphp">
                                            {{ $question->name }}
                                        </button>
                                    </div>
                                    <div class="name-teacher">
                                        <span class="job-teacher">المدرس:</span>
                                        <span>{{ $question->publisher->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td data-lable="المرحلة الدراسية :" class="table-level-parent">
                                <span class="table-level">{{ $question->grade->name }}</span>
                            </td>
                            <td data-lable="المادة :" class="table-sections">
                                <div class="custome-parent">
                                    {{ $question->subject->name }}
                                </div>
                            </td>
                            <td data-lable="الجزئية الدراسية :" class="students">
                                {{ $question->part->name }}
                            </td>
                            <td data-lable="درجة الصعوبة :" class="views">
                                {{ $question->level }}
                            </td>
                            <td data-lable="إجابة صحيحة :" class="table-stat-parent">
                                <span class="table-stat not-active">{{ $correctAnswers }}</span>
                            </td>
                            <td data-lable="اجابه خاطئة :" class="table-price-parent">
                                <span class="table-price not-free">{{ $wrongAnswers }}</span>
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
                </tbody>
            </table>
        </div>
    </div>

    <form action="{{ route('admin.questions.update') }}" method="POST" class='editModalForm'
        enctype="multipart/form-data">
        @csrf
        <div class="modal fade prevPopup" id="quick-modify" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title addQuestionTitle" id="exampleModalLabel">
                            تعديل سؤال
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div>
                        <div class="modal-body">
                            <div class="less-item custome-item">
                                <label class="sec-name">اسم السؤال</label>

                                <div class="input-parent">
                                    <input value="{{ old('newName') }}" type="text"
                                        class="my-input @error('newName') is-invalid @enderror" name="newName"
                                        placeholder=" ادخل اسم السؤال" id="questionAddress" />
                                    @error('newName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="less-item custome-item">
                                <label class="sec-name">المرحلة الدراسية</label>
                                <div class="search-select modify-select" id="select-level-parent">
                                    <select name="newGrade" id=""
                                        class="@error('newGrade') is-invalid @enderror" data-live-search="true">
                                        <option value="">
                                            اختر المرحلة الدراسية
                                        </option>
                                        @foreach (\App\Models\Grade::all() as $grade)
                                            <option @selected(old('newGrade') == $grade->id) value="{{ $grade->id }}">
                                                {{ $grade->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('newGrade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="less-item custome-item">
                                <label class="sec-name">المادة</label>
                                <div class="search-select modify-select" id="select-subject-parent">
                                    <select name="newSubject" id=""
                                        class="@error('newSubject') is-invalid @enderror" data-live-search="true">
                                        <option value="">
                                            اختر المادة
                                        </option>
                                        @foreach (\App\Models\Subject::all() as $subject)
                                            <option @selected(old('newSubject') == $subject->id) value="{{ $subject->id }}">
                                                {{ $subject->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('newSubject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="less-item custome-item">
                                <label class="sec-name">الجزئية الدراسية</label>
                                <div class="search-select modify-select" id="select-part-parent">
                                    <select name="newPart" id="" class="@error('newPart') is-invalid @enderror"
                                        data-live-search="true">
                                        <option value="">
                                            اختر الجزئية الدراسية
                                        </option>
                                        @foreach (\App\Models\Part::all() as $part)
                                            <option @selected(old('newPart') == $part->id) value="{{ $part->id }}">
                                                {{ $part->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('newPart')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="less-item custome-item">
                                <label class="sec-name">درجة الصعوبة</label>
                                <div class="search-select modify-select" id="chooseHard">
                                    <select name="newLevel" id=""
                                        class="@error('newLevel') is-invalid @enderror" data-live-search="true">
                                        <option value="">
                                            اختر درجة الصعوبة
                                        </option>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <option @selected(old('newLevel') == $i) value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                        <option @selected(old('newLevel') == 5) value="5">
                                            5
                                        </option>
                                    </select>
                                    @error('newLevel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="less-item custome-item">
                                <label class="sec-name">عدد الاجابات</label>

                                <div class="input-parent">
                                    <input value="{{ old('newChoicesCount') }}" type="number" name="newChoicesCount"
                                        class="my-input @error('newChoicesCount') is-invalid @enderror"
                                        placeholder=" ادخل عدد الاجابات من 1 الي 6" id="ansewrsCount" min="1"
                                        max="6" />
                                    @error('newChoicesCount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary nextBtn">
                                التالي
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                الغاء
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="nextPopupQuick" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title addQuestionTitle" id="exampleModalLabel">
                            تعديل السؤال
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div>
                        <div class="modal-body">
                            <div>
                                <label for="" class="sec-name">هل هذا السؤال يحتوي على صورة ؟</label>
                                <div class="hasImage">
                                    <input name="newHasImage" @checked(old('newHasImage')) type="checkbox"
                                        id="hasImageCheck" />
                                    <label for="">ضع علامة اذا كان السؤال يحتوي على
                                        صورة</label>
                                </div>
                            </div>
                            <div class="file" id="hasImageFile">
                                <label for="formFile" class="sec-name">رفع
                                </label>
                                <input name="newImage" value="{{ old('newImage') }}"
                                    class="form-control @error('newImage') is-invalid @enderror" type="file"
                                    id="formFile" value="تصفح" accept="image/png, image/jpeg" />
                                @error('newImage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="less-item">
                                <label class="sec-name">السؤال</label>
                                <textarea id='descriptionQues' name="newText" class="text-editor2">{{ old('newText') }}</textarea>
                            </div>
                            <div class="answersParent">
                                <label id="answerLabel" for="" class="sec-name">الاجابات</label>
                                {{-- <div class="answerItem">
                                    <div class="radioBox">
                                        <input class='answersRadio' type="radio" value="اسم الinput[text]" name="newanswerInput" id="1" />
                                        <label for="1"></label>
                                    </div>
                                    <input name="newالاسم" type="text" class="my-input answersInput" />
                                </div> --}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary nextBtn">
                                تعديل
                            </button>
                            <button type="button" class="btn btn-secondary prevBtn" data-bs-dismiss="modal">
                                السابق
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('admin.questions.store') }}" method="POST" class='addModalForm'
        enctype="multipart/form-data">
        @csrf
        <div class="modal fade prevPopup" id="addQues" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title addQuestionTitle" id="exampleModalLabel">
                            إضافة سؤال جديد
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div>
                        <div class="modal-body">
                            <div class="less-item custome-item">
                                <label class="sec-name">اسم السؤال</label>

                                <div class="input-parent">
                                    <input value="{{ old('name') }}" type="text"
                                        class="my-input @error('name') is-invalid @enderror" name="name"
                                        placeholder=" ادخل اسم السؤال" id="address-lec" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="less-item custome-item">
                                <label class="sec-name">المرحلة الدراسية</label>
                                <div class="search-select modify-select" id="select-level-parent">
                                    <select name="grade" id="" class="@error('grade') is-invalid @enderror"
                                        data-live-search="true">
                                        <option value="">
                                            اختر المرحلة الدراسية
                                        </option>
                                        @foreach (\App\Models\Grade::all() as $grade)
                                            <option @selected(old('grade') == $grade->id) value="{{ $grade->id }}">
                                                {{ $grade->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('grade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="less-item custome-item">
                            <label class="sec-name">المادة</label>
                            <div class="search-select modify-select" id="select-subject-parent">
                                <select name="subject" id="" class="@error('subject') is-invalid @enderror"
                                    data-live-search="true">
                                    <option value="">
                                        اختر المادة
                                    </option>
                                    @foreach (\App\Models\Subject::all() as $subject)
                                    <option @selected(old('subject')==$subject->id) value="{{ $subject->id }}">
                                        {{ $subject->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}
                            <div class="less-item custome-item">
                                <label class="sec-name">الجزئية الدراسية</label>
                                <div class="search-select modify-select" id="select-part-parent">
                                    <select name="part" id="" class="@error('part') is-invalid @enderror"
                                        data-live-search="true">
                                        <option value="">
                                            اختر الجزئية الدراسية
                                        </option>
                                        @foreach (\App\Models\Part::all() as $part)
                                            <option @selected(old('part') == $part->id) value="{{ $part->id }}">
                                                {{ $part->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('part')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="less-item custome-item">
                                <label class="sec-name">درجة الصعوبة</label>
                                <div class="search-select modify-select" id="select-part-parent">
                                    <select name="level" id="" class="@error('level') is-invalid @enderror"
                                        data-live-search="true">
                                        <option value="">
                                            اختر درجة الصعوبة
                                        </option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option @selected(old('level') == $i) value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                        {{-- <option @selected(old('level') == 5) value="5">
                                            5
                                        </option> --}}
                                    </select>
                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="less-item custome-item">
                                <label class="sec-name">عدد الاجابات</label>

                                <div class="input-parent">
                                    <input value="{{ old('choicesCount') }}" type="number" name="choicesCount"
                                        class="my-input @error('choicesCount') is-invalid @enderror"
                                        placeholder=" ادخل عدد الاجابات من 1 الي 6" id="ansewrsCount" min="1"
                                        max="6" />
                                    @error('choicesCount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary nextBtn">
                                التالي
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                الغاء
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="nextPopupAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title addQuestionTitle" id="exampleModalLabel">
                            إضافة سؤال جديد
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div>
                        <div class="modal-body">
                            <div>
                                <label for="" class="sec-name">هل هذا السؤال يحتوي على صورة ؟</label>
                                <div class="hasImage">
                                    <input name="hasImage" @checked(old('hasImage')) type="checkbox"
                                        id="hasImageCheck" />
                                    <label for="">ضع علامة اذا كان السؤال يحتوي على
                                        صورة</label>
                                </div>
                            </div>
                            <div class="file" id="hasImageFile">
                                <label for="formFile" class="sec-name">رفع
                                </label>
                                <input name="image" value="{{ old('image') }}"
                                    class="form-control @error('image') is-invalid @enderror" type="file"
                                    id="formFile" value="تصفح" accept="image/png, image/jpeg" />
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="less-item">
                                <label class="sec-name">السؤال</label>
                                <textarea name="text" class="text-editor1">{{ old('text') }}</textarea>
                            </div>
                            <div class="answersParent">
                                <label id="answerLabel" for="" class="sec-name">الاجابات</label>
                                {{-- <div class="answerItem">
                                    <div class="radioBox">
                                        <input type="radio" value="اسم الinput[text]" name="answerInput" id="1" />
                                        <label for="1"></label>
                                    </div>
                                    <input name="الاسم" type="text" class="my-input" />
                                </div> --}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary nextBtn">
                                أضافة
                            </button>
                            <button type="button" class="btn btn-secondary prevBtn" data-bs-dismiss="modal">
                                السابق
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="delete-lecture" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        حذف سؤال
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.questions.destroy') }}" id="deleteModal" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="sure-to-del">
                            هل انت متأكد انك تريد مسح السؤال
                            <span class="del-lesson"> ..... </span>
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
    {{-- <!--jquery--> --}}

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

    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/questionBank.js') }}"></script>
@endsection
