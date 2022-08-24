<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- @yield('seo') --}}
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f2178052c7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <!-- Link Swiper's CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{asset('lectureAssets/css/lectureviewer.css')}}">
    @include('includes.appUrl')
    <script src="{{asset('js/jquery.min.js')}}" ></script>
    {{--lecture name--}}

    <title>{{config('app.name')}} - @yield('lec_name')</title>
</head>
<body>
    <input type="hidden" id="csrf_token" name="_token" value="{{csrf_token()}}">

    <header class=" lec_header square-box align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col-lg-6 col-md-12 hd_2" style="margin: 0;padding: 0;">
                <div class="square-box d-flex justify-content-start align-items-center" style="height: 100px;">
                    @yield('lec_link')
                    <a href="#" class="lec_link" style="margin-left: 20px;">
                        محاضراتي
                        <i class="fa-solid fa-chevron-right" style="margin-left: 5px"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 hd_1"style="margin: 0;padding: 0;">
                <div class="square-box d-flex justify-content-end align-items-center"style="height: 100px;">
                    <span class="lec_name">@yield('lec_name')</span>
                    <img src="{{asset('lectureAssets/img/logo-white.png')}}" alt="logo">
                </div>
            </div>
        </div>
    </header>
    <div class="row" style="width: 100%;height: 100%;padding: 0;margin: 0;">
        <div class="col-lg-3 col-md-12 hd_2 "style="padding: 0;margin: 0;">
            <div class="sidebar">
                <div class="accordion" id="accordionExample" dir="rtl">
                    @yield('sections')
                </div>
            </div>

        </div>
        <div class="col-lg-9 col-md-12 hd_1" style="padding: 0;margin: 0;">
            <main style="width: 100%;">
                @yield('main')
            </main>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('lectureAssets/js/lectureviewer.js')}}"></script>
    {{-- Prevent Rigth click ,copy ,cut and paste --}}
{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            $('body').bind('cut copy paste', function (e){--}}
{{--                e.preventDefault();--}}
{{--            })--}}
{{--            $("body").on("contextmenu", function (e){--}}
{{--                return false;--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
</body>
</html>
