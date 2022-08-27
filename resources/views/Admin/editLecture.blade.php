@extends('layouts.adminLayout')

@section('css')
    <!-- موجود هنا بس  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/add-lecture.css') }}" />
    <!-- موجود في هنا والايديت  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />
@endsection

@section('content')
    <div class="page-heading white-box">
        <span class="page-icon"><i class="fa-solid fa-graduation-cap"></i></span>
        <h2 class="page-h">إضافة محاضرة جديدة</h2>
    </div>
    <section class="add-lecture white-box">
        <div class="add-lec-heading">
            <h3>اضافة محاضرة</h3>
            <a href="{{route('admin.lectures.index')}}" class="go-to-lectures">
                الرجوع الي قائمة المحاضرات
                <span><i class="fa-solid fa-arrow-left-long"></i></span></a>
        </div>
        <!-- start tabs  -->
        <div class="sections-tabs">
            <button class="sections tab-item active" data-index="0">
                <span><i class="fa-solid fa-book"></i></span>
                <span class="tab-name">الاقسام</span>
            </button>
            <button class="base tab-item" data-index="1">
                <span><i class="fa-solid fa-pen-to-square"></i></span>
                <span class="tab-name">الأساسية</span>
            </button>
            <button class="means tab-item" data-index="2">
                <span><i class="fa-solid fa-photo-film"></i></span>
                <span class="tab-name">الوسائط</span>
            </button>
            <button class="seo tab-item" data-index="3">
                <span><i class="fa-solid fa-tags"></i></span>
                <span class="tab-name">seo</span>
            </button>
            <button class="pricing tab-item" data-index="4">
                <span><i class="fa-solid fa-money-bill-wave"></i></span>
                <span class="tab-name">التسعير</span>
            </button>
            <button class="end tab-item" data-index="5">
                <span><i class="fa-solid fa-check-to-slot"></i></span>
                <span class="tab-name">الانهاء</span>
            </button>
        </div>
        <!-- هنا التاب الي خاصة بالاقسام  -->
        <div class="sections-body item-body active">
            <div class="btns">
                <!-- add section btn  -->
                <div class="add-section">
                    <button type="button" class="btn custome-btn" data-bs-toggle="modal" data-bs-target="#add-sec">
                        اضافة قسم
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="modal fade" id="add-sec" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        إضافة قسم
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <form action="{{ route('sections.store') }}" method='POST'>
                                    @csrf
                                    <input type="hidden" name="order" class="my-input"
                                        value="{{ count(\App\Models\Section::where(['lecture_id' => $lecture->id])->get()) + 1 }}" />
                                    <input type="hidden" name="lec" value="{{ $lecture->slug }}">
                                    <div class="modal-body">
                                        <label class="sec-name">اسم القسم</label>
                                        <input type="text" name="sectionTitle"
                                            class="my-input @error('sectionTitle') is-invalid @enderror"
                                            placeholder=" ادخل اسم القسم" />
                                        @error('sectionTitle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                </div>
                <!-- add lesson btn  -->
                <div class="add-less">
                    <button type="button" class="btn custome-btn" data-bs-toggle="modal" data-bs-target="#add-less">
                        اضافة درس
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="modal fade" id="add-less" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        إضافة درس
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.lesson.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="less-item custome-item">
                                            <label class="sec-name">عنوان الدرس</label>
                                            <input type="text" name="lessonTitle"
                                                class="my-input @error('lessonTitle') is-invalid @enderror"
                                                placeholder=" ادخل عنوان الدرس" />
                                            @error('lessonTitle')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="less-item custome-item">
                                            <label class="sec-name">القسم</label>
                                            <div class="search-select">
                                                <select name="section" class="@error('section') is-invalid @enderror"
                                                    data-live-search="true">
                                                    <option value="">اختر القسم الذي يتبعه هذا الدرس</option>

                                                    @foreach ($lecture->sections as $section)
                                                        <option value="{{ $section->id }}">{{ $section->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('section')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="less-item custome-item">
                                            <label class="sec-name">الجزئية الدراسية</label>
                                            <div class="search-select">
                                                <select name="lessonPart" class="@error('section') is-invalid @enderror"
                                                    data-live-search="true">
                                                    <option value="">اختر الجزئية الدراسية</option>

                                                    @foreach ($lecture->parts as $part)
                                                        <option value="{{ $part->id }}">{{ $part->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('section')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="less-item type-parent">
                                            <div class="file">
                                                <label for="formFile" class="form-label">رابط الدرس</label>
                                                <input class="my-input @error('url') is-invalid @enderror" name="url"
                                                    type="url" id="lessonUrl" placeholder=" ادخل رابط الدرس" />
                                                @error('url')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="less-item">
                                            <label class="sec-name">وصف الدرس</label>
                                            <textarea name="description" class="text-editor2 @error('description') is-invalid @enderror"></textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="less-item">
                                            <label class="sec-name">هل هذا الدرس يفتح اعتمادا على درجة امتحان؟</label>
                                            <div class="follow-check">
                                                <input id="have-exam-check" name="dependsOnExam" type="checkbox"
                                                    class="@error('dependsOnExam') is-invalid @enderror"
                                                    placeholder=" ادخل اسم القسم" />
                                                @error('dependsOnExam')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="have-exam-check">ضع علامة اذا كان الدرس يفتح اعتمادا على درجة
                                                    امتحان</label>
                                                <div class="have-exam">
                                                    <div class="search-exam-parent">
                                                        <label for="">امتحان</label>
                                                        <div class="search-select">
                                                            <select name="exam"
                                                                class="@error('exam') is-invalid @enderror"
                                                                data-live-search="true">
                                                                <option value="">اختر كود اواسم الامتحان</option>

                                                                @foreach (\App\Models\Exam::where(['grade_id' => $lecture->grade->id, 'subject_id' => $lecture->subject->id, 'user_id' => Auth::id()])->get() as $exam)
                                                                    <option value="{{ $exam->id }}">
                                                                        {{ $exam->title }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('exam')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="search-exam-parent">
                                                        <label for="">درجة الامتحان او النسبة المئوية</label>
                                                        <input class="my-input @error('percentage') is-invalid @enderror"
                                                            type="text" name="percentage"
                                                            placeholder="ادخل النسبة المئوية لدرجة الامتحان (50%:100%)" />
                                                        @error('percentage')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
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
                </div>
                <!-- add  exam btn 	 -->
                <div class="add-section">
                    <button type="button" class="custome-btn" data-bs-toggle="modal" data-bs-target="#add-exam">
                        اضافة امتحان
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="modal fade" id="add-exam" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        إضافة إمتحان جديد
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('sectionitems.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="custome-item">
                                            <label for="" class="sec-name">اسم
                                                الامتحان</label>
                                            <input type="text" name="examTitle"
                                                class="my-input @error('examTitle') is-invalid @enderror"
                                                placeholder="ادخل اسم الامتحان" />
                                            @error('examTitle')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="custome-item">
                                            <label for="" class="sec-name">القسم</label>
                                            <div class="search-select">
                                                <select name="section" id=""
                                                    class="@error('section') is-invalid @enderror"
                                                    data-live-search="true">
                                                    <option value="">اختر القسم الذي يتبعه هذا الامتحان</option>
                                                    @foreach ($lecture->sections as $section)
                                                        <option value="{{ $section->id }}">{{ $section->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('section')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="custome-item">
                                            <label for="item" class="sec-name">اختر الامتحان</label>
                                            <div class="search-select">
                                                <select name="item" id=""
                                                    class="@error('item') is-invalid @enderror" data-live-search="true">
                                                    <option value="">ادخل كود او اسم الامتحان</option>

                                                    @foreach (\App\Models\Exam::where(['grade_id' => $lecture->grade->id, 'subject_id' => $lecture->subject->id, 'user_id' => Auth::id()])->get() as $exam)
                                                        <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('item')
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
                </div>
                <!-- sort section btn  -->
                <div class="add-section">
                    <button type="button" class="custome-btn" data-bs-toggle="modal" data-bs-target="#sort-sections">
                        ترتيب الاقسام
                        <i class="fa-solid fa-list-ol"></i>
                    </button>
                    <div class="modal fade" id="sort-sections" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        تعديل ترتيب الأقسام
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="sort-form" id="sort-section-form" action="{{ route('sections.resort') }}"
                                    method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="custome-sort lessons-sort">
                                            <div class="sort-heading">
                                                <h5 class="sort-head-name">
                                                    <span class="type-less">قائمة الاقسام
                                                    </span>
                                                </h5>
                                                <input type="submit" class="custome-btn" value="تحديث الترتيب" />
                                            </div>

                                            <div class="sort-items">
                                                <div class="container">
                                                    <div class="row">
                                                        <div
                                                            class="col-sm-9 col-xl-10 order-2 order-sm-1 mt-3 sort-parent">
                                                            <div id="sectionsSorting" class="list-group mb-4 mt-3"
                                                                data-id="1">

                                                                @foreach (\App\Models\Section::where('lecture_id', $lecture->id)->orderBy('order')->get() as $section)
                                                                    <div class="list-group-item d-flex align-items-center justify-content-between"
                                                                        data-id="{{ $section->order }}">
                                                                        <input type="hidden"
                                                                            name="order{{ $section->id }}">
                                                                        <div>
                                                                            <p
                                                                                class="mb-0 d-inline-flex align-items-center">
                                                                                {{ $section->title }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- هنا بقا يظهر الاقسام  -->
            <div class="sections-items">
                <!-- ده الاب بتاع كل قسم  -->
                @foreach (\App\Models\Section::where(['lecture_id' => $lecture->id])->orderBy('order')->get() as $section)
                    <div class="section-item">
                        <div class="section-item-control">
                            <div class="section-item-heading">
                                قسم
                                <span class="section-num">{{ $section->order }}</span>
                                :
                                <span class="section-item-name">{{ $section->title }}</span>
                            </div>
                            <!-- هنا الزراير الخاصة بتعديلات السكشن  -->
                            <div class="section-item-btns">
                                <button type="button" class="custome-btn modify-btn" data-bs-toggle="modal"
                                    data-bs-target="#modify-sec-{{ $section->id }}">
                                    تعديل القسم
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <div class="modal fade" id="modify-sec-{{ $section->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    تعديل القسم
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('sections.update', $section->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="less-item">
                                                        <label for="" class="sec-name">اسم القسم</label>
                                                        <input
                                                            class="my-input @error('new_sectionTitle') is-invalid @enderror"
                                                            name="new_sectionTitle" type="text"
                                                            value="{{ $section->title }}"
                                                            placeholder="ادخل اسم القسم الجديد" />
                                                        @error('new_sectionTitle')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                        تعديل
                                                    </button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        الغاء
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="custome-btn modify-btn" data-bs-toggle="modal"
                                    data-bs-target="#sort-lessons{{ $section->id }}">
                                    تعديل ترتيب الدروس
                                    <i class="fa-solid fa-sort"></i>
                                </button>
                                <div class="modal fade" id="sort-lessons{{ $section->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    تعديل ترتيب الدروس
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form class="sort-form" id="sort-item-form"
                                                action="{{ route('sectionitems.resort') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="custome-sort lessons-sort">
                                                        <div class="sort-heading">
                                                            <h5 class="sort-head-name">
                                                                {{-- <span class="type-less">درس
                                                                </span>
                                                                <span class="type-less-num">1</span>
                                                                : --}}
                                                                <span class="type-less">قائمة دروس
                                                                </span> :
                                                                <span class="type-less-name">{{ $section->title }}</span>
                                                            </h5>
                                                            <!-- <button
                                                                                        type="submit"
                                                                                        class="btn btn-primary"
                                                                                    >
                                                                                        تحديث الترتيب
                                                                                    </button> -->
                                                            <input type="submit" class="custome-btn"
                                                                value="تحديث الترتيب" />
                                                        </div>
                                                        <div class="sort-items">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-sm-9 col-xl-10 order-2 order-sm-1 mt-3 sort-parent">
                                                                        <div class="lessonsSorting"
                                                                            class="list-group mb-4 mt-3" data-id="1">

                                                                            @foreach ($section->items()->orderBy('order')->get() as $item)
                                                                                <div class="list-group-item d-flex align-items-center justify-content-between"
                                                                                    data-id="{{ $item->order }}">
                                                                                    <input type="hidden"
                                                                                        name="order{{ $item->id }}">
                                                                                    <div>
                                                                                        <p
                                                                                            class="mb-0 d-inline-flex align-items-center">
                                                                                            {{ $item->item->title }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('sections.destroy', $section->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="custome-btn modify-btn">
                                        حذف القسم
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="section-item-body">
                            @foreach (\App\Models\SectionItem::where('section_id', $section->id)->orderBy('order')->get() as $sectionItem)
                                @if ($sectionItem->item)
                                    <div class="section-lesson-item">
                                        <span class="type-less-icon">
                                            <i
                                                class="fa-solid fa-file-{{ $sectionItem->lesson_id ? $sectionItem->item->type : 'pen' }}"></i></span>
                                        <span class="type-less">درس
                                        </span>
                                        <span class="type-less-num">{{ $sectionItem->order }}</span>
                                        :
                                        <span class="type-less-name">{{ $sectionItem->item->title }}</span>
                                    </div>
                                @endif
                            @endforeach
                            {{-- @foreach ($section->exams as $exam)
                                <div class="section-lesson-item">
                                    <span class="type-less-icon">
                                        <i class="fa-solid fa-file-pen"></i></span>
                                    <span class="type-less">درس
                                    </span>
                                    <span class="type-less-num">{{$exam->lesson_num}}</span>
                                    :
                                    <span class="type-less-name">{{$exam->title}}</span>
                                </div>
                            @endforeach --}}

                            {{-- <div class="section-lesson-item">
                                <span class="type-less-icon">
                                    <i class="fa-solid fa-file-pdf"></i></span>
                                <span class="type-less">درس
                                </span>
                                <span class="type-less-num">1</span>
                                :
                                <span class="type-less-name">ما هو التيار الكهربي</span>
                            </div>
                            <div class="section-lesson-item">
                                <span class="type-less-icon">
                                    <i class="fa-solid fa-file-audio"></i></span>
                                <span class="type-less">درس
                                </span>
                                <span class="type-less-num">1</span>
                                :
                                <span class="type-less-name">ما هو التيار الكهربي</span>
                            </div> --}}
                            {{-- <div class="section-lesson-item">
                                <span class="type-less-icon">
                                    <i class="fa-solid fa-file-pen"></i></span>
                                <span class="type-less">درس
                                </span>
                                <span class="type-less-num">1</span>
                                :
                                <span class="type-less-name">ما هو التيار الكهربي</span>
                            </div> --}}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- the first form in the add lecture page and it is have a 5 tabs -->
        @include('components.Admin.lectureForm', ['lecture' => $lecture])

        <div class="control">
            <span class="right-btn"><i class="fa-solid fa-angles-right"></i></span>
            <span class="left-btn"><i class="fa-solid fa-angles-left"></i></span>
        </div>
    </section>
@endsection




@section('javascript')
    <!-- bootstrap 4  -->
    <!-- موجود هنا والايديت  -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- bootstrap 5  -->
    <!-- موجود في كل الصفحات  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- موجود هنا والايديت  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- text editor  -->
    <!-- موجود هنا والايديت  -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <!-- sortable js  -->
    <!-- موجود هنا والايديت  -->
    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

    <!-- main js file -->
    <!-- موجود في كل الصفحات  -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!-- موجود هنا والايديت  -->
    <script src="{{ asset('admin/assets/js/add-lecture.js') }}"></script>
    <!-- موجود هنا بس  -->
    <script src="{{ asset('admin/assets/js/edit-lecture.js') }}"></script>
@endsection
