@extends('layouts.HomeLayout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/lecture.css') }} " class="rel">
<link rel="stylesheet" href="{{ asset('css/lecture-responsive.css') }} " class="rel">
@endsection
@section('beforeNav')
<div class="overlay"></div>
<div class="vid-parent"></div>
<span class="close-vid">
    <i class="fa-solid fa-xmark"></i>
</span>
@endsection
@section('content')
<div class="header">
    <div class="container">
        <div class="headerContent">
            <div class="lec-hero-image ontop">
                @if ($lecture->promotinal_video_url && !$lecture->owners->contains(Auth::user()))
                <div class="lec-image-content">
                    <a class="play" href="#">
                        <i class="fa-solid fa-play"></i>
                    </a>
                    <p>معاينة المحاضرة</p>
                </div>
                @endif
                <img src="{{ $lecture->poster }}" alt="" />
            </div>
            <h2 class='lectureName'>{{ $lecture->title }}</h2>
            <p class='lectureDescription'>{{ $lecture->short_description }}</p>
            <div class='lectureRelease'>
                <span class='publisherBy'>
                    نشر بواسطة
                </span>
                <a class='publisherName'>{{ $lecture->publisher->name }}</a>
            </div>
            <div class="lectureUbdateDate">
                <span class='updateIcon'><i class="fa-solid fa-file-pen"></i></span>
                اخر تحديث تم في
                <span class='updateDate'>{{ date('d/m/Y', strtotime($lecture->updated_at)) }}</span>
            </div>
        </div>
    </div>
