@extends('layouts.HomeLayout')
@section('css')
{{-- <!--swiper--> --}}
<link rel="stylesheet" href="{{ URL::asset('css/swiper.bundle.min.css') }}">
{{-- <!-- css file --> --}}
<link rel="stylesheet" href="{{ URL::asset('css/profile.css') }} " class="rel">
<link rel="stylesheet" href="{{ URL::asset('css/profile-responsive.css') }} " class="rel">
@endsection

@section('content')
<section class="main">
    <div class="bg nonePrint paper2">
        <img src="" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 nonePrint rightProfile">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="addCharge ">
                            <span class="iconCharge">
                                <i class="fa-solid fa-wallet"></i>
                            </span>
                            <span class='yourMoney'>{{ $user->balance }} ج.م</span>
                            <button class='addChargeBtn' type='button' data-toggle="modal" data-target="#charge"
                                class='editBtn'>اضافة</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="whiteBox statBox">
                            <span class="statICon">
                                <i class="fa-solid fa-question"></i>
                            </span>
                            <div class="statContent">
                                <span class='num totalAnswers'>
                                    {{ count($user->answerdQuestions) }}
                                </span>
                                <span class='detail'>سؤال محلول</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="whiteBox statBox">
                            <span class="statICon">
                                <i class="fa-solid fa-circle-check"></i>
                            </span>
                            <div class="statContent">
                                <span class='num correctAnswers'>
                                    {{ count($user->answerdQuestions()->where('correct', true)->get()) }}
                                </span>
                                <span class='detail'>مرات الاجابة الصحيحة</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6 mb-30">
                        <div class="whiteBox donutParent">
                            <div class="donut"></div>

                            <div class="type">
                                <div class="Absence">إجابة صحيحة</div>
                                <div class="Presence">إجابة خاطئة</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 mb-30">
                        <div class="whiteBox">
                            <div id="chart" style=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 mb-30 leftProfile ">
                <div class="whiteBox profileDetails ">
                    <div class="profileImg">
                        <img src="{{ $user->image }}" alt="">
                    </div>
                    <div class="profileContent">
                        <div class="personalInformation">
                            <h3 class='profileName'>{{ $user->name }}</h3>
                            <span class='profileType'>{{ $user->role->title }}</span>
                        </div>
                        <div class="paper">
                            <img src="" alt="">
                        </div>
                        <div class="someDetails">
                            <div class="control">
                                <h3 class='someDetailsHeading'>معلومات الطالب</h3>
                                <div class="controlBtns nonePrint">
                                    <button class='printBtn'><i class="fa-solid fa-print"></i></button>
                                    <a href="#" class='editBtn' data-toggle="modal" data-target="#edit"><i
                                            class="fa-solid fa-user-pen"></i></a>

                                </div>
                            </div>
                            <div class="item">
                                <span class='type'>الاسم:</span>
                                <span class='info'>{{ $user->name }}</span>
                            </div>
                            <div class="item">
                                <span class='type'>المرحلة الدراسية:</span>
                                <span class='info'>{{ $user->grade->name }}</span>
                            </div>
                            <div class="item">
                                <span class='type'>الرقم:</span>
                                <span class='info'>{{ $user->phone_number }}</span>
                            </div>
                            <div class="item">
                                <span class='type'>رقم ولي الامر:</span>
                                <span class='info'>{{ $user->parent_phone_number }}</span>
                            </div>
                            <div class="item">
                                <span class='type'> المحافظة:</span>
                                <span class='info'>{{ $user->governorate->name }}</span>
                            </div>
                            <div class="item">
                                <span class='type'>مكان الحضور:</span>
                                <span class='info'>{{ $user->center->name }}</span>
                            </div>
                            <div class='barcodeBox'>
                                <svg class="barcode" id='profileBarCode'></svg>
                                <span class='barcodeText'>{{ $user->code }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="swiper myCourses">
            <div class="swiper-wrapper">
                @foreach ($user->ownedLectures as $lecture)
                <div class="swiper-slide">
                    <a class="latestCard  grade{{ $user->grade->id }}"
                        href='{{ route('months.show', $lecture->slug) }}'>
                        <div class="cardGrade">
                            {{ $lecture->grade->name }}
                        </div>
                        <div class="image">
                            <img src="{{ $lecture->poster }}" alt="">
                        </div>
                        <div class="content">
                            <div class="lessonsCount">
                                <span class='cardIcon'><i class="fa-solid fa-book"></i></span>
                                <span class='cardLessonsCount'>{{ count($lecture->lessons) }}</span>
                            </div>
                            <h3 class="monthName">{{ $lecture->title }}
                            </h3>
                            <div class="details">
                                <div class="detailItem priceCourse ">
                                    <span class='cardPrice'>{{ getPrice($lecture) }}</span>
                                    <span>ج.م</span>
                                </div>
                                <div class="detailItem users">
                                    <span><i class="fa-solid fa-user"></i></span>
                                    <span>{{ count($lecture->owners) }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next">
                <span class='swiperControl'>
                    <i class="fa-solid fa-angle-left"></i>
                </span>
            </div>
            <div class="swiper-button-prev">
                <span class='swiperControl'>
                    <i class="fa-solid fa-angle-right"></i>
                </span>
            </div>
        </div>
    </div>
</section>
{{-- <!-- Modals --> --}}
{{-- <!-- هنا بقا الفورم الي هيشحن فيها رصيد   --> --}}
<div class="modal fade chargeModal" id="charge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('balance.recharge') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">شحن رصيد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="chargeField">
                    <label for="">كود الشحن</label>
                    <input type="text" name="code" placeholder='ادخل كود الشحن'>
                </div>
                <p class='finishText'></p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn myButton">شحن رصيد</button>
                <button type="button" class="btn secBtn" data-dismiss="modal">إغلاق</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade editModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{route('user.update')}}" class="modal-content">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل الملف الشخصي</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="chargeField">
                    <div class='inputParent @error(' name') isInvalid @enderror'>
                        <label for="">الاسم</label>
                        <input type="text" name="name" value="{{ old('name') ?? $user->name }}"
                            placeholder='ادخل الاسم'>
                        @error('name')
                        <span class='error'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class='inputParent @error(' grade') isInvalid @enderror'>
                        <label for="">المرحلة الدراسية</label>
                        <select name="grade" id="">
                            <option value="">اختر المرحلة الدراسية</option>
                            @foreach (\App\Models\Grade::all() as $grade)
                            <option @selected(old('grade')==$grade->name || $user->grade->name == $grade->name)
                                value="{{ $grade->name }}">
                                {{ $grade->name }}</option>
                            @endforeach
                        </select>
                        @error('grade')
                        <span class='error'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class='inputParent @error(' phoneNumber') isInvalid @enderror'>
                        <label for="">رقم الهاتف </label>
                        <input type="text" name="phoneNumber" value="{{ old('phoneNumber') ?? $user->phone_number }}"
                            placeholder='رقم الهاتف'>
                        @error('phoneNumber')
                        <span class='error'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class='inputParent @error(' parentPhoneNumber') isInvalid @enderror'>
                        <label for="">رقم هاتف ولي الأمر</label>
                        <input type="text" name="parentPhoneNumber"
                            value="{{ old('parentPhoneNumber') ?? $user->parent_phone_number }}"
                            placeholder='رقم الهاتف'>
                        @error('parentPhoneNumber')
                        <span class='error'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class='inputParent @error(' governorate') isInvalid @enderror'>
                        <label for="">المحافظة</label>
                        <select name="governorate" id="">
                            <option value="">اختر المحافظة</option>
                            @foreach (\App\Models\Governorate::all() as $governorate)
                            <option @selected(old('governorate')==$governorate->name || $user->governorate->name ==
                                $governorate->name) value="{{ $governorate->name }}">
                                {{ $governorate->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('governorate')
                        <span class='error'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class='inputParent @error(' center') isInvalid @enderror'>
                        <label for="">مكان الدراسة</label>
                        <select name="center" id="">
                            <option value="">اختر مكان الدراسة</option>
                            @foreach (\App\Models\Center::all() as $center)
                            <option @selected(old('center')==$center->name || $user->center->name == $center->name)
                                value="{{ $center->name }}">
                                {{ $center->name }}</option>
                            @endforeach
                        </select>
                        @error('center')
                        <span class='error'>{{$message}}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn myButton">تعديل</button>
                <button type="button" class="btn secBtn" data-dismiss="modal">الغاء</button>
            </div>
        </form>
    </div>
</div>
<iframe src="#" hidden style="display: none" id="printPage" frameborder="0"></iframe>
@endsection

@section('javascript')
@if (request()->session()->has('errors'))
<script>
document.querySelector('.editBtn').click();
</script>
@endif
@if (request()->session()->has('success') && !request()->session()->get('success'))
<script>
document.querySelector('.addChargeBtn').click();
</script>
@endif

{{-- <!-- هنا و الهوم  --> --}}
<script src="{{ URL::asset('js/swiper.bundle.min.js') }}"></script>
{{-- <!-- هنا بس  --> --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{-- <!-- barcode  --> --}}
{{-- <!-- هنا بس  --> --}}
<script src="{{ URL::asset('js/jsBarCode.all.min.js') }}"></script>
{{-- <!-- main js file --> --}}
@php
$passedExams = $user
->passedExams()
->orderBy('ended_at')
->get();
@endphp
<script>
exams = @php echo $passedExams - > pluck('percentage');
echo ";\n";
@endphp
dates = @php echo $passedExams - > pluck('ended_at');
echo ";\n";
@endphp
correctAnswers = {
    {
        $user - > answerdQuestions() - > where('correct', 1) - > count()
    }
};
wrongAnswers = {
    {
        $user - > answerdQuestions() - > where('correct', 0) - > count()
    }
};
</script>
<script src="{{ URL::asset('js/profile.js') }}"></script>
@endsection