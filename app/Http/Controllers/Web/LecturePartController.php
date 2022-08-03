<?php

namespace App\Http\Controllers;

use App\Models\LecturePart;
use App\Http\Requests\StoreLecturePartRequest;
use App\Http\Requests\UpdateLecturePartRequest;

class LecturePartController extends Controller
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
     * @param  \App\Http\Requests\StoreLecturePartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLecturePartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LecturePart  $lecturePart
     * @return \Illuminate\Http\Response
     */
    public function show(LecturePart $lecturePart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LecturePart  $lecturePart
     * @return \Illuminate\Http\Response
     */
    public function edit(LecturePart $lecturePart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLecturePartRequest  $request
     * @param  \App\Models\LecturePart  $lecturePart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLecturePartRequest $request, LecturePart $lecturePart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LecturePart  $lecturePart
     * @return \Illuminate\Http\Response
     */
    public function destroy(LecturePart $lecturePart)
    {
        //
    }
}
