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
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">


    <!--swiper-->
    <link rel="stylesheet" href="{{asset('css/swiper.bundle.min.css')}}">

    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">

    <!-- css file -->
    <link rel="stylesheet" href="{{asset('css/profile.css')}} " class="rel">
    <link rel="stylesheet" href="{{asset('css/profile-responsive.css')}} " class="rel">

</head>

<body class='grade1'>

    <nav class="myNav nonePrint">
        <div class="navProgress">
            <span class='navProgChild'></span>
        </div>
        <div class="customeContainer">
            <div class="right">
                <div class=" navAtom">
                    <img src="{{ asset('imgs/logoAtom.png') }}" alt="">


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
                            <a href="{{route('register')}}" class="regItem">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="regIcon">
                                    <img src="{{ asset('imgs/apple.png') }}" alt="">
                                </span>
                                <span class="regType">
                                    أنشئ حساب <span class='d-redColor'>جديد</span>
                                </span>
                            </a>
                        </div>
                        <div class="login">
                            <a href="{{route('login')}}" class="regItem">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="regIcon">
                                    <img src="{{ asset('imgs/drop.png') }}" alt="">
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
    <section class="main">
        <div class="bg nonePrint paper2">
            <img src="{{asset('imgs/profile_banner.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7  rightProfile">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-30">
                            <div class="addCharge ">
                                <span class="iconCharge">
                                    <i class="fa-solid fa-wallet"></i>
                                </span>
                                <span class='yourMoney'>200 ج.م</span>
                                <button class='addChargeBtn' type='button' data-toggle="modal" data-target="#charge"
                                    class='editBtn'>اضافة</button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-30">
                            <div class="whiteBox statBox">
                                <span class="statICon">
                                    <i class="fa-solid fa-question"></i>
                                </span>
                                <div class="statContent">
                                    <span class='num'>
                                        13205
                                    </span>
                                    <span class='detail'>سؤال محلول</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-30">
                            <div class="whiteBox statBox">
                                <span class="statICon">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>
                                <div class="statContent">
                                    <span class='num'>
                                        13205
                                    </span>
                                    <span class='detail'>مرات الاجابة الصحيحة</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-6 mb-30">
                            <div class="whiteBox donutParent">
                                <div class="donut"></div>

                                <div class="type">
                                    <div class="Absence">إجابة صحيحة</div>
                                    <div class="Presence">إجابة خاطئة</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 mb-30">
                            <div class="whiteBox">
                                <div id="chart" style=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 mb-30 leftProfile ">
                    <div class="whiteBox profileDetails printable ">
                        <div class="profileImg">
                            <img src="{{asset('imgs/user.png')}}" alt="">
                        </div>
                        <div class="profileContent">
                            <div class="personalInformation">
                                <h3 class='profileName'>عبدالرحمن مصطفى محمود</h3>
                                <span class='profileType'>طالب</span>
                            </div>
                            <div class="paper">
                                <img src="{{asset('imgs/paper2.png')}}" alt="">
                            </div>
                            <div class="someDetails">
                                <div class="control">
                                    <h3 class='someDetailsHeading'>معلومات الطالب</h3>
                                    <div class="controlBtns nonePrint">
                                        <button class='printBtn'><i class="fa-solid fa-print"></i></button>
                                        <a href="#" class='editBtn' data-toggle="modal" data-target="#edit"><i
                                                class="fa-solid fa-user-pen"></i></a>

                                    </div>
                                </div>
                                <div class="item">
                                    <span class='type'>الاسم:</span>
                                    <span class='info'>عبدالرحمن مصطفى محمود</span>
                                </div>
                                <div class="item">
                                    <span class='type'>المرحلة الدراسية:</span>
                                    <span class='info'>الصف الثالث الثانوي</span>
                                </div>
                                <div class="item">
                                    <span class='type'>الرقم:</span>
                                    <span class='info'>01234567891</span>
                                </div>
                                <div class="item">
                                    <span class='type'>رقم ولي الامر:</span>
                                    <span class='info'>01234567891</span>
                                </div>
                                <div class="item">
                                    <span class='type'> المحافظة:</span>
                                    <span class='info'>القاهرة</span>
                                </div>

                                <div class='barcodeBox'>
                                    <svg class="barcode" id='profileBarCode'></svg>
                                    <span class='barcodeText'>as4df5ef12as4df5ef1212345</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper myCourses">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a class="latestCard  grade1" href='#'>
                            <div class="cardGrade">
                                الصف الاول الثانوي
                            </div>
                            <div class="image">
                                <img src="{{asset('imgs/thumbnail_1.png')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="lessonsCount">
                                    <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                                    <span class='cardLessonsCount'>32 درس</span>
                                </div>
                                <h3 class="monthName">الشهر العاشر (1ث)
                                </h3>
                                <div class="details">
                                    <div class="detailItem priceCourse ">
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
                    <div class="swiper-slide">
                        <a class="latestCard  grade3" href='#'>
                            <div class="cardGrade">
                                الصف الاول الثانوي
                            </div>
                            <div class="image">
                                <img src="{{asset('imgs/thumbnail_1.png')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="lessonsCount">
                                    <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                                    <span class='cardLessonsCount'>32 درس</span>
                                </div>
                                <h3 class="monthName">الشهر العاشر (1ث)
                                </h3>
                                <div class="details">
                                    <div class="detailItem priceCourse ">
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
                    <div class="swiper-slide">
                        <a class="latestCard  grade2" href='#'>
                            <div class="cardGrade">
                                الصف الاول الثانوي
                            </div>
                            <div class="image">
                                <img src="{{asset('imgs/thumbnail_1.png')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="lessonsCount">
                                    <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                                    <span class='cardLessonsCount'>32 درس</span>
                                </div>
                                <h3 class="monthName">الشهر العاشر (1ث)
                                </h3>
                                <div class="details">
                                    <div class="detailItem priceCourse ">
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
                    <div class="swiper-slide">
                        <a class="latestCard  grade1" href='#'>
                            <div class="cardGrade">
                                الصف الاول الثانوي
                            </div>
                            <div class="image">
                                <img src="{{asset('imgs/thumbnail_1.png')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="lessonsCount">
                                    <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                                    <span class='cardLessonsCount'>32 درس</span>
                                </div>
                                <h3 class="monthName">الشهر العاشر (1ث)
                                </h3>
                                <div class="details">
                                    <div class="detailItem priceCourse ">
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
                    <div class="swiper-slide">
                        <a class="latestCard  grade2" href='#'>
                            <div class="cardGrade">
                                الصف الاول الثانوي
                            </div>
                            <div class="image">
                                <img src="{{asset('imgs/thumbnail_1.png')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="lessonsCount">
                                    <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                                    <span class='cardLessonsCount'>32 درس</span>
                                </div>
                                <h3 class="monthName">الشهر العاشر (1ث)
                                </h3>
                                <div class="details">
                                    <div class="detailItem priceCourse ">
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
                <div class="swiper-button-next">
                    <span class='swiperControl'>
                        <i class="fa-solid fa-angle-left"></i>
                    </span>
                </div>
                <div class="swiper-button-prev">
                    <span class='swiperControl'>
                        <i class="fa-solid fa-angle-right"></i>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <footer class=' nonePrint'>
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


    <!-- Modals -->

    <!-- هنا بقا الفورم الي هيشحن فيها رصيد   -->
    <div class="modal fade chargeModal" id="charge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">شحن رصيد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="chargeField">
                        <label for="">كود الشحن</label>
                        <input type="text" placeholder='ادخل كود الشحن'>
                    </div>
                    <p class='finishChargeText'>تم الشحن بنجاح رصيدك الحالي 150 ج.م</p>
                    <p class='wrongChargeText'>الكود الذي ادخلته غير صحيح رصيدك الحالي 100 ج.م</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn myButton">شحن رصيد</button>
                    <button type="button" class="btn secBtn" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>


    <!-- هنا بقا الفورم الي هيشحن فيها كوبون   -->
    <div class="modal fade editModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل الملف الشخصي</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="chargeField">
                        <div class='inputParent isInvalid'>
                            <label for="">الاسم</label>
                            <input type="text" placeholder='ادخل الاسم'>
                            <span class='error'>error</span>
                        </div>
                        <div class='inputParent '>
                            <label for="">المرحلة الدراسية</label>
                            <select>
                                <option value="1">الصف الأول الثانوي</option>
                                <option value="1">الصف الأول الثانوي</option>
                                <option value="1">الصف الأول الثانوي</option>
                            </select>
                            <span class='error'>error</span>
                        </div>
                        <div class='inputParent '>
                            <label for="">رقم الهاتف </label>
                            <input type="number" placeholder='رقم الهاتف'>
                            <span class='error'>error</span>
                        </div>
                        <div class='inputParent '>
                            <label for="">رقم هاتف ولي الأمر</label>
                            <input type="number" placeholder='رقم الهاتف'>
                            <span class='error'>error</span>
                        </div>
                        <div class='inputParent '>
                            <label for="">المحافظة</label>
                            <select>
                                <option value="1">cairo</option>
                                <option value="1">cairo</option>
                                <option value="1">cairo</option>
                            </select>
                            <span class='error'>error</span>
                        </div>
                        <div class='inputParent '>
                            <label for="">مكان المحاضرة</label>
                            <select>
                                <option value="1">الصف الأول الثانوي</option>
                                <option value="1">الصف الأول الثانوي</option>
                                <option value="1">الصف الأول الثانوي</option>
                            </select>
                            <span class='error'>error</span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn myButton">شحن الكوبون</button>
                    <button type="button" class="btn secBtn" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
    <!-- هنا بس  -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- barcode  -->
    <!-- هنا بس  -->
    <script src="{{asset('js/jsBarCode.all.min.js')}}"></script>
    <!--font awesome-->
    <script src="{{asset('js/all.min.js')}}"></script>

    <!-- هنا و الهوم  -->
    <script src="{{asset('js/swiper.bundle.min.js')}}"></script>
    <!--jquery js-->
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!--bootstrap js-->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


    <!-- main js file -->
    <script src="{{asset('js/profile.js')}}"></script>
</body>

</html>