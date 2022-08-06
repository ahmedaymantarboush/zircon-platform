<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Resources\ExamResource;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
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
    public function store(StoreExamRequest $request)
    {
        $this->validator($request->all(), true)->validate();
        $exam = Exam::create([
            'title'=>$request->title,
        ]);
        return apiResponse(true,_('تم انشاء الامتحان بنجاح'),new ExamResource($exam));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = EXam::find($id);
        if ($exam){
            return apiResponse(true,_('الامتحان الذي طلبته موجود'),ExamResource::only($exam,['opened','title','questions']));
        }else{
            return apiResponse(false,_('الامتحان الذي طلبته غير موجود'),[],401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, $id)
    {
        $exam = auth()->user()->exams()->find($id);
        if (!$exam){
            return apiResponse(false,_('الامتحان الذي طلبته غير موجود'),[],401);
        }
        if ($request->title) $exam->title = $request->title;
        $exam->save();

        return apiResponse(true,_('تم تعديل الامتحان بنجاح'),new ExamResource($exam));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = auth()->user()->exams()->find($id);
        if (!$exam){
            return apiResponse(false,_('الامتحان الذي طلبته غير موجود'),[],401);
        }
        $exam->delete();
        return apiResponse(true,_('تم حذف الامتحان بنجاح'),[]);
    }
}
