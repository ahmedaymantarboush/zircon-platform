<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--fonts-->
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;500;600;800;900&family=Montserrat:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet" />


    <!-- font awesome -->
    <link rel="stylesheet" href="{{URL::asset('css/all.min.css')}}">


    <!--swiper-->
    <link rel="stylesheet" href="{{URL::asset('css/swiper.bundle.min.css')}}">

    <!--bootstrap-->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-rtl.min.css')}}">

    <!-- css file -->
    <link rel="stylesheet" href="{{URL::asset('css/home.css')}} " class="rel">
    <link rel="stylesheet" href="{{URL::asset('css/home-responsive.css')}} " class="rel">

</head>

<body>

    <nav class="myNav">
        <div class="navProgress">
            <span class='navProgChild'></span>
        </div>
        <div class="customeContainer">
            <div class="right">
                <div class=" navAtom">
                    <img src="{{URL::asset('imgs/logoAtom.png')}}" alt="">


                </div>
                <div class="logoBrand">البري</div>
                <div class="sunMoon">
                    <div class="sun activeSvg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle fill="#FECA57" cx="12" cy="12" r="5" />
                            <g stroke="currentColor">
                                <line x1="12" y1="1" x2="12" y2="3" />
                                <line x1="12" y1="21" x2="12" y2="23" />
                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                                <line x1="1" y1="12" x2="3" y2="12" />
                                <line x1="21" y1="12" x2="23" y2="12" />
                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
                            </g>
                        </svg>
                    </div>
                    <div class="moon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#4FB8E2"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <mask id="mask">
                                <rect x="0" y="0" width="100%" height="100%" fill="white" />
                                <circle cx="12" cy="4" r="9" fill="black" />
                            </mask>
                            <circle fill="#4FB8E2" cx="12" cy="12" r="9" mask="url(#mask)" />

                        </svg>
                    </div>

                </div>
            </div>
            <div class='bigLeft '>
                <button class='toggleBarBtn'>
                    <span class='topLine'></span>
                    <span class='middleLine'></span>
                    <span class='bottomLine'></span>

                </button>
                <div class="left ">
                    <div class="search">
                        <input type="search" name="navSearch">
                        <span><i class="fa-solid fa-magnifying-glass"></i></span>

                    </div>
                    <div class="register">
                        <div class="signup">
                            <a href="#" class="regItem">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="regIcon">
                                    <img src="{{URL::asset('imgs/apple.png')}}" alt="">
                                </span>
                                <span class="regType">
                                    أنشئ حساب <span class='d-redColor'>جديد</span>
                                </span>
                            </a>
                        </div>
                        <div class="login">
                            <a href="#" class="regItem">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="regIcon">
                                    <img src="{{URL::asset('imgs/drop.png')}}" alt="">
                                </span>
                                <span class="regType">
                                    تسجيل <span class='d-blueColor'>الدخول</span>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
    <header class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
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
                <div class="col-lg-6">
                    <div class="teacherAbout">
                        <div class="headerImage gs_reveal gs_reveal_fromLeft">
                            <img class="ontop" src="{{URL::asset('imgs/elbirry.png')}}" alt="">

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
                                <span class="numOfLesson contentNum">230</span>
                                <span>درس مشروح</span>
                            </div>
                            <div class="headingQuestionsParent">
                                <span class="numOfQuestion contentNum">156</span>
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
                                            <img src="{{URL::asset('imgs/h-t-img.jpeg')}}" alt="">
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
                                            <img src="{{URL::asset('imgs/h-t-img.jpeg')}}" alt="">
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
                                    <a class="h-l-item swiper-slide" href='#'>
                                        <div class="h-l-content">
                                            <h3 class="h-l-heading">سنتر المجرة - الشرقية</h3>
                                        </div>
                                        <div class="h-l-image">
                                            <img src="{{URL::asset('imgs/center1.png')}}" alt="">
                                        </div>
                                    </a>
                                    <a class="h-l-item swiper-slide" href='#'>
                                        <div class="h-l-content">
                                            <h3 class="h-l-heading">سنتر المجرة - الشرقية</h3>
                                        </div>
                                        <div class="h-l-image">
                                            <img src="{{URL::asset('imgs/center1.png')}}" alt="">
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="paper">
        <img src="{{URL::asset('imgs/paper.png')}}" alt="">
    </div>
    <section class="levels">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 levelItemParent">
                    <a class="levelItem gs_reveal gs_reveal_fromRight" href="#">
                        <div class="l-image  ">
                            <img src="{{URL::asset('imgs/physics1.png')}}" class='' alt="">
                        </div>
                        <div class="l-content ">
                            <h4>الصف <span class="d-redColor">الأول الثانوي</span></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 levelItemParent">
                    <a class="levelItem gs_reveal gs_reveal_fromUp" href="#">
                        <div class="l-image ">
                            <img src="{{URL::asset('imgs/physics2.png')}}" class='' alt="">
                        </div>
                        <div class="l-content ">
                            <h4>الصف <span class="d-blueColor">الثاني الثانوي</span></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 levelItemParent">
                    <a class="levelItem gs_reveal gs_reveal_fromLeft" href="#">
                        <div class="l-image ">
                            <img src="{{URL::asset('imgs/physics3.png')}}" class='' alt="">
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
        <img src="{{URL::asset('imgs/paper2.png')}}" alt="">
    </div>
    <section class="latestMonths">
        <div class="container">
            <div class="monthsHeading gs_reveal gs_reveal_fromDown">
                <h2 class="customeSquareLine">أخر الشهور لجميع المراحل</h2>
                <p class="monthsText">جميع الأشهر الدراسية لمراحل الثانوية العامة</p>
            </div>
            <div class="row" style='overflow:hidden'>
                <div class="col-lg-3 col-sm-6 gs_reveal gs_reveal_fromRight">
                    <a class="latestCard  " href='#'>
                        <div class="cardGrade">
                            الصف الاول الثانوي
                        </div>
                        <div class="image">
                            <img src="{{URL::asset('imgs/thumbnail_1.png')}}" alt="">
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
                </div>
                <div class="col-lg-3 col-sm-6 gs_reveal gs_reveal_fromDown">
                    <a class="latestCard " href='#'>
                        <div class="cardGrade">
                            الصف الاول الثانوي
                        </div>
                        <div class="image">
                            <img src="{{URL::asset('imgs/thumbnail_2.png')}}" alt="">
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
                            <img src="{{URL::asset('imgs/thumbnail_3.png')}}" alt="">
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
                            <img src="{{URL::asset('imgs/thumbnail_1.png')}}" alt="">
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
                </div>
            </div>
        </div>
    </section>
    <footer class=' '>
        <div class="waves wave1">
            <svg width="100%" height="290px" fill="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">



                </linearGradient>
                <path fill="rgba(130,222,221)" d="
          M0 67
          C 273,183
            822,-40
            1920.00,106 
          
          V 359 
          H 0 
          V 67
          Z">
                    <animate repeatCount="indefinite" fill="url(#grad1)" attributeName="d" dur="15s" attributeType="XML"
                        values="
            M0 77 
            C 473,283
              822,-40
              1920,116 
            
            V 359 
            H 0 
            V 67 
            Z; 

            M0 77 
            C 473,-40
              1222,283
              1920,136 
            
            V 359 
            H 0 
            V 67 
            Z; 

            M0 77 
            C 973,260
              1722,-53
              1920,120 
            
            V 359 
            H 0 
            V 67 
            Z; 

            M0 77 
            C 473,283
              822,-40
              1920,116 
            
            V 359 
            H 0 
            V 67 
            Z
            ">
                    </animate>
                </path>
            </svg>
        </div>
        <div class="waves wave2">
            <svg width="100%" height="310px" fill="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">

                </linearGradient>
                <path fill="rgba(130,222,221,.6)" d="
          M0 67
          C 273,183
            822,-40
            1920.00,106 
          
          V 359 
          H 0 
          V 67
          Z">
                    <animate repeatCount="indefinite" fill="url(#grad1)" attributeName="d" dur="10s" attributeType="XML"
                        values="
            M0 77 
            C 473,283
              822,-40
              1920,116 
            
            V 359 
            H 0 
            V 67 
            Z; 

            M0 77 
            C 473,-40
              1222,283
              1920,136 
            
            V 359 
            H 0 
            V 67 
            Z; 

            M0 77 
            C 973,260
              1722,-53
              1920,120 
            
            V 359 
            H 0 
            V 67 
            Z; 

            M0 77 
            C 473,283
              822,-40
              1920,116 
            
            V 359 
            H 0 
            V 67 
            Z
            ">
                    </animate>
                </path>
            </svg>
        </div>
        <div class="waves wave2">
            <svg width="100%" height="330px" fill="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">

                </linearGradient>
                <path fill="rgba(130,222,221,.4)" d="
          M0 67
          C 273,183
            822,-40
            1920.00,106 
          
          V 359 
          H 0 
          V 67
          Z">
                    <animate repeatCount="indefinite" fill="url(#grad1)" attributeName="d" dur="6s" attributeType="XML"
                        values="
            M0 77 
            C 473,283
              822,-40
              1920,116 
            
            V 359 
            H 0 
            V 67 
            Z; 

            M0 77 
            C 473,-40
              1222,283
              1920,136 
            
            V 359 
            H 0 
            V 67 
            Z; 

            M0 77 
            C 973,260
              1722,-53
              1920,120 
            
            V 359 
            H 0 
            V 67 
            Z; 

            M0 77 
            C 473,283
              822,-40
              1920,116 
            
            V 359 
            H 0 
            V 67 
            Z
            ">
                    </animate>
                </path>
            </svg>
        </div>

        <div class='ontop' style='display: flex;
    flex-direction: column;
    align-items: center;'>
            <div class="footerIcon">
                <a class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a class="youtube"><i class="fa-brands fa-youtube"></i></a>
                <a class="telegram"><i class="fa-brands fa-telegram"></i></a>
            </div>
            <div class="copyRight">
                <div class='crParent'>
                    <p class='crTeacher'>جميع الحقوق محفوظة لمستر محمد البري 2022</p>
                    <span class='space'>|</span>
                    <p style='direction:ltr'>
                        Made with
                        <span class='heart'><i class="fa-solid fa-heart"></i></span>
                        By
                        <a href="#">Zircon Tech</a>
                    </p>
                </div>
            </div>
        </div>

    </footer>

    <!--font awesome-->
    <script src="{{URL::asset('js/all.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>


    <!--swiper js-->
    <script src="{{URL::asset('js/swiper.bundle.min.js')}}"></script>


    <!--jquery js-->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/2.0.6/velocity.min.js"
        integrity="sha512-+VS2+Nl1Qit71a/lbncmVsWOZ0BmPDkopw5sXAS2W+OfeceCEd9OGTQWjgVgP5QaMV4ddqOIW9XLW7UVFzkMAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--bootstrap js-->
    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>


    <!-- main js file -->
    <script src="{{URL::asset('js/home.js')}}"></script>
</body>

</html>