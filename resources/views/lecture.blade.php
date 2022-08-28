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

    <!--bootstrap-->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-rtl.min.css')}}">

    <!-- css file -->
    <link rel="stylesheet" href="{{URL::asset('css/lecture.css')}} " class="rel">
    <link rel="stylesheet" href="{{URL::asset('css/lecture-responsive.css')}} " class="rel">

</head>

<body class='grade1'>
    <div class="overlay"></div>
    <div class="vid-parent"></div>
    <span class="close-vid">
        <i class="fa-solid fa-xmark"></i>
    </span>
    <nav class="myNav">
        <div class="navProgress">
            <span class='navProgChild'></span>
        </div>
        <div class="customeContainer">
            <div class="right">
                <div class=" navAtom">
                    <img src="{{ URL::asset('imgs/logoAtom.png') }}" alt="">


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
                                    <img src="{{ URL::asset('imgs/apple.png') }}" alt="">
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
                                    <img src="{{ URL::asset('imgs/drop.png') }}" alt="">
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
    <div class="header">
        <div class="container" style="margin-top: -10px;">
            <div class="headerContent">
                <div class="lec-hero-image ontop">
                    <div class="lec-image-content">
                        <a class="play" href="#">
                            <i class="fa-solid fa-play"></i>
                        </a>
                        <p>معاينة المحاضرة</p>
                    </div>
                    <img src="{{ URL::asset('imgs/thumbnail_3.png') }}" alt="" />
                </div>
                <h2 class='lectureName'>مراجعة شاملة على الباب الأول (الكهربية)</h2>
                <p class='lectureDescription'>مراجعة شاملة على باب الكهربية الأول للصف الثاني الثانوي</p>
                <div class='lectureRelease'>
                    <span class='publisherBy'>
                        نشر بواسطة

                    </span>
                    <a href='#' class='publisherName'>أ.محمدالبري</a>
                </div>
                <div class="lectureUbdateDate">
                    <span class='updateIcon'><i class="fa-solid fa-file-pen"></i></span>
                    اخر تحديث تم في
                    <span class='updateDate'>27/7/2022</span>
                </div>
            </div>
        </div>
    </div>
    <div class="month">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 rightCard">
                    <div class="monthParts">
                        <h2>اقسام المحاضرة</h2>
                        <div id="accordion" class="monthsLists">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <button
                                        class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                        data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        <div class='nameOfPart'>
                                            الجزئية الدراسية

                                        </div>
                                        <div class='monthBtnDetails'>
                                            <span>4 شرح</span>
                                            <span>2 تطبيق</span>
                                            <span class='monthArrow'><i class="fa-solid fa-angle-down"></i></span>
                                        </div>
                                    </button>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                                    <div class="card-body">

                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <button
                                        class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <div class='nameOfPart'>
                                            الجزئية الدراسية

                                        </div>

                                        <div class='monthBtnDetails'>
                                            <span>4 شرح</span>
                                            <span>2 تطبيق</span>
                                            <span class='monthArrow'><i class="fa-solid fa-angle-down"></i></span>
                                        </div>
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                                    <div class="card-body">

                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <button
                                        class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">

                                        <div class='nameOfPart'>
                                            الجزئية الدراسية

                                        </div>
                                        <div class="monthBtnDetails">
                                            <span>4 شرح</span>
                                            <span>2 تطبيق</span>
                                            <span class='monthArrow'><i class="fa-solid fa-angle-down"></i></span>

                                        </div>

                                    </button>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
                                    <div class="card-body">

                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>وصف المحاضرة</h2>
                        <div class="monthDescriptionParent ">
                            <p class='monthDescription'>في الفلزات الصلبة، تتدفق الكهرباء بفعل حركة الإلكترونات، من
                                الجهد الكهربائي الأدنى إلى الجهد الكهربي الأعلى (لاحظ أن التيار الكهربائي معرف عكسيا، أي
                                أن الإلكترونات تتجه من الأعلى للأدنى ولكن ينظر مهندسو الكهرباء إلى التيار الموجب أنه من
                                الأدنى للأعلى أي أن التيار في الحقيقة يسير من القطب السالب وهو الأدنى إلى القطب الموجب
                                وهو الأعلي) أما في أي وسط آخر، فإن أي تدفق لأجسامٍ ذات شحنة كهربية يمكن أن يؤدي إلى
                                توليد تيار كهربي. في الفراغ، قد تتكون حزمة من الأيونات أو الإلكترونات. أما في المواد
                                الأخرى الموصلة للكهرباء، فيتولد التيار الكهربي نتيجة تدفق جسيمات ذات شحنة سالبة وأخرى
                                ذات شحنة موجبة في آنٍ واحد. وفي المواد الساكنة، يعود التيار الكهربي في مجمله إلى سريان
                                شحنة كهربية موجبة. على سبيل المثال، تكون التيارات الكهربية في الإلكتروليتات عبارة عن
                                تدفقات من ذرات ذات شحنات كهربية (أيونات)، موجبة أو سالبة. وفي أي من الخلايا
                                الكهروكيميائية المعروفة المحتوية </p>
                            <div class="loadMore">
                                <div class="loadMoreContent">
                                    عرض المزيد <i class="fa-solid fa-angle-down"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 leftCard">
                    <div class="preview-card">
                        <div class="preview-card-image ontop">
                            <img src="{{ URL::asset('imgs/thumbnail_3.png') }}" alt="" />
                            <div class="lec-image-content">
                                <a class="play" href="#">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                                <p>معاينة المحاضرة</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="price">
                                <span class="real-price"><span class="number">50</span><span class="unit">ج.م</span>
                                </span>
                                <span class="price-before-dis ontop">
                                    <span class="number">100</span>
                                    <span class="unit">ج.م</span>
                                </span>
                                <span class="discount"> خصم 50%</span>
                            </div>
                            <div class="expire-date">
                                <i class="fa-solid fa-stopwatch"></i>
                                <p>
                                    متبقي
                                    <span class="date">2 من الايام</span>
                                    علي الانتهاء
                                </p>
                            </div>

                            <!-- <a href="#" class="buy-now">شراء الأن</a> -->
                            <button type="button" class="buy-now" data-toggle="modal" data-target="#notEnough">
                                شراء الأن </button>
                            <div class="coupon">

                                <button class="add-coupon" id="couponBtn" data-toggle="modal" data-target="#charge">
                                    شحن رصيد
                                </button>
                                <!-- <form class="have-coupon">
                                    <div class="dis-coupon">
                                        <button class="close-coupon" type="button">
                                            <i class="fa fa-close"></i>
                                        </button>

                                        <p class="coupon-text">
                                            KEEPLEARNING
                                        </p>
                                        <input type="text" id="hiddenInput" hidden />
                                        <span class="coupon-status">منفذ</span>
                                        <span class="coupon-status is-invalid-coupon">
                                            غير صالح
                                        </span>
                                    </div>
                                    <input type="submit" value="أضف" id="add-coupon" />
                                    <input type="text" id="coupon-input" />
                                </form> -->
                            </div>
                            <div class="course-content">
                                <h2>محتوي المحاضرة:</h2>
                                <div class="item">
                                    <i class="fa-solid fa-hourglass"></i>
                                    <p><span>2.5</span>ساعة من الفيديو</p>
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-clipboard-question"></i>
                                    <p><span>40</span>من الاسئلة</p>
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p>الوصول من اي مكان</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


    <!-- Modals -->
    <!-- هنا لو رصيده يكفي وهيأكد الشراء  -->
    <!-- <div class="modal fade sureBuyModal" id="sureBuy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">شراء الشهر</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل انت متأكد انك تريد شراء الشهر؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn myButton">شراء</button>
                    <button type="button" class="btn secBtn" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div> -->
    <!-- هنا لو رصيده ميكفيش وعايز يشحن يضغط علي الزرار يوديه للفورم الي جاية   -->
    <div class="modal fade notEnoughModal" id="notEnough" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">شراء الشهر</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    رصيدك الحالي (40 ج.م) لا يكفي لشراء الشهر </div>
                <div class="modal-footer">
                    <button type="button" class="btn myButton" data-toggle="modal" data-target="#charge"
                        id='chargeTransferBtn'>شحن
                        رصيد</button>
                    <button type="button" class="btn secBtn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
    <div class="modal fade chargeCouponModal" id="chargeCoupon" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">شحن كوبون</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="chargeField">
                        <label for="">كود الشحن</label>
                        <input type="text" placeholder='ادخل كود الكوبون'>
                    </div>
                    <p class='finishChargeText'>تم الشحن بنجاح رصيدك الحالي 150 ج.م</p>
                    <p class='wrongChargeText'>الكود الذي ادخلته غير صحيح رصيدك الحالي 100 ج.م</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn myButton">شحن الكوبون</button>
                    <button type="button" class="btn secBtn" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>


    <!--font awesome-->
    <script src="{{URL::asset('js/all.min.js')}}"></script>


    <!--jquery js-->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>

    <!--bootstrap js-->
    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>


    <!-- main js file -->
    <script src="{{URL::asset('js/lecture.js')}}"></script>
</body>

</html>