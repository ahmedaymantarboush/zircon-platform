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
    <link rel="stylesheet" href="{{ URL::asset('css/signup.css') }} " class="rel">
    <link rel="stylesheet" href="{{ URL::asset('css/signup-responsive.css') }} " class="rel">
    @include('includes.appUrl')
</head>

<body>
    <input type="hidden" name="token" id="csrf_token" value="{{ csrf_token() }}">

    <section class='signup'>
        <div class="signupCard">
            <div class="customeRow">
                @yield('content')
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

    <script src="{{ URL::asset('js/all.min.js') }}"></script>

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ URL::asset('js/signup.js') }}"></script>
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
