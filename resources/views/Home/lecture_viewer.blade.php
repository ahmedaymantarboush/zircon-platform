@extends('layouts.lectureLayout')
{{-- lecture name --}}
{{-- lecture meta keywords --}}
{{-- lecture short description --}}
{{-- lecture auther --}}
{{-- lecture link --}}
{{-- /////////////////////////////////////////////////////////////////////////////////////////////// --}}
@section('seo')
    {{-- lecture meta keywords --}}
    <meta name="keywords" content="{{ $lecture->meta_keywords }}">
    {{-- lecture short description --}}
    <meta name="description" content="{{ $lecture->meta_description }}">
    {{-- lecture auther --}}
    <meta name="author" content="{{ $lecture->publisher->name }}">
@endsection
{{-- /////////////////////////////////////////////////////////////////////////////////////////////// --}}
@section('lec_name')
    {{-- lecture_name --}}
    {{ $lecture->title }}
@endsection
{{-- /////////////////////////////////////////////////////////////////////////////////////////////// --}}
@section('lec_link')
    {{-- lecture link --}}
    <a href="{{ env('APP_URL') }}/months/{{ $lecture->slug }}" class="lec_link" style="margin-left: 40px;">
        <i class="fa-solid fa-chevron-left" style="margin-right: 5px"></i>
        تفاصيل المحاضرة
    </a>
@endsection
{{-- /////////////////////////////////////////////////////////////////////////////////////////////// --}}
@section('sections')
    @foreach ($lecture->sections()->orderBy('order')->get() as $index => $section)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $section->id }}">
                <button class="accordion-button {{ $index ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $section->id }}" aria-expanded="{{ $index ? 'false' : 'true' }}"
                    aria-controls="collapse{{ $section->id }}">
                    <span class="collapse_sec_num">القسم {{ $index + 1 }} :</span>
                    <span>{{ $section->title }}</span>
                </button>
            </h2>
            <div id="collapse{{ $section->id }}" class="accordion-collapse collapse {{ $index ? '' : 'show' }}"
                aria-labelledby="heading{{ $section->id }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row">
                        @foreach ($section->items()->orderBy('order')->get() as $item)
                            @php
                                $type = $item->exam_id ? 'clipboard-question' : 'file-video';
                            @endphp
                            <div class="col-12">
                                <div class="lesson_title">
                                    <i class="fa-solid fa-{{ $type }}"></i>
                                    <a class="lesson_name" id="{{ $item->id }}"
                                        href="#lessonLink">{{ $item->title }}</a>
                                    @if ($item->exam_id)
                                        <span>{{ $item->item->questions_count }} سؤال</span>
                                    @else
                                        <span>
                                            {{ $item->item->time >= 3600 ? number_format($item->item->time / 3600, 2) . ' ساعة' : number_format($item->item->time / 60, 2) . ' دقيقة' }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
{{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}

