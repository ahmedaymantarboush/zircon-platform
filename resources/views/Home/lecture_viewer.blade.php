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
@elseif(1)
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

        <div class="exam-tab">
            <button class="tab-item active-tab">
                <span class="tab-num">1</span>
                <div class="tab-icon">
                    <span><i class="fa-solid fa-check"></i></span>
                    <span><i class="fa-solid fa-flag"></i></span>
                </div>
            </button>
            <button class="tab-item">
                <span class="tab-num">2</span>
                <div class="tab-icon">
                    <span><i class="fa-solid fa-check"></i></span>
                    <span><i class="fa-solid fa-flag"></i></span>
                </div>
            </button>
            <button class="tab-item">
                <span class="tab-num">3</span>
                <div class="tab-icon">
                    <span><i class="fa-solid fa-check"></i></span>
                    <span><i class="fa-solid fa-flag"></i></span>
                </div>
            </button>


        </div>
        <div class="exam-questions">
            <div class="container">
                <div class="question active-tab">
                    test 1
                </div>
                <div class="question">
                    test 2
                </div>
                <div class="question">
                    test 3
                </div>
                <div class="btn-control">
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

@endsection
@endif
