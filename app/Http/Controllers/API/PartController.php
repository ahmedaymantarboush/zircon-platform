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
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $grade = $data['grade'] ?? 0;
        $subject = $data['subject'] ?? 0;
        if ($grade && $subject) :
            $parts = Part::where(['user_id' => $user->id, 'grade_id' => $grade, 'subject_id' => $subject])->select(['id', 'name'])->get();
        else :
            $parts = Part::where('user_id', $user->id)->select(['id', 'name'])->get();
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
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $data = json_decode($request->data, true);
        $validator = validator()->make(
            $data,
            [
                'name' => 'required|string|max:255',
                'grade' => 'required|exists:grades,id',
                'subject' => 'required|exists:subjects,id',
            ],[
                'name.required' => _('يجب إدخال إسم الجزئية الدراسية'),
                'name.string' => _('يجب إدخال إسم الجزئية الدراسية كحد أقصى 255 حرف'),
                'name.max' => _('يجب إدخال إسم الجزئية الدراسية كحد أقصى 255 حرف'),

                'grade.required' => _('يجب إدخال المرحلة'),
                'grade.exists' => _('المرحلة غير موجودة'),

                'subject.required' => _('يجب إدخال المادة'),
                'subject.exists' => _('المادة غير موجودة'),
            ]
        );
        if ($validator->fails()) :
            return apiResponse(false, _('خطأ'), $validator->errors(), 400);
        endif;
        $part = new Part();
        $part->name = $data['name'];
        $part->user_id = $user->id;
        $part->grade_id = $data['grade'];
        $part->subject_id = $data['subject'];
        $part->save();
        return apiResponse(true, _('تم إضافة الجزء بنجاح'), [
            'id' => $part->id,
            'name' => $part->name,
            'grade' => $part->grade->name,
            'subject' => $part->subject->name,
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
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $part = Part::find($id);
        if (!$part) :
            return apiResponse(false, _('لم يتم العثور على الجزء'), [], 404);
        endif;
        return apiResponse(true, _('تم العثور على الجزء'), [
            'id' => $part->id,
            'name' => $part->name,
            'grade' => $part->grade->name,
            'subject' => $part->subject->name,
        ]);
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
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $data = json_decode($request->data, true);
        $validator = validator()->make(
            $data,[
                'name' => 'required|string|max:255',
                'grade' => 'required|exists:grades,id',
                'subject' => 'required|exists:subjects,id',
            ],[
                'name.required' => _('يجب إدخال إسم الجزئية الدراسية'),
                'name.string' => _('يجب إدخال إسم الجزئية الدراسية كحد أقصى 255 حرف'),
                'name.max' => _('يجب إدخال إسم الجزئية الدراسية كحد أقصى 255 حرف'),

                'grade.required' => _('يجب إدخال المرحلة'),
                'grade.exists' => _('المرحلة غير موجودة'),

                'subject.required' => _('يجب إدخال المادة'),
                'subject.exists' => _('المادة غير موجودة'),
            ]);
        if ($validator->fails()) :
            return apiResponse(false, _('خطأ'), $validator->errors(), 400);
        endif;
        $part = Part::find($id);
        if (!$part) :
            return apiResponse(false, _('لم يتم العثور على الجزئية الدراسية'), [], 404);
        endif;
        $part->name = $data['name'];
        $part->grade_id = $data['grade'];
        $part->subject_id = $data['subject'];
        $part->save();
        return apiResponse(true, _('تم تحديث الجزئية الدراسية بنجاح'), [
            'id' => $part->id,
            'name' => $part->name,
            'grade' => $part->grade->name,
            'subject' => $part->subject->name,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $part = Part::find($id);
        if (!$part) :
            return apiResponse(false, _('لم يتم العثور على الجزئية الدراسية'), [], 404);
        endif;
        $part->delete();
        return apiResponse(true, _('تم حذف الجزئية الدراسية بنجاح'),[]);
    }
}
