@extends('layouts.authunticationLayout', ['page' => 'signup'])

@section('content')
    <div class="image">
        <img src="{{ URL::asset('imgs/elbirryLogin.png') }}" alt="">
        <div class="imageContent">
            <p>سجل دخولك دلوقتي و خليك
                مع البري</p>

            <span class='teacherName'>أ. محمد البري</span>
        </div>
    </div>
    <div class="content">
        <h2>تسجيل الدخول</h2>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="box @error('email') isInvalid @enderror">
                <div class="inputItem">
                    <span class='inputIcon'><i class="fa-solid fa-envelope"></i></span>
                    <input type="text" name='email' value="{{ old('email') }}" placeholder='&nbsp;'>
                    <label for="">البريد الالكتروني</label>
                </div>
                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="box  @error('password') isInvalid @enderror">
                <div class="inputItem">
                    <span class='inputIcon'><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name='password' placeholder='&nbsp;'>
                    <label for="">كلمة المرور</label>
                </div>
                <a href="{{ route('password.request') }}" class='forgotPassword'>هل نسيت كلمة المرور ؟</a>
                <input type="submit" value='تسجيل' class='reg'>
                <p class='haveAccount'>ليس لديك حساب؟ <a href="{{ route('register') }}">تسجيل جديد</a></p>
            </div>
        </form>

    </div>
@endsection
