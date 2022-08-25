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
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        if ($user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المستخدم باضافة السؤال'), [], 401);
        endif;

        Validator::make($data,[
            'exam'=>['required','exists:exams,id'],
            'part'=>['required','exists:parts,id'],
            'count'=>['required'],
        ]);

        $examId = $data['exam'];
        $exam = Exam::find($examId);

        if(!$exam):
            return apiResponse(false,_(''));
        endif;

        $dynamicQuestion = DynamicQuestion::create([
            'exam_id'=>$exam,
            'part_id'=>$data['part'],
            'count'=>$data['count'],
            'level'=>$data['level'],
        ]);

        return apiResponse(true, _('تم اضافة السؤال بنجاح'),[]);
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
    public function update(Request $request, $id)
    {
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        if ($user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المستخدم بتعديل السؤال'), [], 401);
        endif;

        Validator::make($data,[
            'exam'=>['required','exists:exams,id'],
            'question'=>['required','exists:questions,id']
        ]);

        $id = $data['id'];
        $partId = $data['part'];
        $part = Part::find($partId);
        if (!$part):
            return apiResponse(false,_('لم يتم العثور على الجزئية الدراسية'),[],404);
        endif;

        $examQuestion = DynamicQuestion::find($id);
        $examQuestion->part_id = $part->id;
        $examQuestion->save();

        return apiResponse(true, _('تم اضافة السؤال بنجاح'),[]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
