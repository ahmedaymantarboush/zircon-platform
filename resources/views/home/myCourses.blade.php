@extends('layouts.HomeLayout')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/myCourses.css') }} " class="rel">
    <link rel="stylesheet" href="{{ URL::asset('css/myCourses-responsive.css') }} " class="rel">
@endsection
@section('content')
    <section class="header">
        <h2 class='pageName'><span><i class="fa-solid fa-graduation-cap"></i></span> محاضراتي</h2>
    </section>
    <section class='levelsBox'>
        <div class="container">
            <div class='row'>
                @if ($lectures->count())
                @foreach ($lectures->paginate(6) as $lecture)
                    <div class="col-lg-12 col-md-6">
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
                                                <span class='detailContent'>{{ $lecture->time >= 3600 ? number_format($lecture->time / 3600, 2) . ' ساعة' : number_format($lecture->time / 60, 2) . ' دقيقة' }} من الفيديو</span>
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
                            </div>
                        </a>
                    </div>
                @endforeach
                @else
                <p class=' no-lectures' data-sal="slide-left"
  data-sal-delay="0"
  data-sal-easing="ease-out-back"
  data-sal-duration="1800">لا يوجد شهور</p>
                <div class=' noLecImg' data-sal="slide-right"
  data-sal-delay="0"
  data-sal-easing="ease-out-back"
  data-sal-duration="1800">
                    <img src="{{ URL::asset('imgs/no-result-search.webp') }}" alt="">
                </div>
                @endif
            </div>
            @include('components.home.pagination', ['paginator' => $lectures->paginate(6)])
        </div>
    </section>
@endsection
@section('javascript')
    <script src="{{ URL::asset('js/myCourses.js') }}"></script>
@endsection
