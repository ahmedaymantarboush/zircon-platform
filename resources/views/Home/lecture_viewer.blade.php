@extends('layouts.lectureLayout')
{{-- lecture name --}}
{{-- lecture meta keywords --}}
{{-- lecture short description --}}
{{-- lecture auther --}}
{{-- lecture link --}}
{{-- /////////////////////////////////////////////////////////////////////////////////////////////// --}}
@section('seo')
    {{-- lecture meta keywords --}}
    <meta name="keywords" content="{{ $lecture->meta_keywords }}">
    {{-- lecture short description --}}
    <meta name="description" content="{{ $lecture->meta_description }}">
    {{-- lecture auther --}}
    <meta name="author" content="{{ $lecture->publisher->name }}">
@endsection
{{-- /////////////////////////////////////////////////////////////////////////////////////////////// --}}
@section('lec_name')
    {{-- lecture_name --}}
    {{ $lecture->title }}
@endsection
{{-- /////////////////////////////////////////////////////////////////////////////////////////////// --}}
@section('lec_link')
    {{-- lecture link --}}
    <a href="{{ env('APP_URL') }}/months/{{ $lecture->slug }}" class="lec_link" style="margin-left: 40px;">
        <i class="fa-solid fa-chevron-left" style="margin-right: 5px"></i>
        تفاصيل المحاضرة
    </a>
@endsection
{{-- /////////////////////////////////////////////////////////////////////////////////////////////// --}}
@section('sections')
    @foreach ($lecture->sections()->orderBy('order')->get() as $index => $section)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $section->id }}">
                <button class="accordion-button {{ $index ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $section->id }}" aria-expanded="{{ $index ? 'false' : 'true' }}"
                    aria-controls="collapse{{ $section->id }}">
                    <span class="collapse_sec_num">القسم {{ $index + 1 }} :</span>
                    <span>{{ $section->title }}</span>
                </button>
            </h2>
            <div id="collapse{{ $section->id }}" class="accordion-collapse collapse {{ $index ? '' : 'show' }}"
                aria-labelledby="heading{{ $section->id }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row">
                        @foreach ($section->items()->orderBy('order')->get() as $item)
                            @php
                                $type = $item->exam_id ? 'clipboard-question' : 'file-video';
                            @endphp
                            <div class="col-12">
                                <div class="lesson_title">
                                    <i class="fa-solid fa-{{ $type }}"></i>
                                    <a class="lesson_name" id="{{ $item->id }}"
                                        href="#lessonLink">{{ $item->title }}</a>
                                    @if ($item->exam_id)
                                        <span>{{ $item->item->questions_count }} سؤال</span>
                                    @else
                                        <span>
                                            {{ $item->item->time >= 3600 ? number_format($item->item->time / 3600, 2) . ' ساعة' : number_format($item->item->time / 60, 2) . ' دقيقة' }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
{{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
{{-- {{$lecture->sections()->orderBy('order')->first()->items()->orderBy('order')->first()}} --}}
@php
if (
    $lecture
        ->sections()
        ->orderBy('order')
        ->first()
) {
    $firstItem = $lecture
        ->sections()
        ->orderBy('order')
        ->first()
        ->items()
        ->orderBy('order')
        ->first();
} else {
    $firstItem = null;
}
@endphp
@if ($firstItem)
    @if ($lecture->sections->count() ? $firstItem->lesson_id : 0)
        @php
            $lesson = $firstItem->item;
        @endphp
        @if (!$firstItem->exam_id)
            {{-- if lesson type = video --}}
            @section('main')
                <div class="video_player" style="width: 100%;">
                    @include('components.videoplayer.player', [
                        'videoSources' => getVideoUrl(getVideoId($firstItem->item->url))['videos'] ?? [],
                    ])
                </div>
                <div dir="auto" class="lectures-des">
                    <h2>وصف المحاضرة :</h2>
                    <div class="container">
                        @php echo $lecture->description;@endphp
                    </div>
                </div>

            @endsection
        @else
            @section('main')
                <div class="take_exam d-flex justify-content-center">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="public/lectureAssets/img/examvector.png" alt="">
                        </div>
                        <div class="col-12 d-flex justify-content-center">

                            <span class="ex_text" style="margin-top: 20px;">يجب انت تحصل على <span
                                    class="prc">{{ $lesson->min_percentage }}%</span> على
                                الاقل</span>

                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <span class="ex_text">في امتحان <span>({{ $lesson->exam->title }})</span></span>
                        </div>
                        @if ($lesson->exam->passedExams->users->contains(Auth::user()))
                            <div class="col-12 d-flex justify-content-center">
                                <p class="ex_red">لم يتبق لك أي من المحاولات</p>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <a class="exam_btn showExam d-flex justify-content-center" href="#">عرض</a>
                            </div>
                        @else
                            <div class="col-12 d-flex justify-content-center">
                                <a class="exam_btn startExam d-flex justify-content-center" href="#"
                                    style="margin-top: 20px;">ابدأ</a>
                            </div>
                        @endif
                    </div>

                </div>
            @endsection
        @endif
    @elseif(0)
        @section('main')
            <div class="take_exam d-flex justify-content-center">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <i class="fa-solid fa-clipboard-question" id="clipboard-question"></i>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <span class="ex_text" style="margin-top: 20px;">امتحان على الجزئية الاولى</span>
                    </div>
                    @if (0)
                        <div class="col-12 d-flex justify-content-center" dir="rtl">
                            <p class="ex_green">
                                <span>12</span>
                                سؤال صحيح من
                                <span>15</span>
                                سؤال
                            </p>
                        </div>
                        <div class="col-12 d-flex justify-content-center" dir="rtl">
                            <p class="ex_green" style="font-weight: 700;margin-top: 0;">80%</p>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <a class="exam_btn showExam d-flex justify-content-center" href="#">عرض</a>
                        </div>
                    @elseif(0)
                        <div class="col-12 d-flex justify-content-center" dir="rtl">
                            <p class="ex_red">
                                <span>6</span>
                                سؤال صحيح من
                                <span>15</span>
                                سؤال
                            </p>
                        </div>
                        <div class="col-12 d-flex justify-content-center" dir="rtl">
                            <p class="ex_red" style="font-weight: 700;margin-top: 0;">40%</p>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <a class="exam_btn showExam d-flex justify-content-center" href="#">عرض</a>
                        </div>
                    @else
                        <div class="col-12 d-flex justify-content-center" dir="rtl">
                            <p class="ex_main">
                                <span>15</span>
                                سؤال
                            </p>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <a class="exam_btn takeExam d-flex justify-content-center" href="#"
                                style="margin-top: 20px;">ابدأ</a>
                        </div>
                    @endif
                </div>
            </div>
        @endsection
    @else
        @section('main')
            @php
                $exam = $firstItem->item;
            @endphp
            <div class="exam-parent">
                <div class="exam-tab swiper mySwiper">
                    <div class="swiper-wrapper">
                        @for ($i = 1; $i <= $exam->questions_count; $i++)
                            @if ($i == 1)
                                @php
                                    $active = 'active-tab';
                                @endphp
                            @else
                                @php
                                    $active = '';
                                @endphp
                            @endif
                            <div class="swiper-slide">
                                <button class="tab-item {{ $active }}">
                                    <span class="tab-num">{{ $i }}</span>
                                    <div class="tab-icon">
                                        <span><i class="fa-solid fa-check hide_icon"
                                                id="yesIcon_{{ $i }}"></i></span>
                                        <span><i
                                                class="fa-solid fa-flag hide_icon"id="flagIcon_{{ $i }}"></i></span>
                                    </div>
                                </button>
                            </div>
                        @endfor
                            <div class="swiper-slide">
                                <button class="tab-item">
                                    <span class="tab-num" style="display: none">{{ $i }}</span>
                                    <span class="tab-num2" ><i class="fa-solid fa-calendar-days"></i></span>
                                </button>
                            </div>
                    </div>


                </div>
                <div class="exam-questions">
                    <div class="container">
                        <div class="row">
                            @for ($i = 1; $i <= $exam->questions_count; $i++)
                                @if ($i == 1)
                                    @php
                                        $active = 'active-tab';
                                    @endphp
                                @else
                                    @php
                                        $active = '';
                                    @endphp
                                @endif
                                <div class="question {{ $active }} col-12">
                                    <div class="title_exam d-flex justify-content-between">
                                        <div class="question_head">
                                            <i class="fa-solid fa-font-awesome unflagQuestion" flag="0"
                                                queNamber="{{ $i }}"></i>
                                            <input type="checkbox" class="uncheckflag">
                                            <span>السؤال رقم {{ $i }}</span>
                                        </div>
                                        <div class="all_questions">
                                            <span class="countdown">3:00:00</span>
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </div>
                                    </div>
                                    @if (1)
                                        <div class="col-12">
                                            <img class="question_img"
                                                src="https://csva.s3.amazonaws.com/attachments/editor//62efec554915d_1659890773/Capture.PNG">
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <p class="question_text">اوجد قراءة الاميتر الذي بالشكل</p>
                                    </div>
                                    @for ($j = 1; $j <= 4; $j++)
                                        <div class="col-12">
                                            <div class="anserBox d-flex justify-content-start"
                                                queNamber="{{ $i }}">
                                                <input type="radio" name="anser{{ $i }}"
                                                    value="anser_database_id">
                                                <span class="anser_text">15 A</span>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            @endfor
//s
                                <div class="question col-12">
                                    <div class="container">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-12">
                                                <i class="fa-solid fa-check-double tab-num2" style="font-size: 45px;"></i>
                                            </div>
                                            <div class="col-12">
                                                <p class="tab-num2"style="font-size: 25px;">انهاء هذا الامتحان</p>
                                            </div>
                                            <div class="col-5">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    انهاء
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @if ($exam->questions_count >= 2)
                                <div class="col-12">
                                    <div class="btn-control d-flex justify-content-center">
                                        <button class="rightBtn">
                                            <i class="fa-solid fa-angles-right"></i>
                                        </button>
                                        <button class="leftBtn">
                                            <i class="fa-solid fa-angles-left"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>

            </div>
        @endsection
    @endif
@endif
