@extends('layouts.HomeLayout')

@section('css')
<!--swiper-->
<link rel="stylesheet" href="{{ URL::asset('css/swiper.bundle.min.css') }}">
<!-- css file -->
<link rel="stylesheet" href="{{ URL::asset('css/home.css') }} " class="rel">
<link rel="stylesheet" href="{{ URL::asset('css/home-responsive.css') }} " class="rel">
<script></script>
@endsection

@section('content')
<header class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 headerRightSide">
                <div class="teacherContent ">
                    <h1 class="bigHeading gs_reveal gs_reveal_fromRight ">
                        <span class="customeSquareLine t-name">أ. محمد البري</span>
                        في
                        <span class="headingSubject">الفيزياء</span>
                    </h1>
                    <div class="swiper headerGrdeSwiper gs_reveal gs_reveal_fromRight">
                        <div class="swiper-wrapper ">
                            @foreach (\App\Models\Grade::all() as $grade)
                            <div class="swiper-slide">
                                <span class="headerGrade">{{$grade->name}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="headerIcons gs_reveal gs_reveal_fromRight">
                        <a class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a class="youtube"><i class="fa-brands fa-youtube"></i></a>
                        <a class="telegram"><i class="fa-brands fa-telegram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 headerLeftSide">
                <div class="teacherAbout">
                    <div class="headerImage gs_reveal gs_reveal_fromLeft">
                        <img class="ontop" src="{{ URL::asset('imgs/elbirry.png') }}" alt="">

                    </div>
                    <div class="headerAtom  ">
                        <div class="svg-container ">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                class='gs_reveal gs_reveal_fromDown' viewBox="50 50 300 300">
                                <defs>
                                    <symbol id="e">
                                        <ellipse cx="200" cy="200" rx="33" ry="88" fill="none" stroke="inherit" />
                                    </symbol>
                                </defs>


                                <use id="orbit-1" xlink:href="#e" />
                                <use id="orbit-2" xlink:href="#e" transform="rotate(60 200 200)" />
                                <use id="orbit-3" xlink:href="#e" transform="rotate(120 200 200)" />

                                <use id="electron-1" xlink:href="#e" />
                                <use id="electron-2" xlink:href="#e" transform="rotate(60 200 200)" />
                                <use id="electron-3" xlink:href="#e" transform="rotate(120 200 200)" />

                                <circle id="nucleus" fill="#ef8d67" cx="200" cy="200" r="16" />
                            </svg>
                        </div>
                    </div>
                    <div class="headerContents gs_reveal gs_reveal_fromDown">

                        <h3 class="contentsHeading">المحتويات</h3>
                        <div class="headingLessonsParent">
                            <span class="numOfLesson contentNum">{{ count(\App\Models\Lesson::all()) }}</span>
                            <span>درس مشروح</span>
                        </div>
                        <div class="headingQuestionsParent">
                            <span class="numOfQuestion contentNum">{{ count(\App\Models\Question::all()) }}</span>
                            <span>سؤال و تدريب</span>
                        </div>
                    </div>
                    <div class="headerTestimonial gs_reveal gs_reveal_fromRight">
                        <div class="swiper headerTestimonialSwiper">
                            <div class="swiper-wrapper">
                                @foreach (\App\Models\Testimonial::orderBy('degree', 'desc')->take(4)->get() as
                                $testimonial)
                                <div class="h-t-item swiper-slide">
                                    <div class="h-t-content">
                                        <h3 class="h-t-heading">
                                            {{ $testimonial->student_name }} <span
                                                class="h-t-grade">{{ $testimonial->degree }}</span> ~
                                        </h3>
                                        <p class="h-t-text">{{ $testimonial->content }}</p>
                                    </div>
                                    <div class="h-t-image">
                                        <img src="{{ $testimonial->image }}" alt="">
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="headerLocation gs_reveal gs_reveal_fromUp">
                        <span class="h-l-icon">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </span>
                        <div class="swiper headerLocationSwiper">
                            <div class="swiper-wrapper">
                                @foreach (\App\Models\Center::where('id', '>', 2)->orderBy('id', 'desc')->get() as
                                $center)
                                {{-- {{ $center->name }} --}}
                                <a class="h-l-item swiper-slide" href='{{ $center->url }}'>
                                    <div class="h-l-content">
                                        <h3 class="h-l-heading">{{ $center->name }} -
                                            {{ $center->govenrnorate->name }}</h3>
                                    </div>
                                    <div class="h-l-image">
                                        <img src="{{ $center->image }}" alt="">
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="paper">
    <!-- <img src="{{ URL::asset('imgs/paper.png') }}" alt=""> -->
</div>
<section class="levels">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 levelItemParent">
                <a class="levelItem gs_reveal gs_reveal_fromRight" href="{{ route('lectures.index', 10) }}">
                    <div class="l-image  ">
                        <img src="{{ URL::asset('imgs/physics1.png') }}" class='' alt="">
                    </div>
                    <div class="l-content ">
                        <h4>الصف <span class="d-redColor">الأول الثانوي</span></h4>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 levelItemParent">
                <a class="levelItem gs_reveal gs_reveal_fromUp" href="{{ route('lectures.index', 11) }}">
                    <div class="l-image ">
                        <img src="{{ URL::asset('imgs/physics2.png') }}" class='' alt="">
                    </div>
                    <div class="l-content ">
                        <h4>الصف <span class="d-blueColor">الثاني الثانوي</span></h4>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 levelItemParent">
                <a class="levelItem gs_reveal gs_reveal_fromLeft" href="{{ route('lectures.index', 12) }}">
                    <div class="l-image ">
                        <img src="{{ URL::asset('imgs/physics3.png') }}" class='' alt="">
                    </div>
                    <div class="l-content ">
                        <h4>الصف <span class="d-yellowColor">الثالث الثانوي</span></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<div class="paper2">
    <!-- <img src="{{ URL::asset('imgs/paper2.png') }}" alt=""> -->
</div>
<section class="latestMonths">
    <div class="container">
        <div class="monthsHeading gs_reveal gs_reveal_fromDown">
            <h2 class="customeSquareLine">أخر الشهور لجميع المراحل</h2>
            <p class="monthsText">جميع الأشهر الدراسية لمراحل الثانوية العامة</p>
        </div>
        <div class="row text-center" style='overflow:hidden'>
            @php
            $direction = ['Right', 'Down', 'Up', 'Left'];
            @endphp
            @foreach ($lectures as $index => $lecture)
            <div class="col-lg-3 col-sm-6 gs_reveal gs_reveal_from{{ $direction[$index - 1] }}">
                <a class="latestCard grade{{ $lecture->grade->id }}" href='{{ route('months.show', $lecture->slug) }}'>
                    <div class="cardGrade">
                        {{ $lecture->grade->name }}
                    </div>
                    <div class="image">
                        <img src="{{ $lecture->poster }}" alt="">
                    </div>
                    <div class="content">
                        <div class="lessonsCount">
                            <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                            <span class='cardLessonsCount'>{{ count($lecture->lessons) }} درس</span>
                        </div>
                        <h3 class="monthName">{{ $lecture->title }}</h3>
                        <div class="details">
                            <div class="detailItem">
                                <span class='cardPrice'>{{ getPrice($lecture) }}</span>
                                <span>ج.م</span>
                            </div>
                            <div class="detailItem users">
                                <span><i class="fa-solid fa-user"></i></span>
                                <span>{{ count($lecture->owners) }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            {{-- <div class="col-lg-3 col-sm-6 gs_reveal gs_reveal_fromDown">
                    <a class="latestCard " href='#'>
                        <div class="cardGrade">
                            الصف الاول الثانوي
                        </div>
                        <div class="image">
                            <img src="{{ URL::asset('imgs/thumbnail_2.png') }}" alt="">
        </div>
        <div class="content">
            <div class="lessonsCount">
                <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                <span>32 درس</span>
            </div>
            <h3 class="monthName">الشهر العاشر (1ث)
            </h3>
            <div class="details">
                <div class="detailItem d-blueColor">
                    <span class='cardPrice'>50</span>
                    <span>ج.م</span>
                </div>
                <div class="detailItem users">
                    <span><i class="fa-solid fa-user"></i></span>
                    <span>32</span>
                </div>
            </div>
        </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6 gs_reveal gs_reveal_fromUp">
        <a class="latestCard " href='#'>
            <div class="cardGrade">
                الصف الاول الثانوي
            </div>
            <div class="image">
                <img src="{{ URL::asset('imgs/thumbnail_3.png') }}" alt="">
            </div>
            <div class="content">
                <div class="lessonsCount">
                    <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                    <span>32 درس</span>
                </div>
                <h3 class="monthName">الشهر العاشر (1ث)
                </h3>
                <div class="details">
                    <div class="detailItem d-blueColor">
                        <span class='cardPrice'>50</span>
                        <span>ج.م</span>
                    </div>
                    <div class="detailItem users">
                        <span><i class="fa-solid fa-user"></i></span>
                        <span>32</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6 gs_reveal gs_reveal_fromLeft">
        <a class="latestCard  " href='#'>
            <div class="cardGrade">
                الصف الاول الثانوي
            </div>
            <div class="image">
                <img src="{{ URL::asset('imgs/thumbnail_1.png') }}" alt="">
            </div>
            <div class="content">
                <div class="lessonsCount">
                    <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                    <span class='cardLessonsCount'>32 درس</span>
                </div>
                <h3 class="monthName">الشهر العاشر (1ث)
                </h3>
                <div class="details">
                    <div class="detailItem d-redColor">
                        <span class='cardPrice'>50</span>
                        <span>ج.م</span>
                    </div>
                    <div class="detailItem users">
                        <span><i class="fa-solid fa-user"></i></span>
                        <span>29</span>
                    </div>
                </div>
            </div>
        </a>
    </div> --}}
    </div>
    </div>
</section>
<div class="preloader">
    <!-- <svg id="preloader" width="240px" height="120px" viewBox="0 0 240 120" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink">

        <path id="loop-normal" class="st1" d="M120.5,60.5L146.48,87.02c14.64,14.64,38.39,14.65,53.03,0s14.64-38.39,0-53.03s-38.39-14.65-53.03,0L120.5,60.5
    L94.52,87.02c-14.64,14.64-38.39,14.64-53.03,0c-14.64-14.64-14.64-38.39,0-53.03c14.65-14.64,38.39-14.65,53.03,0z">
            <animate attributeName="stroke-dasharray" from="500, 50" to="450 50" begin="0s" dur="2s"
                repeatCount="indefinite" />
            <animate attributeName="stroke-dashoffset" from="-40" to="-540" begin="0s" dur="2s"
                repeatCount="indefinite" />
        </path>

        <path id="loop-offset"
            d="M146.48,87.02c14.64,14.64,38.39,14.65,53.03,0s14.64-38.39,0-53.03s-38.39-14.65-53.03,0L120.5,60.5L94.52,87.02c-14.64,14.64-38.39,14.64-53.03,0c-14.64-14.64-14.64-38.39,0-53.03c14.65-14.64,38.39-14.65,53.03,0L120.5,60.5L146.48,87.02z">
        </path>

        <path id="socket" d="M7.5,0c0,8.28-6.72,15-15,15l0-30C0.78-15,7.5-8.28,7.5,0z">
            <animateMotion dur="2s" repeatCount="indefinite" rotate="auto" keyTimes="0"
                keySplines="0.42, 0.0, 0.58, 1.0">
                <mpath xlink:href="#loop-offset" />
            </animateMotion>
        </path>

        <path id="plug" d="M0,9l15,0l0-5H0v-8.5l15,0l0-5H0V-15c-8.29,0-15,6.71-15,15c0,8.28,6.71,15,15,15V9z">
            <animateMotion dur="2s" rotate="auto" repeatCount="indefinite" keyTimes="0;1" keySplines="0.42, 0, 0.58, 1">
                <mpath xlink:href="#loop-normal" />
            </animateMotion>
        </path>

    </svg>
    <div class="load">
        <hr />
        <hr />
        <hr />
        <hr />
    </div> -->
    <div class="atom">
        <div class="electron"></div>
        <div class="electron-alpha"></div>
        <div class="electron-omega"></div>
    </div>

</div>
@endsection

@section('javascript')
<!--swiper js-->
<script src="{{ URL::asset('js/swiper.bundle.min.js') }}"></script>
<!-- main js file -->
<script src="{{ URL::asset('js/home.js') }}"></script>
@endsection