<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('faveicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('faveicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('faveicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('faveicon/site.webmanifest')}}">
    <title>{{ config('app.name') }}</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;500;600;800;900&family=Montserrat:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">


    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-rtl.min.css') }}">
    @include('includes.appUrl')
    @yield('css')
    <link rel="stylesheet" href="{{asset('css/nav.css')}}">
</head>

<body>
    @include('components.home.nav')
    @yield('content')
    <footer class=' '>
        <div class="waves wave1">
            <svg width="100%" height="290px" fill="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                </linearGradient>
                <path fill="rgba(130,222,221)"
                    d="
      M0 67
      C 273,183
        822,-40
        1920.00,106

      V 359
      H 0
      V 67
      Z">
                    <animate repeatCount="indefinite" fill="url(#grad1)" attributeName="d" dur="15s"
                        attributeType="XML"
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
                <path fill="rgba(130,222,221,.6)"
                    d="
      M0 67
      C 273,183
        822,-40
        1920.00,106

      V 359
      H 0
      V 67
      Z">
                    <animate repeatCount="indefinite" fill="url(#grad1)" attributeName="d" dur="10s"
                        attributeType="XML"
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
                <path fill="rgba(130,222,221,.4)"
                    d="
      M0 67
      C 273,183
        822,-40
        1920.00,106

      V 359
      H 0
      V 67
      Z">
                    <animate repeatCount="indefinite" fill="url(#grad1)" attributeName="d" dur="6s"
                        attributeType="XML"
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
                    <p class='crTeacher'>???????? ???????????? ???????????? ?????????? ???????? ?????????? 2022</p>
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



    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>

    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

    @yield('javascript')
    <script>
        $(document).ready(function() {
            // $('body').bind('cut copy paste', function(e) {
            //     e.preventDefault();
            // })
            $("body").on("contextmenu", function(e) {
                return false;
            })
            document.onkeydown = function(e) {
                if (event.keyCode == 123) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                    return false;
                }
            }
        })
    </script>
</body>

</html>
