<form action="{{ isset($exam) ? route('admin.exams.update', $exam->id) : route('admin.exams.store') }}" method="POST"
    class="exam-form">
    @if (isset($exam))
        @method('put')
    @endif
    @csrf
    <div class="row">
        <div class="col-12">
            <p class="main_title">المعلومات الاساسية </p>
            <div class="blue_line"></div>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="formGroupExampleInput" class="form-label input_label">اسم الامتحان: </label>
            <input type="text" name='name'
                @if (isset($exam)) value="{{ old('name') ?? $exam->title }}" @else value="{{ old('name') }}" @endif
                class="form-control-lg form-control @error('name') is-invalid @enderror" id="formGroupExampleInput"
                placeholder="ادخل اسم الامتحان" style="font-size: 15px;width: 90%;">
            @error('name')
                <div class="invalid-feedback" style="font-size: 13px;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="formGroupExampleInput" class="form-label input_label">وقت بدء الامتحان: </label>
            <input type="datetime-local" name='examStartsAt'
                @if (isset($exam)) value="{{ old('examStartsAt') ?? $exam->starts_at }}" @else value="{{ old('examStartsAt') }}" @endif
                class="form-control-lg form-control @error('examStartsAt') is-invalid @enderror"
                id="formGroupExampleInput" placeholder="ادخل اسم الامتحان" style="font-size: 15px;width: 90%;">
            @error('examStartsAt')
                <div class="invalid-feedback" style="font-size: 13px;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="formGroupExampleInput" class="form-label input_label">وقت انتهاء الامتحان: </label>
            <input type="datetime-local" name='examEndsAt'
                @if (isset($exam)) value="{{ old('examEndsAt') ?? $exam->ends_at }}" @else value="{{ old('examEndsAt') }}" @endif
                class="form-control-lg form-control @error('examEndsAt') is-invalid @enderror"
                id="formGroupExampleInput" placeholder="ادخل اسم الامتحان" style="font-size: 15px;width: 90%;">
            @error('examEndsAt')
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
        <div class="col-lg-3 col-md-12">
            <label for="formGroupExampleInput" class="form-label input_label">مرحلة الامتحان:</label>
            <select class="form-select form-select-lg @error('grade') is-invalid @enderror" name='grade'
                aria-label="Default select example" id="formGroupExampleInput" style="font-size: 15px;width: 90%;">
                <option selected>ادخل مرحلة الامتحان</option>
                @foreach (\App\Models\Grade::all() as $grade)
                    <option @selected($exam->grade->name == $grade->name || old('grade') == $grade->name) value="{{ $grade->name }}">{{ $grade->name }}</option>
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
        <div class="col-lg-2 col-md-12">
            <label for="formGroupExampleInput" class="form-label input_label">نوع الامتحان:</label>
            <select @disabled(isset($exam)) name='exam_type'
                class="form-select form-select-lg @error('exam_type') is-invalid @enderror exam_type"
                aria-label="Default select example" id="formGroupExampleInput" style="font-size: 15px;width: 90%;">
                <option selected>ادخل نوع الامتحان</option>
                <option @selected($exam->dynamic || old('exam_type') == 'zirconExam') value="1">{{-- امتحان زيركون --}}Zircon Exam</option>
                <option @selected(!$exam->dynamic || old('exam_type') == 'staticExam') value="0">امتحان ثابت</option>
            </select>
            @error('exam_type')
                <div class="invalid-feedback" style="font-size: 13px;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-lg-2 col-md-12">
            <label for="question_hardness" class="form-label input_label">درجة الصعوبة :</label>
            <select name='question_hardness'
                class="form-select form-select-lg @error('question_hardness') is-invalid @enderror {{-- is-valid --}}"
                aria-label="Default select example" id="question_hardness" style="font-size: 15px;width: 90%;">
                <option selected>ادخل درجة الصعوبة</option>
                @for ($i = 1; $i <= 4; $i++)
                    <option @selected($exam->questions_hardness == $i || old('question_hardness') == "$i") value="{{ $i }}">{{$i}}</option>
                @endfor
                <option @selected($exam->questions_hardness == '5' || old('question_hardness') == '5') value="5">للطالب الشكساوي</option>
            </select>
            @error('question_hardness')
                <div class="invalid-feedback" style="font-size: 13px;">
                    {{ $message }}
                </div>
            @enderror
            {{-- <div class="valid-feedback" style="font-size: 13px;">
                انت راجل صح الصح و كلامك صح الصح
            </div> --}}
        </div>
        <div class="col-lg-2 col-md-12">
            <label for="formGroupExampleInput" class="form-label input_label">وقت الامتحان :</label>
            <input type="text" name='totalTime'
                @if (isset($exam)) value="{{ old('totalTime') ?? decoratedTime($exam->time) }}" @else value="{{ old('totalTime') }}" @endif
                class="html-duration-picker form-control @error('totalTime') is-invalid @enderror form-control-lg"
                id="formGroupExampleInput" placeholder="ادخل اسم الامتحان" style="font-size: 15px;width: 88%;">
            @error('totalTime')
                <div class="invalid-feedback" style="font-size: 13px;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-11">
            <label for="formGroupExampleInput" class="form-label input_label">وصف الامتحان :</label>
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
            <button type="submit" class="sub_btn">اضافة</button>
            <a href="#" class="a_btn">قائمة الامتحانات</a>
        </div>
    </div>
</form>
