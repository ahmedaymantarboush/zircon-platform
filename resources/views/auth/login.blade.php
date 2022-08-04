@extends('layouts.authunticationLayout', ['page' => 'login'])
@section('content')
    <div class="content">
        <h2>تسجيل الدخول</h2>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="box @error('email') isInvalid @enderror">
                <div class="inputItem">
                    <span class='inputIcon'><i class="fa-solid fa-envelope"></i></span>
                    <input type="text" name='email' value="{{old('email')}}" placeholder='&nbsp;'>
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
                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a href="#" class='forgotPassword'>هل نسيت كلمة المرور ؟</a>
            <input type="submit" value='تسجيل' class='reg'>
            <p class='haveAccount'>ليس لديك حساب؟ <a href="#">تسجيل جديد</a></p>
        </form>

    </div>
@endsection
