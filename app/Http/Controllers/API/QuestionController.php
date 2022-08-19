<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $grade = $data['grade'] ?? 0;
        $subject = $data['subject'] ?? 0;
        $level = $data['level'] ?? 0;
        $part = $data['part'] ?? 0;
        if ($grade && $subject && $level && $part) :
            $questions = Question::where(['user_id' => $user->id, 'grade_id' => $grade, 'subject_id' => $subject, 'level' => $level, 'part_id' => $part])->select(['id', 'name'])->get();
        else :
            $questions = Question::where('user_id',$user->id)->select(['id', 'name'])->get();
        endif;
        if (!count($questions)) :
            return apiResponse(false, _('لم يتم العثور على أسئلة'), [], 404);
        endif;
        return apiResponse(true, _('تم العثور على أسئلة'), $questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
