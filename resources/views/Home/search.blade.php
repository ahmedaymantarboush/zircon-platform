@extends('layouts.homeLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/search.css') }} " class="rel">
    <link rel="stylesheet" href="{{ asset('css/search-responsive.css') }} " class="rel">
@endsection
@section('content')
    <section class="header">
        <h2 class='pageName'>تم العثور علي {{ $lectures ? count($lectures->get()) : 0 }} من النتائج
            عن<span>"{{ request()->q ? request()->q : 'لا شئ' }}"</span></h2>
    </section>
    @if ($lectures ? count($lectures->get()) : false)
        <div class="searchParent">
            <div class=" filter-control">
                <div class="filter-btn-parent">
                    <button class="filter-btn">
                        <span class="filter-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                        <span class="filter-name">فلاتر</span>(<span class="count-filter">0</span>)
                    </button>
                </div>
                <div class="categories-btn-parent">
                    <button class="category-btn">
                        <div class="ctg-right">
                            <span class="ctg-by">تصنيف بواسطة</span>
                            <span class="ctg-name">الأحدث</span>
                        </div>
                        <span class="ctg-arrow"><i class="fa-solid fa-angle-down"></i></span>
                    </button>
                    <div class="ctg-menu">
                        <p class="menu-item">الأكثر شهرة</p>
                        <p class="menu-item">الشائعة</p>
                        <p class="menu-item">الوالعة</p>
                        <p class="menu-item">الوالعة</p>
                        <p class="menu-item">الوالعة</p>
                    </div>
                </div>

            </div>
            <div class="row active bigRow">
                <div class="col-lg-3 filterParent ">
                    <span class='closeFilter'><i class="fa-solid fa-arrow-right-long"></i></span>
                    <div id="accordion" class="myaccordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                    data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                                    aria-controls="collapseOne">
                                    المرحلة الدراسية
                                    <span class='filterArrow'><i class="fa-solid fa-angle-down"></i></span>
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <ul class="filter-items">
                                        @foreach (\App\Models\Grade::all() as $grade)
                                            @if ($pureLectures->get()->contains('grade_id', $grade->id))
                                                <li class="filter-item">
                                                    @php
                                                        $id = $grade->id + 9;
                                                    @endphp
                                                    <input type="checkbox" value="{{ $grade->id }}"
                                                        @checked(array_key_exists('grades', $appliedFilters)
                                                                ? (count($appliedFilters)
                                                                    ? in_array($grade->id, $appliedFilters['grades'])
                                                                    : false)
                                                                : false) name="grade{{ $id }}" />
                                                    <label for="">
                                                        {{ $grade->name }}
                                                        @php
                                                            $allLectures = $pureLectures ? clone $pureLectures : null;
                                                        @endphp
                                                        <span
                                                            class="item-count">({{ $allLectures ? count($allLectures->where('grade_id', $grade->id)->get()) : 0 }})</span>
                                                    </label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    السعر
                                    <span class='filterArrow'><i class="fa-solid fa-angle-down"></i></span>
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                                <div class="card-body">
                                    <ul class="filter-items">
                                        @if ($pureLectures->get()->contains('final_price', 0))
                                            <li class="filter-item">
                                                <input type="checkbox" @checked(count($appliedFilters)
                                                        ? (array_key_exists('price', $appliedFilters)
                                                            ? in_array('free', $appliedFilters['price'])
                                                            : false)
                                                        : false) name="free" />
                                                <label for="">
                                                    مجاني
                                                    @php
                                                        $allLectures = $pureLectures ? clone $pureLectures : null;
                                                    @endphp
                                                    <span
                                                        class="item-count">({{ $allLectures ? count($allLectures->where('final_price', 0)->get()) : 0 }})</span>
                                                </label>
                                            </li>
                                        @endif
                                        @if ($pureLectures->get()->contains('discount_expiry_date', '!=', null))
                                            <li class="filter-item">
                                                <input type="checkbox" @checked(count($appliedFilters)
                                                        ? (array_key_exists('price', $appliedFilters)
                                                            ? in_array('hasDiscount', $appliedFilters['price'])
                                                            : false)
                                                        : false) name="hasDiscount" />
                                                <label for="">
                                                    يحتوي على خصم
                                                    @php
                                                        $allLectures = $pureLectures ? clone $pureLectures : null;
                                                    @endphp
                                                    <span
                                                        class="item-count">({{ $allLectures ? count($allLectures->where('discount_expiry_date', '!=', null)->get()) : 0 }})</span>
                                                </label>
                                            </li>
                                        @endif
                                        @if ($pureLectures->get()->contains('final_price', '!=', 0))
                                            <li class="filter-item">
                                                <input type="checkbox" @checked(count($appliedFilters)
                                                        ? (array_key_exists('price', $appliedFilters)
                                                            ? in_array('paid', $appliedFilters['price'])
                                                            : false)
                                                        : false) name="paid" />
                                                <label for="">
                                                    مدفوع
                                                    @php
                                                        $allLectures = $pureLectures ? clone $pureLectures : null;
                                                    @endphp
                                                    <span
                                                        class="item-count">({{ $allLectures ? count($allLectures->where('final_price', '!=', 0)->get()) : 0 }})</span>
                                                </label>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    الجزئية الدراسية
                                    <span class='filterArrow'><i class="fa-solid fa-angle-down"></i></span>

                                </button>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
                                <div class="card-body">
                                    <ul class="filter-items">
                                        @foreach (\App\Models\Part::all() as $part)
                                            @php
                                                $allLectures = $pureLectures ? clone $pureLectures : null;
                                            @endphp
                                            @if (count(
                                                $allLectures->whereHas('parts', function ($partQ) use ($part) {
                                                        $partQ->where('part_id', $part->id);
                                                    })->get()))
                                                <li class="filter-item">
                                                    <input type="checkbox" value="{{ $part->id }}"
                                                        @checked(array_key_exists('parts', $appliedFilters)
                                                                ? (count($appliedFilters)
                                                                    ? in_array($part->id, $appliedFilters['parts'])
                                                                    : false)
                                                                : false) name="part{{ $part->id }}" />
                                                    <label for="">
                                                        {{ $part->name }}
                                                        @php
                                                            $allLectures = $pureLectures ? clone $pureLectures : null;
                                                        @endphp
                                                        <span
                                                            class="item-count">({{ $allLectures? count($allLectures->whereHas('parts', function ($partQ) use ($part) {$partQ->where('part_id', $part->id);})->get()): 0 }})</span>
                                                    </label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <section class='levelsBox'>
                        <div class="row">
                            @foreach ($lectures->paginate(6) as $lecture)
                                <div class="col-xl-4 col-md-6 levelItemParent">
                                    <a href='{{ route('months.show', $lecture->slug) }}'
                                        class="levelItem grade{{ $lecture->grade->id }}">
                                        <span class='typeGrade'>{{ $lecture->grade->name }}</span>

                                        <div class="levelContentParent">
                                            <div class="levelImage">
                                                <img src="{{ $lecture->poster }}" alt="">
                                            </div>


                                            <div class="levelContent">
                                                <h3 class='levelName'>{{ $lecture->title }}</h3>
                                                <p class='levelDescription'>{{ $lecture->short_description }}</p>
                                                <div class="levelDetails">
                                                    <div class="detailItem">
                                                        <span class='detailIcon'><i
                                                                class="fa-solid fa-photo-film"></i></span>
                                                        <span class='detailContent'>{{ $lecture->time }} من
                                                            الفيديو</span>
                                                    </div>
                                                    <div class="detailItem">
                                                        <span class='detailIcon'><i
                                                                class="fa-solid fa-clipboard-question"></i></span>
                                                        <span class='detailContent'>{{ $lecture->total_questions_count }}
                                                            من
                                                            الاسئلة</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="levelPrice">
                                            <span class='iconPrice'><i class="fa-solid fa-tags"></i></span>
                                            <span class='price'>{{ getPrice($lecture) }}</span>
                                            <span class='priceUnit'>ج.م</span>
                                        </div>


                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
            @include('components.home.pagination', ['paginator' => $lectures->paginate(6)])
        </div>
    @else
        <div class="errorImage">
            <img src="{{ asset('imgs/no-result-search.png') }}" alt="">
        </div>
    @endif
@endsection
@section('javascript')
    <!-- main js file -->
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
