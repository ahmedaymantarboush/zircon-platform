@extends('layouts.HomeLayout')

@section('css')
    <!--swiper-->
    <link rel="stylesheet" href="{{ URL::asset('css/swiper.bundle.min.css') }}">
    <!-- css file -->
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }} " class="rel">
    <link rel="stylesheet" href="{{ URL::asset('css/home-responsive.css') }} " class="rel">
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
                                <div class="swiper-slide">
                                    <span class="headerGrade  ">الصف الأول الثانوي</span>
                                </div>
                                <div class="swiper-slide">
                                    <span class="headerGrade  ">الصف الثاني الثانوي</span>
                                </div>
                                <div class="swiper-slide">
                                    <span class="headerGrade  ">الصف الثالث الثانوي</span>
                                </div>
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
                                            <ellipse cx="200" cy="200" rx="33" ry="88"
                                                fill="none" stroke="inherit" />
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
                                <span class="numOfLesson contentNum">{{count(\App\Models\Lesson::all())}}</span>
                                <span>درس مشروح</span>
                            </div>
                            <div class="headingQuestionsParent">
                                <span class="numOfQuestion contentNum">{{count(\App\Models\Question::all())}}</span>
                                <span>سؤال و تدريب</span>
                            </div>
                        </div>
                        <div class="headerTestimonial gs_reveal gs_reveal_fromRight">
                            <div class="swiper headerTestimonialSwiper">
                                <div class="swiper-wrapper">
                                    <div class="h-t-item swiper-slide">
                                        <div class="h-t-content">
                                            <h3 class="h-t-heading">
                                                أحمد طربوش <span class="h-t-grade">405</span> ~
                                            </h3>
                                            <p class="h-t-text">احب اشكر استاذي محمد من كل قلبي على الدعم و المجهود
                                                الكبير اللي
                                                عمله
                                                معانا</p>
                                        </div>
                                        <div class="h-t-image">
                                            <img src="{{ URL::asset('imgs/h-t-img.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="h-t-item swiper-slide">
                                        <div class="h-t-content">
                                            <h3 class="h-t-heading">
                                                علي علاء <span class="h-t-grade">405</span> ~
                                            </h3>
                                            <p class="h-t-text">احب اشكر استاذي محمد من كل قلبي على الدعم و المجهود
                                                الكبير اللي
                                                عمله
                                                معانا</p>
                                        </div>
                                        <div class="h-t-image">
                                            <img src="{{ URL::asset('imgs/h-t-img.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="headerLocation gs_reveal gs_reveal_fromUp">
                            <span class="h-l-icon">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </span>
                            <div class="swiper headerLocationSwiper">
                                <div class="swiper-wrapper">
                                    @foreach (\App\Models\Center::where('id','>',2)->orderBy('id','desc')->get() as $grade)
                                        <a class="h-l-item swiper-slide" href='#'>
                                            <div class="h-l-content">
                                                <h3 class="h-l-heading">سنتر المجرة - الشرقية</h3>
                                            </div>
                                            <div class="h-l-image">
                                                <img src="{{ URL::asset('imgs/center1.png') }}" alt="">
                                            </div>
                                        </a>
                                    @endforeach
                                    {{-- <a class="h-l-item swiper-slide" href='#'>
                                        <div class="h-l-content">
                                            <h3 class="h-l-heading">سنتر المجرة - الشرقية</h3>
                                        </div>
                                        <div class="h-l-image">
                                            <img src="{{ URL::asset('imgs/center1.png') }}" alt="">
                                        </div>

                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="paper">
        <img src="{{ URL::asset('imgs/paper.png') }}" alt="">
    </div>
    <section class="levels">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 levelItemParent">
                    <a class="levelItem gs_reveal gs_reveal_fromRight" href="{{route('months.index',10)}}">
                        <div class="l-image  ">
                            <img src="{{ URL::asset('imgs/physics1.png') }}" class='' alt="">
                        </div>
                        <div class="l-content ">
                            <h4>الصف <span class="d-redColor">الأول الثانوي</span></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 levelItemParent">
                    <a class="levelItem gs_reveal gs_reveal_fromUp" href="{{route('months.index',13)}}">
                        <div class="l-image ">
                            <img src="{{ URL::asset('imgs/physics2.png') }}" class='' alt="">
                        </div>
                        <div class="l-content ">
                            <h4>الصف <span class="d-blueColor">الثاني الثانوي</span></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 levelItemParent">
                    <a class="levelItem gs_reveal gs_reveal_fromLeft" href="{{route('months.index',12)}}">
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
        <img src="{{ URL::asset('imgs/paper2.png') }}" alt="">
    </div>
    <section class="latestMonths">
        <div class="container">
            <div class="monthsHeading gs_reveal gs_reveal_fromDown">
                <h2 class="customeSquareLine">أخر الشهور لجميع المراحل</h2>
                <p class="monthsText">جميع الأشهر الدراسية لمراحل الثانوية العامة</p>
            </div>
            <div class="row text-center" style='overflow:hidden'>
                @foreach ($lectures as $lecture)
                    <div class="col-lg-3 col-sm-6 gs_reveal gs_reveal_fromRight">
                        <a class="latestCard grade{{$lecture->grade->id}}" href='{{route('months.show',$lecture->slug)}}'>
                            <div class="cardGrade">
                                {{$lecture->grade->name}}
                            </div>
                            <div class="image">
                                <img src="{{ $lecture->poster }}" alt="">
                            </div>
                            <div class="content">
                                <div class="lessonsCount">
                                    <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                                    <span class='cardLessonsCount'>{{count($lecture->lessons)}} درس</span>
                                </div>
                                <h3 class="monthName">{{$lecture->title}}</h3>
                                <div class="details">
                                    <div class="detailItem">
                                        <span class='cardPrice'>{{getPrice($lecture)}}</span>
                                        <span>ج.م</span>
                                    </div>
                                    <div class="detailItem users">
                                        <span><i class="fa-solid fa-user"></i></span>
                                        <span>{{count($lecture->owners)}}</span>
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
@endsection

@section('javascript')
    <!--swiper js-->
    <script src="{{ URL::asset('js/swiper.bundle.min.js') }}"></script>
    <!-- main js file -->
    <script src="{{ URL::asset('js/home.js') }}"></script>
@endsection
