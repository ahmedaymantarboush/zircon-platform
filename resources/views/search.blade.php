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

    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">

    <!-- css file -->
    <link rel="stylesheet" href="{{asset('css/search.css')}} " class="rel">
    <link rel="stylesheet" href="{{asset('css/search-responsive.css')}} " class="rel">

</head>

<body class=''>

    <nav class="myNav">
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
    <section class="header d-flex justify-content-center align-items-center">
        <h2 class='pageName'>تم العثور علي 530 من النتائج <span>"الباب الاول"</span></h2>
    </section>
    <div class="searchParent">

        <div class=" filter-control">
            <div class="filter-btn-parent">
                <button class="filter-btn">
                    <span class="filter-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                    <span class="filter-name">فلاتر</span>
                    (
                    <span class="count-filter">0</span>
                    )
                </button>
            </div>
            <div class="categories-btn-parent">
                <button class="category-btn">
                    <div class="ctg-right">
                        <span class="ctg-by">تصنيف بواسطة</span>
                        <span class="ctg-name">الأحدث</span>
                    </div>
                    <span class="ctg-arrow"><i class="fa-solid fa-angle-down"></i></span>
                </button>
                <div class="ctg-menu">
                    <p class="menu-item">الأكثر شهرة</p>
                    <p class="menu-item">الشائعة</p>
                    <p class="menu-item">الشائعة</p>
                    <p class="menu-item">الشائعة</p>
                    <p class="menu-item">الشائعة</p>
                </div>
            </div>

        </div>
        <div class="row active bigRow">
            <div class="col-lg-3 filterParent ">
                <span class='closeFilter'><i class="fa-solid fa-arrow-right-long"></i></span>

                <div id="accordion" class="myaccordion">
                    <div class="card" data-name='grades'>
                        <div class="card-header" id="headingOne">
                            <button class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                                aria-controls="collapseOne">
                                المرحلة الدراسية
                                <span class='filterArrow'><i class="fa-solid fa-angle-down"></i></span>
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                            <div class="card-body">

                                <ul class="filter-items">
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card" data-name='price'>
                        <div class="card-header" id="headingTwo">
                            <button class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                السعر
                                <span class='filterArrow'><i class="fa-solid fa-angle-down"></i></span>

                            </button>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                            <div class="card-body">
                                <ul class="filter-items">
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card" data-name='parts'>
                        <div class="card-header" id="headingThree">
                            <button class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                الجزئية الدراسية
                                <span class='filterArrow'><i class="fa-solid fa-angle-down"></i></span>

                            </button>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
                            <div class="card-body">
                                <ul class="filter-items">
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <input type="checkbox" />
                                        <label for="">
                                            الصف الثالث الثانوي
                                            <span class="item-count">(1)</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <section class='levelsBox'>

                    <div class="row">
                        <div class="  col-xl-4 col-md-6 levelItemParent">
                            <a href='#' class="levelItem grade1">
                                <span class='typeGrade'>الصف الاول الثانوي</span>

                                <div class="levelContentParent">
                                    <div class="levelImage">
                                        <img src="{{ asset('imgs/thumbnail_1.png') }}" alt="">
                                    </div>


                                    <div class="levelContent">
                                        <h3 class='levelName'>مراجعة شاملة على الباب الأول (الكهربية)</h3>
                                        <p class='levelDescription'>مراجعة شاملة على باب الكهربية الأول للصف
                                            الاول الثانوي
                                        </p>
                                        <div class="levelDetails">
                                            <div class="detailItem">
                                                <span class='detailIcon'><i class="fa-solid fa-photo-film"></i></span>
                                                <span class='detailContent'>2.5 ساعة من الفيديو</span>
                                            </div>
                                            <div class="detailItem">
                                                <span class='detailIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span class='detailContent'>30 من الاسئلة</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="levelPrice">
                                    <span class='iconPrice'><i class="fa-solid fa-tags"></i></span>
                                    <span class='price'>50</span>
                                    <span class='priceUnit'>ج.م</span>
                                </div>


                            </a>
                        </div>
                        <div class="  col-xl-4 col-md-6 levelItemParent">
                            <a href='#' class="levelItem grade2">
                                <span class='typeGrade'>الصف الاول الثانوي</span>

                                <div class="levelContentParent">
                                    <div class="levelImage">
                                        <img src="{{ asset('imgs/thumbnail_1.png') }}" alt="">
                                    </div>


                                    <div class="levelContent">
                                        <h3 class='levelName'>مراجعة شاملة على الباب الأول (الكهربية)</h3>
                                        <p class='levelDescription'>مراجعة شاملة على باب الكهربية الأول للصف
                                            الاول الثانوي
                                        </p>
                                        <div class="levelDetails">
                                            <div class="detailItem">
                                                <span class='detailIcon'><i class="fa-solid fa-photo-film"></i></span>
                                                <span class='detailContent'>2.5 ساعة من الفيديو</span>
                                            </div>
                                            <div class="detailItem">
                                                <span class='detailIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span class='detailContent'>30 من الاسئلة</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="levelPrice">
                                    <span class='iconPrice'><i class="fa-solid fa-tags"></i></span>
                                    <span class='price'>50</span>
                                    <span class='priceUnit'>ج.م</span>
                                </div>


                            </a>
                        </div>
                        <div class="  col-xl-4 col-md-6 levelItemParent">
                            <a href='#' class="levelItem grade3">
                                <span class='typeGrade'>الصف الاول الثانوي</span>

                                <div class="levelContentParent">
                                    <div class="levelImage">
                                        <img src="{{ asset('imgs/thumbnail_1.png') }}" alt="">
                                    </div>


                                    <div class="levelContent">
                                        <h3 class='levelName'>مراجعة شاملة على الباب الأول (الكهربية)</h3>
                                        <p class='levelDescription'>مراجعة شاملة على باب الكهربية الأول للصف
                                            الاول الثانوي
                                        </p>
                                        <div class="levelDetails">
                                            <div class="detailItem">
                                                <span class='detailIcon'><i class="fa-solid fa-photo-film"></i></span>
                                                <span class='detailContent'>2.5 ساعة من الفيديو</span>
                                            </div>
                                            <div class="detailItem">
                                                <span class='detailIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span class='detailContent'>30 من الاسئلة</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="levelPrice">
                                    <span class='iconPrice'><i class="fa-solid fa-tags"></i></span>
                                    <span class='price'>50</span>
                                    <span class='priceUnit'>ج.م</span>
                                </div>


                            </a>
                        </div>
                        <div class="  col-xl-4 col-md-6 levelItemParent">
                            <a href='#' class="levelItem grade1">
                                <span class='typeGrade'>الصف الاول الثانوي</span>

                                <div class="levelContentParent">
                                    <div class="levelImage">
                                        <img src="{{ asset('imgs/thumbnail_1.png') }}" alt="">
                                    </div>


                                    <div class="levelContent">
                                        <h3 class='levelName'>مراجعة شاملة على الباب الأول (الكهربية)</h3>
                                        <p class='levelDescription'>مراجعة شاملة على باب الكهربية الأول للصف
                                            الاول الثانوي
                                        </p>
                                        <div class="levelDetails">
                                            <div class="detailItem">
                                                <span class='detailIcon'><i class="fa-solid fa-photo-film"></i></span>
                                                <span class='detailContent'>2.5 ساعة من الفيديو</span>
                                            </div>
                                            <div class="detailItem">
                                                <span class='detailIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span class='detailContent'>30 من الاسئلة</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="levelPrice">
                                    <span class='iconPrice'><i class="fa-solid fa-tags"></i></span>
                                    <span class='price'>50</span>
                                    <span class='priceUnit'>ج.م</span>
                                </div>


                            </a>
                        </div>
                        <div class="  col-xl-4 col-md-6 levelItemParent">
                            <a href='#' class="levelItem grade3">
                                <span class='typeGrade'>الصف الاول الثانوي</span>

                                <div class="levelContentParent">
                                    <div class="levelImage">
                                        <img src="{{ asset('imgs/thumbnail_1.png') }}" alt="">
                                    </div>


                                    <div class="levelContent">
                                        <h3 class='levelName'>مراجعة شاملة على الباب الأول (الكهربية)</h3>
                                        <p class='levelDescription'>مراجعة شاملة على باب الكهربية الأول للصف
                                            الاول الثانوي
                                        </p>
                                        <div class="levelDetails">
                                            <div class="detailItem">
                                                <span class='detailIcon'><i class="fa-solid fa-photo-film"></i></span>
                                                <span class='detailContent'>2.5 ساعة من الفيديو</span>
                                            </div>
                                            <div class="detailItem">
                                                <span class='detailIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span class='detailContent'>30 من الاسئلة</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="levelPrice">
                                    <span class='iconPrice'><i class="fa-solid fa-tags"></i></span>
                                    <span class='price'>50</span>
                                    <span class='priceUnit'>ج.م</span>
                                </div>


                            </a>
                        </div>
                        <div class="  col-xl-4 col-md-6 levelItemParent">
                            <a href='#' class="levelItem grade3">
                                <span class='typeGrade'>الصف الاول الثانوي</span>

                                <div class="levelContentParent">
                                    <div class="levelImage">
                                        <img src="{{ asset('imgs/thumbnail_1.png') }}" alt="">
                                    </div>


                                    <div class="levelContent">
                                        <h3 class='levelName'>مراجعة شاملة على الباب الأول (الكهربية)</h3>
                                        <p class='levelDescription'>مراجعة شاملة على باب الكهربية الأول للصف
                                            الاول الثانوي
                                        </p>
                                        <div class="levelDetails">
                                            <div class="detailItem">
                                                <span class='detailIcon'><i class="fa-solid fa-photo-film"></i></span>
                                                <span class='detailContent'>2.5 ساعة من الفيديو</span>
                                            </div>
                                            <div class="detailItem">
                                                <span class='detailIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span class='detailContent'>30 من الاسئلة</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="levelPrice">
                                    <span class='iconPrice'><i class="fa-solid fa-tags"></i></span>
                                    <span class='price'>50</span>
                                    <span class='priceUnit'>ج.م</span>
                                </div>


                            </a>
                        </div>




                </section>
            </div>
        </div>
        <div class="cards-control">

            <div class="btns">
                <button class="card-btn">
                    <span class="btn-arrow"><i class="fa-solid fa-angles-right"></i></span>
                </button>
                <button class="card-btn active">3</button>
                <button class="card-btn">2</button>
                <button class="card-btn">1</button>
                <button class="card-btn">
                    <span class="btn-arrow"><i class="fa-solid fa-angles-left"></i></span>
                </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
    <!--font awesome-->
    <script src="{{asset('js/all.min.js')}}"></script>


    <!--jquery js-->
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!--bootstrap js-->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


    <!-- main js file -->
    <script src="{{asset('js/search.js')}}"></script>
</body>

</html>