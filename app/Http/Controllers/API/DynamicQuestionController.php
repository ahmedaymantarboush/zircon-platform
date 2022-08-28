<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DynamicQuestion;
use App\Models\Exam;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DynamicQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        if ($user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المستخدم باضافة السؤال'), [], 401);
        endif;

        Validator::make($data, [
            'exam' => ['required', 'exists:exams,id'],
            'part' => ['required', 'exists:parts,id'],
            'count' => ['required'],
        ]);

        $examId = $data['exam'];
        $exam = Exam::find($examId);

        if (!$exam) :
            return apiResponse(false, _('لم يتم العثور على الامتحان'), 404);
        endif;

        if ($exam->publisher->id != $user->id || $user->role->number > 2) :
            return apiResponse(false, _('غير مصرح للمستخدم بتعديل السؤال'), [], 403);
        endif;

        $dynamicQuestion = DynamicQuestion::create([
            'exam_id' => $exam->id,
            'part_id' => $data['part'],
            'count' => $data['count'],
            'level' => $data['level'] ?? $exam->exam_hardness,
        ]);
        $exam =$dynamicQuestion->exam;
        $exam->questions_count -= $dynamicQuestion->count;
        $exam->save();
        return apiResponse(true, _('تم اضافة السؤال بنجاح'), [
            'id'=>$dynamicQuestion->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        if ($user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المستخدم بتعديل السؤال'), [], 401);
        endif;

        Validator::make($data, [
            'exam' => ['required', 'exists:exams,id'],
            'part' => ['required', 'exists:parts,id'],
            'count' => ['required'],
        ]);

        $id = $data['id'];
        $partId = $data['part'];
        $part = Part::find($partId);
        if (!$part) :
            return apiResponse(false, _('لم يتم العثور على الجزئية الدراسية'), [], 404);
        endif;

        if ($user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المستخدم بحذف السؤال'), [], 401);
        endif;

        $examQuestion = DynamicQuestion::find($id);
        if (!$examQuestion) :
            return apiResponse(false, _('لم يتم العثور على السؤال'), [], 404);
        endif;

        $examQuestion->part_id = $part->id;
        $examQuestion->count = $data['count'];
        $examQuestion->save();

        return apiResponse(true, _('تم اضافة السؤال بنجاح'), [$examQuestion->toArray()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        if ($user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المستخدم بحذف السؤال'), [], 401);
        endif;


        $id = $data['id'];
        $dynamicQuestion = DynamicQuestion::find($id);
        if ($dynamicQuestion) :
            $exam =$dynamicQuestion->exam;
            $exam->questions_count -= $dynamicQuestion->count;
            $exam->save();
            $dynamicQuestion->delete();
        endif;
        return apiResponse(true, _('تم حذف السؤال بنجاح'), []);
    }
}
