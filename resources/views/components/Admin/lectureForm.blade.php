<form enctype="multipart/form-data" method="POST"
    action="{{ isset($lecture) ? route('admin.lectures.update', $lecture->slug) : route('admin.lectures.store') }}"
    class="sections-form" id="myForm">
    @if (isset($lecture))
        @method('put')
    @endif
    @csrf
    @if (isset($lecture))
        <input type="hidden" name="lec" value="{{ $lecture->slug }}">
    @endif
    <div class="sections-body">
        <!-- first section  -->
        <div class="base-body item-body @if (!isset($lecture)) active @endif">
            <div class="add-address-lec base-item">
                <label for="">عنوان المحاضرة</label>
                <div class="input-parent">
                    <input class="@error('title') is-invalid @enderror" type="text"
                        @if (isset($lecture)) value="{{ $lecture->title }}" @else value="{{ old('title') }}" @endif
                        name="title" placeholder="أدخل عنوان المحاضرة" />
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="add-short-des-lec base-item">
                <label for="">وصف قصير</label>
                <div class="input-parent">
                    <textarea class="@error('shortDescription') is-invalid @enderror" name="shortDescription"
                        placeholder="ادخل وصف المحاضرة">
@if (isset($lecture)) {{ $lecture->short_description }}
@else
{{ old('shortDescription') }} @endif
</textarea>
                    @error('shortDescription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="add-short-des-lec base-item">
                <label for="">وصف المحاضرة</label>
                <div class="input-parent">
                    <textarea class="text-editor{{ isset($lecture) ? '' : '2' }} @error('description') is-invalid @enderror"
                        name="description" class="text-editor">
@if (isset($lecture)) {{ $lecture->description }}
@else
{{ old('description') }} @endif
</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="base-item">
                <label for="">المرحلة التعليمية</label>
                <div class="search-select-box" id="select-level-parent">
                    <select name="grade" id="level" class="@error('grade') is-invalid @enderror"
                        data-live-search="true">
                        <option value="">
                            اختر المرحلة التعليمية
                        </option>
                        @foreach (\App\Models\Grade::all() as $grade)
                            <option value="{{ $grade->id }}"
                                @if (isset($lecture)) @if ($lecture->grade == $grade) selected @endif
                                @endif>
                                {{ $grade->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('grade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="base-item">
                <label for="">الفصل الدراسي</label>
                <div class="search-select-box" id="select-level-parent">
                    <select name="semester" class="@error('semester') is-invalid @enderror" data-live-search="true">
                        <option value="">
                            اختر الفصل الدراسي
                        </option>
                        <option
                            @if (isset($lecture)) {{ $lecture->semester == 'الفصل الدراسي الأول' ? 'selected' : '' }} @endif
                            value="الفصل الدراسي الأول">
                            الفصل الدراسي الأول
                        </option>
                        <option
                            @if (isset($lecture)) {{ $lecture->semester == 'الفصل الدراسي الثاني' ? 'selected' : '' }} @endif
                            value="الفصل الدراسي الثاني">
                            الفصل الدراسي الثاني
                        </option>
                    </select>
                    @error('semester')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- <div class="base-item" id="select-subject-parent">
                <label for="">الماده الدراسية</label>
                <div class="search-select-box">
                    <select name="subject" id="" class="@error('subject') is-invalid @enderror" data-live-search="true">
                        <option value="">
                            اختر الماده الدراسية
                        </option>
                        @foreach (\App\Models\Subject::all() as $subject)
                            <option value="{{ $subject->id }}" @if (isset($lecture)) @if ($lecture->subject == $subject) selected @endif @endif>
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> --}}
            <div class="base-item" id="select-part-parent">
                <label for="">الجزئية الدراسية</label>
                <div class="search-select-box">
                    <select name="parts[]" multiple="multiple" data-live-search="true"
                        class="@error('parts') is-invalid @enderror" tabindex="-98">
                        <option value="">
                            اختر الجزئية الدراسية
                        </option>
                        @foreach (\App\Models\Part::all() as $part)
                            <option
                            @selected((isset($lecture)) && $lecture->parts()->where('part_id', $part->id)->count() || in_array(old('parts'),$part->id))
                                value="{{ $part->id }}">
                                {{ $part->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('parts')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="base-item">
                <label for="">حالة المحاضرة</label>
                {{-- @if (isset($lecture))  @endif --}}
                <div class="status {{isset($lecture) ? (old('published') || $lecture->published ? 'stat-active' : '') : (old('published') ? 'stat-active' : '' )}}"
                    id="status-parent">
                    <span class="round"></span>
                    <span class="status-active">مفعل</span>
                    <span class="status-not">معلق</span>
                </div>
                <div class="input-parent">
                    <input class="@error('published') is-invalid @enderror" type="checkbox" id="status"
                    @checked(isset($lecture) ? $lecture->published || old('published') : old('published') )
                        name="published" />
                    @error('published')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <!-- second section  -->
        <div class="means-body item-body">
            <div class="short-vid-url base-item">
                <label for="">لينك الفيديو الترويجي</label>
                <div class='input-parent'>
                    <input class="@error('promotinalVideourl') is-invalid @enderror" type="url"
                        name="promotinalVideoUrl"
                        @if (isset($lecture)) value="{{ $lecture->promotinal_video_url }}" @else value="{{ old('promotinalVideourl') }}" @endif
                        placeholder="مثال:  https://www.youtube.com/embed/ro_Vwk_LTHc" />
                    @error('promotinalVideourl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="add-image">
                <label class="short-vid-label" for="">لينك الصورة المصغرة</label>
                <p>
                    <input type="file" class="@error('poster') is-invalid @enderror" accept="image/*"
                        name="poster" id="file" onchange="loadFile(event)" style="display: none" />
                    {{-- @error('poster')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                </p>
                <p class="image-parent">
                    <label for="file" style="cursor: pointer">
                        <img src="@if (isset($lecture)) {{ $lecture->poster }} @else {{ asset('admin/assets/imgs/lecture-holder.png') }} @endif"
                            id="output" height="200" width="200" alt="" />

                    </label>
                </p>
            </div>
        </div>
        <!-- third section  -->
        <div class="seo-body item-body">
            <div class="wrapper">
                <label for="">أضف ال meta tags</label>
                <div class="content">
                    <ul class="tags-ul">
                        <input class="tag-input @error('metakeywords') is-invalid @enderror" type="text" />
                    </ul>
                </div>
                {{-- <div  class="seo-input-parent"> --}}
                <input type="hidden" name="metakeywords"
                    @if (isset($lecture)) value="{{ $lecture->meta_keywords }}" @else value="{{ old('metakeywords') }}" @endif
                    id="input-tags" />
                {{-- @error('metakeywords')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
                {{-- </div> --}}
            </div>
            <div class="add-meta-des">
                <label for="">أضف ال meta description</label>
                <div class="seo-input-parent">
                    <textarea class="@error('metaDescription') is-invalid @enderror" name="metaDescription"
                        placeholder="ادخل وصف المحاضرة">
@if (isset($lecture)){{ $lecture->meta_description }}
@else
{{ old('metaDescription') }}@endif
</textarea>
                    @error('metaDescription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="wrapper">
                <label for="">أضف ال slug</label>
                <div class="seo-input-parent">
                    <input type="text" class="my-input @error('slug') is-invalid @enderror"
                        @if (isset($lecture)) value="{{ $lecture->slug }}" @else value="{{ old('slug') }}" @endif
                        name="slug" placeholder="ادخل slug" />
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <!-- fourth section  -->
        <div class="pricing-body item-body">
            <div class="pricing-check">
                <input type="checkbox" name="free"
                    @if (isset($lecture)) @checked($lecture->price <= 0 || old('free')) @endif
                    class="free-check @error('free') is-invalid @enderror" />
                <label for="">ضع علامة اذا كانت المحاضرة
                    مجانية</label>
                @error('free')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="pricing-content">
                <div class="pricing-item">
                    <label for="">سعر المحاضرة (ج.م)</label>
                    <div class="pricing-input-parent">
                        <input class="lec-price @error('price') is-invalid @enderror"
                            @if (isset($lecture)) value="{{ $lecture->price }}" @else value="{{ old('price') }}" @endif
                            type="number" min="0" name="price"
                            placeholder="ادخل سعر المحاضرة بالجنية المصري" />
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="pricing-check">
                    <input class="@error('hasDiscount') is-invalid @enderror" name="hasDiscount"
                        @if (isset($lecture)) @checked($lecture->discount_expiry_date || old('hasDiscount')) @endif
                        type="checkbox" id="dis-lec" />
                    <label for="">ضع علامة اذا كانت المحاضرة
                        تحتوي على خصم</label>
                    @error('hasDiscount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="dis-parent">
                    <div class="pricing-item" style="flex-wrap: wrap">
                        <label for="">السعر بعد الخصم
                            (ج.م)</label>
                        <div class="input-parent">
                            <input name="finalPrice"
                                @if (isset($lecture)) value="{{ $lecture->final_price }}" @else value="{{ old('finalPrice') }}" @endif
                                class="lec-dis @error('finalPrice') is-invalid @enderror" type="number"
                                placeholder="ادخل سعر المحاضرة بالجنية المصري" />
                            @error('finalPrice')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <p class="dis">
                            مقدار الخصم
                            <span class="price-discount">@isset($lecture){{number_format(($lecture->price - $lecture->final_price) * 100 / ($lecture->price))}} @else 0 @endisset</span>
                        </p>
                    </div>
                    <div class="dis-date">
                        <label for="">تاريخ انتهاء
                            الخصم</label>
                        <div class="pricing-input-parent">
                            <input type="date"
                                @if (isset($lecture)) value="{{ $lecture->discount_expiry_date }}" @else value="{{ old('discountExpiryDate') }}" @endif
                                name="discountExpiryDate"
                                class="date-input @error('discountExpiryDate') is-invalid @enderror" />
                            @error('discountExpiryDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- the end of first form  -->
        <div class="end-body item-body">
            <span><i class="fa-solid fa-thumbs-up"></i></span>
            <h3>شكرا لك!</h3>
            <p>
                تم الانتهاء من ملئ بيانات المحاضرة
                بنجاح
            </p>
            <input type="submit" value="حفظ البيانات" />
        </div>
    </div>
</form>
