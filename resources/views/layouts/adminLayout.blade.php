@include('includes.admin.head')
<input type="hidden" name="token" id="csrf_token" value="{{csrf_token()}}">
<section class="main">
    <div class="container-fluid">
        <div class="row parent-row">
            <div class="col-xl-2 side">
                <button class="close-side">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <section class="side-bar">
                    <div class="brand">
                        <div class="image">
                            <img src="{{ asset('admin/assets/imgs/logo.png') }}" alt="" />
                        </div>
                        <h1>Zircon LMS Dashboard</h1>
                    </div>
                    <div class="side-bar-f-item active-box">
                        <div class="box">
                            <span class="box-icon">
                                <i class="fa-solid fa-gauge-high"></i>
                            </span>
                            <span class="box-name"> لوحة التحكم </span>
                        </div>
                    </div>

                    <div class="side-bar-item">
                        <div class="box">
                            <span class="box-icon">
                                <i class="fa-solid fa-gauge-high"></i>
                            </span>
                            <span class="box-name"> الطلاب </span>
                            <span class="parent-arrow">
                                <i class="fa-solid fa-angle-down"></i
                            ></span>
                        </div>

                        <div class="elements">
                            <div class="ele-child">
                                <a href="#" class="child-name"
                                    >الطالب رقم1</a
                                >
                                <span class="child-arrow">
                                    <i
                                        class="fa-solid fa-angle-down"
                                    ></i
                                ></span>
                            </div>
                            <div class="grand-child">
                                <a href="#" class="grand-child-name"
                                    >ساقط مرتفع</a
                                >
                                <a href="#" class="grand-child-name"
                                    >مقبول</a
                                >
                            </div>
                        </div>
                        <div class="elements">
                            <div class="ele-child">
                                <a href="#" class="child-name"
                                    >الطالب رقم 2</a
                                >
                                <span class="child-arrow">
                                    <i
                                        class="fa-solid fa-angle-down"
                                    ></i
                                ></span>
                            </div>
                            <div class="grand-child">
                                <a href="#" class="grand-child-name"
                                    >ساقط مرتفع</a
                                >
                                <a href="#" class="grand-child-name"
                                    >مقبول</a
                                >
                            </div>
                        </div>
                    </div>

                    <div class="side-bar-item">
                        <div class="box">
                            <span class="box-icon">
                                <i class="fa-solid fa-gauge-high"></i>
                            </span>
                            <span class="box-name"> الطلاب </span>
                            <span class="parent-arrow">
                                <i class="fa-solid fa-angle-down"></i
                            ></span>
                        </div>

                        <div class="elements">
                            <div class="ele-child">
                                <a href="#" class="child-name"
                                    >الطالب رقم1</a
                                >
                                <span class="child-arrow">
                                    <i
                                        class="fa-solid fa-angle-down"
                                    ></i
                                ></span>
                            </div>
                            <div class="grand-child">
                                <a href="#" class="grand-child-name"
                                    >ساقط مرتفع</a
                                >
                                <a href="#" class="grand-child-name"
                                    >مقبول</a
                                >
                            </div>
                        </div>
                        <div class="elements">
                            <div class="ele-child">
                                <a href="#" class="child-name"
                                    >الطالب رقم 2</a
                                >
                                <span class="child-arrow">
                                    <i
                                        class="fa-solid fa-angle-down"
                                    ></i
                                ></span>
                            </div>
                            <div class="grand-child">
                                <a href="#" class="grand-child-name"
                                    >ساقط مرتفع</a
                                >
                                <a href="#" class="grand-child-name"
                                    >مقبول</a
                                >
                            </div>
                        </div>
                    </div>
                    <div class="side-bar-item">
                        <div class="box">
                            <span class="box-icon">
                                <i class="fa-solid fa-gauge-high"></i>
                            </span>
                            <span class="box-name"> الطلاب </span>
                            <span class="parent-arrow">
                                <i class="fa-solid fa-angle-down"></i
                            ></span>
                        </div>

                        <div class="elements">
                            <div class="ele-child">
                                <a href="#" class="child-name"
                                    >الطالب رقم1</a
                                >
                                <span class="child-arrow">
                                    <i
                                        class="fa-solid fa-angle-down"
                                    ></i
                                ></span>
                            </div>
                            <div class="grand-child">
                                <a href="#" class="grand-child-name"
                                    >ساقط مرتفع</a
                                >
                                <a href="#" class="grand-child-name"
                                    >مقبول</a
                                >
                            </div>
                        </div>
                        <div class="elements">
                            <div class="ele-child">
                                <a href="#" class="child-name"
                                    >الطالب رقم 2</a
                                >
                                <span class="child-arrow">
                                    <i
                                        class="fa-solid fa-angle-down"
                                    ></i
                                ></span>
                            </div>
                            <div class="grand-child">
                                <a href="#" class="grand-child-name"
                                    >ساقط مرتفع</a
                                >
                                <a href="#" class="grand-child-name"
                                    >مقبول</a
                                >
                            </div>
                        </div>
                    </div>
                    <div class="logout">
                        <div class="box">
                            <span class="box-icon">
                                <i
                                    class="fa-solid fa-arrow-right-from-bracket"
                                ></i>
                            </span>
                            <button class="box-name">
                                تسجيل الخروج
                            </button>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-xl-10 left">
                <div class="admin-nav">
                    <p class="page-name">
                        <a href="#">لوحة التحكم</a> /
                    </p>
                    <div class="search">
                        <input type="search" />
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="admin-name">
                        <a href="#"><i class="fa-solid fa-user"></i></a>
{{--                        <p>@php $names = explode(' ',Auth::user()->name);@endphp @if(count($names)>4){{ $names[0] }} {{ $names[1] }} {{ $names[2] }} {{ $names[3] }}@else{{ Auth::user()->name }}@endif</p>--}}
                    </div>
                    <div class="open-signup">
                        <button class="open-signup-btn">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>
                    <div class="messages">
                        <div class="ntf">
                            <i class="fa-solid fa-bell"></i>
                            <span class="ntf-count">7</span>
                            <!-- <div class="ntf-menu">
                                                <div></div>
                                            </div> -->
                        </div>
                        <div class="msg">
                            <span class="msg-count">5</span>
                            <i class="fa-solid fa-message"></i>
                            <!-- <div class="msg-menu"></div> -->
                        </div>
                    </div>
                </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
@include('includes.admin.footer')
