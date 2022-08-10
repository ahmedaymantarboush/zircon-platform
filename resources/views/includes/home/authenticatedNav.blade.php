<div class="student-detail">
    <div class="nav-icons">
        <div class="nav-icon">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="buy-number">5</span>
        </div>
        <div class="nav-icon">
            <i class="fa-solid fa-bell"></i>
            <span class="bell-number">3</span>
        </div>
    </div>
    <div class="student">
        <div class="student-toggle-name text-center">
            <i class="fa-solid fa-caret-down down"></i>
            <span class="student-name">@php $names = explode(' ',Auth::user()->name);@endphp @if(count($names)>4){{ $names[0] }} {{ $names[1] }} {{ $names[2] }} {{ $names[3] }}@else{{ Auth::user()->name }}@endif</span>
        </div>

        <ul class="student-toggle">
            <li class="toggle-item">
                <a href="#"><i class="fa-solid fa-user"></i>
                    <span class="item-name">الملف الشخصي</span></a>
            </li>
            <li class="toggle-item">
                <a href="#"><i class="fa-solid fa-user"></i>
                    <span class="item-name">الملف الشخصي</span></a>
            </li>
            <li class="toggle-item">
                <a href="#"><i class="fa-solid fa-user"></i>
                    <span class="item-name">الملف الشخصي</span></a>
            </li>
            <li class="toggle-item">
                <span class="item-name">
                    <form action="{{ route('logout') }}" id="logout" method="Post">
                        @csrf
                        <i class="fa-solid fa-user"></i>
                        <a href="javascript:{}" onclick="document.getElementById('logout').submit();">تسجيل خروج</a>
                    </form>
                </span>
            </li>
        </ul>
    </div>
</div>
