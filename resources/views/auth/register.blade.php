@extends('layouts.authunticationLayout', ['page' => 'signup'])

@section('content')
    <div class="content">
        <h2>تسجيل جديد</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="box  @error('name') isInvalid @enderror">
                <div class="inputItem">
                    <span class='inputIcon'><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder='&nbsp;'>
                    <label for="">الاسم رباعي</label>
                </div>
                @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="box  @error('email') isInvalid @enderror">
                <div class="inputItem">
                    <span class='inputIcon'><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder='&nbsp;'>
                    <label for="">البريد الالكتروني</label>
                </div>
                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="box @error('password') isInvalid @enderror">
                <div class="inputItem">
                    <span class='inputIcon'><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" placeholder='&nbsp;'>
                    <label for="">كلمة المرور</label>
                </div>
                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="box @error('password_confirmation') isInvalid @enderror">
                <div class="inputItem">
                    <span class='inputIcon'><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password_confirmation" placeholder='&nbsp;'>
                    <label for="">أعد كتابة كلمة المرور</label>
                </div>
                @error('password_confirmation')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="box  @error('phone_number') isInvalid @enderror">
                <div class="inputItem">
                    <span class='inputIcon'><i class="fa-solid fa-phone-flip"></i></span>
                    <input type="text" name='phone_number' value="{{ old('phone_number') }}" placeholder='&nbsp;'>
                    <label for="">رقم التليفون</label>
                </div>
                @error('phone_number')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="box  @error('parent_phone_number') isInvalid @enderror">
                <div class="inputItem">
                    <span class='inputIcon'><i class="fa-solid fa-phone-flip"></i></span>
                    <input type="text" name='parent_phone_number' value="{{ old('parent_phone_number') }}"
                        placeholder='&nbsp;'>
                    <label for="">رقم ولي الأمر</label>
                </div>
                @error('parent_phone_number')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="box @error('grade') isInvalid @enderror">
                <div class="inputItem ">
                    <span class='inputIcon'><i class="fa-solid fa-graduation-cap"></i></span>
                    <select name="grade" id="">
                        <option value="">اختر المرحلة الدراسية</option>
                        @foreach (\App\Models\Grade::all() as $grade)
                            <option @selected(old('grade') == $grade->name) value="{{ $grade->name }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('grade')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="box @error('governorate') isInvalid @enderror">
                <div class="inputItem ">
                    <span class='inputIcon'><i class="fa-solid fa-building"></i></span>
                    <select name="governorate" id="">
                        <option value="">اختر المحافظة</option>
                        @foreach (\App\Models\Governorate::all() as $governorate)
                            <option @selected(old('governorate') == $governorate->name) value="{{ $governorate->name }}">{{ $governorate->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('governorate')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="box @error('center') isInvalid @enderror">
                <div class="inputItem ">
                    <span class='inputIcon'><i class="fa-solid fa-street-view"></i></span>
                    <select name="center" id="">
                        <option value="">اختر مكان الدراسة</option>
                        @foreach (\App\Models\Center::all() as $center)
                            <option @selected(old('center') == $center->name) value="{{ $center->name }}">{{ $center->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('center')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a href="{{ route('password.request') }}" class='forgotPassword'>هل نسيت كلمة المرور ؟</a>
            <input type="submit" value='تسجيل' class='reg'>
            <p class='haveAccount'>هل لديك حساب بالفعل؟ <a href="{{ route('register') }}">تسجيل الدخول</a></p>
        </form>
    </div>
@endsection
