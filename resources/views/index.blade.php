@extends('layouts.HomeLayout')
@section('seo')
    <meta name="keywords"
        content="أستاذ محمد البري, أ/ محمد البري, محمد البري, الصف الثالث الثانوي, الصف الثاني الثانوي, الصف الأول الثانوي, ثانوية عامة, فيزياء الثانوية عامة">
    <meta name="description" content="منصة أستاذ محمد البري لتدريس منهج الفيزياء للصفوف الثانوية العامة">
    <meta name="author" content="Developer & Designer : Zircon Tech 2022">
@endsection
@section('css')
    {{-- <!--swiper--> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/swiper.bundle.min.css') }}">
    {{-- <!-- css file --> --}}
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
                                @foreach (\App\Models\Grade::all() as $grade)
                                    <div class="swiper-slide">
                                        <span class="headerGrade">{{ $grade->name }}</span>
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
                        <div class="headerImage  " data-aos-anchor-placement="top-center"  data-aos="fade-up" >
                            <img class="ontop" src="{{ URL::asset('imgs/elbirry.webp') }}" alt="">
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
                                    @foreach (\App\Models\Testimonial::orderBy('degree', 'desc')->take(4)->get() as $testimonial)
                                        <div class="h-t-item swiper-slide">
                                            <div class="h-t-content">
                                                <h3 class="h-t-heading">
                                                    {{ $testimonial->student_name }} <span
                                                        class="h-t-grade">{{ $testimonial->degree }}</span> ~
                                                </h3>
                                                <p class="h-t-text">@php
                                                    echo $testimonial->content;
                                                @endphp</p>
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
                                    @foreach (\App\Models\Center::where('id', '>', 2)->orderBy('id', 'desc')->get() as $center)
                                        {{-- {{ $center->name }} --}}
                                        <a class="h-l-item swiper-slide" href='{{ $center->url }}'>
                                            <div class="h-l-content">
                                                <h3 class="h-l-heading">{{ $center->name }} -
                                                    {{ $center->governorate->name }}</h3>
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
    </div>
    <section class="levels">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 levelItemParent">
                    <a class="levelItem "  data-aos="fade-up" href="{{ route('lectures.index', 10) }}">
                        <div class="l-image  ">
                            <img src="{{ URL::asset('imgs/physics1.webp') }}" class='' alt="">
                        </div>
                        <div class="l-content ">
                            <h4>الصف <span class="d-redColor">الأول الثانوي</span></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 levelItemParent">
                    <a class="levelItem gs_reveal gs_reveal_fromUp" href="{{ route('lectures.index', 11) }}">
                        <div class="l-image ">
                            <img src="{{ URL::asset('imgs/physics2.webp') }}" class='' alt="">
                        </div>
                        <div class="l-content ">
                            <h4>الصف <span class="d-blueColor">الثاني الثانوي</span></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 levelItemParent">
                    <a class="levelItem gs_reveal gs_reveal_fromLeft" href="{{ route('lectures.index', 12) }}">
                        <div class="l-image ">
                            <img src="{{ URL::asset('imgs/physics3.webp') }}" class='' alt="">
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
                @if (count($lectures))
                    @foreach ($lectures as $index => $lecture)
                        @if ($lecture)
                            <div class="col-lg-3 col-sm-6 gs_reveal gs_reveal_from{{ $direction[$index] }}">
                                <a class="latestCard grade{{ $lecture->grade->id }}"
                                    href='{{ route('months.show', $lecture->slug) }}'>
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
                        @endif
                    @endforeach
                @else
                    <p class='gs_reveal no-lectures'>سيتم اضافة شهور جديدة قريبا</p>
                    <div class='gs_reveal noLecImg'>
                        <img src="{{ URL::asset('imgs/no-result-search.webp') }}" alt="">
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    {{-- <!--swiper js--> --}}    

    
    <script src="{{ URL::asset('js/swiper.bundle.min.js') }}"></script>
    {{-- <!-- main js file --> --}}
    <script src="{{ URL::asset('js/home.js') }}"></script>
@endsection
