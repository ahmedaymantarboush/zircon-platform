<form action="{{ isset($exam) ? route('admin.exams.update', $exam->id) : route('admin.exams.store') }}" method="POST"
    class="exam-form">
    @if (isset($exam))
        @method('put')
        <input type="hidden" name="id" value="{{$exam->id}}">
    @endif
    @csrf
    <div class="row">
        <div class="col-12">
            <p class="main_title">اضافة جزئية دراسية </p>
            <div class="blue_line"></div>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="formGroupExampleInput" class="form-label input_label">اسم الامتحان: </label>
            <input type="text" name='name'
                @if (isset($exam)) value="{{ old('name') ?? $exam->title }}" @else value="{{ old('name') }}" @endif
                class="form-control-lg form-control @error('name') is-invalid @enderror" id="formGroupExampleInput"
                placeholder="ادخل اسم الجزئية الدراسية" style="font-size: 15px;width: 90%;">
            @error('name')
                <div class="invalid-feedback" style="font-size: 13px;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- <div class="col-lg-3 col-md-12">
            <label for="formGroupExampleInput" class="form-label input_label">مادة الامتحان: </label>
            <select class="form-select form-select-lg @error('subject') is-invalid @enderror" name='subject'
                @if (isset($exam)) value="{{old('name') ?? $exam->name}}" @else value="{{ old('subject') }}" @endif aria-label="Default select example" id="formGroupExampleInput"
                style="font-size: 15px;width: 90%;">
                <option selected>ادخل مادة الامتحان</option>
                @foreach (\App\Models\Subject::all() as $subject)
                    <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                @endforeach
                {{-- <option value="1">كيمياء</option>
                <option value="2">فيزياء</option>
                <option value="3">برمجة عشان بحبها</option> --}}
        {{-- </select>
            @error('subject')
                <div class="invalid-feedback" style="font-size: 13px;">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}
        <div class="col-lg-4 col-md-12">
            <label for="formGroupExampleInput" class="form-label input_label">مادة الجزئية الدراسية:</label>
            <select class="form-select form-select-lg @error('grade') is-invalid @enderror" name='grade'
                aria-label="Default select example" id="formGroupExampleInput" style="font-size: 15px;width: 90%;">
                <option selected>ادخل مادة الجزئية الدراسية</option>
                @foreach (\App\Models\Grade::all() as $grade)
                    <option @selected(isset($exam) ? $exam->grade->name == $grade->name : old('grade') == $grade->name || old('grade') == $grade->name) value="{{ $grade->name }}">{{ $grade->name }}</option>
                @endforeach
                {{-- <option value="1">الصف الاول الثانوي</option>
                <option value="2">الصف الثاني الثانوي</option>
                <option value="3">الصف الثالث الثانوي "استغفر الله"</option> --}}
            </select>
            @error('grade')
                <div class="invalid-feedback" style="font-size: 13px;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="formGroupExampleInput" class="form-label input_label">مرحلة الجزئية الدراسية:</label>
            <select class="form-select form-select-lg @error('grade') is-invalid @enderror" name='grade'
                    aria-label="Default select example" id="formGroupExampleInput" style="font-size: 15px;width: 90%;">
                <option selected>ادخل مرحلة الجزئية الدراسية</option>
                @foreach (\App\Models\Grade::all() as $grade)
                    <option @selected(isset($exam) ? $exam->grade->name == $grade->name : old('grade') == $grade->name || old('grade') == $grade->name) value="{{ $grade->name }}">{{ $grade->name }}</option>
                @endforeach
                {{-- <option value="1">الصف الاول الثانوي</option>
                <option value="2">الصف الثاني الثانوي</option>
                <option value="3">الصف الثالث الثانوي "استغفر الله"</option> --}}
            </select>
            @error('grade')
            <div class="invalid-feedback" style="font-size: 13px;">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-11">
            <label for="formGroupExampleInput" class="form-label input_label">وصف الجزئية الدراسية :</label>
            <textarea class="text-editor-div @error('description') is-invalid @enderror" name='description'
                id="formGroupExampleInput" style="width: 90%;min-height: 300px;">
                @if (isset($exam))
@php
                echo old('description') ?? $exam->description;
                @endphp
@else
@php
echo old('description');
@endphp
@endif
            </textarea>
            @error('description')
                <div class="invalid-feedback" style="font-size: 13px;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12">
            <div class="end-line"></div>
            <button type="submit" class="sub_btn">@isset($exam)تعديل@else اضافة@endif</button>
            <a href="#" class="a_btn">قائمة الجزئيات</a>
        </div>
    </div>
</form>
