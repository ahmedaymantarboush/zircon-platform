<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonCollection;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return apiResponse(true,_(''),LessonCollection::only($lessons,[]));
    }

    public function fastEdit(){
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $lesson = Lesson::find($id);
        if (!$lesson) :
            return apiResponse(false, _('لم يتم العثور على الدرس'), [], 404);
        endif;
        if ($lesson->publisher->id != $user->id):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الدرس'), [], 403);
        endif;
        return apiResponse(true, _('تم العثور على الدرس'), [
            'title' => $lesson->title,
            'shortDescription' => $lesson->short_description,
            'grade' => $lesson->grade_id,
            'parts' => $lesson->parts->pluck('id')->toArray(),
            'description' => $lesson->description,
            'free' => $lesson->price == 0,
        ]);
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
