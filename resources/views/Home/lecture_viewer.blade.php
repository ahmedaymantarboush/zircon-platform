@extends('layouts.lectureLayout')
{{--lecture name--}}
{{--lecture meta keywords--}}
{{--lecture short description--}}
{{--lecture auther--}}
{{--lecture link--}}
{{--///////////////////////////////////////////////////////////////////////////////////////////////--}}
@section('seo')
{{--lecture meta keywords--}}
<meta name="keywords" content="HTML, CSS, JavaScript">
{{--lecture short description--}}
<meta name="description" content="Free Web tutorials">
{{--lecture auther--}}
<meta name="author" content="abdelrahman">
@endsection
{{--///////////////////////////////////////////////////////////////////////////////////////////////--}}
@section('lec_name')
{{--lecture_name--}}
<span class="lec_name">مراجعة على الباب الاول</span>
@endsection
{{--///////////////////////////////////////////////////////////////////////////////////////////////--}}
@section('lec_link')
{{--lecture link--}}
<a href="#" class="lec_link" style="margin-left: 40px;">
    <i class="fa-solid fa-chevron-left" style="margin-right: 5px"></i>
    تفاصيل المحاضرة
</a>
@endsection
{{--///////////////////////////////////////////////////////////////////////////////////////////////--}}
@section('sections')
<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <span class="collapse_sec_num">القسم 1 :</span>
            <span>اساسيات و مفاهيم على التيار الكهربي</span>
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="lesson_title">
                            <i class="fa-solid fa-file-video"></i>
                            <a class="lesson_name" href="#lessonLink">ما هو التيار الكهربي</a>
                            <span>دقيقة</span>
                            <span style="margin-left: 5px;">5:23</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="lesson_title">
                            <i class="fa-solid fa-file-pdf"></i>
                            <a class="lesson_name" href="#lessonLink">ما هو التيار الكهربي</a>
                            <span>دقيقة</span>
                            <span style="margin-left: 5px;">5:23</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="lesson_title">
                            <i class="fa-solid fa-file-audio"></i>
                            <a class="lesson_name" href="#lessonLink">ما هو التيار الكهربي</a>
                            <span>دقيقة</span>
                            <span style="margin-left: 5px;">5:23</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="lesson_title">
                            <i class="fa-solid fa-file-pen"></i>
                            <a class="lesson_name" href="#lessonLink">ما هو التيار الكهربي</a>
                            <span>سؤال</span>
                            <span style="margin-left: 5px;">15</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{--///////////////////////////////////////////////////////////////////////////////////////////////////////////--}}
@if(0)
{{-- if lesson type = video --}}
@section('main')
<div class="video_player" style="width: 100%;">
    @include('components.videoplayer.player',[
    'url_1080'=>'https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4',
    'url_720'=>'https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4',
    'url_480'=>'https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4'
    ])
</div>
<div class="lectures-des">
    <h2>وصف المحاضرة :</h2>

</div>

@endsection
@elseif(0)
@section('main')
<div class="take_exam d-flex justify-content-center">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <img src="{{asset('lectureAssets/img/examvector.png')}}" alt="">
        </div>
        <div class="col-12 d-flex justify-content-center">

            <span class="ex_text" style="margin-top: 20px;">يجب انت تحصل على <span class="prc">80%</span> على
                الاقل</span>

        </div>
        <div class="col-12 d-flex justify-content-center">
            <span class="ex_text">في امتحان <span>(امتحان على الجزئية الاولى)</span></span>
        </div>
        @if(1)

        <div class="col-12 d-flex justify-content-center">
            <p class="ex_red">لم يتبق لك أي من المحاولات</p>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <a class="exam_btn d-flex justify-content-center" href="#">عرض</a>
        </div>
        @else
        <div class="col-12 d-flex justify-content-center">
            <a class="exam_btn d-flex justify-content-center" href="#" style="margin-top: 20px;">ابدأ</a>
        </div>
        @endif
    </div>

</div>
@endsection
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
            @if(0)
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
                    <a class="exam_btn d-flex justify-content-center" href="#">عرض</a>
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
                    <a class="exam_btn d-flex justify-content-center" href="#">عرض</a>
                </div>
            @else
                <div class="col-12 d-flex justify-content-center" dir="rtl">
                    <p class="ex_main">
                        <span>15</span>
                        سؤال
                    </p>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a class="exam_btn d-flex justify-content-center" href="#" style="margin-top: 20px;">ابدأ</a>
                </div>
            @endif
        </div>
@endsection
@else
@section('main')

    <div class="exam-parent">
        <div class="exam-tab swiper mySwiper">
            <div class="swiper-wrapper">
                @for($i=1;$i<=15;$i++)
                    @if($i==1)
                        @php
                            $active = 'active-tab';
                        @endphp
                    @else
                        @php
                            $active = '';
                        @endphp
                    @endif
                        <div class="swiper-slide">
                            <button class="tab-item {{$active}}">
                                <span class="tab-num" >{{$i}}</span>
                                <div class="tab-icon" >
                                    <span><i class="fa-solid fa-check hide_icon" id="yesIcon_{{$i}}"></i></span>
                                    <span><i class="fa-solid fa-flag hide_icon"id="flagIcon_{{$i}}"></i></span>
                                </div>
                            </button>
                        </div>
                @endfor
            </div>


        </div>
        <div class="exam-questions">
            <div class="container">
                <div class="row">
                    @for($i=1;$i<=15;$i++)
                        @if($i==1)
                            @php
                                $active = 'active-tab';
                            @endphp
                        @else
                            @php
                                $active = '';
                            @endphp
                        @endif
                            <div class="question {{$active}} col-12">
                                <div class="title_exam d-flex justify-content-between">
                                    <div class="question_head">
                                        <i class="fa-solid fa-font-awesome unflagQuestion" flag="0" queNamber="{{$i}}"></i>
                                        <input type="checkbox" class="uncheckflag">
                                        <span>السؤال رقم {{$i}}</span>
                                    </div>
                                    <div class="all_questions">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                </div>
                                @if(1)
                                    <div class="col-12">
                                        <img class="question_img" src="https://csva.s3.amazonaws.com/attachments/editor//62efec554915d_1659890773/Capture.PNG">
                                    </div>
                                @endif
                                <div class="col-12">
                                    <p class="question_text">
                                        اوجد قراءة الاميتر الذي بالشكل
                                    </p>
                                </div>
                                @for($j=1;$j<=4;$j++)
                                    <div class="col-12">
                                        <div class="anserBox d-flex justify-content-start" queNamber="{{$i}}" >
                                            <input type="radio" name="anser{{$i}}" value="anser_database_id">
                                            <span class="anser_text">15 A</span>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                    @endfor

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
                </div>
            </div>

        </div>

    </div>

@endsection
@endif
