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
    <link rel="stylesheet" href="{{URL::asset('css/signup.css')}} " class="rel">
    <link rel="stylesheet" href="{{URL::asset('css/signup-responsive.css')}} " class="rel">

</head>

<body>

    <!-- <div class='errorMessageModal '>
        حدث خطأ اثناء التسجيل حاول مرة اخري
    </div> -->
    <section class='signup'>
        <div class="signupCard">

            <div class="customeRow">



                <div class="content">
                    <h2>تسجيل جديد</h2>

                    <form action="">
                        <div class="box ">
                            <div class="inputItem">
                                <span class='inputIcon'><i class="fa-solid fa-envelope"></i></span>
                                <input type="text" placeholder='&nbsp;'>
                                <label for="">البريد الالكتروني</label>
                            </div>
                            <div class="error">
                                حدث خطأ في التسجيل
                            </div>
                        </div>
                        <div class="box ">
                            <div class="inputItem">
                                <span class='inputIcon'><i class="fa-solid fa-lock"></i></span>
                                <input type="password" placeholder='&nbsp;' id='lol'>
                                <label for="">كلمة المرور</label>
                            </div>
                            <div class="error">
                                حدث خطأ في التسجيل
                            </div>
                        </div>
                        <div class="box ">
                            <div class="inputItem ">
                                <span class='inputIcon'><i class="fa-solid fa-layer-group"></i></span>
                                <select name="" id="">
                                    <option value="">اختر المرحلة الدراسية</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                            <div class="error">
                                حدث خطأ في التسجيل
                            </div>
                        </div>
                        <a href="#" class='forgotPassword'>هل نسيت كلمة المرور ؟</a>
                        <input type="submit" value='تسجيل' class='reg'>
                        <p class='haveAccount'>هل لديك حساب بالفعل؟ <a href="#">تسجيل الدخول</a></p>
                    </form>

                </div>
                <div class="image">
                    <img src="{{ URL::asset('imgs/elbirryLogin.png') }}" alt="">
                    <div class="imageContent">
                        <p>سجل حسابك دلوقتي و خليك

                            مع البري</p>

                        <span class='teacherName'>أ. محمد البري</span>
                    </div>
                </div>

            </div>
        </div>
        <section class="icons">
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>

            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
            <div class="backgroundRow">


                <div>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-atom"></i>
                    <i class="fa-solid fa-apple-whole"></i>
                    <i class="fa-solid fa-award"></i>
                    <i class="fa-solid fa-user-graduate"></i>
                    <i class="fa-solid fa-book-open"></i>
                </div>

            </div>
        </section>

    </section>


    <!--font awesome-->
    <script src="{{URL::asset('js/all.min.js')}}"></script>


    <!--jquery js-->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>

    <!--bootstrap js-->
    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>


    <!-- main js file -->
    <script src="{{URL::asset('js/signup.js')}}"></script>
</body>

</html>