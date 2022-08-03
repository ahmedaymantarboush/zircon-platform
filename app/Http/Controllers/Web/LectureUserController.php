<?php

namespace App\Http\Controllers;

use App\Models\LectureUser;
use App\Http\Requests\StoreLectureUserRequest;
use App\Http\Requests\UpdateLectureUserRequest;

class LectureUserController extends Controller
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
     * @param  \App\Http\Requests\StoreLectureUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLectureUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LectureUser  $lectureUser
     * @return \Illuminate\Http\Response
     */
    public function show(LectureUser $lectureUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LectureUser  $lectureUser
     * @return \Illuminate\Http\Response
     */
    public function edit(LectureUser $lectureUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLectureUserRequest  $request
     * @param  \App\Models\LectureUser  $lectureUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLectureUserRequest $request, LectureUser $lectureUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LectureUser  $lectureUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(LectureUser $lectureUser)
    {
        //
    }
}
