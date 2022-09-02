<?php

namespace App\Http\Controllers\Web;

use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Http\Controllers\Controller;

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
     * @param  \App\Http\Requests\StoreSectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {
        $data = $request->all();
        $lectute_id = \App\Models\Lecture::where('slug',$data['lec'])->first()->id;
        Section::create([
            'lecture_id' => $lectute_id,
            'order' => count(Section::where('lecture_id', $lectute_id)->get()) + 1,//$request->input('order'),
            'title' => $data['sectionTitle'],
            'time' => 0,
        ]);
        return redirect()->back();
    }

    public function sortSections()
    {
        $data = request()->all();
        foreach ($data as $key => $val){
            if (str_starts_with($key,"order")){
                Section::findOrFail( intval( substr($key,5) ) )->update(['order' => $val]);
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSectionRequest  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSectionRequest $request, $id)
    {
        $data = $request->all();
        $section = Section::find($id);
        $section->update([
            // 'order' => array_key_exists('order',$data) ? $data['order'] : $section->order,
            'title' => array_key_exists('new_sectionTitle',$data) ? $data['new_sectionTitle'] : $section->title,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->items()->delete();
        $section->delete();
        return redirect()->back();
    }
}
