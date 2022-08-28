@extends('layouts.HomeLayout')
@section('css')
    <!-- css file -->
    <link rel="stylesheet" href="{{ URL::asset('css/levels.css') }} " class="rel">
    <link rel="stylesheet" href="{{ URL::asset('css/levels-responsive.css') }} " class="rel">
@endsection
@section('content')
    <section class="header grade{{ $gradeId }}">
        @php
            $grades = [
                '1' => 'الأول الثانوي',
                '2' => 'الثاني الثانوي',
                '3' => 'الثالث الثانوي',
            ];
            
        @endphp
        <h2 class='pageName'>شهور الصف <span>{{ $grades[$gradeId] }}</span></h2>
    </section>
    <section class='levelsBox'>
        <div class="container">
            <div class="row">
                @if (count($lectures))
                    @foreach ($lectures as $lecture)
                        <div class="col-lg-12 col-md-6 gs_reveal ">
                            <a href='{{ route('months.show', $lecture->slug) }}'
                                class="levelItem grade{{ $lecture->grade->id }}">
                                <span class='typeGrade'>{{ $lecture->grade->name }}</span>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="levelImage">
                                            <img src="{{ $lecture->poster }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="levelContent">
                                            <h3 class='levelName'>{{ $lecture->title }}</h3>
                                            <p class='levelDescription'>{{ $lecture->short_description }}</p>
                                            <div class="levelDetails">
                                                <div class="detailItem">
                                                    <span class='detailIcon'><i class="fa-solid fa-photo-film"></i></span>
                                                    <span
                                                        class='detailContent'>{{ $lecture->time >= 3600 ? number_format($lecture->time / 3600, 2) . ' ساعة' : number_format($lecture->time / 60, 2) . ' دقيقة' }}
                                                        من الفيديو</span>
                                                </div>
                                                <div class="detailItem">
                                                    <span class='detailIcon'><i
                                                            class="fa-solid fa-clipboard-question"></i></span>
                                                    <span class='detailContent'>{{ $lecture->total_questions_count }} من
                                                        الاسئلة</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="levelPrice">
                                            <span class='iconPrice'><i class="fa-solid fa-tags"></i></span>
                                            <span class='price'>{{ getPrice($lecture) }}</span>
                                            <span class='priceUnit'>ج.م</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                <p class='gs_reveal no-lectures'>سيتم اضافة شهور جديدة قريبا</p>
                <div class='gs_reveal noLecImg'>
                    <img src="{{ URL::asset('imgs/no-result-search.png') }}" alt="">
                </div>
                @endif
                {{-- <div class="col-lg-12 col-md-6">
                    <a href='#' class="levelItem grade{{$lecture->grade->id}}">
            <span class='typeGrade'>الصف الاول الثانوي</span>
            <div class="row">
                <div class="col-lg-3">
                    <div class="levelImage">
                        <img src="{{ URL::asset('imgs/thumbnail_1.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="levelContent">
                        <h3 class='levelName'>مراجعة شاملة على الباب الأول (الكهربية)</h3>
                        <p class='levelDescription'>مراجعة شاملة على باب الكهربية الأول للصف الاول الثانوي
                        </p>
                        <div class="levelDetails">
                            <div class="detailItem">
                                <span class='detailIcon'><i class="fa-solid fa-photo-film"></i></span>
                                <span class='detailContent'>2.5 ساعة من الفيديو</span>
                            </div>
                            <div class="detailItem">
                                <span class='detailIcon'><i class="fa-solid fa-clipboard-question"></i></span>
                                <span class='detailContent'>30 من الاسئلة</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="levelPrice">
                        <span class='iconPrice'><i class="fa-solid fa-tags"></i></span>
                        <span class='price'>50</span>
                        <span class='priceUnit'>ج.م</span>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-12 col-md-6 ">
            <a href='#' class="levelItem grade{{$lecture->grade->id}}">
                <span class='typeGrade'>الصف الاول الثانوي</span>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="levelImage">
                            <img src="{{ URL::asset('imgs/thumbnail_1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="levelContent">
                            <h3 class='levelName'>مراجعة شاملة على الباب الأول (الكهربية)</h3>
                            <p class='levelDescription'>مراجعة شاملة على باب الكهربية الأول للصف الاول الثانوي
                            </p>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <span class='detailIcon'><i class="fa-solid fa-photo-film"></i></span>
                                    <span class='detailContent'>2.5 ساعة من الفيديو</span>
                                </div>
                                <div class="detailItem">
                                    <span class='detailIcon'><i class="fa-solid fa-clipboard-question"></i></span>
                                    <span class='detailContent'>30 من الاسئلة</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="levelPrice">
                            <span class='iconPrice'><i class="fa-solid fa-tags"></i></span>
                            <span class='price'>50</span>
                            <span class='priceUnit'>ج.م</span>
                        </div>
                    </div>
                </div>
            </a>
        </div> --}}

            </div>
        </div>
    </section>
@endsection
@section('javascript')
    <script src="{{ URL::asset('js/levels.js') }}"></script>
@endsection