</div>
<div class="month">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 rightCard">
                <div class="monthParts">
                    <h2>اقسام المحاضرة</h2>
                    <div id="accordion" class="monthsLists">
                        @foreach ($lecture->sections as $section)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                    data-toggle="collapse" data-target="#collapse{{ $section->id }}"
                                    aria-expanded="false" aria-controls="collapse{{ $section->id }}">
                                    <div class='nameOfPart'>
                                        {{ $section->title }}
                                    </div>
                                    <div class='monthBtnDetails'>
                                        <span>{{ count($section->lessons) }} شرح</span>
                                        <span>{{ count($section->exams) }} تطبيق</span>
                                        <span class='monthArrow'><i class="fa-solid fa-angle-down"></i></span>
                                    </div>
                                </button>
                            </div>
                            <div id="collapse{{ $section->id }}" class="collapse" aria-labelledby="headingOne">
                                <div class="card-body">
                                    @foreach ($section->items()->orderBy('order', 'desc')->get() as $item)
                                    <div class="monthItem">
                                        @php
                                        $type = $item->exam_id ? 'question' : 'play';
                                        @endphp
                                        <a href="#">
                                            <span class='monthIcon'><i
                                                    class="fa-solid fa-circle-{{ $type }}"></i></span>
                                            <span>{{ $item->item->title }}</span>
                                        </a>
                                        <span>
                                            @if ($item->exam_id)
                                            {{ $item->item->questions_count }} سؤال
                                            @else
                                            {{ $item->item->time >= 3600 ? number_format($item->item->time / 3600, 2) . ' ساعة' : number_format($item->item->time / 60, 2) . ' دقيقة' }}
                                            @endif
                                        </span>
                                    </div>
                                    @endforeach
                                    {{-- <div class="monthItem">
                                                <a href="#">
                                                    <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                    <span>ما هو التيار الكهربي</span>
                                                </a>
                                                <span>3:23 دقيقة</span>
                                            </div>
                                            <div class="monthItem">
                                                <a href="#">
                                                    <span class='monthIcon'><i
                                                            class="fa-solid fa-clipboard-question"></i></span>
                                                    <span>ما هو التيار الكهربي</span>
                                                </a>
                                                <span>3:23 دقيقة</span>
                                            </div> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <button class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <div class='nameOfPart'>
                                            الجزئية الدراسية

                                        </div>

                                        <div class='monthBtnDetails'>
                                            <span>4 شرح</span>
                                            <span>2 تطبيق</span>
                                            <span class='monthArrow'><i class="fa-solid fa-angle-down"></i></span>
                                        </div>
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                                    <div class="card-body">

                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <button class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">

                                        <div class='nameOfPart'>
                                            الجزئية الدراسية

                                        </div>
                                        <div class="monthBtnDetails">
                                            <span>4 شرح</span>
                                            <span>2 تطبيق</span>
                                            <span class='monthArrow'><i class="fa-solid fa-angle-down"></i></span>

                                        </div>

                                    </button>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
                                    <div class="card-body">

                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i class="fa-solid fa-circle-play"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                        <div class="monthItem">
                                            <a href="#">
                                                <span class='monthIcon'><i
                                                        class="fa-solid fa-clipboard-question"></i></span>
                                                <span>ما هو التيار الكهربي</span>
                                            </a>
                                            <span>3:23 دقيقة</span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                    </div>
                    <h2>وصف المحاضرة</h2>
                    <div class="monthDescriptionParent ">
                        <p class='monthDescription'>@php echo $lecture->description; @endphp</p>
                        <div class="loadMore">
                            <div class="loadMoreContent">
                                عرض المزيد <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 leftCard">
                <div class="preview-card">
                    <div class="preview-card-image ontop">
                        <img src="{{ $lecture->poster }}" alt="" />
                        @if ($lecture->promotinal_video_url && !$lecture->owners->contains(Auth::user()))
                        <div class="lec-image-content">
                            <input type="hidden" id="promotinalVideoUrl" value="{{ $lecture->promotinal_video_url }}">
                            <a class="play" href="#">
                                <i class="fa-solid fa-play"></i>
                            </a>
                            <p>معاينة المحاضرة</p>
                        </div>
                        @endif
                    </div>
                    <div class="card-content">
                        @php
                        $price = getPrice($lecture);
                        @endphp
                        @if (Auth::user() ? $lecture->owners->contains(Auth::user()) : false)
                        <form action="{{ route('lectures.view') }}" method="post">
                            @csrf
                            <input type="hidden" name="slug" value="{{ $lecture->slug }}">
                            <button type="submit" class="buy-now">عرض الشهر</button>
                        </form>
                        @else
                        <div class="price">
                            <span class="real-price"><span class="number">{{ $price }}</span><span
                                    class="unit">ج.م</span>
                            </span>
                            @if ($lecture->discount_expiry_date)
                            <span class="price-before-dis ontop">
                                <span class="number">{{ $lecture->price }}</span>
                                <span class="unit">ج.م</span>
                            </span>
                            <span class="discount"> خصم
                                {{ number_format((($lecture->price - $price) * 100) / $lecture->price, 2) }}%</span>
                            `
                            @endif
                        </div>
                        @if ($lecture->discount_expiry_date)
                        <div class="expire-date">
                            <i class="fa-solid fa-stopwatch"></i>
                            <p>
                                متبقي
                                @if (now()->diff($lecture->discount_expiry_date)->y)
                                <span class="date">{{ now()->diff($lecture->discount_expiry_date)->y }}
                                    من
                                    السنوات</span>
                                @endif
                                @if (now()->diff($lecture->discount_expiry_date)->m)
                                {{ now()->diff($lecture->discount_expiry_date)->y ? ' و ' : '' }}<span
                                    class="date">{{ now()->diff($lecture->discount_expiry_date)->m }} من
                                    الشهور</span>
                                @endif
                                @if (now()->diff($lecture->discount_expiry_date)->d)
                                {{ now()->diff($lecture->discount_expiry_date)->m || now()->diff($lecture->discount_expiry_date)->y ? ' و ' : '' }}<span
                                    class="date">{{ now()->diff($lecture->discount_expiry_date)->d }} من
                                    الأيام</span>
                                @endif
                                {{-- <span class="date">2 من الايام</span> --}}
                                علي الانتهاء
                            </p>
                        </div>
                        @endif
                        {{-- <!-- <a href="#" class="buy-now">شراء الأن</a> --> --}}
                        @auth
                        <a href="#" type="button" class="buy-now" data-toggle="modal"
                            data-target="#{{ Auth::user() ? (Auth::user()->balance >= $price ? 'sureBuy' : 'notEnough') : 'notEnough' }}">
                            شراء الأن </a>
                        @else
                        <a href="{{ route('login') }}" class="buy-now">شراء الأن </a>
                        @endauth
                        <div class="coupon">
                            <button class="add-coupon" id="couponBtn" data-toggle="modal" data-target="#charge">
                                شحن رصيد
                            </button>
                        </div>
                        @endif
                        <div class="course-content">
                            <h2>محتوي المحاضرة:</h2>
                            <div class="item">
                                <i class="fa-solid fa-hourglass"></i>
                                <p><span>{{ $lecture->time >= 3600 ? number_format($lecture->time / 3600, 2) . ' ساعة' : number_format($lecture->time / 60, 2) . ' دقيقة' }}</span>
                                    من الفيديو</p>
                            </div>
                            <div class="item">
                                <i class="fa-solid fa-clipboard-question"></i>
                                <p><span>{{ $lecture->total_questions_count }}</span> من الاسئلة</p>
                            </div>
                            <div class="item">
                                <i class="fa-solid fa-location-dot"></i>
                                <p>الوصول من اي مكان</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (Auth::check())
<!-- Modals -->
@if (Auth::user()->balance >= $price)
<!-- هنا لو رصيده يكفي وهيأكد الشراء  -->
<div class="modal fade sureBuyModal" id="sureBuy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.lectures.buy', $lecture->slug) }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">شراء الشهر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                هل انت متأكد انك تريد شراء الشهر؟ (رصيدك: {{ Auth::user()->balance }} ج.م)
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn myButton">شراء</button>
                <button type="button" class="btn secBtn" data-dismiss="modal">الغاء</button>
            </div>
        </form>
    </div>
</div>
@else
<!-- هنا لو رصيده ميكفيش وعايز يشحن يضغط علي الزرار يوديه للفورم الي جاية   -->
<div class="modal fade notEnoughModal" id="notEnough" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">شراء الشهر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                رصيدك الحالي ({{ Auth::user()->balance }} ج.م) لا يكفي لشراء الشهر
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn myButton" data-toggle="modal" data-target="#charge"
                    id='chargeTransferBtn'>شحن رصيد</button>
                <button type="button" class="btn secBtn" data-dismiss="modal">الغاء</button>
            </div>
        </div>
    </div>
</div>
<!-- هنا بقا الفورم الي هيشحن فيها رصيد   -->
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
                @if (request()->session()->has('success') &&
                !request()->session()->get('success'))
                <p class="{{ request()->session()->get('success')? 'finishChargeText': 'wrongChargeText' }}">
                    {{ request()->session()->get('msg') }}</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn myButton">شحن رصيد</button>
                <button type="button" class="btn secBtn" data-dismiss="modal">إغلاق</button>
            </div>
        </form>
    </div>
</div>
@endif
@endif
<!-- هنا بقا الفورم الي هيشحن فيها كوبون   -->
<div class="modal fade chargeCouponModal" id="chargeCoupon" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">شحن كوبون</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="chargeField">
                    <label for="">كود الشحن</label>
                    <input type="text" placeholder='ادخل كود الكوبون'>
                </div>
                {{-- <p class='finishChargeText'>تم الشحن بنجاح رصيدك الحالي 150 ج.م</p>
                    <p class='wrongChargeText'>الكود الذي ادخلته غير صحيح رصيدك الحالي 100 ج.م</p> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn myButton">شحن الكوبون</button>
                <button type="button" class="btn secBtn" data-dismiss="modal">الغاء</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('js/lecture.js') }}"></script>
@endsection