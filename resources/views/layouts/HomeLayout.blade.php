<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!--fonts-->
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;500;600;800;900&family=Montserrat:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet" />


    <!-- font awesome -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">


    <!--bootstrap-->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-rtl.min.css') }}">

    @yield('css')

</head>

<body>

    @include('components.Home.nav')

    @yield('content')
    @include('components.Home.footer')

    <!--font awesome-->
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>

    <!--jquery js-->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>

    <!--bootstrap js-->
    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/2.0.6/velocity.min.js"
        integrity="sha512-+VS2+Nl1Qit71a/lbncmVsWOZ0BmPDkopw5sXAS2W+OfeceCEd9OGTQWjgVgP5QaMV4ddqOIW9XLW7UVFzkMAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('javascript')
</body>

</html>
