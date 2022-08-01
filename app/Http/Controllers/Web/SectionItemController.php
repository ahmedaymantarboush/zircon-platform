<?php

namespace App\Http\Controllers;

use App\Models\SectionItem;
use App\Http\Requests\StoreSectionItemRequest;
use App\Http\Requests\UpdateSectionItemRequest;

class SectionItemController extends Controller
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
     * @param  \App\Http\Requests\StoreSectionItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SectionItem  $sectionItem
     * @return \Illuminate\Http\Response
     */
    public function show(SectionItem $sectionItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SectionItem  $sectionItem
     * @return \Illuminate\Http\Response
     */
    public function edit(SectionItem $sectionItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSectionItemRequest  $request
     * @param  \App\Models\SectionItem  $sectionItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSectionItemRequest $request, SectionItem $sectionItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SectionItem  $sectionItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(SectionItem $sectionItem)
    {
        //
    }
}
