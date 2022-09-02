@extends('layouts.adminLayout')
{{-- ////////////////////////////////////////////////////////// --}}
{{-- ///////////////////////// Css /////////////////////////// --}}
{{-- //////////////////////////////////////////////////////// --}}
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <!-- Latest compiled and minified CSS --> --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/add_exam.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/add_coupons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/couponCard.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
{{-- ////////////////////////////////////////////////////////////////////// --}}
{{-- ///////////////////////// Main ////////////////////////////////////// --}}
{{-- //////////////////////////////////////////////////////////////////// --}}
@section('content')
    <div class="parent" style="width: 100%;">
        <div class="bg_addExam"></div>
        <div class="d-flex justify-content-center main_div">
            <div style="width: 90%;">
                <div class="main_exam_info">
                    <form action="{{ route('admin.balancecards.store') }}" method="POST" class="exam-form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <p class="main_title">تحرير كروت شحن جديد </p>
                                <div class="blue_line"></div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="formGroupExampleInput" class="form-label input_label">عدد الكروت :</label>
                                <input type="number" min="0" name="count"
                                    value="{{ old('count') ?? Session::get('count') }}"
                                    class="form-control-lg form-control @error('count') is-invalid @enderror"
                                    id="formGroupExampleInput" placeholder="ادخل عدد الكروت"
                                    style="font-size: 15px;width: 90%;">
                                @error('count')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="formGroupExampleInput" class="form-label input_label">اختر المكان :</label>
                                <select name="center"
                                    class="@error('center') is-invalid @enderror form-select form-select-lg search-select-box select_part"
                                    name="place" id="formGroupExampleInput" data-live-search="true">
                                    <option>
                                        اختر المكان
                                    </option>
                                    @foreach (\App\Models\Center::all() as $location)
                                        <option @selected(old('center') ? old('center') == $location->id : (Session::has('center') ? Session::get('center') == $location->id : '')) value="{{ $location->id }}">
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('center')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="formGroupExampleInput" class="form-label input_label">قيمة الكارت :</label>
                                <input type="number" min="0" name="value"
                                    value="{{ old('value') ?? Session::get('value') }}"
                                    class="@error('value') is-invalid @enderror form-control-lg form-control"
                                    id="formGroupExampleInput" placeholder="ادخل القيمة للكارت الواحد"
                                    style="font-size: 15px;width: 90%;">
                                @error('value')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="end-line"></div>
                                <button type="submit" class="sub_btn">انشاء الأكواد</button>
                                <a href="#" class="a_btn">سجل كروت الشحن</a>
                            </div>
                        </div>
                    </form>
                </div>

                @php
                    if (Session::has('balanceCards')):
                        $balanceCards = Session::get('balanceCards');
                    endif;
                @endphp
                @isset($balanceCards)
                    <div class="main_exam_info">
                        <div class="row" style="padding-bottom: 30px">
                            <div class="col-12 d-flex justify-content-between">
                                <section>
                                    <p class="main_title">تحرير كروت شحن جديد </p>
                                    <div class="blue_line"></div>
                                </section>
                                <button type="button" class="sub_btn print_btn" style="margin-left: 50px;">طباعة</button>
                            </div>

                            @foreach ($balanceCards as $index => $balanceCard)
                                <div class="col-lg-4 col-sm-12" style="padding-top: 30px">
                                    @include('components.admin.coupon-card', [
                                        'counter' => $index + 1,
                                        'id' => $balanceCard->id,
                                        'start_date' => $balanceCard->created_at->format('d-m-y:H:i'),
                                        'end_date' => $balanceCard->expiry_date->format('d-m-y:H:i'),
                                        'value' => $balanceCard->value,
                                        'code' => $balanceCard->code,
                                        'app_name' => 'أ/ محمد البري',
                                    ])
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endisset

            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    {{-- <!-- Latest compiled and minified JavaScript --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    {{-- <!-- bootstrap 5  --> --}}
    {{-- <!-- موجود في كل الصفحات  --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/add-coupons.js') }}"></script>
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>
    <script src="{{ asset('admin/assets/js/couponCard.js') }}"></script>
    @if (Session::has('balanceCards'))
        @php
            $balanceCards = Session::get('balanceCards');
        @endphp
        @isset($balanceCards)
            @foreach ($balanceCards as $index => $balanceCard)
                <div class="col-lg-4 col-sm-12" style="padding-top: 30px">
                    <script>
                        createQr({{$balanceCard->id}}, "{{$balanceCard->code}}", {{$balanceCard->value}}, {{ $index + 1 }})
                    </script>
                </div>
            @endforeach
            {{-- @for ($i = 1; $i <= count($balanceCards); $i++)
                <script>
                    createQr({{ $i }});
                </script>
            @endfor --}}
        @endisset
    @endif
@endsection
