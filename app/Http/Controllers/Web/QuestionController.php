<?php

namespace App\Http\Controllers\Web;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.questionBank', ['questions' => Question::all()->sortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        $user = Auth::user();
        $data = $request->all();
        if ($user ? $user->role_num < 4 : false) :
            $question = Question::create([
                'name' => $data['name'],
                'level' => $data['level'],
                'text' => removeCustomTags($data['text']),
                'grade_id' => $data['grade'],
                'subject_id' => $data['subject'] ?? 1,
                'part_id' => $data['part'],
                'teacher_id' => $user->id,
            ]);
            if ($request->hasFile('image')) :
                $question->image = uploadFile($request, 'image', $data['name'] . $question->id);
                $question->save();
            endif;

            for ($i = 1; $i <= $data['choicesCount']; $i++) :
                if ($data['choice' . $i]) :
                    $question->choices()->create([
                        'text' => $data['choice' . $i],
                        'correct' => $i == $data['correctAnswer'],
                    ]);
                endif;
            endfor;
            return redirect()->back()->with('success', _('تم انشاء السؤال بنجاح'));
        else :
            return abort(404);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request)
    {
        $user = Auth::user();
        $data = $request->all();
        if ($user ? $user->role_num < 4 : false) :
            $question = Question::find($data['questionId']);
            if (!$question) :
                return abort(404);
            elseif ($question->publisher->id != $user->id) :
                return abort(403);
            endif;
            $question->update([
                'name' => $data['newName'],
                'level' => $data['newLevel'],
                'text' => removeCustomTags($data['newText']),
                'grade_id' => $data['newGrade'],
                'subject_id' => $data['newSubject'] ?? 1,
                'part_id' => $data['newPart'],
                'teacher_id' => $user->id,
            ]);
            if ($request->hasFile('newImage')) :
                $question->image = uploadFile($request, 'newImage', $question->name . $question->id, explode('/storage/', $question->image)[1]);
                $question->save();
            endif;
            $question->choices()->delete();
            for ($i = 1; $i <= $data['newChoicesCount']; $i++) :
                if ($data['newChoice' . $i]) :
                    $question->choices()->create([
                        'text' => $data['newChoice' . $i],
                        'correct' => $i == $data['newCorrectAnswer'],
                    ]);
                endif;
            endfor;
            return redirect()->back()->with('success', _('تم تعديل السؤال بنجاح'));
        else :
            return abort(404);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = Auth::user();
        $data = request()->all();
        if ($user ? $user->role_num < 4 : false) :
            $question = Question::find($data['questionId']);
            if (!$question) :
                return abort(404);
            elseif ($question->publisher->id != $user->id) :
                return abort(403);
            endif;
            $question->delete();
            return redirect()->back()->with('success', _('تم حذف السؤال بنجاح'));
        else :
            return abort(404);
        endif;
    }
}
