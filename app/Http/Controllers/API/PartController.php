<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
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
        if ($grade && $subject) :
            $parts = Part::where(['user_id' => $user->id, 'grade_id' => $grade, 'subject_id' => $subject])->select(['id', 'name'])->get();
        else :
            $parts = Part::where('user_id',$user->id)->select(['id', 'name'])->get();
        endif;
        if (!count($parts)) :
            return apiResponse(false, _('لم يتم العثور على أجزاء دراسية'), [], 404);
        endif;
        return apiResponse(true, _('تم العثور على أجزاء دراسية'), $parts);
    }
    // public function get()
    // {
    //     $user = apiUser();
    //     if (!$user) :
    //         return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
    //     endif;
    //     $grade = request()->grade;
    //     $subject = request()->subject;
    //     $parts = Part::where(['user_id' => $user->id, 'grade_id' => $grade->id, 'subject_id' => $subject->id])->select('id', 'name')->get();
    //     if (!count($parts)) :
    //         return apiResponse(false, _('لم يتم العثور على أجزاء دراسية'), [], 404);
    //     endif;
    //     return apiResponse(true, _('تم العثور على جزئيات دراسية'), $parts);
    // }

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
