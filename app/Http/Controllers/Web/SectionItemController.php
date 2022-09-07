<?php

namespace App\Http\Controllers\Web;

use App\Models\SectionItem;
use App\Http\Requests\StoreSectionItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Section;

class SectionItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSectionItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionItemRequest $request)
    {
        $data = $request->all();
        $section = Section::findOrFail($data['section']);
        $exam = Exam::findOrFail($data['exam']);
        $section->total_questions_count += $exam->questions_count;
        $section->save();
        SectionItem::create([
            'title' => $data['examTitle'],
            'exam_id' => $data['item'],
            'order' => count(SectionItem::where('section_id',$data['section'])->get()) + 1,
            'section_id' => $data['section'],
        ]);

        return redirect()->back();
    }

    public function sortItems()
    {
        $data = request()->all();
        foreach ($data as $key => $val){
            if (str_starts_with($key,"order")){
                SectionItem::findOrFail( intval( substr($key,5) ) )->update(['order' => $val]);
            }
        }
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SectionItem  $sectionItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SectionItem::findOrFail($id)->delete();
        return redirect()->back();
    }
}
