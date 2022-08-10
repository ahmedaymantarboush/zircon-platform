<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SectionCollection;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
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
        $data = json_decode($request->data, true);
        $lecture = \App\Models\Lecture::where('slug', $data['lec'])->first();
        if (!$lecture) :
            return apiResponse(false, _('هذخ المحاضرة غير موجودة'), [], 404);
        endif;
        $lecture_id = $lecture->id;
        $secttion = $lecture->sections()->create([
            'order' => count(Section::where('lecture_id', $lecture_id)->get()) + 1, //$request->input('order'),
            'title' => $data['sectionTitle'],
        ]);

        return apiResponse(true, _('تم اضافة القسم بنجاح'), SectionResource::only($secttion, ['title', 'order', 'items']));
    }

    public function sortSections()
    {
        $data = json_decode(request()->data, true);
        foreach ($data['sections'] as $key => $val) {
            $section = Section::find($val);
            if (!$section) :
                return apiResponse(false, _('هذا السكشن غير موجود'), [], 404);
            endif;
            $section->update(['order' => $key]);
        }
        return apiResponse(true, _('تم تحديث الترتيب بنجاح'),SectionCollection::only($section->lecture->sections, ['title', 'order', 'items']));
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
        $data = $request->all();
        $section = Section::find($id);
        if (!$section) :
            return apiResponse(false, _('هذا السكشن غير موجود'), [], 404);
        endif;
        $section->update([
            'title' => array_key_exists('new_sectionTitle',$data) ? $data['new_sectionTitle'] : $section->title,
        ]);
        return apiResponse(true, _('تم تحديث القسم بنجاح'), SectionResource::only($section, ['title', 'order', 'items']));
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
