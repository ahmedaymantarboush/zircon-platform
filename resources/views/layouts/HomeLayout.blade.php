<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('seo')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('faveicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('faveicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('faveicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('faveicon/site.webmanifest')}}">
    <title>{{ config('app.name') }}</title>


        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}"> --}}
    <!-- {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}} -->

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/sal.css') }}">
    @include('includes.appUrl')

    @yield('css')

    <link rel="stylesheet" href="{{asset('css/nav.css')}}">


</head>

<body>
    <input type="hidden" name="token" id="csrf_token" value="{{ csrf_token() }}">
    @yield('beforeNav')
    @include('components.home.nav')
    @yield('content')
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
                <a class="facebook" href='https://www.facebook.com/mohamedelberry2023/'><i class="fa-brands fa-facebook-f"></i></a>
                <a class="youtube" href='https://youtube.com/channel/UCzcG54DUDzBqiJfXaJx9ocg'><i class="fa-brands fa-youtube"></i></a>
                <a class="telegram" href='https://t.me/mrmohamedelberry'><i class="fa-brands fa-telegram"></i></a>
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

    <!-- <script src="{{ URL::asset('js/all.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"></script> -->

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('js/sal.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/2.0.6/velocity.min.js"
        integrity="sha512-+VS2+Nl1Qit71a/lbncmVsWOZ0BmPDkopw5sXAS2W+OfeceCEd9OGTQWjgVgP5QaMV4ddqOIW9XLW7UVFzkMAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('javascript')
    <script>
        $(document).ready(function() {
            // $('body').bind('cut copy paste', function(e) {
            //     e.preventDefault();
            // })
        //     $("body").on("contextmenu", function(e) {
        //         return false;
        //     })
        //     document.onkeydown = function(e) {
        //         if (event.keyCode == 123) {
        //             return false;
        //         }
        //         if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        //             return false;
        //         }
        //         if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
        //             return false;
        //         }
        //         if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        //             return false;
        //         }
        //         if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        //             return false;
        //         }
        //     }
        // })
    </script>
</body>

</html>
